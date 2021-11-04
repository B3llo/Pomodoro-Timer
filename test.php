<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_GET["mins"])) {
        $mins = 25;
    }
    else {
        $mins = $_GET["mins"];
    }
    if (empty($_GET["secs"])) {
        $secs = 0;
    }
    else {
        $secs = $_GET["secs"];
    }
    }
?>
<html>
    <head>
        <title>A simple count down timer using Javascript and php</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<style>
			.clock{
            left:5%;
            margin:5px;
			}
		</style>
	</head>
	<body>
		<script type="text/javascript">
			function countDown(mins,secs) {
				
				var secelem = document.getElementById("sec");
    			secelem.innerHTML = (secs<10 ? "0":"") +  secs + " secs";
				var minelem = document.getElementById("min");
				minelem.innerHTML = (mins<10 ? "0":"") +  mins + " mins";
				
				if(secs < 1) {
					if(mins < 1) {
						clearTimeout(timer);
                        die("Time is over!");
					}
					else if (mins < 1)
					{
                        mins = 0;
					}
                    secs = 60;
                    mins--;
					
				}
				secs--;
				var timer = setTimeout(function(){countDown(mins,secs);},1000);
			}
		</script>
		<div  class="btn-group btn-group-justified clock" role="group" aria-label="Justified button group">
		  <div id="min" class="btn btn-default" role="button"><? echo $mins; ?> mins</div>
		  <div id="sec" class="btn btn-success" role="button"><? echo $secs; ?> secs</div>
		</div>
		<script type="text/javascript">countDown(<? echo $mins; ?>,<? echo $secs; ?>);</script>
        <form class="form-inline" role="form" method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div class="form-group">
                <label for="mins">Minutes</label>
                <input value = "<? echo $mins; ?>" name="mins"  type="number" class="form-control" id="mins" placeholder="Minutes">
            </div>
            <div class="form-group">
                <label for="secs">Seconds</label>
                <input value = "<? echo $secs; ?>" name="secs" type="number" class="form-control" id="secs" placeholder="Seconds">
            </div>
            <button type="submit" class="btn btn-info">Set new timer</button>
        </form>
	</body>
</html>
