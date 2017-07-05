<!DOCTYPE html>
<html>
<head>
<?php include 'tpl/head.php'; ?>
</head>
<body>
<?php include 'tpl/header.php'; ?>
	<div class="col-xs-12 buscador">
<?php
include("models/config.php");
session_start();
$s1 = @$_POST['s_nombres_completos'];
$s2 = @$_POST['s_dni_cliente'];
$s3 = @$_POST['s_fecha_ahora'];
$s4 = @$_POST['s_fecha_luego'];

$tmp_s3 = $s3;
$tmp_s4 = $s4;

$s3 = preg_replace("/^([\d]{4})-([\d]{2})-([\d]{2})$/","\\3/\\2/\\1", $s3);
$s4 = preg_replace("/^([\d]{4})-([\d]{2})-([\d]{2})$/","\\3/\\2/\\1", $s4);
$sql="SELECT * FROM Disco order by id desc limit 1";
$result= mysqli_query($db, $sql);
while($row = mysqli_fetch_array($result)) {
	$disco_actual=$row["numero"];
}
?>

    <div class="nombre_disco"><p>Disco Actual:<?php echo $disco_actual ?></p></div>
		<div class="container sinpa">
			<h1>Resultados:</h1> <br>
			<form action="">
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">Nombre completo</p>
					<input name="nombre" id="nombre" type="text" readonly value="<?php echo $s1; ?>" class="col-xs-12 col-md-9" >
				</div>
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">DNI</p>
					<input name="dni" id="num_doc" type="text" readonly value="<?php echo $s2; ?>" class="col-xs-12 col-md-9" >
				</div>
				
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class=" sinpa col-md-3 col-xs-12">Fecha de Inicio</p>
					<input type="text" disabled="true" name="fechaini" id="fechaini" value="<?php echo $s3; ?>" class="col-xs-12 col-md-9" >
				</div>
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class=" sinpa col-md-3 col-xs-12">Fecha de Fin</p>
					<input type="text" disabled="true" name="fechafin" id="fechafin" value="<?php echo $s4; ?>" class="col-xs-12 col-md-9" >
				</div>
			</form>
		</div>
	</div>


	<!-- Falta el query de  los resultados!! -->
	<div class="buscador-resultado">
		<div class="container ">
			<div class="table-responsive">
				
				<table class="table table-bordered">
				    <thead>
				      <tr>
				        <th><b>#</b></th>
				        <th><b>Fecha</b></th>
				        <th><b>Disco</b></th>
				        <th><b>Directorio</b></th>
				        <th><b>actualizar</b></th>
				      </tr>
				    </thead>
				    <tbody>
				    <?php 
				    	$a=1;
				    	$sql="SELECT * FROM Disco order by id desc limit 1";
				    	$result= mysqli_query($db, $sql);
				    	while($row = mysqli_fetch_array($result)) {
				    		$disco_actual=$row["numero"];
				    	}

				    	$where = " where 1 ";
				    	if($tmp_s3=="" || $tmp_s4==""){
				    		//
				    	}else{
				    		$where .=" AND ses.fecha_recepcion BETWEEN '$tmp_s3' AND '$tmp_s4'"; 
				    	}
				    	$where .=" AND documento= '$s2' ";
				    	$sql="
							SELECT 
								ses.*,
								c.documento,
								d.numero
							FROM 
								sesion_fotografica AS ses 
								JOIN cliente AS c ON c.id = ses.clientes_id  
								JOIN disco AS d ON d.id = ses.disco_id
							$where
								 
				    	" ; 
				    	$result = mysqli_query($db,$sql);
				    	while($row = mysqli_fetch_array($result)) {

				     ?>
				      <tr>
				        <td width="40px"><?php echo $a++; ?></td>
				        <td><?php echo $row["fecha_recepcion"]; ?></td>
				        <td><?php echo "Disco ".$row["numero"]; ?></td>
				        <td><?php echo "C:/fotografia/".$row["fecha_recepcion"]."/".$row["documento"]; ?></td>
				        <td width="80px;"><?php 
				        	if($row["numero"]==$disco_actual)
				        		echo '<center><a data-toggle="modal" data-target="#subir_fotos" href="#"><img src="app/img/inicio/lupa.png" alt=""></a><center></td>';
				        	else{
				        		echo '<center><img src="app/img/inicio/x.png" alt=""></center></td>';
				        	}
				         ?>
				         
				      </tr>
				      <?php } ?>
				    </tbody>
				</table>
				
			</div>
		</div>
	</div>

	<script>
$(window).ready(function(){
	$("#input_sin_retocar,#input_retocadas").fileinput({
		uploadUrl: "upload.php",
		language: "es",
		uploadAsync: true,
		minFileCount: 0,
		maxFileCount: 20,
		validateInitialCount: true
	}); 
	$('#input_retocadas').on('filepreupload', function(event, data, previewId, index) {
		data.form.append('documento',$("#num_doc").val());
		data.form.append('retoque',"1");
		data.form.append('directory', 'C:/fotografias'); 

	});
	$('#input_sin_retocar').on('filepreupload', function(event, data, previewId, index) {
		data.form.append('documento',$("#num_doc").val());
		data.form.append('directory', 'C:/fotografias'); 

	});
	$('#input_retocadas,#input_sin_retocar').on('fileuploaded', function(event, data, previewId, index) {
		console.log(data);

	});
	$('#input_retocadas,#input_sin_retocar').on('fileuploaderror', function(event, data, msg) {
		console.log(data);
		console.log(msg);

	});
});

/*
	El valor que debemos recibir es el value si es valor de la opcion es 1 o 2,  es INTERNO
	Sino, es EXTERNo
*/
</script>

	<div class="modal fade" id="subir_fotos" role="dialog">
				<div class="modal-dialog">
			    
			      <!-- Modal content-->
			      	<div class="modal-content">
			        	<div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h1 class="modal-title"><b>Subir imágenes cliente</b></h1>
			        	</div>
			        	<div class="modal-body">
				        	<div class=" col-xs-12 col-md-6 subir_archivos input-content sinpa_sm">
								<p class="sinpa col-md-3 col-xs-12">Fotos retocadas</p>					
								<input id="input_retocadas" name="input_retocadas[]" type="file" multiple=true class="file-loading">
							</div>
							<div class=" col-xs-12 col-md-6 subir_archivos input-content sinpa_sm">
								<p class="sinpa col-md-3 col-xs-12">Fotos sin retocar</p>
								<input id="input_sin_retocar" name="input_sin_retocar[]" type="file" multiple=true class="file-loading">
							</div>
						<br>
				        </div>
				        <div class="modal-footer">
				           
				        </div>
			      	</div>
			   	</div>
			</div>

	
<?php include 'tpl/footer.php'; ?>
</body>
</html>