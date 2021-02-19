<?php 
require 'server.php';

    class Products extends Database {

        function show_product(){ 
            $query = $this->db->prepare('SELECT * FROM categories');
            $query->execute();
            return $query->fetchAll();
        }

        function show_categorie($category){
            $query = $this->db->prepare('SELECT * FROM items WHERE items.category = ?');
            return $query->execute(array($category['id']));
        }
    }
?>