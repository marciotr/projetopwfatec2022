<?php 
    ob_start();
    require_once('functions.php'); 
    if(!isset($_SESSION))
        {
          session_start();
        }
    add();
?>

<?php include(HEADER_TEMPLATE); ?>

    <h2>Novo Gerente</h2>

    <form action="add.php" method="post" enctype="multipart/form-data">
    <!-- area de campos do form -->
    <hr />
        <div class="row">
            <div class="form-group col-md-7">
                <label for="nome">Nome / Razão Social</label>
                <input type="text" class="form-control" name="gerentes_mdf['nome']" required>
            </div>

            <div class="form-group col-md-2">
                <label for="datanasc">Data de Nascimento</label>
                <input type="date" class="form-control" name="gerentes_mdf['datanasc']" required>
            </div>

            <div class="form-group col-md-5">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control" name="gerentes_mdf['endereco']" required>
            </div>

            <div class="form-group col-md-3">
                <label for="depto">Departamento</label>
                <input type="text" class="form-control" name="gerentes_mdf['depto']" required>
            </div>
            

            <div class="form-group col-md-2">
                <label for="created">Data de Cadastro</label>
                <input type="date" class="form-control" name="gerentes_mdf['created']" disabled>
            </div><br/>

            <div class="row">
        <div class="form-group col-md-4">
          <label for="campo1">Foto</label>
          <input type="file" class="form-control" id = "foto" name="foto">
        </div>

        <div class="form-group col-md-2">
          <label for="campo2">Pré-visualização:</label>
          <img class="form-control shadow p-2 mb-2 bg-body rounded" id = "imgPreview" src= "fotos/semimagem.jpg" alt="pic">
        </div>
      </div>

        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
                <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
            </div>
        </div>
    </form>

<?php 
include(FOOTER_TEMPLATE); 
ob_end_flush();
?>

<script>
    $(document).ready(() => {
      $("#foto").change(function () {

        const file = this.files[0];
        if(file)
        {
          let reader = new FileReader();
          reader.onload = function (event) {
            $("#imgPreview").attr("src", event.target.result);
          };
          reader.readAsDataURL(file);
        }
      });
    });
</script>