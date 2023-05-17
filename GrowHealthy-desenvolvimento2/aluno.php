<!DOCTYPE html>
<html lang="pt">

<html>
	<head>	
        <meta charset="UTF-8">
		<title>Aluno</title>
		<link rel="icon" type="image/png" href="imagens/IE_favicon.jpg"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="css/customize.css">
        <script type="text/javascript" src="js/myScript.js"></script>
	</head>
	<body >  
        <?php
            session_start();
            if (isset($_SESSION['nomeTipoUsu'])) {                                  // Se existe usuário logado, verifica o tipo
                if ($_SESSION['nomeTipoUsu'] == 'Administrador'){
                    $url = 'location: /SiteSample2023/professor.php';	             
                    header($url);                                         	  // Vai para a página inicial de Administrador
                    exit();
                }else if ($_SESSION['nomeTipoUsu'] == 'Professor'){
                    $url = 'location: /SiteSample2023/professor/perfilProf.php';	 
                    header($url);                                         	  // Vai para a página inicial de Professor
                    exit();
                }
            }
        ?>
        <!-- Não encontrou usuário logado, então mostra página inicial -->
        <!-- Menu Superior -->
        <div class="w3-top" id="LoginCadastro" >
            <div class="w3-row w3-white w3-padding" >
                <div class="w3-half" style="margin:0 0 0 0"><a href="."><img src='imagens/logo1.jpg' alt=' IE Exemplo ' width="50" height="40"></a></div>
                <div class="w3-half w3-margin-top w3-wide w3-hide-medium w3-hide-small">
                </div>
            </div>
            <div class="w3-bar w3-theme w3-large" style="z-index:-1">
            <a class="w3-bar-item w3-button w3-left w3-hide-large w3-hover-light-gray w3-large w3-theme w3-padding-16" href="javascript:void(0)" onclick="w3_open('LoginCadadstro')">☰</a>
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-light-gray w3-padding-16" onclick="document.getElementById('id0L').style.display='block'" href="javascript:void(0)" >Meu Perfil </a>
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-light-gray w3-padding-16" onclick="document.getElementById('id1L').style.display='block'" href="javascript:void(0)" >Treinos </a>
                <a class="w3-bar-item w3-button w3-hide-medium w3-hide-small w3-hover-light-gray w3-padding-16" onclick="document.getElementById('id2L').style.display='block'"href="javascript:void(0)" ">Dietas</a>
            </div>
	    </div>
        <!-- Logo da página -->
        <div class="w3-top">
            <div class="w3-row w3-white w3-padding">
                <div class="w3-half" style="margin:0 0 0 0">
                    <a href="."><img src='imagens/logo1.jpg' alt=' IE Exemplo ' width="50" height="50"></a>
                </div>
            </div>
        </div>

        <!-- Sidebar (menu lateral) -->
        <div class="w3-sidebar w3-bar-block w3-collapse w3-animate-left" style="z-index:3;width:270px" id="mySidebar" >
            <div class="w3-bar w3-hide-large w3-large">
                <a href="javascript:void(0)"  onclick="document.getElementById('id0L').style.display='block'" href="javascript:void(0)"
                class="w3-bar-item w3-button w3-theme w3-hover-light-gray w3-padding-16" style="width:50%">Login</a>
                <a href="javascript:void(0)"  onclick="document.getElementById('id0C').style.display='block'" href="javascript:void(0)"
                class="w3-bar-item w3-button w3-theme w3-hover-light-gray w3-padding-16" style="width:50%">Cadastro</a> 
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
                        <p class="w3-container w3-card-4 w3-light-grey w3-text-IE w3-margin"><?php echo $msg; ?></p>
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
                        <form action="editar.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-IE w3-margin">
                            <div class="w3-section">
                            <label class="w3-text-IE"><b>Email</b></label>
                            <input class="w3-input w3-border" readonly="readonly" id="email" name="Email" type="text" placeholder="exemplo@gmail.com"
                                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"> 
                            <label class="w3-text-IE"><b>Altura</b></label>
                            <input class="w3-input w3-border" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" readonly="readonly" id="altura" name="Altura" type="text" placeholder=""> 
                            <label class="w3-text-IE"><b>Peso</b></label>
                            <input class="w3-input w3-border" oninput="this.value=this.value.replace(/^(\d{1,2})(\d{1,2})?$|^(\d{1,2})(\d{2})$/, function(match, p1, p2, p3, p4) { return p1 ? p1 + (p2 ? ',' + p2 : '') : p3 + ',' + p4; })" maxlength="5"  onkeypress="return event.charCode >= 48 && event.charCode <= 57"  readonly="readonly" id="peso" name="Peso" type="text" placeholder=""> 
                            <label class="w3-text-IE"><b>Restrição Fisica</b></label>
                            <textarea class="w3-input w3-border" readonly="readonly" id="fisica" name="Restrição Fisica" style="max-width: 320px; min-width: 320px;" type="text" placeholder=""></textarea>
                            <label class="w3-text-IE"><b>Restrição Alimentar</b></label>
                            <textarea class="w3-input w3-border" readonly="readonly" id="aimentar" name="Restrição Alimentar" style="max-width: 320px; min-width: 320px;" type="text" placeholder=""></textarea> 
                            <label class="w3-text-IE"><b>Senha</b></label>
                            <input class="w3-input w3-border" readonly="readonly" name="SenhaL" id="SenhaL" type="password"  
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}" placeholder="sua senha" 
                            title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e ter de 6 a 8 caracteres" 
                            required>
                            <span>
                                <button class="w3-button w3-block w3-green w3-section w3-padding" onclick="editarInformacoes()" id="editar">Editar informações</button>
                                <button class="w3-button w3-block w3-green w3-section w3-padding" readonly="readonly" id="salvar" type="submit">Salvar alterações</button>
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
                        <form action="login.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-IE w3-margin">
                            <div class="w3-section">
                            <label class="w3-text-IE"><b>Descrição:</b></label>
                            <p/>
                            <label class="w3-text-IE"><b>Data:</b></label>
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
                        <form action="login.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-text-IE w3-margin">
                            <div class="w3-section">
                            <label class="w3-text-IE"><b>Descrição:</b></label>
                            <p/>
                            <label class="w3-text-IE"><b>Data:</b></label>
                            <p>
                            </p>
                            </div>
                        </form>

                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
               
                        </div>

                    </div>
                </div>
                <!-- MODAL CADASTRO: pop up para realizar Cadastro - -->  
                <div id="id0C" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:400px">
                        <div class="w3-center"> 
                            <span onclick="document.getElementById('id0C').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
                        </div>
                        <h2 class="w3-center w3-xxlarge">Cadastrar</h2>
                        <form action="cadastro.php" method="POST" class="w3-container w3-card-4 w3-light-grey w3-margin">
                            <div class="w3-row w3-section">
                                <div class="w3-rest">
                                <label class="w3-text-IE"><b>Nome de usuário</b>*</label>
                                <input class="w3-input w3-border" name="nome" type="text" placeholder="Nome Sobrenome" required>
                                </div>
                            </div>
                            <div class="w3-row w3-section">
                                <div class="w3-rest">
                                <label class="w3-text-IE"><b>Login</b>*</label>                        
                                <input class="w3-input w3-border" name="Login" type="text"
                                    pattern="[a-zA-Z]{2,20}\.[a-zA-Z]{2,20}" placeholder="nome.sobrenome" title="nome.sobrenome" required>
                                </div>
                            </div>
                            <div class="w3-row w3-section">
                                <div class="w3-rest">
                                <label class="w3-text-IE"><b>Celular</b>*</label> 
                                <input class="w3-input w3-border " name="Celular" id="Celular"  type="text" maxlength="15"
                                    placeholder="(XX)XXXXX-XXXX" title="(XX)XXXXX-XXXX"  pattern="^\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" required
                                    onkeypress="mask(this, mphone);" onblur="mask(this, mphone);"> 
                                </div>
                            </div>
                            <div class="w3-row w3-section">
                                <div class="w3-rest">
                                <label class="w3-text-IE"><b>Email</b>*</label> 
                                <input class="w3-input w3-border" name="Email" type="text" placeholder="exemplo@gmail.com"
                                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"> 
                                </div>
                            </div>
                            <div class="w3-row w3-section">
                                <div class="w3-rest">
                                <label class="w3-text-IE"><b>Nascimento</b>*</label> 
                                <input class="w3-input w3-border" type="date" name="dt_nasc" id="dt_nasc" min="1930-01-01" 
                                       max="<?= date('Y-m-d'); ?>" required>
                                </div>
                            </div>
                            <div class="w3-row w3-section">
                                <div class="w3-rest ">
                                <label class="w3-text-IE"><b>Gênero</b>*</label> <br>
                                <span class="w3-text-IE">Feminino <input type="radio" id="Feminino" name="genero" value="2">  
                                Masculino <input type="radio" id="Masculino" name="genero" value="1"> </span> 
                                </div>
                            </div>
                            <div class="w3-row w3-section">
                                <div class="w3-rest">
                                <label class="w3-text-IE"><b>Senha</b>*</label> 
                                <input class="w3-input w3-border " name="Senha" id="Senha" type="password" onchange="confirmaSenha()"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}"
                                    title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e ter de 6 a 8 caracteres" 
                                    required> 
                                </div>
                            </div>
                            <div class="w3-row w3-section">
                                <div class="w3-rest">
                                <label class="w3-text-IE"><b>Confirma Senha</b>*</label> 
                                <input class="w3-input w3-border" name="Senha2" id="Senha2"type="password" onkeyup="confirmaSenha()"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,8}"
                                    title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e ter de 6 a 8 caracteres" 
                                    required> 
                                </div>
                            </div>
                            <p>
                                <input type="checkbox" id="chkC" class="w3-btn w3-theme"  onclick="mostrarOcultarSenha(2)"> <b>Mostrar senha</b>
                            </p>
                            <p class="w3-center">
                            <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit"> Enviar </button>
                            </p>
                        </form>

                        <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                            <button onclick="document.getElementById('id0C').style.display='none'" type="button" class="w3-button w3-red">Cancelar</button>
                        </div>
                    </div>
                </div>

                <?php require 'geral/nutricionista.php'; require 'geral/personal.php';?>
                <!-- FIM PRINCIPAL -->
                </div>
                <!-- Inclui RODAPE.PHP  -->
                
                <?php require 'geral/rodape_nutri.php';?>
                <?php require 'geral/rodape_personal.php';?>
            </div>
        </div>
        <script>
            function editarInformacoes() {
            document.getElementById("email").removeAttribute("readonly");
            document.getElementById("altura").removeAttribute("readonly");
            document.getElementById("peso").removeAttribute("readonly");
            document.getElementById("fisica").removeAttribute("readonly");
            document.getElementById("aimentar").removeAttribute("readonly");
            document.getElementById("SenhaL").removeAttribute("readonly");
            document.getElementById("salvar").removeAttribute("readonly");
            }
        </script>
	</body>
</html>