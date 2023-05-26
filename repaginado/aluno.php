<?php require 'bd/conectaBD.php'; ?>
<?php
	require('verifica_login.php');
    
	
	$url = dirname($_SERVER['SCRIPT_NAME']);                   // Obtém URL básica da aplicação Web
	$url = substr($url,strrpos($url,"\\/")+1,strlen($url));    // Retira 1o. '/'
	if (substr_count($url, '/') >= 1){                          
		$url = substr($url,strrpos($url,"\\/"),strlen($url));  // Retira 2o. '/', se ainda houver esse caracter
		$url = strstr($url, '/',true);
	}
	if ($_SESSION['tipo'] == 'personal'){
		$url = "Location: /" . $url . "/personal.php";	// Monta URL para redirecionamento
		header($url);                               	 
		exit();
	}
?>
<html>
	<head>	
        <meta charset="UTF-8">
		<title>Aluno</title>
		<link rel="icon" type="image/png" href="imagens/logo1.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/customize.css">
        <script type="text/javascript" src="js/myScript.js"></script>
	</head>
	<body >  
        
        <div class="w3-top" id="LoginCadastro" >
            <div class="w3-row w3-white w3-padding" >
                <div class="w3-half" style="margin:0 0 0 0"><a href="."><img src='imagens/logo1.png' alt='  ' width="50" height="40"></a></div>
                <div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small">
                </div>
            </div>
            <div class="w3-bar w3-cyan w3-large" style="z-index:-1">
            <a class="w3-bar-item w3-button w3-left w3-hide-large w3-hover-light-gray w3-large w3-cyan w3-padding-16" href="javascript:void(0)" onclick="w3_open('LoginCadadstro')">☰</a>
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-light-gray w3-padding-16" onclick="document.getElementById('id0L').style.display='block'" href="javascript:void(0)" >Meu Perfil </a>
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-light-gray w3-padding-16" onclick="document.getElementById('id1L').style.display='block'" href="javascript:void(0)" >Treinos </a>
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-light-gray w3-padding-16" onclick="document.getElementById('id2L').style.display='block'"href="javascript:void(0)" >Dietas</a>
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-light-gray w3-padding-16 w3-right" style="background-color: #ff0000" onclick="document.getElementById('').style.display='block'"href="javascript:void(0)" >Sair</a>
            </div>
	    </div>
        <!-- Logo da página -->
        <div class="w3-top">
            <div class="w3-row w3-white w3-padding">
                <div class="w3-half" style="margin:0 0 0 0">
                    <a href="."><img src='imagens/logo1.png' alt='  ' width="50" height="50"></a>
                    <b style="font-size:20px">GrowHealthy</b>
                </div>
            </div>
        </div>

        <!-- Sidebar (menu lateral) -->
        <div class="w3-sidebar w3-bar-block w3-collapse w3-animate-left" style="z-index:3;width:270px" id="mySidebar" >
            <div class="w3-bar w3-hide-large w3-large">
                <a href="javascript:void(0)"  onclick="document.getElementById('id0L').style.display='block'" href="javascript:void(0)"
                class="w3-bar-item w3-button w3-cyan w3-hover-light-gray w3-padding-16" style="width:50%">Meu perfil</a>
                <a href="javascript:void(0)"  onclick="document.getElementById('id0C').style.display='block'" href="javascript:void(0)"
                class="w3-bar-item w3-button w3-cyan w3-hover-light-gray w3-padding-16" style="width:50%">Treinos</a>
                <a href="javascript:void(0)"  onclick="document.getElementById('id0C').style.display='block'" href="javascript:void(0)"
                class="w3-bar-item w3-button w3-cyan w3-hover-light-gray w3-padding-16" style="width:50%">Dietas</a>  
                <a href="javascript:void(0)"  onclick="document.getElementById('id0C').style.display='block'" href="javascript:void(0)"
                class="w3-bar-item w3-button w3-cyan w3-hover-light-gray w3-padding-16" style="width:50%">Sair</a>  
            </div>
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-right w3-xlarge w3-hide-large" title="Close Menu">x</a>
        </div>

        <!-- Conteúdo PRINCIPAL: deslocado para direita em 270 pixels quando a sidebar é visível -->
		<div class="w3-main w3-container" style="margin-left:270px;margin-top:117px;">
            <div class="w3-panel w3-padding-large w3-card-4 w3-light-grey" >
                <h1 class="w3-jumbo">Painel Aluno</h1>
                <h3 class="">Funcionalidades:</h3>
                <!-- <img src="imagens/fit.png" class="w3-round-xxlarge" width="70%" style="max-width:500px">    -->
                                
                <!-- Login Fail Modal --> 
                <!-- -->
                <?php
                
                $idAluno = $_SESSION['id'];
                
				

				// Cria conexão
				$conn = new mysqli($servername, $username, $password, $database);

				// Verifica conexão 
				if ($conn->connect_error) {
					die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
				}

				// Faz Select na Base de Dados
				$sql = "SELECT id, email, altura, peso, restricoesFisicas, restricoesAlimentares, senha FROM aluno WHERE id = '$idAluno'";
                //Inicio DIV form
				echo "<div class='w3-responsive w3-card-4'>";
				if ($result = $conn->query($sql)) {
					if ($result->num_rows == 1) {
						$row        = $result->fetch_assoc(); 
						$email      = $row['email'];
						$altura     = $row['altura'];
						$peso       = $row['peso'];
						$restricoesFisicas     = $row['restricoesFisicas'];
						$restricoesAlimentares = $row['restricoesAlimentares'];
                        $senha      = $row['senha'];
                    }
                }

                $msg        = "";
                $msg_header = "";
                if(isset($_SESSION['nao_autenticado'])){ 
                    // Houve falha(login incorreto ou cadastro incorreto)
                    $msg        = $_SESSION['mensagem'];
                    $msg_header = $_SESSION['mensagem_header'];
                    $style      = "display:block"; // div da msg aparece 
                }else{
                    // Usuário já autenticado
                    unset($_SESSION['nao_autenticado']);
                    $style      = "display:none"; // div da msg não aparece 
                }
                ?>
                <!-- MODAL FAIL: Houve falha(login incorreto ou cadastro incorreto) ou não  --> 
                <div id="LF" class="w3-modal " style="<?php echo $style;?>">  
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
                        <div class="w3-center"> 
                            <span onclick="document.getElementById('LF').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        
                        <h2 class="w3-center w3-xxlarge "><?php echo $msg_header; ?></h2>
                        <p class="w3-container w3-card-4 w3-light-grey w3-text-cyan w3-margin"><?php echo $msg; ?></p>
                        <?php 
                        session_destroy(); // Após msg de erro, destrói elementos de sessão para limpar mgs se nova carga de página
                        ?>
                        </div>
                        <br>
                    </div>
                </div>  
                    
                <!-- MODAL LOGIN: pop up para realizar Login --> 
                <div id="id0L" class="w3-modal ">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
                        <div class="w3-center"> 
                            <span onclick="document.getElementById('id0L').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        </div>
                        <h2 class="w3-center w3-xxlarge">Informação da conta</h2>
                        <form action="editar.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-cyan w3-margin">
                            <div class="w3-section">
                            <label class="w3-text-cyan"><b>Email</b></label>
                            <input class="w3-input w3-border" disabled="disabled" id="email" name="Email" type="text" placeholder="exemplo@gmail.com" value= "<?php echo $email; ?>"
                                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"> 
                            <label class="w3-text-cyan"><b>Altura</b></label>
                            <input class="w3-input w3-border" placeholder="XX,XX" maxlength="3" max="220" onkeypress="return event.charCode >= 48 && event.charCode <= 57" disabled="disabled" id="altura" name="Altura" type="text" placeholder="" value= "<?php echo $altura; ?>"> 
                            <label class="w3-text-cyan"><b>Peso</b></label>
                            <input class="w3-input w3-border" placeholder="XX,XX" oninput="this.value=this.value.replace(/^(\d{1,2})(\d{1,2})?$|^(\d{1,2})(\d{2})$/, function(match, p1, p2, p3, p4) { return p1 ? p1 + (p2 ? ',' + p2 : '') : p3 + ',' + p4; })" maxlength="5"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"  disabled="disabled" id="peso" name="Peso" type="text" value= "<?php echo $peso; ?>"> 
                            <label class="w3-text-cyan"><b>Restrição Fisica</b></label>
                            <textarea class="w3-input w3-border" disabled="disabled" id="fisica" name="restricaoFisica" style="max-width: 320px; min-width: 320px;" type="text" placeholder="" value= "<?php echo $restricoesFisicas; ?>"></textarea>
                            <label class="w3-text-cyan"><b>Restrição Alimentar</b></label>
                            <textarea class="w3-input w3-border" disabled="disabled" id="aimentar" name="restricaoAlimentar" style="max-width: 320px; min-width: 320px;" type="text" placeholder="" value= "<?php echo $restricoesAlimentares; ?>"></textarea> 
                            <label class="w3-text-cyan"><b>Senha Nova</b></label>
                            <input class="w3-input w3-border" disabled="disabled" name="SenhaL" id="SenhaL" type="password"  
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" placeholder="sua senha" 
                            title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e ter de 6 a 8 caracteres" 
                            required>
                            <span>
                                <button class="w3-button w3-block w3-cyan w3-section w3-padding" onclick="editarInformacoes()" id="editar">Editar informações</button>
                                <button class="w3-button w3-block w3-cyan w3-section w3-padding" disabled="disabled" id="salvar" type="submit">Salvar alterações</button>
                            </span>
                            </div>
                        </form>

                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                            <button onclick="document.getElementById('id0L').style.display='none'" type="button" class="w3-button w3-red">Cancelar</button>
                            <span class="w3-right w3-padding w3-hide-small"><a href="#">Esqueceu a senha?</a></span>
                        </div>

                    </div>
                </div>
                <div id="id1L" class="w3-modal ">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
                        <div class="w3-center"> 
                            <span onclick="document.getElementById('id1L').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        </div>
                        <h2 class="w3-center w3-xxlarge">Meus Treinos</h2>
                        <form action="login.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-cyan w3-margin">
                            <div class="w3-section">
                            <label class="w3-text-cyan"><b>Descrição:</b></label>
                            <p/>
                            <label class="w3-text-cyan"><b>Data:</b></label>
                            <p>
                            </p>
                            </div>
                        </form>

                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
               
                        </div>

                    </div>
                </div>
                <div id="id2L" class="w3-modal ">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
                        <div class="w3-center"> 
                            <span onclick="document.getElementById('id2L').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        </div>
                        <h2 class="w3-center w3-xxlarge">Minhas dietas</h2>
                        <form action="login.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-cyan w3-margin">
                            <div class="w3-section">
                            <label class="w3-text-cyan"><b>Descrição:</b></label>
                            <p/>
                            <label class="w3-text-cyan"><b>Data:</b></label>
                            <p>
                            </p>
                            </div>
                        </form>

                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
               
                        </div>

                    </div>
                </div>
                

                <?php require 'geral/nutricionista.php'; require 'geral/personalSolicitar.php';?>
                <!-- FIM PRINCIPAL -->
                </div>
                <!-- Inclui RODAPE.PHP  -->
                
                <?php require 'geral/rodape_nutri.php';?>
                <?php require 'geral/rodape_personal.php';?>
            </div>
        </div>
        <script>
            function editarInformacoes() {
            document.getElementById("email").removeAttribute("disabled");
            document.getElementById("altura").removeAttribute("disabled");
            document.getElementById("peso").removeAttribute("disabled");
            document.getElementById("fisica").removeAttribute("disabled");
            document.getElementById("aimentar").removeAttribute("disabled");
            document.getElementById("SenhaL").removeAttribute("disabled");
            document.getElementById("salvar").removeAttribute("disabled");
            }
        </script>
	</body>
</html>