<?php
include ("verif.php");
//Connexion à la bd
include ("bdconnexion.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Suivre votre cours</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="table-center">

<?php

$bd=connectDB();
$request= "SELECT nomMatiere, creneau, Proposer.Niveau, pseudo, prenom, nom, email FROM `Proposer`, `Etudiants` WHERE Proposer.idEtudiant=Etudiants.idEtudiant and Proposer.nomMatiere='".$_GET["cours"]."';";
$res = mysqli_query($bd, $request);

echo '
<span class="login100-form-title">'
	.htmlspecialchars($_GET["cours"]).'
</span>
';

while ($cours_dispo = $res->fetch_assoc())
{
	  $pseudoprof= htmlspecialchars($cours_dispo['prenom']);
	echo 'Proposé par: ' .$cours_dispo['prenom'].' ' .htmlspecialchars($cours_dispo['nom']). '<br /> Créneau: '.htmlspecialchars($cours_dispo['creneau']). ' <br />Niveau du cours : ' .htmlspecialchars($cours_dispo['Niveau']).'

	<form class="login100-form validate-form">

		<div class="container-login100-form-btn">
			<button class="login100-form-btn" formaction="casa.php">
				Choisir ce cours
			</button>
		</div>
		<input type="hidden" name="choisi" value="'.$pseudoprof.'" />
	</form>
	';
}
$_SESSION['cours']=$_GET["cours"];

?>

				<form class="login100-form validate-form">
					<br />
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" formaction="deconnexion.php">
							Déconnexion
						</button>
					</div>

					<div class="text-center p-t-12">
					 <a class="txt2" href="suivre.php">
						 Choisir un autre cours
						 <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
					 </a>
					</div>


				</form>
				</div>
			</div>
		</div>
	</div>





<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
