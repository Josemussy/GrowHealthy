<html>
<!-------------------------------------------------------------------------------
    Desenvolvimento Web
    PUCPR
    Profa. Cristina V. P. B. Souza
    Março/2023
---------------------------------------------------------------------------------->
<!-- Cadastro.php -->

<head>
    <meta charset="UTF-8">
    <title>GrowHealthy</title>
    <link rel="icon" type="image/png" href="imagens/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/customize.css">
</head>

<body>

    <?php
    session_start(); // informa ao PHP que iremos trabalhar com sessão
    require 'bd/conectaBD.php';

    // Cria conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica conexão 
    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    $nome    = $conn->real_escape_string($_POST['nome']);    // prepara a string recebida para ser utilizada em comando SQL
    $login   = $conn->real_escape_string($_POST['Login']);   // prepara a string recebida para ser utilizada em comando SQL
    $celular = $conn->real_escape_string($_POST['Celular']); // prepara a string recebida para ser utilizada em comando SQL
    $email = $conn->real_escape_string($_POST['Email']);
    $senha   = $conn->real_escape_string($_POST['Senha']);   // prepara a string recebida para ser utilizada em comando SQL
    $dt_nasc = $conn->real_escape_string($_POST['dt_nasc']); // prepara a string recebida para ser utilizada em comando SQL
    $genero  = $conn->real_escape_string($_POST['genero']);  // prepara a string recebida para ser utilizada em comando SQL
    $cpf  = $conn->real_escape_string($_POST['cpf']);  // prepara a string recebida para ser utilizada em comando SQL
    $tipo  = $conn->real_escape_string($_POST['tipo']);  // prepara a string recebida para ser utilizada em comando SQL
    $crn = $conn->real_escape_string($_POST['crn']);  // prepara a string recebida para ser utilizada em comando SQL
    $cref  = $conn->real_escape_string($_POST['cref']);  // prepara a string recebida para ser utilizada em comando SQL
    $peso  = $conn->real_escape_string($_POST['peso']);  // prepara a string recebida para ser utilizada em comando SQL
    $altura  = $conn->real_escape_string($_POST['altura']);  // prepara a string recebida para ser utilizada em comando SQL

    //Criptografa Senha
	$md5Senha = md5($senha);
        
    $tipoUsu = 1; // Usuário Administrador

    // Não recebe uma imagem binária e faz Insert na Base de Dados
    if ($tipo == 'aluno') {
    $sql = "INSERT INTO Aluno (CPF_Aluno, login, celular, nome, Genero, email,Peso,Altura,senha,dt_nasc,tipo, CREF)
     VALUES ('$cpf','$login','$celular', '$nome', '$genero','$email','$peso','$altura','$senha','$dt_nasc','$cref')";
    }
    else {
    $sql = "INSERT INTO Personal (Nome, Genero, Email, CREF, login, dt_nasc, cpf, tipo, celular, senha, ID_treino, CPF_Aluno)
    VALUES ('$nome','$genero','$email', '$CREF', '$login','$dt_nasc','$cpf','$tipo','$celular','$senha','$ID_treino', null)";        
    }


    if ($result = $conn->query($sql)) {
        $msg = "Registro cadastrado com sucesso! Você já pode realizar login.";
    } else {
        $msg = "Erro executando INSERT: " . $conn-> error . " Tente novo cadastro.";
    }
    $_SESSION['nao_autenticado'] = true;
    $_SESSION['mensagem_header'] = "Cadastro";
    $_SESSION['mensagem']        = $msg;
    $conn->close();  //Encerra conexao com o BD
    header('location: index.php'); 
    ?>
</body>
</html>
