<?php

include ("verif.php");
include ("bdconnexion.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Profil</title>
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

				$varpseudo=$_SESSION["pseudo"];
				$query= "SELECT idEtudiant, email, age, prenom, nom, Nomecole FROM Etudiants WHERE pseudo='".$varpseudo."';";

				$result = mysqli_query(connectDB(), $query);
				$ligne = $result->fetch_assoc();

				echo '
				<span class="login100-form-title">
					Bonjour '  .$ligne["prenom"]. '!
				</span>';

				echo '</br></br>
				Age: '.$ligne['age']. ' ans </br>
				Email: '.$ligne['email']. '</br>
				Ecole: '.$ligne['Nomecole']. ' </br></br>
				';

				$query_props= "SELECT * FROM Proposer where idEtudiant='".$ligne['idEtudiant']."';";
				$result = mysqli_query(connectDB(), $query_props);

				echo '<strong> Vous avez proposé les cours suivants:  </strong></br>';
				$i=0;
				while ($cours_propose = $result->fetch_assoc())
				{
					echo    ' --' .$cours_propose['nomMatiere']. ' </br>';
					$i++;
				}


				$query_suivre= "SELECT * FROM Suivre where idEtudiant='".$ligne['idEtudiant']."';";
				$resultat = mysqli_query(connectDB(), $query_suivre);

				echo '</br><strong>Vous Suivez les cours suivants:  </strong></br>';
				$n=0;
				while ($cours_suivi = $resultat->fetch_assoc())
				{
					echo ' --'.$cours_suivi['nomMatiere']. ' proposé par ' .$cours_suivi['etuprof']. ' </br>';
					$n++;
				}
				echo '</br>
				Total cours proposés:  '.$i.'</br>
				Total cours suivi: '.$n.

				'<br /><br /><strong> Annuler un cours:  </strong></br>
				<form action="" method="POST" class="login100-form validate-form">
				<br /><select name=nomMatiere>
				';

				$query_tot="Select idEtudiant, nomMatiere From Proposer where idEtudiant='".$ligne['idEtudiant']."' UNION Select idEtudiant, nomMatiere from Suivre where idEtudiant='".$ligne['idEtudiant']."'";
				$resultat = mysqli_query(connectDB(), $query_tot);

				while ($cours_anul = $resultat->fetch_assoc())
				{
				echo '<option name="'.$cours_anul['nomMatiere'].'">' .htmlspecialchars($cours_anul['nomMatiere']). '</option>';
				}

				echo '

				</select>
				<input type="submit" value="Annuler" name="Annuler">
				<form class="login100-form validate-form">

				<div class="container-login100-form-btn">
				<button class="login100-form-btn" formaction="deconnexion.php">
					Déconnexion
				</button>
				</div>

				<div class="text-center p-t-12">
				 <a class="txt2" href="Choisis.php">
					 Revenir au menu principale
					 <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
				 </a>
				</div>

				</form>

				</div>
			</div>
		</div>
	</div>
	';


if ((isset($_POST['Annuler'])))
{
	$query_anul= "DELETE FROM Proposer where idEtudiant='".$ligne['idEtudiant']."' AND nomMatiere='".$_POST["nomMatiere"]."';";
	$query_canc= "DELETE FROM Suivre where idEtudiant='".$ligne['idEtudiant']."' AND nomMatiere='".$_POST["nomMatiere"]."';";
	$result = mysqli_query(connectDB(), $query_anul);
	$result = mysqli_query(connectDB(), $query_canc);

	// Recharger la page
	echo "Cours Annulé";
	header ('Location: profil.php');
}

 ?>



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
