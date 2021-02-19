<?php 
session_start();
require '../models/user.php';
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

$managers = new Users();

if(!empty($_POST['firstname']) AND !empty($_POST['lastname']) AND !empty($_POST['email']) AND !empty($_POST['password'])){

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	

	$response = $managers->user_add($firstname, $lastname, $email, $password);
	

	if ($response) {
			echo "ça marche";
			$_SESSION['status'] = 0;
			//connection de l'utilisateur
	} else {
			echo "Erreur avec la requete";
	}
} else {
    echo "Il y a pas de données dans ton tableau";
}

if (!empty($_POST['loginEmail']) AND !empty($_POST['loginPassword'])) { // vérifie que les champs exists dans $_POST pour le login
    
	$logEmail = $_POST['loginEmail'];
	$logPassword = $_POST['loginPassword'];
    
	$res = $managers->register($logEmail);
	
	if ($res) { // Si l'email et le mot son correct
		if (password_verify($logPassword, $res->password)) {
		$_SESSION['status'] = $res->status;//status dans la base de donnée;

			header("Location: ../view/home.php");
		}
	}
}
?>