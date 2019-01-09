<?php
session_start();
include ("bdconnexion.php");

	//Message qui sera affiché à la fin
    $message='';

    if (empty($_POST["pseudo"]) || empty($_POST["password"]) ) //Au cas où on Oublie d'un champ

    {

        $message = '<p><strong>Vous devez remplir tous les champs</strong></p>
    <p>Cliquez <a href="./index.html">ici</a> pour revenir</p>'; //Retourner à la page d'acceuil

    }

    else //On check le mot de passe

    {
			// On récupère le mdp de l'useur avec son pseudo
			  $varpseudo=$_POST["pseudo"];
				$query= "SELECT pwd, idEtudiant, pseudo, prenom FROM Etudiants WHERE pseudo='".$varpseudo."';";
				$result = mysqli_query(connectDB(), $query);
				$ligne = $result->fetch_assoc();


    if ($ligne["pwd"] == (md5($_POST["password"]))) // Acces OK !
    {
//Si acces ok, je crée les variables de session afin de pouvoir les utiliser dans tout le programme

				$_SESSION['pseudo'] = $ligne["pseudo"];
        $_SESSION['id'] = $ligne["idEtudiant"];
				$_SESSION['prenom']=$ligne["prenom"];

				header('Location: Choisis.php');

        $message = '<p>Bienvenue '.$ligne['prenom'].',

            vous êtes maintenant connecté!</p>
            <p>Cliquez <a href="./deconnexion.php">Deconnexion</a>
            pour se deconnecter</p>';//Appel du fichier deconnexion

    }

    else // Acces pas OK !

    {



        $message = '<p>Une erreur s\'est produite

        pendant votre identification.<br /><strong> Le mot de passe ou le pseudo

            entré n\'est pas correcte.</strong></p><p>Cliquez <a href="./login.php">ici</a>

        pour revenir à la page précédente

        <br /><br /></a>

        </p>';
    }
    }
    echo $message.'</div></body></html>';

?>
