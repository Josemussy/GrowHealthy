<!DOCTYPE html>
<!-------------------------------------------------------------------------------
    Desenvolvimento Web
    PUCPR
    Profa. Cristina V. P. B. Souza
    Março/2023
---------------------------------------------------------------------------------->
<!-- profAtualizar.php -->

<html>
	<head>
		<meta charset="UTF-8">
		<title>IE - Instituição de Ensino</title>
		<link rel="icon" type="image/png" href="imagens/IE_favicon.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="../css/customize.css">
		<script type="text/javascript" src="../js/myScript.js"></script>
	</head>
<body>
	<!-- Inclui MENU.PHP  -->
	<?php require '../geral/menuPerfilPersonal.php'; ?>
	<?php require '../bd/conectaBD.php'; ?>

	<!-- Conteúdo Principal: deslocado para direita em 270 pixels quando a sidebar é visível -->
	<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">
		<div class="w3-panel w3-padding-large w3-card-4 w3-light-grey">
			<p class="w3-large">
			<div class="w3-code cssHigh notranslate">
				<!-- Acesso em:-->
				<?php

				date_default_timezone_set("America/Sao_Paulo");
				$data = date("d/m/Y H:i:s", time());
				echo "<p class='w3-small' > ";
				echo "Acesso em: ";
				echo $data;
				echo "</p> "
				?>

				<!-- Acesso ao BD-->
				<?php		
				$id = $_GET['id'];

				// Cria conexão
				$conn = new mysqli($servername, $username, $password, $database);

				// Verifica conexão 
				if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

				// Faz Select na Base de Dados
				$sql = "SELECT ID_Usuario, Nome, Celular, DataNasc, ID_Genero, Foto, Login FROM TB_Usuario WHERE ID_Usuario = $id";

				//Inicio DIV form
				echo "<div class='w3-responsive w3-card-4'>";
				if ($result = $conn->query($sql)) {
					if ($result->num_rows == 1) {
						$row        = $result->fetch_assoc(); 
						$genero     = $row['ID_Genero'];
						$id_usuario = $row['ID_Usuario'];
						$nome       = $row['Nome'];
						$celular    = $row['Celular'];
						$dataNasc   = $row['DataNasc'];
						$login      = $row['Login'];
						$foto       = $row['Foto'];
									
						// Faz Select na Base de Dados
						$sqlG = "SELECT ID_Genero, Nome FROM TB_Genero";
							
						$optionsGenero = array();
						
						if ($result = $conn->query($sqlG)) {
							while ($row        = $result->fetch_assoc()) {
								$selected = "";
								if ($row['ID_Genero'] == $genero)
									$selected = "selected";
								array_push($optionsGenero, "\t\t\t<option " . $selected . " value='". $row["ID_Genero"]."'>".$row["Nome"]."</option>\n");
							}
						}

						?>
						<div class="w3-container w3-theme">
							<h2>Altere o Treino Cód. = [<?php echo $id_usuario; ?>]</h2>
						</div>
						<form class="w3-container" action="treinoAtualizar_exe.php" method="post" enctype="multipart/form-data">
							<table class='w3-table-all'>
								<tr>
									<td style="width:50%;">
										<p>
											<input type="hidden" id="Id" name="Id" value="<?php echo $id_medico; ?>">
										<p>
										<label class="w3-text-IE"><b>Nome</b></label>
										<input class="w3-input w3-border w3-light-grey " name="Nome" type="text" pattern="[a-zA-Z\u00C0-\u00FF ]{10,100}$" title="Nome entre 10 e 100 letras." value="<?php echo $nome; ?>" required>
										</p>
										<p>
										<label class="w3-text-IE"><b>Data de Nascimento</b>*</label>
										<input class="w3-input w3-border w3-light-grey " name="Idade" id="idade" type="text" maxlength="15" placeholder="Anos" title="idade" value="<?php echo $dataNasc; ?>" >
										</p>
										<p>
										<label class="w3-text-IE"><b>Altura</b></label>
										<input class="w3-input w3-border w3-light-grey " name="altura" type="text" placeholder="1,80m" title="altura">
										</p>
										<p>
										<label class="w3-text-IE"><b>Peso</b></label>
										<input class="w3-input w3-border w3-light-grey " name="Dpeso" type="text" placeholder="Kg" title="Peso">
										</p>
										<label class="w3-text-IE"><b>Restrições Alimentares</b></label>
										<input class="w3-input w3-border w3-light-grey " name="RestAlimentar" type="text" placeholder="Nenhuma" title="RestAlimentar">
										</p>
										<label class="w3-text-IE"><b>Restrições Físicas</b></label>
										<input class="w3-input w3-border w3-light-grey " name="RestFisicas" type="text" placeholder="Nenhuma" title="RestFisicas">
										</p>
										

									</td>
									<td style="text-align:center;">
									<p style="text-align:center"><label class="w3-text-IE"><b>Revise e poste aqui o treino: </b></label></p>
									<input class="w3-input w3-border w3-light-grey " name="postarTreino" id = "postarTreino" type="text"  title="postarTreino" style="width: 90%; height:500px;">
										
									</p>
									</td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:center">
									<p>
										<input type="submit" value="Postar Treino" class="w3-btn w3-red" >
										<input type="button" value="Cancelar" class="w3-btn w3-theme" onclick="window.location.href='alunoListar.php'">
									</p>
									</td>
								</tr>
							</table>
			
		                </form>
								<?php
					}else{?>
								<div class="w3-container w3-theme">
								<h2>Aluno inexistente</h2>
								</div>
								<br
							<?php
							}
				} else {
					echo "<p style='text-align:center'>Erro executando UPDATE: " . $conn-> error . "</p>";
				}
				echo "</div>"; //Fim form
				$conn->close(); //Encerra conexao com o BD
				?>
			</div>
			</p>
		</div>

	<?php require '../geral/sobre.php';?>
	<!-- FIM PRINCIPAL -->
	</div>
	<!-- Inclui RODAPE.PHP  -->
	<?php require '../geral/rodape.php';?>

</body>
</html>
