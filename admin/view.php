<?php
session_start();
   require_once 'database.php';
   require_once '../layout/header.php'; 
   if(!empty($_GET['id'])){
       $id = checkInput($_GET['id']);
   }

   $db = DatabaseAdmin::connect();
   $statement = $db->prepare('SELECT items.id, items.name, items.description, items.image, items.price, categories.name AS category FROM items LEFT JOIN categories ON items.category = categories.id WHERE items.id=?');
   $statement->execute(array($id));
   $item = $statement->fetch();
   DatabaseAdmin::disconnect();




    function checkInput($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;

   }

?>



  <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span>King Burger<span class="glyphicon glyphicon-cutlery"></span></h1>
  <div class="container admin">
    <div class="row">
        <div class="col-sm-6">
           <h1><strong>Voir un item </strong></h1>
           <br>
           <form>
               <div class="form-group">
                   <label>Nom:</label><?php echo ' ' .$item['name'];?>
                </div>
                <div class="form-group">
                   <label>Description:</label><?php echo ' ' .$item['description'];?>
                </div>
                <div class="form-group">
                   <label>Prix:</label><?php echo '<td>' .number_format((float) $item['price'],2, '.', '') . '€';'</td>';?>
                </div>
                <div class="form-group">
                   <label>Catégorie:</label><?php echo ' ' .$item['category'];?>
                </div>
                <div class="form-group">
                   <label>Image:</label><?php echo ' ' .$item['image'];?>
                </div>
           </form>
           <br>

        <div class="form-actions">
             <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
        </div>
        </div>
            <div class="col-sm-6 site">
                <div class="thumbnail">
                    <img src="<?php echo '../images/' . $item['image'];?>" alt="...">
                    <div class="price"> <?php echo number_format((float) $item['price'],2, '.', '') . '€' ; ?></div>
                    <div class="caption">
                        <h4><?php echo $item['name']; ?></h4>
                        <p><?php echo $item['description'];?></p>
                         <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>Commande</a>
                    </div>
                </div>
            </div>
  
  </div>
</div>
  </body>
</html>