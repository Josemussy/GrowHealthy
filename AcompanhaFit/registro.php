<head>
    <meta charset="UTF-8">
    <title>Growhealthy</title>
    <link rel="icon" type="image/jpg" href="imagens/ghealthy_logo.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/customize.css">
</head>

<body>
    <form action="radio.php" method="post">
        <B>Selecione um tipo de usuário:<B>
            <input type=radio name=usuario value="Aluno"> Aluno
            <input type=radio name=usuario value="Personal Trainer"> Personal Trainer
            <input type=radio name=usuario value="Nutricionista"> Nutricionista
            <br><br>
            <input type=submit>
    </form>

    <?php
    session_start();
    require 'bd/connectBD.php';

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    $id    = $conn->real_escape_string($_POST['usuario']);

    if ($id == "Aluno") {
        $sql = "SELECT Nome, Gênero, Email, Altura, Peso, Senha FROM Aluno "

        $nome    = $conn->real_escape_string($_POST['nome']);
        $genero   = $conn->real_escape_string($_POST['genero']);
        $email   = $conn->real_escape_string($_POST['email']);
        $altura   = $conn->real_escape_string($_POST['altura']);
        $peso   = $conn->real_escape_string($_POST['peso']);
        $senha   = $conn->real_escape_string($_POST['senha']);
        
        $sql = "INSERT INTO Aluno (Nome, Gênero, Email, Altura, Peso, Senha) VALUES ('$nome','$genero','$email','$altura', '$peso', md5('$senha'))";
        if ($result = $conn->query($sql)) {
            $msg = "Registro cadastrado com sucesso! Você já pode realizar login.";
            $_SESSION['nao_autenticado'] = true;
            $_SESSION['mensagem_header'] = "Cadastro";
            $_SESSION['mensagem']        = $msg;
            header('location: /Acompanhafit/indexo.php');
            exit();
        } else {
            $msg = "Erro executando INSERT: " . $conn->error . " Tente novo cadastro.";
            $_SESSION['nao_autenticado'] = true;
            $_SESSION['mensagem_header'] = "Cadastro";
            $_SESSION['mensagem']        = $msg;
            header('location: /Acompanhafit/indexo.php');
    
            exit();
        }
    } elseif ($id == "Personal Trainer") {
        $sql = "SELECT Nome, Gênero, CREF, Senha FROM Personal "

        $nome    = $conn->real_escape_string($_POST['nome']);
        $genero   = $conn->real_escape_string($_POST['genero']);
        $cref   = $conn->real_escape_string($_POST['cref']);
        $senha1   = $conn->real_escape_string($_POST['senha']);

        $sql = "INSERT INTO Personal (Nome, Gênero, CREF, Senha) VALUES ('$nome','$genero','$cref', md5('$senha1'))";
        if ($result = $conn->query($sql)) {
            $msg = "Registro cadastrado com sucesso! Você já pode realizar login.";
            $_SESSION['nao_autenticado'] = true;
            $_SESSION['mensagem_header'] = "Cadastro";
            $_SESSION['mensagem']        = $msg;
            header('location: /Acompanhafit/indexo.php');
            exit();
        } else {
            $msg = "Erro executando INSERT: " . $conn->error . " Tente novo cadastro.";
            $_SESSION['nao_autenticado'] = true;
            $_SESSION['mensagem_header'] = "Cadastro";
            $_SESSION['mensagem']        = $msg;
            header('location: /Acompanhafit/indexo.php');
    
            exit();
        }
    } elseif($id == "Nutricionista") {
        $sql = "SELECT Nome, Gênero, CRN, Senha FROM Nutricionista "

        $nome    = $conn->real_escape_string($_POST['nome']);
        $genero   = $conn->real_escape_string($_POST['genero']);
        $crn   = $conn->real_escape_string($_POST['crn']);
        $senha2   = $conn->real_escape_string($_POST['senha']);

        $sql = "INSERT INTO Nutricionista (Nome, Gênero, CRN, Senha) VALUES ('$nome','$genero','$crn', md5('$senha2'))";

        if ($result = $conn->query($sql)) {
            $msg = "Registro cadastrado com sucesso! Você já pode realizar login.";
            $_SESSION['nao_autenticado'] = true;
            $_SESSION['mensagem_header'] = "Cadastro";
            $_SESSION['mensagem']        = $msg;
            header('location: /Acompanhafit/indexo.php');
            exit();
        } else {
            $msg = "Erro executando INSERT: " . $conn->error . " Tente novo cadastro.";
            $_SESSION['nao_autenticado'] = true;
            $_SESSION['mensagem_header'] = "Cadastro";
            $_SESSION['mensagem']        = $msg;
            header('location: /Acompanhafit/indexo.php');
    
            exit();
        }
    }
    header('location: indexo.php');

    $conn->close();
    ?>
</body>
