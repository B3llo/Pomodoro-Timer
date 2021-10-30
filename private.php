<?php 

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['id'])) {
        die("<script>
                alert('Você não tem permissão para acessar essa página ⛔')
                window.location = '/t4bs7/Trabalho-4B-S07/Tela%20de%20Login/login.php';
            </script>");
    }
?>
