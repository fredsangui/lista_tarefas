<?php

?>
<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Cadastrar Tarefa</title>
		
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
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
              
                <li><a href="cad_usuarios.php">Usuarios</a></li>
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-4">
	    		<h3>Cadastrar Tarefa</h3>

				<div id="mensagem"></div>
                				
	    		<br />
				<form class="formCadastro" id ="formTarefas" >
					<div class="form-group">
						<select id="sel_usuario" class="form-control" name="sel_usuario" required= "requiored">
                        <option value="" disabled selected>Selecione o Usuário</option>
                        </select>
					</div>

					<div class="form-group">
						<input type="text" class="form-control" id="data_ini" onfocus="(this.type = 'date')" name="data_ini" placeholder="Data de inicio da tarefa" required="requiored">
					</div>

                    <div class="form-group">
						<input type="text" class="form-control" id="data_fin" onfocus="(this.type = 'date')" name="data_fin" placeholder="Data para conclusão da tarefa">
					</div>
					
					<div class="form-group">
						<textarea class="form-control"type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição da Tarefa" required="requiored" maxlength="254"></textarea>
					</div>
					<div class="input-group form-group ">
                        
                        <button type="submit" class="btn btn-primary" id="salvar"> Salvar  </button>
                        
                        <button type="button" class="btn btn-danger" id="cancelar" >Cancelar</button>
                        
                    </div>
				</form>

			</div>
			<div class="col-md-4"><h4><a href="lista_tarefas.php">Buscar Tarefas</a></h4></div>
			<div class="col-md-4"></div>

			<div class="clearfix"></div>
			<br />
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>

		</div>
		
		
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <script>

        $(document).ready(function(){
            //apaga formulario
            function apaga_form(){
                $('#sel_usuario').val('');
                $('#data_ini').val('');
                $('#data_fin').val('');
                $('#descricao').val('');
            }

            //disponibilisa lista de usuarios para select.
            $.ajax({
            url: 'busca_usuarios.php',
                success: function(data){
                    if(data == 0){
                        alert('Erro ao registrar evento no DB.');
                    }
                    if(data != '0'){
                        //alert(data);
                        $("#sel_usuario").html(data);            
                    };
                }
            });

            $("#salvar").click(function(){
                var nome = $('#sel_usuario').val();
                var data_ini = $('#data_ini').val();
                var data_fin = $('#data_fin').val();
                var descricao = $('#descricao').val();
                if(nome == '' || data_ini.length == 0 ||data_fin.length == 0 || descricao.length == 0){
                    alert('Todos os campos precisam ser preenchidos.');
                    return true;
                }
                formDados = $('#formTarefas').serialize();
                //alert(formDados);
                
                $.ajax({
                    url: 'registra_tarefa.php',
                    method: 'POST',
                    data: formDados,
                    success: function(data){
                        $('#mensagem').html(data);
                    }
                })
                apaga_form()
                return false;
            });

            $('#cancelar').click(function(){
                apaga_form();
            })
            
        })
        
        </script>
	
	</body>
</html>