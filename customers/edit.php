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

<h2>Atualizar Cliente</h2>

<form action="edit.php?id=<?php echo $customer['id']; ?>" method="post">
 <!-- area de campo -->
  <hr>
        <div class="row">
            <div class="form-group col-md-7">
            <label for="name">Nome / Razão Social</label>
            <input type="text" class="form-control" name="customer['nome']" value="<?php echo $customer['nome']; ?>">
            </div>

            <div class="form-group col-md-3">
            <label for="campo2">CNPJ / CPF</label>
            <input type="text" class="form-control" name="customer['cpf_cnpj']" value="<?php echo $customer['cpf_cnpj']; ?>" maxlength="11">
            </div>

            <div class="form-group col-md-2">
            <label for="campo3">Data de Nascimento</label>
            <input type="date" class="form-control" name="customer['birthdate']" value="<?php echo criaData($customer['birthdate']); ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-5">
            <label for="campo1">Endereço</label>
            <input type="text" class="form-control" name="customer['address']" value="<?php echo $customer['address']; ?>">
            </div>

            <div class="form-group col-md-3">
            <label for="campo2">Bairro</label>
            <input type="text" class="form-control" name="customer['hood']" value="<?php echo $customer['hood']; ?>">
            </div>

            <div class="form-group col-md-2">
            <label for="campo3">CEP</label>
            <input type="text" class="form-control" name="customer['zip_code']" value="<?php echo $customer['zip_code']; ?>" maxlength="8">
            </div>

            <div class="form-group col-md-2">
            <label for="campo3">Data de Cadastro</label>
            <input type="date" class="form-control" name="customer['created']" disabled value="<?php echo criaData($customer['created']); ?>">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-5">
            <label for="campo1">Cidade</label>
            <input type="text" class="form-control" name="customer['city']" value="<?php echo $customer['city']; ?>">
            </div>

            <div class="form-group col-md-2">
            <label for="campo2">Telefone</label>
            <input type="text" class="form-control" name="customer['phone']" value="<?php echo $customer['phone']; ?>" maxlength="10">
            </div>

            <div class="form-group col-md-2">
            <label for="campo3">Celular</label>
            <input type="text" class="form-control" name="customer['mobile']" value="<?php echo $customer['mobile']; ?>" maxlength="11">
            </div>

            <div class="form-group col-md-1">
            <label for="campo3">UF</label>
            <input type="text" class="form-control" name="customer['state']" value="<?php echo $customer['state']; ?>" maxlength="2">
            </div>

            <div class="form-group col-md-2">
            <label for="campo3">Inscrição Estadual</label>
            <input type="text" class="form-control" name="customer['ie']" value="<?php echo $customer['ie']; ?>" maxlength="11">
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