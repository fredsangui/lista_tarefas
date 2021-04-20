<?php

    require_once("db_class.php");// conexão com o BD e classe de acesso.

    $nome = $_POST["usuario"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];

    $usuario = Usuarios::usuarios_parametros($nome, $telefone, $email); //retorna objeto da classe usuarios
    $usuario->inserir();
    require_once("cad_usuarios.php");
?>