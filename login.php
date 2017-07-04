<?php
   include("models/config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT * FROM `usuarios` WHERE `username` = '$username' ";
      $result = mysqli_query($db,$sql);
	      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $login_password = $row['password'];
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($login_password == $mypassword) {
         header("location: clientes.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'tpl/head.php'; ?>
</head>
<body>
<div class="colores">
  <div class="color1"></div>
  <div class="color2"></div>
</div>
	<div class="col-xs-12 login_header">
		<center>
	    	<img src="app/img/inicio/logo.png" alt="">  
	    </center>
	</div>		  
<div class="colores">
  <div class="color1"></div>
  <div class="color2"></div>
</div>
<div class="col-xs-12 login_container">
	<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<?php include 'tpl/footer.php'; ?>
</body>
</html>