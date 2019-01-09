# Site de Rencontres Inter

Notre projet consiste en une application qui favorise les échanges et l’inter-aide entre les étudiants des écoles IMT (Institut Mines Télécom), permettant de fournir une plateforme pour partager et/ou suivre des cours proposés par d'autres étudiants.

## Tester en local
Pour tester cette plateforme, "en local", il faut:

1- Créer la base de données dans phpmyadmin avec le fichier bd.sql;
2-Décompresser le fichier ZIP dans votre répertoire de travail Apache2 (par défault /var/www/html/ );
3-Ouvrir le fichier bdconnexion.php et renseigner votre mot de passe de phpmyadmin et le nom de la bd que vous venez de créer.

## Descriptif des principales fonctions du code:

### Inscription (Inscription.php)

- Vérification du remplissage du formulaire.
- Vérification de l'inexistance d'un utilisateur avec le même pseudo ou email.
- Vérification du format de l'adresse email avant l'envoi.
- Stockage de mot de passe protégé (hash).
- Ajout global d'un utilisateur dans la database.
- Liste des écoles IMT qui peuvent s'inscrire.
- Traitement de certaines erreurs.

### Connexion (login.php, Connexion.php)

- Vérification du remplissage du formulaire.
- Vérification de l'existence d'un utilisateur.
- Vérification du mot de passe.
- Création des variables de session.

### Vérification de la connexion (verif.php)

- Vérifie si l'utilisateur est bien connecté (login et mot de passe) dans le site.
- Appelle les variables de session.
- Si l'utilisateur n'est pas connecté, redirige vers la fonction de deconnexion.

### Deconnexion (deconnexion.php)

- Détruit les variables de session.
- Redirige vers la page d'accueil.

### Connexion à la bd (bdconnexion.php):

-Permet de renseigner les infomations de la bd qui seront utilisées dans l'application afin de s'y connecter.

###Menu principal (choisis.php)
Ajout d'un cours (partage.php, conn.php et newcours.php)

- Proposition d'un cours et renseignements des informations demandées.
- Vérification du remplissage de certains champs.
- Vérification de l'existence de ces matières dans la database.
- Ajout de nouveaux cours dans la database.

### Suivre un cours (suivre.php, recherche.php, casa.php)

- Récupération des matières disponibles dans la database.
- Présentation des cours proposés, "les profs", les créneaux horaires et le niveau ;
- Inscription dans l'un des cours proposés;

### Profil (profil.php)

- Informations personnelles de l'utilisateur
- Informations sur le nombre de cours proposés et le nom de ces matières.
- Informations sur le nombre de cours suivi, le nom des matières et des étudiants qui l'ont proposé.
- Annulation d'un cours que l'utilisateur a proposé de s'inscrire.

### Chat (chat.php et minichat_post.php)

- Affichage des 10 derniers messages (toutes les données sont protégées par htmlspecialchars).
- Envoi des messages dans le chat public des étudiants.

### Envoi de mail (mail.php) --incomplet
Le but de cette fonction est d'envoyer un mail au cas où l'utilisateur a oublié son pseudo et mot de passe et
lorsque d'autres étudiants s'inscrivent ou annulent l'inscription dans son cours.

- Vérification de l'existence de l'adresse mail dans la database.
- Envoi des mails.





