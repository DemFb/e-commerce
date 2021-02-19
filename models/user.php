<?php 
require 'server.php';

class Users extends Database {

	function user_add($firstname, $lastname, $email, $password) {
        $query = $this->db->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
        $query->bindValue(':firstname', $firstname);
        $query->bindValue(':lastname', $lastname);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);

        return $query->execute();
    }
    
    function register($logEmail) {
        $query = $this->db->prepare("SELECT `password`, `status` FROM users WHERE `email` = :email");
        $query->bindValue(':email', $logEmail);
        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }
}
?>