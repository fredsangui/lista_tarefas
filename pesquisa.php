<thead style='color:blue'>
  <tr>
	<th>Usuário</th>
	<th>Descricao</th>
	<th>D.Inicial</th>
    <th>D.Final<th>
  </tr>
</thead>

<?php
	$busca = $_POST['buscar'];
    $botoes = "<ul class=\"list-inline m-0\"> <li class=\"list-inline-item\"> <button class=\"btn btn-success btn-sm rounded-0\" type=\"button\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"Edit\"><i class=\"fa fa-edit\"></i></button></li>"
    ."<li class=\"list-inline-item\"> <button class=\"btn btn-danger btn-sm rounded-0\" type=\"button\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"\" data-original-title=\"Delete\"><i class=\"fa fa-trash\"></i></button></li></ul>";
	include_once('db_class.php');
	
	$tarefa = new Tarefas;
	$lista = $tarefa->get_tarefas($busca);
	echo '<br><tbody>';
    echo '</tbody>';
	//var_dump($lista);
    if($lista){
        while($linha = mysqli_fetch_array($lista, MYSQLI_ASSOC)){
            //echo "<a href='#' class='list-group-item'>";
            echo '<tr>';
            echo "<th>".$linha['nome']." </th>";
            echo "<th>".$linha['descricao']." </th>";
            echo "<th>".$linha['dini']." </th>";
            echo "<th>".$linha['dfim']." </th>";
            echo '<th></th>';
            echo "<th>".'<a href="#" class="btn btn-primary a-btn-slide-text editar" id="edita'.$linha['tarefa'].'">
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            <span><strong>Edit</strong></span>            
            </a><a href="#" class="btn btn-danger a-btn-slide-text apagar" id="apaga'.$linha['tarefa'].'">
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
 