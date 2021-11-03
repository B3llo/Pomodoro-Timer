<?php 

include('private.php');
    
$src = "https://avatars.dicebear.com/api/gridy/" . $_SESSION['usuario'] . ".svg";

$seconds = 0;
$minutes = 0;

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <div class="container">

        <div class="progress">
            <span class="extremes" >0%</span>
            <div class="progress_bar"></div>
            <span class="extremes" >100%</span>
        </div>

        <div class="main">
            <div class="left">

                <div class="profile">
                    <div class="avatar">
                        <img src="<?php echo $src; ?>" width="50px" id="avatar">
                    </div>
                    <?php echo("<strong class='usr'>" . $_SESSION['usuario'] . "</strong>"); ?> 
                </div>

                <div class="completedChallenges">
                    <div>
                        Desafio Completos 
                    </div> 
               


                </div>

                <div id="timer">
                    <span id="min">25</span>:<span id="sec">00</span>
                </div>
                <div class="new_cicle"  >
                    Iniciar Novo Ciclo     
                    <img src="next.png" width="30px" id="next"> 
                </div>
                

            </div>

            <div class="right">
                <div class="new_task">
                
                </div>      
            </div>
        </div>

    </div>
    <div class="logout">
        <a href="logout.php">Sair</a>
    </div>
</body>
</html>

