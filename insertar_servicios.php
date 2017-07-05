<HTML>
<HEAD>
<TITLE>Registrando servicio ...</TITLE>
</HEAD>
<BODY>
<?php 

$num_doc            = @$_POST['num_doc'];
$tipo_servicio      = @$_POST['tipo_servicio'];
$fecha_recepcion    = @$_POST['fecha_registro'];
$local              = @$_POST['interno'];
$individual         = @$_POST['personal_grupal'];
$fecha_evento       = @$_POST['fecha_evento'];
$fecha_entrega      = @$_POST['fecha_entrega'];
$fotos_cantidad     = @$_POST['cant_fotos'];

if($fecha_recepcion){
    $pattern1 = "/^(\d{2})-(\d{2})-(\d{4})$/";
    $pattern2 = "/^([\d]{2})\/([\d]{2})\/([\d]{4})$/";
    echo $fecha_recepcion."<br />";
    if(preg_match($pattern1,$fecha_evento)){
        die($fecha_recepcion);
        $fecha_recepcion = preg_replace($pattern1,"\\3-\\2-\\1", $fecha_recepcion);
    }
    if(preg_match($pattern2,$fecha_evento)){
        die($fecha_recepcion);
        $fecha_recepcion = preg_replace($pattern2,"\\3-\\2-\\1", $fecha_recepcion);
    }
    
}

if($individual="Personal"){
    $individual=1;
}else{
    $individual=2;
}
    // Abrimos la conexion a la base de datos  
    include("models/config.php"); 
    session_start();

    //Buscamos IDs
    $sql="SELECT id FROM cliente WHERE documento='".$num_doc."'";
    //echo $num_doc;
    $result= mysqli_query($db,$sql); 
    //echo $sql;
    while($row = mysqli_fetch_array($result)){
        $clientes_id = $row["id"];
        //echo $clientes_id;
    }
        
    $sql="SELECT * FROM Disco order by id desc limit 1";
        $result= mysqli_query($db, $sql);
        while($row = mysqli_fetch_array($result)) {
            $disco_actual=$row["numero"];
        }

    $sql="SELECT id FROM tipo_servicios WHERE nombre='".$tipo_servicio."'";

    $result2 = mysqli_query($db,$sql);

    
    while($row = mysqli_fetch_array($result2, MYSQL_ASSOC)){
        $tipo_servicios_id = $row["id"];
    }
    //Registamos servicio
    $_GRABAR_SQL = "INSERT INTO sesion_fotografica (clientes_id,fotos_cantidad,local,individual,fecha_recepcion,fecha_entrega,fecha_evento,estado, tipo_servicios_id, disco_id) VALUES ('$clientes_id','$fotos_cantidad','$local','$individual','$fecha_recepcion','$fecha_entrega','$fecha_evento','1','$tipo_servicios_id','$disco_actual')"; 

    mysqli_query($db,$_GRABAR_SQL); 
    echo $_GRABAR_SQL;
    header("location: clientes.php");
    // Confirmamos que el registro ha sido insertado con exito 
      
?>  
</BODY>
</HTML>


