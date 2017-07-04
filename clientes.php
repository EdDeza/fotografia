<!DOCTYPE html>
<html>
<head>
<?php include 'tpl/head.php'; ?>
</head>
<body>
<?php include 'tpl/header.php'; ?>
<div class="col-xs-12 vista_clientes">

<?php 
 	include("models/config.php");
   	session_start();
    ?>
	<div class="container" id="registrarCliente">
		<button type="button" class="Registrar_usuario btn btn-info1" data-toggle="modal" data-target="#registrar_cliente">Registrar nuevo cliente</button>
		<div class="modal fade" id="registrar_cliente" role="dialog">
			<div class="modal-dialog">
		    
		      <!-- Modal content-->
		      	<div class="modal-content">
		        	<div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h1 class="modal-title"><b>Registrar nuevo cliente</b></h1>
		        	</div>
		        	<div class="modal-body">
			         <form method="POST" action="insertar.php">
						<div class=" col-xs-12 col-md-12 input-content sinpa_sm">
							<h4 style="float: left;" class="col-md-5"><b>Nombres </b><span>:</span></h4>
							<input name="nombres" class="col-md-6" id="nombres" style="float: left;" cols="30" rows="1">
						</div>
						<div class=" col-xs-12 col-md-12 input-content sinpa_sm">
							<h4 style="float: left;" class="col-md-5"><b>Apellido paterno </b><span>:</span></h4>
							<input name="ape_paterno" class="col-md-6" id="ape_paterno" style="float: left;" cols="30" rows="1">
						</div>
						<div class=" col-xs-12 col-md-12 input-content sinpa_sm">
							<h4 style="float: left;" class="col-md-5"><b>Apellido materno </b><span>:</span></h4>
							<input name="ape_materno" class="col-md-6" id="ape_materno" style="float: left;" cols="30" rows="1">
						</div>
						<div class=" col-xs-12 col-md-12 input-content sinpa_sm multiselec_service" >
							<h4 style="float: left;" class="col-md-5"><b>Tipo de documento </b><span>:</span></h4>
								<?php 
							    	$sql="SELECT * FROM tipo_docs";
							    	$result = mysqli_query($db,$sql);
			   						while($row = mysqli_fetch_array($result)) {
								?>	
								<input style="margin-top: 10px;" name="tipo_docu" id="tipo_docu" type="radio"  value="<?php echo $row["id"];?>"/> <?php echo $row["nombre"];?> <span>&nbsp;&nbsp;<span/>   
			   					
								<?php   

			   						}
						     	?>
						</div>
						<div class=" col-xs-12 col-md-12 input-content sinpa_sm" >
							<h4 style="float: left;" class="col-md-5"><b>N° documento </b><span>:</span></h4>
							<input type="text" class="col-md-6"  maxlength="506" name="num_documento" style="float: left;" id="num_documento" rows="1">
						</div>
						<div class=" col-xs-12 col-md-12 input-content sinpa_sm" >
							<h4 style="float: left;" class="col-md-5"><b>Teléfono </b><span>:</span></h4>
							<input type="text" class="col-md-6"  maxlength="20" name="num_celular" style="float: left;" id="num_celular" rows="1">
						</div>
						<div class=" col-xs-12 col-md-12 input-content sinpa_sm" >
							<h4 style="float: left;" class="col-md-5"><b>Dirección </b><span>:</span></h4>
							<input type="text" class="col-md-6"  maxlength="20" name="direccion_cliente" style="float: left;" id="direccion_cliente" rows="1">
						</div>
						<div class=" col-xs-12 col-md-12 input-content sinpa_sm" >
							<h4 style="float: left;" class="col-md-5"><b>Correo electrónico </b><span>:</span></h4>
							<input type="email" class="col-md-6"  maxlength="20" name="correo_electronico" style="float: left;" id="correo_electronico" rows="1">
						</div>
						<input id="registrar_usuario" type="submit" name="registrar_usuario" value="Guardar datos">
					</form>
					<br>
			        </div>
			        <div class="modal-footer">
			           
			        </div>
		      	</div>
		   	</div>
		</div>
	</div>
	<div class="modal fade" id="agregarServicio" role="dialog">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h1 class="modal-title">Agregar un servicio</h1>
	        </div>
	        <div class="modal-body">
	          	<form class="col-xs-12" method="POST" action="servicios.php">
	          		<div class="col-xs-12 agregarServicio_info sinpa">
	          			<div class=" col-xs-12 col-md-6 ">
							<h4><b>Nombres completos</b></h4>
							<input class="col-xs-12" readonly name="i_nombres_completos" id="i_nombres_completos" cols="30" rows="1" />
						</div>
						<div class=" col-xs-12 col-md-6 input-content ">
							<h4><b>Documento de identidad</b></h4>
							<input class="col-xs-12" type="text" readonly maxlength="16" name="i_dni_cliente" id="i_dni_cliente" rows="1" />
						</div>
	          		</div> 
					<div class=" col-xs-12 multiselec_service ">
						    <h4><b>Seleccione el tipo de servicio</b></h4><br>
						    <?php 
						    	$sql="SELECT * FROM tipo_servicios";
						    	$result = mysqli_query($db,$sql);
		   						while($row = mysqli_fetch_array( $result)) {
							?>
							<input name="i_nombre_servicio" id="i_nombre_servicio" type="radio"  value="<?php echo $row["nombre"];?>"/> <?php echo $row["nombre"];?> <br/>	
							<?php    				
		   						}

					     	?>
	                		
					</div>

					<a data-dismiss="modal" class="btn_atras">Atrás</a>
	         		<input class="btn_siguiente" type="submit" value="Siguiente">
				</form>
	          	<br><br>
	        </div>
	        <div class="modal-footer">
	          
	          
	        </div>
	      </div>
	    </div>
	  </div>

	<div class="modal fade" id="buscarCliente" role="dialog">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h1 class="modal-title">Introduzca intervalos de fecha</h1>
	        </div>
	        <div class="modal-body">
	          	<form class="col-xs-12" method="POST" action="buscar.php">
	          		<div class="col-xs-12 agregarServicio_info sinpa">
	          			<div class=" col-xs-12 col-md-6 input-content ">
							<h4><b>Nombres completos</b></h4>
							<input class="col-xs-12" readonly name="s_nombres_completos" id="s_nombres_completos" cols="30" rows="1" value="Edwin Junior Deza Culque"/>
						</div>
						<div class=" col-xs-12 col-md-6 input-content ">
							<h4><b>N° documento</b></h4>
							<input class="col-xs-12" type="text" readonly maxlength="16" name="s_dni_cliente" id="s_dni_cliente" rows="1" value="71834023"/>
						</div>
	          		</div>
					<div class=" col-xs-12 multiselec_service ">
						<div class="col-sm-6 col-xs-12">
							<p>Desde: <input type="date" id="s_fecha_ahora" name="s_fecha_ahora" min="2017-06-06" value=""/></p>

						</div>
						<div class="col-sm-6 col-xs-12 div2_services">
							<p>Hasta: <input type="date" id="s_fecha_luego" name="s_fecha_luego" value=""/></p>
						</div>
						
					</div>
					<a data-dismiss="modal" class="btn_atras">Atrás</a>
	         		<input class="btn_siguiente" type="submit" value="Siguiente">
				</form>
	          	<br><br>
	        </div>
	        <div class="modal-footer">
	          
	        </div>
	      </div>
	    </div>
	</div>

	<div class="container sinpa">
		<h1>Buscador de clientes</h1>
		<br>
		<form action="" method="POST" class="buscador_cliente">
			<div class=" col-xs-12 col-md-6 input-content sinpa_sm buscar_nombre">
				<p>Buscar por nombre</p>
				<input name="nombre" id="nombre" type="text" class="col-xs-12 " placeholder="Introduce Nombre completo">
				<input type="submit" class="buscador_cliente_submit col-xs-12" value="Buscar">
			</div>
			<div class=" col-xs-12 col-md-6 input-content sinpa_sm">

				<p>Buscar por N° documento</p>				
				<select name="tipo_doc" class="col-xs-12 tipo_doc_busqueda">
					<option value="0">Seleccionar documento</option>
					<?php 
				    	$sql="SELECT * FROM tipo_docs";
				    	$result = mysqli_query($db,$sql);
   						while($row = mysqli_fetch_array($result)) {
						?>	   
   						<option value="<?php echo $row["id"];?>"><?php echo $row["nombre"]; ?></option>
						<?php    					
   							}
			     		?>
				</select>
				<input name="num_documento" id="dni_cliente2" type="text" maxlength="16" class="col-xs-12" placeholder="Introduce número de Documento">
				<input type="submit" class="buscador_cliente_submit col-xs-12" value="Buscar">
			</div>
		</form>
	</div>	

	<div class="buscador-resultado">
		<div class="container ">
			<h2>Resultados</h2>
			<div class="table-responsive">
				<table class="table table-bordered">
				    <thead>
					    <tr>
					        <th><b>#</b></th>
					        <th><b>Nombre</b></th>
					        <th><b>N° documento</b></th>
					        <th><b>Dirección</b></th>
					        <th><b>Teléfono</b></th>
					        <th><b>Correo electrónico</b></th>
					        <td width="50px"><b>Agregar servicio</b></td>
					        <td width="50px"><b>Buscar</b></td>
					        <td width="50px"><b>Modificar</b></td>
					        <td width="50px"><b>Eliminar</b></td>
					    </tr>
					</thead>
				    <tbody>
				    	<?php 
				    		$a=1;
				    		$sql="SELECT * FROM cliente where 1 ";
				    		$_doc=@$_POST["tipo_doc"];
				    		if($_doc)$sql.="and tipo_docs_id = '".$_doc."' ";

				    		$_num_doc=@$_POST["num_documento"];

				    		if($_num_doc)$sql.="and documento = '".$_num_doc."' ";
						    $result = mysqli_query($db,$sql);

				    		$_nombre=@$_POST["nombre"];
				    		if( $_nombre != "" || $_doc != "" || $_num_doc != "" ){
				    			$_var = preg_replace(
							        array("/ +/","/\t+/","/\n+/","/\r+/"),
							        array(" ","","",""),
							        $_nombre
							    );
				    			$_var = explode(" ",trim($_var));
								if(is_array($_var)){
									if( ($_size =count($_var))>0 ){
									    $sql.= " AND (0  ";
										foreach($_var AS $key=>$value){
											$sql.= " OR nombres like '%".$value."%' ";
											$sql.= " OR ap_paterno like '%".$value."%' ";
											$sql.= " OR ap_materno like '%".$value."%' ";
										}
										$sql.= " ) ";
									} 
								}
				    		} else {
				    			$sql.= " AND '".$_nombre."'!=0";
				    		}
						    $result = mysqli_query($db,$sql);

		   					while($row = mysqli_fetch_array($result)) {
		   				?>
					    <tr>
					        <td><?php echo $a++; ?></td>
					        <td><?php echo $row["nombres"]." ".$row["ap_paterno"]." ".$row["ap_materno"];?></td>
					        <td><?php echo $row["documento"];?></td>
					        <td><?php echo $row["direccion"];?></td>
					        <td><?php echo $row["telefono"];?></td>
					        <td><?php echo $row["email1"];?></td>
					        <td><center><a  data-toggle="modal" class="abrir-reg" documento="<?php echo $row["documento"];?>" nombre="<?php echo $row["nombres"]." ".$row["ap_paterno"]." ".$row["ap_materno"];?>"><img src="app/img/inicio/agregar.png" alt=""></a></center></td>
						    <td><center><a  data-toggle="modal" class="abrir-search" documento="<?php echo $row["documento"];?>" nombre="<?php echo $row["nombres"]." ".$row["ap_paterno"]." ".$row["ap_materno"];?>"><img src="app/img/inicio/lupa.png" alt=""></a></center></td>
						    <td><center><a href="#"><img src="app/img/inicio/editar.png" alt=""></a></center></td>
						    <td><center><a href="#"><img src="app/img/inicio/borrar.png" alt=""></a></center></td>
						</tr>
		   				<?php 
		   					}
				    	?>
					</tbody>
				</table>			
			</div>
		</div>
	</div>
</div>
	
<?php include 'tpl/footer.php'; ?>
</body>
</html>


<script language="javascript">
	$(document).ready(function(){

		$("#nombres").keypress(function(e){
			var tecla = document.all?tecla=e.keyCode:tecla=e.which;
			return ((tecla>64 && tecla<91)|| (tecla>96 && tecla<123));
		});
		$("#ape_paterno").keypress(function(e){
			var tecla = document.all?tecla=e.keyCode:tecla=e.which;
			return ((tecla>64 && tecla<91)|| (tecla>96 && tecla<123));
		});
		$("#ape_materno").keypress(function(e){
			var tecla = document.all?tecla=e.keyCode:tecla=e.which;
			return ((tecla>64 && tecla<91)|| (tecla>96 && tecla<123));
		});
		$("#num_documento").keypress(function(e){
			var tecla = document.all?tecla=e.keyCode:tecla=e.which;
			return ((tecla>47 && tecla<58)|| tecla==46);
		});
		$("#num_celular").keypress(function(e){
			var tecla = document.all?tecla=e.keyCode:tecla=e.which;
			return ((tecla>47 && tecla<58)|| tecla==46);
		});



		$('.abrir-reg').click(function(e){
			var _this = $(this);
			var _nombre = _this.attr('nombre');
			var _documento = _this.attr('documento');
			var _modal = $('#agregarServicio');
			$('#i_nombres_completos').val(_nombre); 
			$('#i_dni_cliente').val(_documento); 
			console.log(_nombre);
			_modal.modal('show');
		});


		$('.abrir-search').click(function(e){
			var _this = $(this);
			var _nombre = _this.attr('nombre');
			var _documento = _this.attr('documento');
			var _modal = $('#buscarCliente');
			$('#s_nombres_completos').val(_nombre); 
			$('#s_dni_cliente').val(_documento); 
			console.log(_nombre);
			_modal.modal('show');
		});

		$("#dni_cliente").keypress(function(e){
			var tecla = document.all?tecla=e.keyCode:tecla=e.which;
			return ((tecla>47 && tecla<58)||tecla==46);
		});
		$("#dni_cliente1").keypress(function(e){
			var tecla = document.all?tecla=e.keyCode:tecla=e.which;
			return ((tecla>47 && tecla<58)||tecla==46);
		});
		$("#dni_cliente2").keypress(function(e){
			var tecla = document.all?tecla=e.keyCode:tecla=e.which;
			return ((tecla>47 && tecla<58)||tecla==46);
		});
		$("p").click(function(){
        	myFunction.document.open(".modal-body");
    	});
	});


</script>

