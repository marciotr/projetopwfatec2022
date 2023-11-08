<?php 
	ob_start();
	require_once "config.php"; 
	require_once DBAPI;
        if(!isset($_SESSION))
        {
          session_start();
        }
	include(HEADER_TEMPLATE);
	$db = open_database();
?>
<div >
<h1 style= "padding-top: 20px">Tela inicial</h1>
</div>
<hr>
<?php if ($db) : ?>
	<?php if(isset($_SESSION['id'])):?> 
		
	<div class="barra">
		<div class="row">
			<div class="col-xl-2 col-sm-3 col-md-2">
				<a href="customers/add.php" class="btn btn-dark" style="width: 100%">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa-solid fa-user-plus fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Novo Cliente</p>
						</div>
					</div>
				</a>
			</div>

			<?php endif; ?>
			<div class="col-xl-2 col-sm-3 col-md-2">
				<a href="customers" class="btn btn-secondary" style="width: 100%">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa-solid fa-user fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Clientes</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>

	<div class="barra">
		<div class="row">
			<?php if(isset($_SESSION['id'])):?> 
			<div class="col-xl-2 col-sm-3 col-md-2">
				<a href="gerentes/add.php" class="btn btn-dark" style="width: 100%">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa-solid fa-suitcase fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Novo gerente</p>
						</div>
					</div>
				</a>
			</div>

			<?php endif; ?>
			<div class="col-xl-2 col-sm-3 col-md-2">
				<a href="gerentes" class="btn btn-secondary" style="width: 100%">
					<div class="row">
						<div class="col-xs-12 text-center">
							<i class="fa-solid fa-user-tie fa-5x"></i>
						</div>
						<div class="col-xs-12 text-center">
							<p>Gerentes</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>	

	<div class="barra">
		<div class="row">		
			<?php if(isset($_SESSION['id'])):?> 
				<?php if ($_SESSION['user']=="admin"):?>
					<div class="col-xl-2 col-sm-3 col-md-2">
						<a href="usuarios/add.php" class="btn btn-dark" style="width: 100%">
							<div class="row">
								<div class="col-xs-12 text-center">
									<i class="fa-solid fa-user-plus fa-5x"></i>
								</div>
								<div class="col-xs-12 text-center">
									<p>Novo usuário</p>
								</div>
							</div>
						</a>
					</div>
						
					<div class="col-xl-2 col-sm-3 col-md-2">
						<a href="usuarios" class="btn btn-secondary" style="width: 100%">
							<div class="row">
								<div class="col-xs-12 text-center">
									<i class="fa-solid fa-users fa-5x"></i>
								</div>
								<div class="col-xs-12 text-center">
									<p>Usuários</p>
								</div>
							</div>
						</a>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
	
	<?php else : ?>
		<div class="alert alert-danger" role="alert">
			<p><strong>ERRO:</strong> Não foi possível Conectar ao Banco de Dados!</p>
		</div>
		<?php if (!empty($_SESSION['message'])) : ?>
			<div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
				<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<?php echo $_SESSION['message']; ?>
			</div>
			<?php clear_messages(); ?>
		<?php endif; ?>
	<?php endif; ?>

<?php 
	include(FOOTER_TEMPLATE); 
	ob_end_flush();
?>
