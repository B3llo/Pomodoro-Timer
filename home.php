<?php 

include('private.php');
    
$src = "https://avatars.dicebear.com/api/gridy/" . $_SESSION['usuario'] . ".svg";
$mins = 0;
$secs = 5;

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

        <script type="text/javascript">

            let start = 0;

			function countDown(mins,secs) {
				
				var secelem = document.getElementById("sec");
    			secelem.innerHTML = (secs < 10 ? "0":"") +  secs;
				var minelem = document.getElementById("min");
				minelem.innerHTML = (mins < 10 ? "0":"") +  mins + ": ";
				
				
                if(secs < 1) {
                    console.log(mins, secs);
					if(mins < 1) {
                        alert("O tempo acabou, hora de dar um descanso de 5 minutinhos!")
                        mins = 25;
                        secs = 0;
                        start = 0;
					    clearTimeout(timer);
                        <?php if($mins < 1 && $secs < 1) { $mins = 25; $secs = 0;} ?>
				    }
			    	else if (mins < 1)
					{
                        mins = 0;
					}
                        secs = 60;
                        mins--;
				}

				secs--;

                if(start == 1) {
				    setTimeout(function(){countDown(mins,secs);},1000);
                }
                
			}

            function startTimer() {
                start = 1;
                countDown(<? echo $mins; ?>,<? echo $secs; ?>);
            }

		</script>

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
                    <div id="min"><? echo $mins; ?> </div>
		             <div id="sec"><? echo $secs; ?> </div>
                </div>

                <script type="text/javascript">countDown(<? echo $mins; ?>,<? echo $secs; ?>);</script>

                <div class="new_cicle"  >
                    <span onClick="startTimer();">Iniciar Novo Ciclo</span>    
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

