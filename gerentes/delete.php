<?php 
  require_once('functions.php'); 

  if (isset($_GET['id']))
  {
    try {
      $gerentes = find("gerentes", $_GET['id']);
      delete($_GET['id']);
    } catch (Exception $e) {
      $_SESSION['message'] = "Não foi possível realizar a operação: " . $e->GetMessage();
      $_SESSION['type'] = "danger";
    }

  } 
?>