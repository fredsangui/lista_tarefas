<?php
    require_once("db_class.php");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }
    $usuario = new Usuarios;
    $resultado = $usuario->apaga_usuario($id);
    
?>