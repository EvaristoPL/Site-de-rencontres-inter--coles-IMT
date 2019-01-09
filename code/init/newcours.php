<?php
include ("verif.php");
include ("bdconnexion.php");
?>
<p>
    Proposer un nouveau cours.<br />
    Veuillez taper le nom du cours :
</p>

<form action="newcours.php" method="post">
<p>
    <input type="text" name="newcours" />
    <input type="submit" value="Valider" />
</p>
</form>

<?php
if (isset($_POST["newcours"])) {
$sql = "INSERT INTO `Matieres` (`nomMatiere`) VALUES ('".$_POST["newcours"]."');";
mysqli_query(connectDB(), $sql);
header ('Location: partage.php');
}
 ?>
