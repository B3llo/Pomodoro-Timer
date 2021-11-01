<?php 

    if(!isset($_SESSION)) {
        session_start();
    }

    session_destroy();

    header("Location: /ADS/Pomodoro/Login/login.php");

?>