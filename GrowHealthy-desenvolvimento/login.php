<html>
	<head>
      <meta charset="UTF-8">  
	  <title>GrowHealthy</title>
	  <link rel="icon" type="image/png" href="imagens/IE_favicon.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="css/customize.css">
	</head>
<body>

<?php
    session_start();
    require 'bd/conectaBD.php'; 
    $conn = new mysqli($servername, $username, $password, $database);

   
    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    $usuario = $conn->real_escape_string($_POST['Login']); // prepara a string recebida para ser utilizada em comando SQL
    $senha   = $conn->real_escape_string($_POST['SenhaL']); // prepara a string recebida para ser utilizada em comando SQL
    

    // Faz Select na Base de Dados
    $sql = "SELECT CRE,nome, t.nomeTipo FROM TB_Usuario as U, TB_TipoUsuario as T WHERE u.ID_TipoUsu = t.ID_TipoUsu AND login = '$usuario' AND senha = md5('$senha')";

    if ($result = $conn->query($sql)) {
        if ($result->num_rows == 1) {         
            $row = $result->fetch_assoc();
            $_SESSION ['login']       = $usuario;
            $_SESSION ['nomeTipoUsu'] = $row['nomeTipo'];
            $_SESSION ['CREF']  = $row['CREF'];
            $_SESSION ['nome']        = $row['nome'];
            unset($_SESSION['nao_autenticado']);                         
            if( $_SESSION ['nomeTipoUsu'] == 'Administrador'){           
                $conn->close();  //Encerra conexao com o BD
                header('location: /GrowHealthy-desenvolvimento/personal.php');  
                exit();
            }else {  
                $conn->close();  //Encerra conexao com o BD                               
                header('location: /GrowHealthy-desenvolvimento/personal/perfilPersonal.php');  
                exit();
            }
        }else{
            $_SESSION['nao_autenticado'] = true;
            $_SESSION['mensagem_header'] = "Login";
            $_SESSION['mensagem']        = "Senha ou usuário incorreto.";
            $conn->close();  //Encerra conexao com o BD
            header('location: index.php'); 
            exit();
        }
    }
    else {
        $msg = "Erro ao acessar o BD: " . $conn-> error . ".";
        $_SESSION['nao_autenticado'] = true;
        $_SESSION['mensagem_header'] = "Login";
        $_SESSION['mensagem']        = $msg;
        $conn->close();  //Encerra conexao com o BD
        header('location: index.php'); 
    }
?>
	</body>
</html>

