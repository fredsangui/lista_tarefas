<?php
    require_once("db_class.php");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    $tarefa = new Tarefas;
    $resultado = $tarefa->apaga_tarefa($id);
    if($resultado){
        echo 'O registro foi excluido.';
    }else{
        echo 'Falha ao excluir registro.';
    }
?>