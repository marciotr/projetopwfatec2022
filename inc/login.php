<?php 
    ob_start();
    include("../config.php");
    if(!isset($_SESSION))
        {
          session_start();
        }
    include(HEADER_TEMPLATE);
?>



<div id="actions" class="mt-5 mb-5">
    <form action="valida.php" method="post">
        <div class="row">
            <h3> Faça login</h3>
            <div class="form-floating col-12 mb-2">
                <input type="text" class="form-control" id="log" placeholder="Usuário" name="login" required oninvalid="this.setCustomValidity('Preencha a Usuário!')" onchange="try{setCustomValidity('')}catch(e){}">
                <label for="log">Usuário</label>
            </div>
            <div class="form-floating col-12 mb-2">
                <input type="password" class="form-control" id="pass" placeholder="Senha" name="senha" maxlength="30" required oninvalid="this.setCustomValidity('Preencha a senha!')" onchange="try{setCustomValidity('')}catch(e){}">
                <label for="log">Senha</label>
            </div>
            <div class="form-floating col-12 mb-2">
                <button type="submit" class="btn btn-secondary btn-block mb-4"><i class="fa-solid fa-user-check"></i> Conectar</button>
                <a href = "<?php echo BASEURL; ?>" class="btn bnt-light btn-block mb-4"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php 
	include(FOOTER_TEMPLATE); 
	ob_end_flush();
?>