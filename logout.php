<?php 

    if(!isset($_SESSION)) {
        session_start();
    }

    session_destroy();

    header("Location: /t4bs7/Trabalho-4B-S07/Tela%20de%20Login/login.php");

?>