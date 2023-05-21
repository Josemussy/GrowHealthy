<html>

	<head>
      <meta charset="UTF-8">  
	  <title>GrowHealthy</title>
	  <link rel="icon" type="image/png" href="imagens/logo1.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="css/customize.css">
	</head>
<body>

<?php
    session_start(); // infomra ao PHP que iremos trabalhar com sessão
    require 'bd/conectaBD.php'; 
    
    // Cria conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica conexão 
    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    $usuario = $conn->real_escape_string($_POST['Login']); // prepara a string recebida para ser utilizada em comando SQL
    $senha   = $conn->real_escape_string($_POST['SenhaL']); // prepara a string recebida para ser utilizada em comando SQL
    $tipo    =$conn->real_escape_string($_POST['tipo']);
    
    

    // Faz Select na Base de Dados
    if($tipo == 'aluno'){
        $sql = "SELECT cpf, login ,senha FROM aluno WHERE login = '$usuario' AND senha = '$senha'";

    }
    elseif($tipo == 'personal'){
        $sql = "SELECT CREF, login ,senha FROM Personal WHERE login = '$usuario' AND senha = '$senha'";
    }
    elseif($tipo =='nutricionista'){
        $sql = "SELECT crn, login ,senha FROM nutricionista WHERE login = '$usuario' AND senha = '$senha'";
    }
    
    if ($result = $conn->query($sql)) {
        if ($result->num_rows == 1) {         // Deu match: login e senha combinaram
            $row = $result->fetch_assoc();
            $_SESSION ['login']       = $usuario;
            $_SESSION ['CREF']        = $row['CREF'];
            $_SESSION ['nome']        = $row['nome'];
          unset($_SESSION['nao_autenticado']);                         // Agora está logado
           // if( $_SESSION ['tipo'] == 'personal'){           
                $conn->close();  //Encerra conexao com o BD
                header('location: professor/perfilProf.php');  // Perfil Aluno
                exit();
            //}else {  
            //    $conn->close();  //Encerra conexao com o BD                               
            //    header('location: /GrowHealthy-desenvolvimento/professor/perfilProf.php');  // Perfil Personal
            //    exit();
            //}
        }
        elseif ($result->num_rows == 0){
            echo ("Não tá dando select");
        }
        else{
            $_SESSION['nao_autenticado'] = true;
            $_SESSION['mensagem_header'] = "Login";
            $_SESSION['mensagem']        = "Senha ou usuário incorreto.". $senha ;
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
<script> console.log ($usuario, $senha);
    </script>
	</body>
</html>

