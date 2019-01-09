<?php
include ("verif.php");
include ("bdconnexion.php");

// Insertion du message à l'aide d'une requête préparée
$req = "INSERT INTO `chat` (`pseudo`,`message`) VALUES ('".$_SESSION["pseudo"]."', '".$_POST['message']."');";

$res = mysqli_query(connectDB(), $req);
// Redirection du visiteur vers la page du minichat
header('Location: chat.php');
?>
