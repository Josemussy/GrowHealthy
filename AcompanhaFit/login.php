<html>
<head>
    <meta charset="UTF-8">
    <title>Growhealthy</title>
    <link rel="icon" type="image/jpg" href="imagens/ghealthy_logo.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/customize.css">
</head>

<body>
<?php
    session_start();
    require 'bd/connectBD.php';
    
    $conn = new mysqli($servername, $username, $password, $database);
    
    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }
    
    $usuario = $conn->real_escape_string($_POST['Login']);
    $senha   = $conn->real_escape_string($_POST['Senha']);
    
    $sql = "SELECT ID_Usuario, nome FROM Usuario WHERE login = '$usuario' AND senha = md5('$senha')";
    
    if ($result = $conn->query($sql)) {
        if ($result->num_rows == 1) {         
            $row = $result->fetch_assoc();
            $_SESSION ['login']       = $usuario;           
            $_SESSION ['ID_Usuario']  = $row['ID_Usuario'];
            $_SESSION ['nome']        = $row['nome'];
            unset($_SESSION ['nao_autenticado']);
            unset($_SESSION ['mensagem_header'] ); 
            unset($_SESSION ['mensagem'] ); 
            header(); 
            exit();
            
        }else{
            $_SESSION ['nao_autenticado'] = true;         
            $_SESSION ['mensagem_header'] = "Login";
            $_SESSION ['mensagem']        = "ERRO: Login ou Senha inválidos.";
            header(); 
            exit();
        }
    }
    else {
        echo "Erro ao acessar o BD: " . $conn ->error;
    }
    $conn->close(); 
?>
</body>
</html>
