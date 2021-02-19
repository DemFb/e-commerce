<?php 
	// connect to the database
class Database {

  protected $db;
  public function __construct() {
        try {
        $this->db = new PDO('mysql:host=2eurhost.com;port=3306;dbname=eurh_group6', 'eurh_group6', 'uPk6u5FEQcguQj3');
        } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
        }
	}
	
  public function __destruct() {
    $this->db = NULL;
  }
}
