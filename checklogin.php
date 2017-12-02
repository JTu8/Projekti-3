<?php
	session_start();
	
	require_once("db.inc");
	
	function GetData($data) {
		
		$muuttuja = NULL;
		if (isset($_POST[$data])) {
			
			$muuttuja = $_POST[$data];
			
		}
		
		return $muuttuja;
	}
	
	if (isset($_POST["kirjaudu"])) {
		
		$kayttajatunnus = GetData("kayttajatunnus");
		$salasana = GetData("salasana");
		$tunnustyyppi = GetData("tunnustyyppi");
		$vastaus_status = GetData("vastaus_status");
		$kysely_id = GetData("kysely_id");
		$kysymykset_id = GetData("kysymykset_id");
		
		
		$kayttajatunnus = stripslashes($kayttajatunnus);
		$salasana = stripslashes($salasana);
		//$kayttajatunnus = mysqli_real_escape_string($kayttajatunnus);
		//$salasana = mysqli_real_escape_string($salasana);
		
		$query = "SELECT * FROM tunnus WHERE tunnus = '$kayttajatunnus' AND salasana = '$salasana'";
		$sql = "SELECT * FROM kysymykset WHERE kysely_id LIKE '$kysely_id'";
		
		
		$tulos = mysqli_query($conn, $query);
		$tulos2 = mysqli_query($conn, $sql);
		
		$count = mysqli_fetch_array($tulos);
		
		if ($count['tunnustyyppi'] == 'vastaaja' && $count["vastaus_status"] == 'ei vastannut') {
			
			if (!$tulos2) {
				
				echo "ID:n lähetys epäonnistui" .mysqli_error($conn);
			}
			else {
				
				$_SESSION['kysymykset_id'] = $_POST["kysymykset_id"];
			}
			$_SESSION['kayttajatunnus'] = $_POST["kayttajatunnus"];
			
			header("location:kyselylomake.html");
		}
		
		elseif ($count['tunnustyyppi'] == 'admin') {
			
			$_SESSION['kayttajatunnus'] = $_POST["kayttajatunnus"];
			header("location:admin_page.php");
		}
		
		else {
			
			echo "Väärä käyttäjätunnus/salasana, tai olet jo vastannut kyselyyn";
		}
		
		
		
		
		
		
		
	}
?>
<html>
	<head>
		<title>Kalastusrekisteri</title>
	</head>
	<body>
		<p><a href="login.php">Takaisin</a></p>
	</body>
</html>