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

    <h2>Novo Cliente</h2>

    <form action="add.php" method="post">
    <!-- area de campos do form -->
    <hr />
        <div class="row">
            <div class="form-group col-md-7">
                <label for="nome">Nome / Razão Social</label>
                <input type="text" class="form-control" name="customer['name']" required>
            </div>

            <div class="form-group col-md-3">
                <label for="cpf_cnpj">CNPJ / CPF</label>
                <input type="text" class="form-control" name="customer['cpf_cnpj']" maxlength="11" required>
            </div>

            <div class="form-group col-md-2">
                <label for="birthdate">Data de Nascimento</label>
                <input type="date" class="form-control" name="customer['birthdate']" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5">
                <label for="address">Endereço</label>
                <input type="text" class="form-control" name="customer['address']" required>
            </div>

            <div class="form-group col-md-3">
                <label for="hood">Bairro</label>
                <input type="text" class="form-control" name="customer['hood']" required>
            </div>
            
            <div class="form-group col-md-2">
                <label for="zip_code">CEP</label>
                <input type="text" class="form-control" name="customer['zip_code']" maxlength="8" required>
            </div>
            
            <div class="form-group col-md-2">
                <label for="created">Data de Cadastro</label>
                <input type="date" class="form-control" name="customer['created']" disabled>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-5">
                <label for="city">Município</label>
                <input type="text" class="form-control" name="customer['city']" required>
            </div>
            
            <div class="form-group col-md-2">
                <label for="phone">Telefone</label>
                <input type="text" class="form-control" name="customer['phone']" maxlength="10">
            </div>
            
            <div class="form-group col-md-2">
                <label for="mobile">Celular</label>
                <input type="text" class="form-control" name="customer['mobile']" maxlength="11" required>
            </div>
            
            <div class="form-group col-md-1">
                <label for="state">UF</label>
                <input type="text" class="form-control" name="customer['state']" maxlength="2" required>
            </div>
            
            <div class="form-group col-md-2">
                <label for="ie">Inscrição Estadual</label>
                <input type="text" class="form-control" name="customer['ie']" maxlength="11" required>
            </div>

        </div>

        <div id="actions" class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-dark"><i class="fa-solid fa-sd-card"></i> Salvar</button>
                <a href="index.php" class="btn btn-light"><i class="fa-solid fa-rotate-left"></i> Cancelar</a>
            </div>
        </div>
    </form>

<?php 
include(FOOTER_TEMPLATE); 
ob_end_flush();
?>

