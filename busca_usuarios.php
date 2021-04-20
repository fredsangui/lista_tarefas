<?php
    session_start();
    include_once("db_class.php");

    if(!isset($_SESSION['usuario'])){
        echo '<option value="" disabled selected>Selecione o Usuário</option>';
    }
    

    $usuario = new usuarios();
    if($resultado = $usuario->get_usuarios('')){
        while($opcao = mysqli_fetch_array($resultado)){
            if($opcao[0]== $_SESSION['usuario']){
                echo  '<option selected>' . $opcao[1] . '</option>';
            }
            echo  '<option>' . $opcao[1] . '</option>';
        }
    }

?>