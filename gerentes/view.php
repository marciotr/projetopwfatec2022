<?php 
        ob_start();
	require_once('functions.php');
        if(!isset($_SESSION))
        {
          session_start();
        }
	view($_GET['id']);
?>

<?php include(HEADER_TEMPLATE); ?>

    <h2>Gerente <?php echo $gerentes_mdf['id']; ?></h2>
    <hr>

    <?php if (!empty($_SESSION['message'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
    <?php endif; ?>

    <dl class="dl-horizontal">

        <dt>Foto:</dt>
                <dd><?php
                        if(!empty($gerentes_mdf['foto'])) {
                            echo "<img src=\"fotos/" . $gerentes_mdf['foto'] . "\" class=\"shadow p-l mb-l bg-body rounded\" width=\"250px\" height=\"250px\">";
                        } else {
                            echo "<img src=\"fotos/semimagem.jpg\" class=\"shadow p-l mb-l bg-body rounded\" width=\"250px\" height=\"250px\">";
                        }
                    ?>
                </dd>
            </dl>

        <dt>Nome / Razão Social:</dt>
        <dd><?php echo $gerentes_mdf['nome']; ?></dd>

        <dt>Endereço:</dt>
        <dd><?php echo $gerentes_mdf['endereco']; ?></dd>

        <dt>Departamento:</dt>
        <dd><?php echo $gerentes_mdf['depto']; ?></dd>

        <dt>Data de nascimento:</dt>
        <dd><?php echo $gerentes_mdf['datanasc']; ?></dd>

        <dt>Data de Cadastro:</dt>
        <dd><?php echo $gerentes_mdf['created']; ?></dd>
    </dl>


    <div id="actions" class="row">
        <div class="col-md-12">
        <?php if (isset($_SESSION['user'])) : ?>
             <a href="edit.php?id=<?php echo $gerentes_mdf['id']; ?>" class="btn btn-dark"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
        <?php endif; ?>
             <a href="index.php" class="btn btn-default"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
        </div>
    </div>

<?php 
include(FOOTER_TEMPLATE); 
ob_end_flush();
?>