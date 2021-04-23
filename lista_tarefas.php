<?php
    session_start();
?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Lista de Tarefas</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		
		<script type="text/javascript">
			
			$(document).ready(function(){

				function atualiza_busca(){
					var serializa = $('#form_busca').serialize();
					// $('#teste').text(serializa);
					$.ajax({
						url: "pesquisa.php",
						method: 'POST',
						data: serializa,
						success: function(data){
							if(serializa) $('#lista_dados').html(data) //lista_dados
							else $('#lista_dados').html('');
                            //Apaga tarefa
                            $('.apagar').click(function(){
                                id= $(this).attr('id').substring(5);
                                //alert(id);
                                if(confirm('Tem certeza que deseja deletar este registro?')){
                                    apagar_tarefa(id);
                                    atualiza_busca();
                                }
                            });
                            //Editar tarefa
                            $('.editar').click(function(){
                                id= $(this).attr('id').substring(5);
                                //alert(id);
                                
                                editar_tarefa(id);
                                atualiza_busca();
                                
                            })
						}
					});	
				};

                function apagar_tarefa(identificador){
                    $.ajax({
                        url: 'apaga_tarefa.php',
                        method: 'POST',
                        data:{'id':identificador},
                        success: function(data){
                            alert(data);
                        }

                    })
                };

                function editar_tarefa(identificador){
                    $.ajax({
                        url: 'atualiza_tarefa.php',
                        method: 'POST',
                        data:{'id':identificador},
                        success: function(data){
                            //alert(data);
                            window.location = 'edit_tarefas.php';
                        }

                    });
                };

				$('#btn_busca').click(function(){
					atualiza_busca();	
				});


				$('#id_buscar').keypress(function(event){
						var tecla = event.keyCode;
												
						if(tecla == '13'){
							//alert(tecla);
							atualiza_busca();
							return false;
						}
						
				});

			});
			
			
			
			
		</script>
	
	</head>

	<body  style="background-image: linear-gradient(to left, white, lightgray);">

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
			  <a href="#">
                Bem vindo(a)
			  </a>
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
			    <li><a href="cad_tarefas.php">Tarefas</a></li>
                <li><a href="cad_usuarios.php">Usuarios</a></li>
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	    	<div class="col-md-2">				
			
			
			</div>
	    	<div class="col-md-10">
	    		<div class="panel panel-default">
					<div class="panel-body">
						<form class="input-group" id = "form_busca">
							<input type="text" class="form-control" placeholder='Descrição da tarefa' name="buscar" id="id_buscar">
								<span class="input-group-btn">
									<button class='btn btn-default' id="btn_busca" type='button'>Pesquisar</button>
								</span>
						</form>		
					</div>
				</div>
				<table class="table table-hover table-striped" id="lista_dados">
				</table>
				
			</div>
			
			
			<br>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>