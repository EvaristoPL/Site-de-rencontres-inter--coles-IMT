<?php
//vérifier si l'user est connecté
include ("verif.php");
//Connexion à la bd
include ("bdconnexion.php");
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Chat IMT</title>
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

					<form action="minichat_post.php" method="post">
			        <p>
			        <label for="message">Message</label> :  <input type="text" class="input100" name="message"  /><br />

			        <input type="submit" value="Envoyer" />

			    </p>
			    </form>
<?php
$query="SELECT pseudo, message FROM chat ORDER BY IDordre DESC LIMIT 0, 10";
$res = mysqli_query(connectDB(), $query);

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $res->fetch_assoc())

{
    echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

 ?>


 <form class="login100-form validate-form">

 <div class="container-login100-form-btn">
 <button class="login100-form-btn" formaction="deconnexion.php">
	 Déconnexion
 </button>
 </div>
 </form>

 <div class="text-center p-t-12">
	 <a class="txt2" href="Choisis.php">
		 Revenir au menu principale
		 <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
	 </a>
 </div>

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
