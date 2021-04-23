<thead style='color:blue'>
  <tr>
	<th>Nome</th>
	<th>Email</th>
	<th>Telefone</th>
  </tr>
</thead>

<?php
    include_once('db_class.php');
	$busca = $_POST['buscar'];
	
	$tarefa = new Usuarios;
	$lista = $tarefa->get_usuarios($busca);
	echo '<br><tbody>';
    echo '</tbody>';
	//var_dump($lista);
    if($lista){
        while($linha = mysqli_fetch_array($lista, MYSQLI_ASSOC)){
            //echo "<a href='#' class='list-group-item'>";
            echo '<tr>';
            echo "<th>".$linha['nome']." </th>";
            echo "<th>".$linha['email']." </th>";
            echo "<th>".$linha['telefone']." </th>";
            echo '<th></th>';
            echo "<th>".'</a><a href="#" class="btn btn-danger a-btn-slide-text apagar" id="apaga'.$linha['id'].'">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            <span><strong>Delete</strong></span>            
            </a>'. "</th>";
            echo '</tr>';

            //echo '<tr>';
        }
    }else{
        echo 'Erro ao acessar o Bando de Dados';
    }
	

	echo '</tbody>';
?>
 