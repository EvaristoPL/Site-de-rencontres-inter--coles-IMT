<?php
include ("verif.php");
//Connexion à la bd
include ("bdconnexion.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Partager un cours</title>
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
				<form class="login100-form validate-form">


					<span class="login100-form-title">
						Partager un cours
						</span>
<?php
					$bd=connectDB();
					$query= "SELECT * FROM Matieres";
					$result = mysqli_query($bd, $query);

					echo '
					<div class=class="login100-form-title">
					Le nom de cours:
						<select class="input100" name="cours">	';

					while ($matieres = $result->fetch_assoc())
					{
						echo '<option class="input100" name="'.$matieres['nomMatiere'].'">' .$matieres['nomMatiere']. '</option>';
					}
	?>

		</select>
	</div>



					<div class=class="login100-form-title">
					Niveau de cours:
					<select class="input100" name="niveau">
						<option class="input100" value="debutant">debutant</option>
						<option class="input100" value="intermediaire">intermediaire</option>
						<option class="input100" value="avance">avance</option>
						</select>

					</select>

					</div>

					<div data-validate = "Créneau is required" >
						<div class=class="login100-form-title">Créneau</div>
						<input class="input100" name="creneau" placeholder="Créneau/Local">
						<span class="focus-input100"></span>
						</span>
					</div>



					<div class="container-login100-form-btn">
						<button class="login100-form-btn" formaction="conn.php">
							Confirmer votre partage
						</button>
					</div>

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

						<div class="text-center p-t-12">
							<a class="txt2" href="newcours.php">
								Proposer un nouveau cours
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
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
