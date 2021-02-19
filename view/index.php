<?php 

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require_once '../models/product.php';
require_once '../layout/header.php';
require_once '../controllers/loginCtrl.php';

$productManager = new Products();
?>

<body>
  <div class="container site">
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span>King Burger<span class="glyphicon glyphicon-cutlery"></span></h1>

        <?php
        /*
        require '../admin/database.php';
        */
        echo '<nav>';
        echo '<ul class="nav nav-pills">';
        $categories = $productManager->show_categorie();
        foreach($categories as $category){
            if($category['id'] == '1'){
            echo ' <li role="presentation" class="active"><a href="#' .$category['id']. '" data-toggle="tab">'.$category['name'].'</a></li> ';
            }
            else{
            echo ' <li role="presentation" ><a href="#' .$category['id']. '" data-toggle="tab">'.$category['name'].'</a></li> ';
         
            }
        }
        ?> 
        <a href="logout.php"> <button> Déconnecter</button> </a>
       <?php 

        if($_SESSION['status']  == 1){ ?>

            <a href="../admin/index.php"> <button> Interface administrateur</button> </a>
                
       <?php } 
        echo '</ul>';
        echo '</nav>';
        echo '<div class="tab-content">';

        foreach($categories as $category){
            if($category['id'] == '1'){
                echo ' <div class="tab-pane active" id="'.$category['id']. '"> ';
                }
                else{
                    echo ' <div class="tab-pane" id="'.$category['id']. '"> ';
                }

                echo '<div class="row">';
                
                $show_product = $productManager->show_product($category);

                foreach ($show_product as $item ) {
                    echo ' <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="../assets/images/'.$item['image'].'" alt="...">
                        <div class = "price>'.number_format($item['price'],2,'.',''). ' €</div>
                        <div class="caption">
                            <h4>'.$item['name'].'</h4>
                            <p>'.$item['description'].'</p>
                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>Commande</a>
                        </div>
                        </div>
                    </div>';
                }
                echo '</div>
                </div>';
        }
        echo '</div>'
        ?>
  </div>
</body>
</html>