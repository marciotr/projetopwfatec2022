<?php
    ob_start();
    include("functions.php");
    if(!isset($_SESSION))
        {
          session_start();
        }
    edit();
    include(HEADER_TEMPLATE);
?>


        <header>    
            <h2>Atualizar Usuário</h2>
        </header>

        <form action="edit.php?id=<?php echo $usuario['id']; ?>" method="post" enctype="multipart/form-data" >
            <hr>
                <div class="row">
                    <div class="form-group col-md-8">
                    <label for="name">Nome</label>
                        <input type="text" class="form-control" name="usuario['nome']" value="<?php echo $usuario['nome']; ?>">
                    </div>   
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                    <label for="campo2">Usuário (login)</label>
                        <input type="text" class="form-control" name="usuario['user']" value="<?php echo $usuario['user']; ?>">
                    </div>   
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                    <label for="campo3">Senha</label>
                        <input type="password" class="form-control" name="usuario['password']" required oninvalid="this.setCustomValidity('Digite a senha!')" onchange="try{setCustomValidity('')}catch(e){}">
                    </div>   
                </div>
                <div class="row">
                    <?php 
                        $foto = "";
                        if (empty($usuario['foto'])) 
                        {
                            $foto = "semimagem.jpg";
                        }
                        else 
                        {
                            $foto = $usuario['foto'];
                        }
                    ?>
                    <div class="form-group col-md-4">
                        <label for="campo1">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" value="fotos/<?php echo $foto ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="pre">Pré-visualização</label>
                        <img class="form-control shadow p-2 md-2 bg-body rounded" id="imgPreview" src="fotos/<?php echo $foto ?>" alt="Foto de usuário">
                    </div>
                </div>
            <div id="actions" class="row">
                <div>
                        <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-sd-card"></i> Salvar</button>
                        <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i></i> Cancelar</a>
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