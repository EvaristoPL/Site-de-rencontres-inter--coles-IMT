<?php

function connectDB() {
	$mdp='';
	$dbname='table';

	$bd = mysqli_connect('localhost', 'root', $mdp, $dbname);
	return $bd;
}


?>
