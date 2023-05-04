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
        $sql = "SELECT Nome, Gênero, Email, Altura, Peso, Login, Senha FROM Aluno "

        $nome    = $conn->real_escape_string($_POST['Nome']);
        $genero   = $conn->real_escape_string($_POST['Genero']);
        $email   = $conn->real_escape_string($_POST['Email']);
        $altura   = $conn->real_escape_string($_POST['Altura']);
        $peso   = $conn->real_escape_string($_POST['Peso']);
        $login   = $conn->real_escape_string($_POST['Login']);
        $senha   = $conn->real_escape_string($_POST['Senha']);
        
        $sql = "INSERT INTO Aluno (Nome, Gênero, Email, Altura, Peso, Login, Senha) VALUES ('$nome','$genero','$email','$altura', '$peso', '$login', md5('$senha'))";
    } elseif ($id == "Personal Trainer") {
        $sql = "SELECT Nome, Gênero, CREF, Login, Senha FROM Personal "

        $nome    = $conn->real_escape_string($_POST['Nome']);
        $genero   = $conn->real_escape_string($_POST['Genero']);
        $cref   = $conn->real_escape_string($_POST['CREF']);
        $login   = $conn->real_escape_string($_POST['Login']);
        $senha1   = $conn->real_escape_string($_POST['Senha']);

        $sql = "INSERT INTO Personal (Nome, Gênero, CREF, Login, Senha) VALUES ('$nome','$genero','$cref', '$login', md5('$senha1'))";
    } elseif($id == "Nutricionista") {
        $sql = "SELECT Nome, Gênero, CRN, Login, Senha FROM Nutricionista "

        $nome    = $conn->real_escape_string($_POST['Nome']);
        $genero   = $conn->real_escape_string($_POST['Genero']);
        $crn   = $conn->real_escape_string($_POST['CRN']);
        $login   = $conn->real_escape_string($_POST['Login']);
        $senha2   = $conn->real_escape_string($_POST['Senha']);

        $sql = "INSERT INTO Nutricionista (Nome, Gênero, CRN, Login, Senha) VALUES ('$nome','$genero','$crn', '$login', md5('$senha2'))";
    }
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
    header('location: indexo.php');

    $conn->close();
    ?>
</body>
