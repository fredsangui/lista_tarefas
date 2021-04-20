<?php
    session_start();
	$erro = isset($_GET['erro']) ? $_GET['erro'] : '';
	//echo phpversion();
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Gerenciamento de tarefas</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
		<script>
			$(document).ready(function(){
				$('#btn_login').click(function(){
					//alert($('#campo_usuario').val());
					var campo_vazio = false;
					
					if($('#campo_usuario').val() == ''){
						campo_vazio = true;
						$('#campo_usuario').css({'border-color': '#FF0000'});
					}else{
						$('#campo_usuario').css({'border-color': '#CCC'});
					}
					if($('#campo_senha').val() == ''){
						campo_vazio = true;
						//alert('2º IF');
						$('#campo_senha').css({'border-color': '#FF0000'});
					}else{
						$('#campo_senha').css({'border-color': '#CCC'});
					}
					if(campo_vazio) return false;
				})				
			})					
		</script>
	</head>

	<body style="background-image: linear-gradient(to left, white, lightgray);">

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
			  <!-- <div>Ícones feitos por <a href="https://www.flaticon.com/br/autores/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/br/" title="Flaticon">www.flaticon.com</a></div>-->
	          <img src="imagens/agenda.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="cad_usuarios.php" data-toggle="collapse" data-target="#">Usuários</a></li>
	            <li class= "<?= $erro!=''?'open':'';?>" >
	            	<a id="entrar" onClick="foco();" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
					<ul class="dropdown-menu" id='formulario' aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Você possui uma conta?</h3>
				    		<br />
							<form method="post" action="validar_acesso.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								
								<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

								<br /><br />
							</form>
								<?php
									if($erro==1){
										echo 'Usuário ou senha invalidos.';
									}else if($erro == 3){
										echo 'Senha incorreta.';
									}
								?>
						</form>
				  	</ul>
	            </li>
	            <li><a href="sobre.php">Sobre</a></li>
				
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <h2>Bem Vindo(a) ao Serviço de Gerenciamento de Tarefas.</h2>
	        
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		
		<script>
			function foco(){
				//alert('foi');
				document.getElementById('campo_usuario').focus;
				return false;
			}
		</script>							
	</body>
</html>