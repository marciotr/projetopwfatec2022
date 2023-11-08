<?php  
    require_once('../config.php');
    require_once(DBAPI);

    $usuario = NULL;
    $usuarios = NULL;

    function index ()
    {
        global $usuarios;
        if (!empty($_POST['user'])) 
        {
            $usuarios = filter("usuarios", "nome like '%" . $_POST['user'] . "%'");
        }
        else 
        {    
            $usuarios = find_all("usuarios");   
        }
    }


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

    function add() 
    {
        if (!empty($_POST['usuario'])) {
            try 
            {
                $usuario = $_POST['usuario'];

                if (!empty($_FILES["foto"]["name"])) {
                    $pasta_destino = "fotos/";
                    $arquivo_destino = $pasta_destino . basename($_FILES["foto"]["name"]);
                    $nomearquivo = basename($_FILES["foto"]["name"]);
                    $resolucao_arquivo = getimagesize($_FILES["foto"]["tmp_name"]);
                    $tamanho_arquivo = $_FILES["foto"]["size"];
                    $nome_temp = $_FILES["foto"]["tpm_name"];
                    $tipo_arquivo = strtolower(pathinfo($arquivo_destino,PATHINFO_EXTENSION));

                    upload($pasta_destino, $arquivo_destino, $tipo_arquivo, $nome_temp, $tamanho_arquivo);

                    $usuario['foto'] = $nomearquivo;
                }

                if (!empty($usuario['password'])) 
                {
                    $senha = criptografia($usuario['password']);
                    $usuario['password'] = $senha;
                }

                $usuario['foto'] = $nomearquivo;

                save('usuarios', $usuario);
                header('Location: index.php');
            } 
            catch (Exception $e) 
            {
                $_SESSION['message'] = "Aconteceu um erro: " . $e->getMessage();
                $_SESSION['type'] = "danger";
            }
        }
    }

    function edit ()
    {
        try 
        {
            if (isset($_GET['id'])) 
            {
                $id = $_GET['id'];

                if (isset($_POST['usuario'])) 
                {
                    $usuario = $_POST['usuario'];

                    if (!empty($usuario['password'])) 
                    {
                        $senha = criptografia($usuario['password']);
                        $usuario['password'] = $senha;
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

                        $usuario['foto'] = $nomearquivo;
                    }

                    update('usuarios', $id, $usuario);
                    header('Location: index.php');
                }
                else 
                {
                    global $usuario;
                    $usuario = find("usuarios", $id);
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

    function view($id = null)
    {
        global $usuario;
        $usuario = find("usuarios", $id);
    }

    function delete($id = null)
    {
        global $usuario;
        $usuarios = remove("usuarios", $id);

        header("Location: index.php");
    }
?>