<?php

?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Cadastro de Usuários</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		
	
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
	          <img src="imagens/agenda.png" />
              <a href="home.php">Home</a>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
     			<li><a href="cad_tarefas.php">Tarefas</a></li>
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4">
	    		<h3>Cadastrar Novo Usuário</h3>

				<?php 
					if(isset($_POST['mensagem'])){
						if($_POST['mensagem'] == 1){//mensagem de sucesso
							echo '<p id="mensagem" style="color: blue">';
							echo 'O dados foram salvos com sucesso.';
							echo '</p>';
						}else{//mensagem de erro
							echo '<p id="mensagem" style="color: red">';
							echo $_POST['mensagem'];
							echo '</p>';
						}
						unset($_POST['mensagem']);
					}else echo '<p id="mensagem"></p>';
				?>
				
	    		<br />
				<form method="post" action="registra_usuario.php" class="formCadastro">
					<div class="form-group">
						<input type="text" class="form-control" id="usuario" name="usuario"  placeholder="Usuário" required="requiored">
					</div>

					<div class="form-group">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
					</div>
					
					<div class="form-group">
						<input type="number" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required="requiored">
					</div>
					<div class="input-group form-group ">
                        
                        <button type="submit" class="btn btn-primary" id="salvar" > Salvar  </button>
                        
                        <button type="button" class="btn btn-danger" id="cancelar" >Cancelar</button>
                        
                    </div>
				</form>
			</div>
			<div class="col-md-4"><h4><a href="#">Buscar Usuário</a></h4></div>
			<div class="col-md-4"></div>

			<div class="clearfix"></div>
			<br />
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>

		</div>
		
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>