<p>
    Veuillez inserer votre adresse mail :
</p>

<form action="mail.php" method="post">
<p>
    <input type="text" name="email" />
    <input type="submit" value="Valider" />
</p>
</form>
<?php

include ("bdconnexion.php");

if (isset($_POST["email"])) {

$query = "SELECT * FROM `Etudiants` WHERE email='".$_POST["email"]."';";
$result=mysqli_query(connectDB(), $query);
$recup = $result->fetch_assoc();

//le Message
$message = 'Bonjour M.' .$recup["nom"]. ',<br /> Vous avez demandé une récuperation de vos identifiants <br /> votre pseudo: '.$recup["pseudo"].'<br /> Codialement, ';

//Le titre
$titre = "Récupération de votre pseudo!";

mail($_POST['email'], $titre, $message);

echo '
<p><strong>Un mail vient de vous être envoyé </strong></p>
<p>Cliquez <a href="login.php">ici</a> pour revenir</p>';


}
?>
