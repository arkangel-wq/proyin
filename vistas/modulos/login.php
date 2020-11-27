<!DOCTYPE html>
<html lang="en">

<head>
	<title>Divina</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<link rel="icon" href="vistas/plugins/assets/images/favicon-16x16.png" type="image/x-icon">
	<link rel="stylesheet" href="vistas/plugins/assets/fonts/fontawesome/css/fontawesome-all.min.css">
	<link rel="stylesheet" href="vistas/plugins/assets/plugins/animation/css/animate.min.css">
	<link rel="stylesheet" href="vistas/plugins/assets/css/style.css">
	<script src="vistas/plugins/assets/js/vendor-all.min.js"></script>
	<script src="vistas/plugins/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
 
</head>
<div class="auth-wrapper">
	<div class="auth-content container">
		<div class="card">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="card-body">
						<h1><img src="vistas/plugins/assets/images/favicon-32x32.png" alt="" class="img-fluid mb-4"> Iniciar Sesion</h1>
						<form method="POST">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-mail"></i></span>
								</div>
								<input type="text" class="form-control" placeholder="Usuario" name="ingUsuario"  required="">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-lock"></i></span>
								</div>
								<input type="password" class="form-control" placeholder="Password" name="ingPassword" required="">
							</div> 

							<button class="btn btn-primary mb-4">Login</button>
               
							<?php

							$login = new ControladorUsuarios();
							$login->ctrIngresar();
							?>
						</form>
					</div>
				</div>
				<div class="col-md-6 d-none d-md-block">
					<img src="vistas/plugins/assets/images/img2.png" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer-fab">
	<div class="b-bg">
		<i class="fas fa-question"></i>
	</div>
	<div class="fab-hover">
		<ul class="list-unstyled">
			<li><a href="vistas/plugins/doc/index.html" target="_blank" data-text="Document" class="btn btn-icon btn-rounded btn-primary m-0"><i class="feather icon feather icon-book"></i></a></li>
		</ul>
	</div>
</div>


</body>

</html>