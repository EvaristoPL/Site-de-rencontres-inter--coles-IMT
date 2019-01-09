<?php
include("bdconnexion.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Inscription</title>
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


				<form action="" method="POST" class="login100-form validate-form">
					<span class="login100-form-title">
						Inscription
					</span>


					<div class="wrap-input100 validate-input" data-validate = "Nom is required" >
						<span class=class="login100-form-title">Nom</span>
						<input class="input100" type="text" name="nom" placeholder="Nom">
						<span class="focus-input100"></span>
						<span class="symbol-input100"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Prénom is required">
						<span class=class="login100-form-title">Prénom</span>
						<input class="input100" type="text" name="prenom" placeholder="Prénom">
						<span class="focus-input100"></span>
						<span class="symbol-input100"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Age is required" >
						<span class=class="login100-form-title">Age</span>
						<input class="input100" type="text" name="age" placeholder="Age">
						<span class="focus-input100"></span>
						<span class="symbol-input100"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Classe is required" >
						<span class=class="login100-form-title">Niveau</span>
						<input class="input100" type="text" name="classe" placeholder="Niveau">
						<span class="focus-input100"></span>
						<span class="symbol-input100"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class=class="login100-form-title">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span> Mot de passe </span>
						<input class="input100" type="password" name="pwd" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span>Confimer le mot de passe </span>
						<input class="input100" type="password" name="c_pwd" placeholder="Confirmer le Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Pseudo is required" >
						<span class=class="login100-form-title">Pseudo</span>
						<input class="input100" type="text" name="pseudo" placeholder="Pseudo">
						<span class="focus-input100"></span>
						<span class="symbol-input100"></span>
						</span>
					</div>
					<select class="input100" name=Nomecole>



<?php
					$query= "SELECT * FROM `Ecole`";
					$result = mysqli_query(connectDB(), $query);

					while ($ecoles = $result->fetch_assoc())
					{
						echo '<option class="input100" name="'.$ecoles['NomEcole'].'">' .htmlspecialchars($ecoles['NomEcole']). '</option>';
					}

?>

</select>
</div>
					<div class="container-login100-form-btn">

						<input type="submit" value="Creer" name="Creer">

					</div>



					<div class="table-center">
						<a class="table-center" href="login.php">
							Connecter ton compte
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>

	<?php
		if (isset($_POST['Creer']))
		{
			
			if ($_POST['pwd']==$_POST['c_pwd']) {


			$mdp_hash=md5($_POST['pwd']);
			$sql = "INSERT INTO `Etudiants` (`nom`, `prenom`,`age`,`Niveau`,`email`,`pwd`,`pseudo`,`NomEcole`) VALUES ('".$_POST["nom"]."', '".$_POST["prenom"]."', '".$_POST["age"]."', '".$_POST["classe"]."', '".$_POST["email"]."', '".$mdp_hash."', '".$_POST["pseudo"]."', '".$_POST["Nomecole"]."' );";
			$requete = mysqli_query(connectDB(), $sql);

			if ($requete)
			{
		  echo "Soyez bienvenue, connectez-vous";
			}
		  else
			 {
			echo 'Une erreur est survenue, veuillez ressayer';
			echo '<p><strong>Vous devez remplir tous les champs</strong></p>';
		  }
		}
		else {
			echo "Le Mot de passe et la confirmation du mot de passe sont différentes";
		}
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
