<?php 
require 'server.php';

    class Products extends Database {

        function show_categorie() {  
            $query = $this->db->prepare('SELECT * FROM categories');
            $query->execute();
            return $query->fetchAll();
        }

        function show_product($category) {
            $query = $this->db->prepare('SELECT * FROM items WHERE items.category = ?');
            $query->execute(array($category['id']));
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>