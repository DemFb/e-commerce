<?php 
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

require '../models/user.php';
require '../layout/header.php';
require '../models/product.php';

$productManager = new Products();
?>

<body>
  <div class="container site">
    h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span>King Burger<span class="glyphicon glyphicon-cutlery"></span></h1>

        <?php
        require '../admin/database.php';
        echo '<nav>';
        echo '<ul class="nav nav-pills">';
        $categories = $productManager->show_product();
                foreach($categories as $category){
                    if($category['id'] == '1'){
                    echo ' <li role="presentation" class="active"><a href="#' .$category['id']. '" data-toggle="tab">'.$category['name'].'</a></li> ';
                    }
                    else{
                    echo ' <li role="presentation" ><a href="#' .$category['id']. '" data-toggle="tab">'.$category['name'].'</a></li> ';
                    }
                }
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
                
                $show_categorie = $productManager->show_categorie($category);

                while($item = $show_categorie->fetch()){
                    echo ' <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img src="images/'.$item['image'].'" alt="...">
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