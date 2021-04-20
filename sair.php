<?php
	session_start();
	header('refresh: 3	;index.php');
	$erro = isset($_GET['erro']) ? $_GET['erro'] : '';
	//echo phpversion();
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Lista de tarefas</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <h1>Agradecemos pela sua visita.
				
			</h1>

			<?php
				echo '<p>Sessão encerrada.</p>';
			?>
			
	        
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<div align="right" >Ícones feitos pora <a href="https://www.flaticon.com/br/autores/freepik" title="Freepik">
		Freepik</a> from <a href="https://www.flaticon.com/br/" title="Flaticon">www.flaticon.com</a></div>
						
	</body>
</html>

<?php
	unset($_SESSION['usuario']);
	unset($_SESSION['id']);
	unset($_SESSION['tarefa']);
	unset($_SESSION['descricao']);
	unset($_SESSION['dini']);
	unset($_SESSION['dfim']);

?>