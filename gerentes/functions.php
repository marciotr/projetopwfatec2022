<?php

	require_once('../config.php');
	require_once(DBAPI);

	$gerentes = null; //brinquedos
	$gerentes_mdf = null; //brinquedo

	/**
	 *  Listagem de Clientes
	 */
	function index() {
		global $gerentes;
		$gerentes = find_all('gerentes');
	}
	/**
 	 *  Cadastro de Clientes
	 */
	function add() {

          
		if (!empty($_POST['gerentes_mdf'])) {
			try 
            {
                $gerentes = $_POST['gerentes_mdf'];
                $today = new DateTime("now");
                $gerentes['modified'] = $gerentes['created'] = $today->format("Y-m-d H:i:s");

                if (!empty($_FILES["foto"]["name"])) {
                    $pasta_destino = "fotos/";
                    $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]);
                    $nomearquivo = basename($_FILES["foto"]["name"]);
                    $resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
                    $tamanho_arquivo = $_FILES["foto"]["size"];
                    $nome_temp = $_FILES["foto"]["tpm_name"];
                    $tipo_arquivo = strtolower(pathinfo($arquivo_destino,PATHINFO_EXTENSION));

                    upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

                    $gerentes['foto'] = $nomearquivo;
                }

                if (!empty($gerentes['password'])) 
                {
                    $senha = criptografia($gerentes['password']);
                    $gerentes['password'] = $senha;
                }

                $gerentes['foto'] = $nomearquivo;

                save('gerentes', $gerentes);
                header('Location: index.php');
            } 
            catch (Exception $e) 
            {
                $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
                $_SESSION['type'] = "danger";
            }
		
		
		}
        }
	/**
	 *	Atualizacao/Edicao de Cliente
	*/
	function edit() {

		try 
        {
            if (isset($_GET['id'])) 
            {
                $id = $_GET['id'];

                if (isset($_POST['gerentes_mdf'])) 
                {
                    $gerentes = $_POST['gerentes_mdf'];

                    if (!empty($gerentes['password'])) 
                    {
                        $senha = criptografia($gerentes['password']);
                        $gerentes['password'] = $senha;
                    }

                    if (!empty($_FILES["foto"]["name"])) 
                    {
                        $pasta_destino = "fotos/";
                        $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]);
                        $nomearquivo = basename($_FILES["foto"]["name"]);
                        $resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
                        $tamanho_arquivo = $_FILES["foto"]["size"];
                        $nome_temp = $_FILES["foto"]["tpm_name"];
                        $tipo_arquivo = strtolower(pathinfo($arquivo_destino,PATHINFO_EXTENSION));
    
                        upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

                        $gerentes['foto'] = $nomearquivo;
                    }

                    update('gerentes', $id, $gerentes);
                    header('Location: index.php');
                }
                else 
                {
                    global $gerentes;
                    $gerentes = find("gerentes", $id);
                }
            }
            else 
            {
                header("Location: index.php");    
            }
        } 
        catch (Exception $e) 
        {
            $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
            $_SESSION['type'] = "danger";
        }
	}
	/**
	 *  Visualização de um Cliente
	 */
	function view($id = null) {
		global $gerentes_mdf;
		$gerentes_mdf = find('gerentes', $id);
	}
	/**
	 *  Exclusão de um Cliente
	 */
	
        
	function upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo)
        {
        try {

            $nomearquivo = basename($arquivo_destino);
            $uploadOk = 1;

            if (isset($_POST['submit'])) 
            {
                $check = getimagesize($nome_temp);
                if ($check !== false) 
                {
                    $_SESSION['message'] = "File is an image - " . $check["mime"] . ".";
                    $_SESSION['type'] = "info";
                    $uploadOk = 1;
                }
                else 
                {
                    $uploadOk = 0;
                    throw new Exception("Desculpe, mas o arquivo não é uma imagem");
                }
            }
            
            if (file_exists($arquivo_destino)) 
            {
                $uploadOk = 1;
                throw new Exception("Desculpe, o arquivo já existe!");
            }

            if ($tamanho_arquivo > 5000000) 
            {
                $uploadOk = 0;
                throw new Exception("Desculpe, mas o arquivo é muito grande!");
                
            }

            if ($tipo_arquivo != "jpg" && $tipo_arquivo != "png" && $tipo_arquivo != "jpeg" && $tipo_arquivo != "gif") 
            {
                $uploadOk = 0;
                throw new Exception("Desculpe, mas só são permitidos arquivos de imagem JPG, JPEG, PNG e GIF");
            }

            if ($uploadOk == 0) 
            {
                throw new Exception("Desculpe, mas o arquivo não pode ser enviado.");
            }
            else 
            {
                if (move_uploaded_file($_FILES["foto"] ["tmp_name"], $arquivo_destino)) 
                {
                    $_SESSION['message'] = "O arquivo " . htmlspecialchars($nomearquivo) . " foi armazenado.";
                    $_SESSION['type'] = "success";
                }
                else
                {
                    throw new Exception("Desculpe, mas o arquivo não pode ser enviado.");
                }
            }
        } 
        catch (Exception $e) 
        {
            $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
            $_SESSION['TYPE'] = "danger";
        }
    }
    
    function delete($id = null) {
		global $gerentes_mdf;
		$gerentes_mdf = remove('gerentes', $id);
		header('location: index.php');
	}
?>