<!DOCTYPE html>
<!-------------------------------------------------------------------------------
    Desenvolvimento Web
    PUCPR
    Profa. Cristina V. P. B. Souza
    Março/2023
---------------------------------------------------------------------------------->
<!-- profIncluir_exe.php -->

<html>
	<head>

	  <title>IE - Instituição de Ensino</title>
	  <link rel="icon" type="image/png" href="imagens/IE_favicon.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="css/customize.css">
	</head>
<body onload="w3_show_nav('menuAluno')">
<!-- Inclui MENU.PHP  -->
<?php require '../geral/menuPerfilProf.php'; ?>
<?php require '../bd/conectaBD.php'; ?>
<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">

<div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
  <p class="w3-large">
  <div class="w3-code cssHigh notranslate">
  <!-- Acesso em:-->
	<?php

	date_default_timezone_set("America/Sao_Paulo");
	$data = date("d/m/Y H:i:s",time());
	echo "<p class='w3-small' > ";
	echo "Acesso em: ";
	echo $data;
	echo "</p> "
	?>

	<!-- Acesso ao BD-->
	<?php
		$nome    = $_POST['Nome'];
		$celular = $_POST['Celular'];
		$login   = $_POST['Login'];
		$dtNasc  = $_POST['DataNasc'];
		$genero  = $_POST['Genero'];
		
		//Criptografa Senha
		$md5Senha = md5($_POST['Senha']);

		// Cria conexão
		$conn = new mysqli($servername, $username, $password, $database);

		// Verifica conexão 
		if ($conn->connect_error) {
			die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
		}
		

		// Faz Insert na Base de Dados

		if ($_FILES['Imagem']['size'] == 0) { // Não recebeu uma imagem binária
			$sql = "INSERT INTO Aluno (CPF_Aluno, login, celular, nome, Genero, email,Peso,Altura,senha,dt_nasc,tipo, CREF)
         VALUES ('$cpf','$login','$celular', '$nome', '$genero','$email','$peso','$altura','$senha','$dt_nasc','$cref')";
        }
		} else {                              // Recebeu uma imagem binária
			$sql = "INSERT INTO Aluno (CPF_Aluno, login, celular, nome, Genero, email,Peso,Altura,senha,dt_nasc,tipo, CREF)
         VALUES ('$cpf','$login','$celular', '$nome', '$genero','$email','$peso','$altura','$senha','$dt_nasc','$cref')";
		}
		?>
		<div class='w3-responsive w3-card-4'>
		<div class="w3-container w3-theme">
		<h2>Inclusão de Novo Aluno</h2>
		</div>
		<?php
		if ($result = $conn->query($sql)) {
			echo "<p>&nbsp;Registro cadastrado com sucesso! </p>";
		} else {
			echo "<p>&nbsp;Erro executando INSERT: " .  $conn->connect_error . "</p>";
		}
        echo "</div>";
		$conn->close();  //Encerra conexao com o BD

	?>
  </div>
</div>


	<?php require '../geral/sobre.php';?>
	<!-- FIM PRINCIPAL -->
	</div>
	<!-- Inclui RODAPE.PHP  -->
	<?php require '../geral/rodape.php';?>
	
</body>
</html>
