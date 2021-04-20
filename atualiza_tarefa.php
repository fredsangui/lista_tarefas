<?php
    require_once('db_class.php');
    session_start();

    $tarefa_id = $_POST['id'];
    $tarefa = new Tarefas;

    $resultado = $tarefa->get_tarefa($tarefa_id);
    if($resultado){
        $dados = mysqli_fetch_array($resultado);
        $_SESSION['id'] = $dados['id'];
        $_SESSION['usuario'] = $dados['usuario'];
        $_SESSION['descricao'] = $dados['descricao'];
        $_SESSION['dini'] = $dados['dini'];
        $_SESSION['dfim'] = $dados['dfim'];
        echo "dados da tarefa recuperados ". $_SESSION['descricao'];
    }else{
        echo 'erro ao pesquisar dados.';
    }


?>