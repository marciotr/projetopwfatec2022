<?php 
  ob_start();
  require_once('functions.php'); 
  if(!isset($_SESSION))
        {
          session_start();
        }
  edit();
  include(HEADER_TEMPLATE);
  
  function criaData($data){
      $d = new DateTime ($data);
      return $d->format("Y-m-d");
  }
?>

<?php include(HEADER_TEMPLATE); ?>

<h2>Atualizar Gerentes</h2>

<form action="edit.php?id=<?php echo $gerentes['id']; ?>" method="post" enctype="multipart/form-data">
 <!-- area de campo -->
  <hr>
        <div class="row">
            <div class="form-group col-md-7">
                <label for="nome">Nome / Razão Social</label>
                <input type="text" class="form-control" name="gerentes_mdf['nome']" value="<?php echo $gerentes['nome']; ?>">
            </div>

            <div class="form-group col-md-2">
                <label for="dataNasc">Data de Nascimento</label>
                <input type="date" class="form-control" name="gerentes_mdf['datanasc']" value="<?php echo criaData($gerentes_mdf['datanasc']); ?>">
            </div>

            <div class="form-group col-md-5">
                <label for="adress">Endereço</label>
                <input type="text" class="form-control" name="gerentes_mdf['endereco']" value="<?php echo $gerentes['endereco']; ?>">
            </div>

            <div class="form-group col-md-3">
                <label for="dpto">Departamento</label>
                <input type="text" class="form-control" name="gerentes_mdf['depto']" value="<?php echo $gerentes['depto']; ?>">
            </div>

            <div class="form-group col-md-2">
                <label for="dataCad">Data de Cadastro</label>
                <input type="date" class="form-control" name="gerentes_mdf['created']" disabled value="<?php echo criaData($gerentes_mdf['created']); ?>">
            </div>

            <div class="row">
                    <?php 
                        $foto = "";
                        if (empty($gerentes['foto'])) 
                        {
                            $foto = "semimagem.jpg";
                        }
                        else 
                        {
                            $foto = $gerentes['foto'];
                        }
                    ?>
                    <div class="form-group col-md-4">
                        <label for="campo1">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" value="fotos/<?php echo $foto ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="pre">Pré-visualização</label>
                        <img class="form-control shadow p-2 md-2 bg-body rounded" id="imgPreview" src="fotos/<?php echo $foto ?>" alt="Foto do gerente">
                    </div>
                </div>

        </div>
            <div id="actions" class="row">
                <div class="col-md-12">
                <button type="submit" class="btn btn-dark"><i class="fa-solid fa-sd-card"></i> Salvar</button>
                <a href="index.php" class="btn btn-default"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
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
            if (file) 
            {
                let reader = new FileReader();
                reader.onload = function (event) 
                {
                    $("#imgPreview").attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>