<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>CRUD com Bootstrap</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
		<style>
			body {
				padding-top: 50px;
				padding-bottom: 20px;
			}
			.btn-light {
				color: #FFFFFF;
				background-color: #999999; 
			}
			.btn-light:hover {
				color: #FFFFFF;
				background-color: #AAAAAA;
			}
			.btn-dark {
				color: #FFFFFF;
				background-color: #303030;
			}
			.btn-secondary{
				color: #FFFFFF;
				background-color: #666666;
			}
			h2, .header, #actions, .barra {
				margin-top: 10px;
			}

			.background{
				background-image: url("/../images/IndexDark.jpg"); 
				background-color: whitesmoke;
				height: 500px;
				background-position: center; 
				background-size: cover;
			}
			.right{
				display: block;
 				margin-left: auto;
			}
			
		</style>
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/style.css">
		<link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
	</head>
	<body class="background">
	  <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
			<div class="container-fluid">
				<a class="navbar-brand" href="<?php echo BASEURL; ?>"><i class="fa-solid fa-house"></i> Home</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
				aria-controls="navbarSupportedContent" aria-expanded = "false" aria-label ="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-8">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#"  id = "navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-users"></i> Clientes</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers"><i class="fa-solid fa-users"></i> Gerenciar Clientes</a></li>
								<?php if (isset($_SESSION['user'])) : ?>
								<li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php"><i class="fa-solid fa-user-plus"></i> Novo Cliente</a></li>
								<?php endif; ?>
							</ul>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#"  id = "navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-suitcase"></i> Gerentes</a>
							<ul class="dropdown-menu" labelledby="navbarDropdown">
							<li><a class="dropdown-item" href="<?php echo BASEURL; ?>gerentes"><i class="fa-solid fa-suitcase"></i> Gerenciar gerentes</a></li>
							<?php if (isset($_SESSION['user'])) : ?>
								<li><a class="dropdown-item" href="<?php echo BASEURL; ?>gerentes/add.php"><i class="fa-solid fa-plus"></i> Novo gerente</a></li>
							<?php endif; ?>
							</ul> 
						</li>

						<?php if (isset($_SESSION['user'])) : ?>

							<?php if ($_SESSION['user'] == "admin") : ?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#"  role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-user-group"></i> Usuarios</a>
									<ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios"><i class="fa-solid fa-user-group"></i></i> Gerenciar Usuarios</a></li>
                                       	<li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios/add.php"><i class="fa-solid fa-user-plus"></i> Novo Usuario</a></li>
									</ul> 
								</li>
							<?php endif; ?>
              
                            <ul class="navbar-nav align-items-center">                       
								<li class="nav-item">
                                  <?php if(isset($_SESSION['id'])):?>
                                    <h5 style="color: #d9d9d9; margin-left: 2rem; padding-right: 2rem;"> Bem vindo, <?php echo $_SESSION['user']; ?></h5>
                                  <?php endif; ?>
								</li>
							</ul>
              
                            <ul class="navbar-nav align-items-center">                       
								<li class="nav-item">
									<a href="#" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#logoutmodal">
									<i class="fa-solid fa-right-from-bracket"></i>Sair
									</a>
								</li>
							</ul>

						<?php else : ?>
							<ul class="navbar-nav align-items-center mr-auto">
								<li class="nav-item">
								<a class="btn btn-sm btn-light" href="<?php echo BASEURL ?>inc/login.php">
									<i class="fa-solid fa-right-to-bracket"></i> Login
									</a>
								</li>
							</ul>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</nav>

			<main class="container">
			<?php include('modaluser.php'); ?>