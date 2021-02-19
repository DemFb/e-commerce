<?php 
session_start();
require_once '../layout/header.php'; 
?>
  <body>
  <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span>King Burger<span class="glyphicon glyphicon-cutlery"></span></h1>
  <div class="container admin">
    <div class="row">
      <h1><strong>Liste des produits </strong></h1><a href="insert.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>
      <table class="table table-stripped table-bordered">
        <thread>
          <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Catégorie</th>
            <th>Actions</th>
          </tr>
        </thread>
        <tbody>
           <?php
          require 'database.php';
          $db = DatabaseAdmin::connect();
          $statement = $db->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id ORDER BY items.id DESC');
          //récupère toutes les lignes et renvoie le résultat sous forme de tableau associatif
          while($item = $statement->fetch()){
            echo '<tr>';
            echo '<td>' . $item['name'] . '</td>';
            echo '<td>' . $item['description']. '</td>';
            echo '<td>' .number_format((float) $item['price'],2, '.', '') .'</td>';
            echo '<td>' .$item['category']. '</td>';
            echo '<td width=300>';
            echo '<a class="btn btn-default" href="view.php?id=' .$item['id'].'"><span class="glyphicon glyphicon-eye-open"></span>Voir</a>';
            echo '  ';
            echo '<a class="btn btn-primary" href="update.php?id='.$item['id'].'"><span class="glyphicon glyphicon-pencil"></span>Modifier</a>';
            echo '  ';
            echo '<a class="btn btn-danger" href="delete.php?id='.$item['id']. '"><span class="glyphicon glyphicon-remove"></span>Supprimer</a>';
            echo '</td>';
            echo '</tr>';
          }
          DatabaseAdmin::disconnect();
          ?>
        </tbody>
      </table>
    </div>
  </div>
  </body>
</html>