<?php 

    include('private.php');

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <h2>Login efetuado com sucesso</h2> <?php echo $_SESSION['nome']; ?></h2>
    <br><br><br><br><br>
    <a href="/ADS/Pomodoro/Timer/pomo.php">Timer</a>
    <a href="logout.php"><h2>Sair</h2></a>
</body>
</html>