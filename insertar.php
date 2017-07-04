<HTML>
<HEAD>
<TITLE>Insertar.php</TITLE>
</HEAD>
<BODY>
<?php 

$c1 = @$_POST['num_documento'];
$c2 = @$_POST['nombres'];
$c3 = @$_POST['ape_paterno'];
$c4 = @$_POST['ape_materno'];
$c5 = @$_POST['direccion_cliente'];
$c6 = @$_POST['tipo_docu'];
$c7 = @$_POST['num_celular'];
$c8 = @$_POST['correo_electronico'];

$numero_doc = strip_tags($c1);       
$numero_documento = strlen($numero_doc); 
$nombre = strip_tags($c2);
$n_nombre = strlen($nombre);
$apellido_pater = strip_tags($c3);       
$apellido_paterno = strlen($apellido_pater); 
$apellido_mater = strip_tags($c4);       
$apellido_materno = strlen($apellido_mater); 
$direccion_clien = strip_tags($c5);       
$direccion_client = strlen($direccion_clien); 
$tipo_documen = strip_tags($c6);       
$tipo_docu = strlen($tipo_documen); 
$num_celu = strip_tags($c7);       
$num_celular = strlen($num_celu); 
$correo_elec = strip_tags($c8);       
$correo_electronico = strlen($correo_elec); 


$fecha = date("d-m-Y H:i");  

$total_carac =$numero_documento*$n_nombre*$apellido_paterno*$apellido_materno*$direccion_client*$tipo_docu*$num_celular * $correo_electronico; 

if ($total_carac >= 1)   
{   
    // Abrimos la conexion a la base de datos  
    include("models/config.php"); 
    session_start();

    $_GRABAR_SQL = "INSERT INTO cliente (documento,nombres,ap_paterno,ap_materno,direccion,tipo_docs_id,telefono,email1) VALUES ('$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8')"; 

    mysqli_query($db,$_GRABAR_SQL); 
    //echo $_GRABAR_SQL;
      
    // Confirmamos que el registro ha sido insertado con exito  
    ?> 
    <h1><div align="center">Registro Insertado</div></h1>
	<div align="center"><a href="clientes.php">Regresar al inicio</a></div> 
<?php 

}  
else  
{  
    echo "Los campos nombre, apellido paterno, apellido materno y numero de documento no pueden estar vacios.<br />";  
   ?>  
    <div align="center"><a href="clientes.php">Regresar al inicio</a></div>
    <?php 
}  
?>  
</BODY>
</HTML>


