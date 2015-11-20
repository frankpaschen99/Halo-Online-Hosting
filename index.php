<?php
	session_start();
	if (!isset($_SESSION['logged-in'])) $_SESSION['logged-in'] = false;
	if (!isset($_SESSION['user-name'])) $_SESSION['user-name'] = null;
?>

<!-- HTML5 -->
<!DOCTYPE html>

<html>

	<!--
		Sorry the code is so shoddy. The PHP is even worse. I have 0 experience when
		it comes to web development, and I'm running a 1-man show here. No need to 
		fear, my platform is 72.6% secure, albeit counterintuitive. 
		
		~Frank
	-->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Halo Online Dedicated Server Hosting</title>
		
		<script type="text/javascript">
		<!-- JQuery for scaling the wallpaper ... still doesnt fucking work right -->
		$(window).load(function() {    
			var theWindow        = $(window),
			$bg              = $("#bg"),
			aspectRatio      = $bg.width() / $bg.height();

			function resizeBg() {
				if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
					$bg
					.removeClass()
					.addClass('bgheight');
				} else {
					$bg
					.removeClass()
					.addClass('bgwidth');
				}
			}

			theWindow.resize(resizeBg).trigger("resize");
		});
		</script>
	</head>
	
	<body>
		<img draggable="false" src="img/background.png" id="bg" alt="">
		
		<div id="username">
				<?php $username = $_SESSION['user-name']; if(isset($_SESSION['user-name'])) echo "<p style='color:#FFF; font-size:16px;'>Logged in as $username</p>"; else echo "<p style='color:#FFF; font-size:16px;'>Not logged in. Sign in <a href='log_in.php' style='color:#3498db'>here.</a></p>"; ?>
		</div>
		
		<div id="wrapper">
			
			<!-- plans -->
			<div id="plans" class="inline">
				<a href="#"><h1>PLANS</h1></a>
			</div>
			
			<!-- log in/log out -->
			<?php if ($_SESSION['logged-in'] == 1) echo "<div id='login' class='inline'>
				<a href='log_out.php'><h1>LOG OUT</h1></a>
			</div>"; else echo "<div id='login' class='inline'>
				<a href='log_in.php'><h1>LOGIN</h1></a>
			</div>" ?>
			
			<!-- register -->
			<div id="register" class="inline">
				<a href="register.php"><h1>REGISTER</h1></a>
			</div>
			
			<!-- ACP -->
			<div id="acp" class="inline">
				<a href="adminpanel/controlpanel.php"><h1>ACP</h1></a>
			</div>
		</div>
		<footer class="noselect"><p style="position:fixed; bottom:0; width:100%; color:#FFF; text-align: center;">Created with love by <a href=http://github.com/frankpaschen99>Frank Paschen</a></p></footer>
	</body>
</html>