<?php
    ob_start();
    require_once('functions.php');
    if(!isset($_SESSION))
        {
          session_start();
        }
    view($_GET['id']);
    include(HEADER_TEMPLATE);
?> 
            <header>
                <h2>Cliente <?php echo $usuario['id']; ?></h2>
            </header>
            <hr>
            <?php if (!empty($_SESSION['message'])) : ?>
                <div class="alert alert-<?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['message']; ?></div>
            <?php endif; ?>

            <dl class="dl-horizontal">
                <dt>Nome:</dt>
                <dd><?php echo $usuario['nome']; ?></dd>

                <dt>Login:</dt>
                <dd><?php echo $usuario['user']; ?></dd>

                <dt>Senha:</dt>
                <dd><?php echo $usuario['password']; ?></dd>

                <dt>Foto:</dt>
                <dd><?php
                        if(!empty($usuario['foto'])) {
                            echo "<img src=\"fotos/" . $usuario['foto'] . "\" class=\"shadow p-l mb-l bg-body rounded\" width=\"250px\" height=\"250px\">";
                        } else {
                            echo "<img src=\"fotos/semimagem.jpg\" class=\"shadow p-l mb-l bg-body rounded\" width=\"250px\" height=\"250px\">";
                        }
                    ?>
                </dd>
            </dl>
            
            <div id="actions" class="row">
                <div class="col-md-12">
                    <?php if (empty($_SESSION['message'])) : ?>
                    <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                    <?php endif; ?>       
                    <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Voltar</a>
                </div>
            </div> 
<?php clear_messages(); ?>
<?php 
    include(FOOTER_TEMPLATE); 
    ob_end_flush();
?>