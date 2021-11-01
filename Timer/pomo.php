<?php 

    include('../private.php');
    $src = "https://avatars.dicebear.com/api/gridy/" . $_SESSION['usuario'] . ".svg";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="pomo.css">
    <title>Pomodoro</title>
</head>
<body>

    <div class="container">
        <div class="profile">
            <div class="avatar">
                <img src="<?php echo $src; ?>" width="50px" id="avatar">
            </div>
            <?php echo("<strong class='usr'>" . $_SESSION['usuario'] . "</strong>"); ?> 
        </div>
    </div>
    <a href="../home.php">Home</a>
</body>
</html>