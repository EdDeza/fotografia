<!DOCTYPE html>
<html>
<head>
<?php include 'tpl/head.php'; ?>
</head>
<body>
<?php include 'tpl/header.php'; ?>
	<?php 
 	include("models/config.php");
   	session_start();
    ?>
	<div class="col-xs-12 buscador_clientes">

<?php
$v1 = @$_POST['i_nombres_completos'];
$v2 = @$_POST['i_dni_cliente'];
$v3 = @$_POST['i_tipo_documento'];
$v4 = @$_POST['i_nombre_servicio'];


?>
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

	<div class="container">

		<div class="col-xs-12 agregar_servicios_vista sinpa">
			<h1>Administrar Servicio</h1>
			<form method="POST" action="insertar_servicios.php">
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">Nombres completos</p>
					<input  name="nombre" id="nombre" type="text" readonly value="<?php echo $v1; ?>" class="col-xs-12 col-md-9" >
				</div>
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">N° documento</p>
					<input  name="num_doc" id="num_doc" type="text" readonly value="<?php echo $v2; ?>" class="col-xs-12 col-md-9" >
				</div>
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">Tipo de servicio</p>
					<input  name="tipo_servicio" id="tipo_servicio" type="text" readonly value="<?php echo $v4; ?>" class="col-xs-12 col-md-9" >
				</div>
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">Fecha de registro</p>
					<?php $fecha_actual=date("Y/m/d"); ?>
					<input class="col-xs-12 col-md-9"  name="fecha_registro" id="fecha_registro" value="<?php echo($fecha_actual); ?>" >
				</div>
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">Locación</p>
						<input name="locacion" id="interno" type="radio" value="interno" /> Interno &nbsp;&nbsp;
						<input name="locacion" id="externo" type="radio" value="externo" /> Externo
				</div>
				<div class=" col-xs-12 individual_opciones col-md-6 input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">Personal o Grupal</p>
					<input type="radio" id="opcion_personal" name="personal_grupal" value="Personal" ><span> Personal</span>
  					<input type="radio" id="opcion_grupal" name="personal_grupal" value="Grupal"> <span> Grupal</span>
				</div>
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">Fecha de evento</p>
					<input name="fecha_evento" id="fecha_evento" type="date" class="col-xs-12 col-md-9" >
				</div>
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">Fecha de entrega</p>
					<input name="fecha_entrega" id="fecha_entrega" type="date" class="col-xs-12 col-md-9" >
				</div>
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">Cantidad de fotos</p>
					<input name="cant_fotos" id="cant_fotos" type="text" class="col-xs-12 col-md-9" >
				</div>
				<div class=" col-xs-12 col-md-6 input-content sinpa_sm">
					<p class="sinpa col-xs-12" >Ruta: C:/fotografias/</p>
				</div>
				<div class=" col-xs-12 col-md-6 subir_archivos input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">Fotos retocadas</p>					
					<input id="input_retocadas" name="input_retocadas[]" type="file" multiple=true class="file-loading">
				</div>
				<div class=" col-xs-12 col-md-6 subir_archivos input-content sinpa_sm">
					<p class="sinpa col-md-3 col-xs-12">Fotos sin retocar</p>
					<input id="input_sin_retocar" name="input_sin_retocar[]" type="file" multiple=true class="file-loading">
				</div>
				<div class=" col-xs-12 btn_crear_servicio input-content sinpa_sm">	
					<input type="submit" id="guardar_servicio" name="guardar_servicio" value="Registrar Sesión">
				</div>

			</form>
		</div>
	</div>
	
<?php include 'tpl/footer.php'; ?>
</body>
</html>


