<?php 
    require 'bd/conectaBD.php'; 
    require('verifica_login.php');
    
	session_start(); // infomra ao PHP que iremos trabalhar com sessão

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os valores enviados
        $email = $_POST["Email"];
        $altura = $_POST["Altura"];
        $peso = $_POST["Peso"];
        $restricaoFisica = $_POST["restricaoFisica"];
        $restricaoAlimentar = $_POST["restricaoAlimentar"];
        $senhaNova  = $_POST["SenhaL"];
        $idALuno    = $_SESSION ['id'];
    }
// Cria conexão
	$conn = new mysqli($servername, $username, $password, $database);
// Verifica conexão 
	if ($conn->connect_error) {
		die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
	}    

    $sql = "INSERT INTO Alunos (email, altura, peso, restricoesFisicas, restricoesAlimentares) 
                VALUES ('$email', '$altura', '$peso', '$restricaoFisica', '$restricaoAlimentar')";

    echo "<div class='w3-responsive w3-card-4'>";
			if ($result = $conn->query($sql)) {
				echo '<script>alert("' . $idAluno . '");</script>';
			} else {
				echo "<p>&nbsp;Erro executando UPDATE: " . $conn-> error . "</p>";
			}
			echo "</div>";
			$conn->close(); //Encerra conexao com o BD

?>