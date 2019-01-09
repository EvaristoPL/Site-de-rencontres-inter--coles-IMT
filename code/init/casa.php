<?php
// Connexion dans la base

include ("verif.php");
include ("bdconnexion.php");

//Pas s'inscrire dans son cours

if ($_SESSION['prenom']==$_GET['choisi']) {

  echo "Vous ne pouvais pas vous inscrire dans votre propre cours";
  echo '<br /><p>Cliquez <a href="./Choisis.php">ici</a>

pour revenir au menu principale

<br /><br /></a>

</p>';

}
else {

$request= "INSERT INTO `Suivre` (`idEtudiant`, `nomMatiere`, `etuprof`) VALUES ('".$_SESSION["id"]."', '".$_SESSION["cours"]."', '".$_GET['choisi']."');";
$res = mysqli_query(connectDB(), $request);
//Inscrit
if ($res) {
			echo 'vous vous êtes inscrit à un cours de '.$_SESSION["cours"].' avec succès';
      echo '<br /><p>Cliquez <a href="./Choisis.php">ici</a>

  pour revenir au menu principale

  <br /><br /></a>

  </p>';

		}
  //Pas inscrit
    else {
			echo "Vous êtes dejà inscrit dans ce cours";
      echo '<br /><p>Cliquez <a href="./Choisis.php">ici</a>

  pour revenir au menu principale

  <br /><br /></a>

  </p>';
		}
}
?>
