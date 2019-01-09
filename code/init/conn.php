<?php
include ("verif.php");
include ("bdconnexion.php");


$request= "INSERT INTO `Proposer` (`Niveau`, `Creneau`, `idEtudiant`, `nomMatiere`) VALUES ('".$_GET["niveau"]."', '".$_GET["creneau"]."', '".$_SESSION['id']."', '".$_GET["cours"]."'	);";
$res = mysqli_query(connectDB(), $request);

if ($res) {
			echo 'vous avez proposé un cours de '.$_GET["cours"].' avec succès';
      echo '<br /><p>Cliquez <a href="./Choisis.php">ici</a>

  pour revenir au menu principale

  <br /><br /></a>

  </p>';

		} else {
			echo "Vous avez déjà proposé ce cours";
      echo '<br /><p>Cliquez <a href="./Choisis.php">ici</a>

  pour revenir au menu principale

  <br /><br /></a>

  </p>';
		}

?>
