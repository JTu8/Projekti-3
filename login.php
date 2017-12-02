<!DOCTYPE HTML>
<html>
	<head>
		<title>Kalastusrekisteri</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" type="text/css" href="projekti.css">
		<script src="login.js"></script>
	</head>
	<body>
		<div class="w3-container">
			<h1><center>Tervetuloa</center></h1>
			<h3><center>Klikkaa kirjaudu sisään-painiketta ja pääset sisään palveluun</center></h3>
		</div>
		
		<div style="text-align:center;">
			<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Kirjaudu sisään</button>
		</div>
		
		<div id="id01" class="modal">
			
			<form class="modal-content animate" action="checklogin.php" method="post">
				<div class="imgcontainer">
					<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Sulje modaali">&times;</span>
					
				</div>
				<div class="container">
					<label><b>Käyttäjänimi</b></label>
					<input type="text" placeholder="Syötä käyttäjätunnus" name="kayttajatunnus" required>
					
					<label><b>Salasana</b></label>
					<input type="password" placeholder="Syötä salasana" name="salasana" required>
					
					<button type="submit" name="kirjaudu">Kirjaudu sisään</button>
					
				</div>
				<div class="container" style="background-color:#f1f1f1">
					<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Keskeytä</button>
				</div>
			</form>
		</div>
		
		<div class="mySlides w3-display-container w3-center">
			<img src="kuva1.jpeg" style="width:100%">
		</div>
	</body>
</html>