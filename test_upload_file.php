<?php 

	if(!isset($_FILES) || !is_array($_FILES)){
		die("error-files");
	}else{
		$file = Util::getDataFromArray("input_name1",$_FILES);
		if(!is_array($file)){
			die("error-file-content");
		}else{
			$name 		= Util::getDataFromArray("name",$file);
			$tmp_name 	= Util::getDataFromArray("tmp_name",$file);
			$error 		= Util::getDataFromArray("error",$file);
			$size 		= Util::getDataFromArray("size",$file);
			$directory 		= Util::getDataFromArray("directory",$_POST);
			$documento 		= Util::getDataFromArray("documento",$_POST);
			$documento 		= preg_replace("/[^\w]+/","",$documento);
			if(strlen($directory)==0){
				die("no-dir");
			}
			$_length_doc = strlen($documento);
			if($_length_doc==0 || $_length_doc<7){
				die("no-doc");
			}

			if(is_array($name)){
				$name = $name[0];
			}
			$file_ext = strtolower(pathinfo($name,PATHINFO_EXTENSION)); 
			$extensions = array(
					"jpeg",
					"jpg",
					"png",
					"gif",
					"svg", 
					"psd", 
					);
			if(is_array($tmp_name)){
				$tmp_name = $tmp_name[0];
			}
			if(is_array($error)){
				$error = $error[0];
			}
			if(is_array($size)){
				$size = $size[0];
			} 
			$msg_error = null;
			switch ($error) {
				case UPLOAD_ERR_OK:
					$msg_error = null;
					break;
				case UPLOAD_ERR_INI_SIZE:
					$msg_error = "El fichero subido excede el tamaño permitido.";
					break; 
				case UPLOAD_ERR_FORM_SIZE:
					$msg_error = "El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.";
					break; 
				case UPLOAD_ERR_PARTIAL:
					$msg_error = "El fichero fue sólo parcialmente subido.";
					break; 
				case UPLOAD_ERR_NO_FILE:
					$msg_error = "No se subió ningún fichero.";
					break; 
				case UPLOAD_ERR_NO_FILE:
					$msg_error = "Falta la carpeta temporal.";
					break; 
				case UPLOAD_ERR_CANT_WRITE:
					$msg_error = "No se pudo escribir el fichero en el disco.";
					break; 
				case UPLOAD_ERR_EXTENSION:
					$msg_error = "Una extensión de PHP detuvo la subida de ficheros. ";
					break; 
			}
			if(isset($msg_error)){
				die($msg_error);
			}else if($size>MAX_UPLOAD_SIZE){  
				die("error-max-file-size");
			}else if(!in_array($file_ext,$extensions)){ 
				die("error-file-type");
			}else if(!Util::hasIntegerStr($directory)){ 
				die("select-dir");
			}else{

				date_default_timezone_set('America/Lima'); 
				$date_sql = date('Y-m-d');
				$date_directory = date('d_m_Y'); 

				$file_name = $name . "." . $file_ext;
				$dir = $directory . "/" . $date_directory . "/" . $documento; 
				if(!is_dir($dir)){
					$is_mk_dir = mkdir($dir, 0777,true);
					if(!$is_mk_dir){ 
						$msg = array("message"=>"error-make-dir","dir"=>$dir);
						$msg = json_encode($msg); 
						die($msg);
					} 
				} 
				$path_name = $dir . "/" . $file_name;
				$saved = move_uploaded_file($tmp_name,$path_name);
				if($saved){
					//grabar en base de datos
					if($result===true){
						echo "ok"; 
					}else{
						$deleted = unlink($path_name);
						echo "error";
					} 
				}else{ 
					echo "error-move-file"; 
				}
			}
		}
	} 

?>