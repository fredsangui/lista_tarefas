<?php
    require_once('db_class.php');

    if(!isset($_POST['sel_usuario']) or !isset($_POST['data_ini']) or !isset($_POST['data_fin']) or !isset($_POST['descricao'])) 
        exit;
    
    $nome = $_POST['sel_usuario'];
    $data_ini = $_POST['data_ini'];
    $data_fim = $_POST['data_fin'];
    $descricao = $_POST['descricao'];
    //echo 'retornando ' . $nome . '<br>'.$data_ini.'<br>'.$data_fin.'<br>'. $descricao;

    $tarefa = new Tarefas;

    //Casa haja variavel de sesseion - atualiza registro
    if(isset($_SESSION['id'])){
        $tarefa->atualiza_tarefa($_SESSION['id'] ,$nome, $data_ini, $data_fim, $descricao);//$usuario pode ser nome ou id
        unset($_SESSION['usuario']);
        unset($_SESSION['id']);
        unset($_SESSION['tarefa']);
        unset($_SESSION['descricao']);
        unset($_SESSION['dini']);
        unset($_SESSION['dfim']);
    }else{
        $tarefa->inserir($nome, $data_ini, $data_fim, $descricao);
    }
    
    exit;
?>