<?php 

    if(!isset($_SESSION)) {
        session_start();
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Login efetuado com sucesso</h2> <?php echo $_SESSION['nome']; ?></h2>
</body>
</html>