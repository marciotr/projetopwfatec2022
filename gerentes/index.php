<?php
    ob_start();
    require_once('functions.php');
    if(!isset($_SESSION))
        {
          session_start();
        }
    index();
?>

<?php include(HEADER_TEMPLATE); ?>

    <header class="barra">
        <div class="row">
            <div class="col-sm-6">
                <h2>Gerentes</h2>
            </div>
            <div class="col-sm-6 text-end h2">
            <?php if (isset($_SESSION['user'])) : ?>
                <a class="btn btn-secondary" href="add.php"><i class="fa fa-plus"></i> Novo Gerente</a>
            <?php endif; ?>
                <a class="btn btn-light" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
            </div>
        </div>
    </header>

    <?php if (!empty($_SESSION['message'])) : ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php clear_messages(); ?>
    <?php endif; ?>

    <hr>

    <table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th width="30%">Nome</th>
            <th>Endereço</th>
            <th>Departamento</th>
            <th>Atualizado em</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
    <?php if ($gerentes) : ?>
    <?php foreach ($gerentes as $gerentes_mdf) : ?>
        <tr>
            <td><?php echo $gerentes_mdf['id']; ?></td>
            <td><?php echo $gerentes_mdf['nome']; ?></td>
            <td><?php echo $gerentes_mdf['endereco']; ?></td>
            <td><?php echo $gerentes_mdf['depto']; ?></td>
            <td><?php echo formataData($gerentes_mdf['modified'], "d/m/y H:i:s"); ?>
            <td class="actions text-s">
                <a href="view.php?id=<?php echo $gerentes_mdf['id']; ?>" class="btn btn-sm btn-dark"><i class="fa-solid fa-eye"></i> Visualizar</a>
            <?php if (isset($_SESSION['user'])) : ?>
                <a href="edit.php?id=<?php echo $gerentes_mdf['id']; ?>" class="btn btn-sm btn-secondary"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                <a href="delete.php?id=<?php echo $gerentes_mdf['id']; ?>" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#delete-gerente-modal" data-gerentes="<?php echo $gerentes_mdf['id']; ?>">
                <i class="fa-solid fa-trash-can"></i> Excluir
                </a>
            <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="6">Nenhum registro encontrado.</td>
        </tr>
    <?php endif; ?>
    </tbody>
    </table>

<?php include('modal.php'); ?>
<?php 
include(FOOTER_TEMPLATE); 
ob_end_flush();
?>