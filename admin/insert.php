<?php
session_start();
require_once 'database.php';
require_once '../layout/header.php'; 

$nameError = $priceError = $imageError = $categoryError = $name = $price = $image = $category = $description = $descriptionError = '';

function checkInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

if(!empty($_POST)){
    $name = checkInput($_POST['name']);
    $description = checkInput($_POST['description']);
    $price = checkInput($_POST['price']);
    $category = checkInput($_POST['category']);
    $image = checkInput($_FILES['image']['name']);
    $imagePath = '../images/' . basename($image);
    $imageExtension = pathinfo($imagePath, PATHINFO_EXTENSION);
    $isSuccess = true;
    $isUploadSuccess = false;

    if(empty($name)){
        $nameError = 'Ce champ ne peut pas etre vide';
        $isSuccess = false;
    }

    if(empty($description)){
        $descriptionError = 'Ce champ ne peut pas etre vide';
        $isSuccess = false;
    }

    if(empty($price)){
        $priceError = 'Ce champ ne peut pas etre vide';
        $isSuccess = false;
    }

    if(empty($category)){
        $categoryError = 'Ce champ ne peut pas etre vide';
        $isSuccess = false;
    }

    if(empty($image)){
        $imageError = 'Ce champ ne peut pas etre vide';
        $isSuccess = false;
    }
    else{
        $isUploadSuccess = true;
        if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif"){
            $imageError = "les fichiers autorisés sont : .jpg, .jpeg, .png, .gif";
            $isUploadSuccess = false;
        }

        if($_FILES["image"]["size"] > 500000){
            $imageError = "le fichier ne doit pas dépasser les 500KB";
            $isUploadSuccess = false;
        }

        if($isUploadSuccess){
            if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)){
                $imageError = "Il y'a eu une erreur lors du téléchargement du fichier";
                $isUploadSuccess = false;
            }
        }
    }

    if ($isSuccess && $isUploadSuccess){
        $db = DatabaseAdmin::connect();
        $statement = $db->prepare("INSERT INTO items (name,description,price,category,image) values (?,?,?,?,?)");
        $statement->execute(array($name,$description,$price,$category,$image));
        DatabaseAdmin::disconnect();
        header("Location: index.php");
    }


    
}
?>

  <body>
  <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span>King Burger<span class="glyphicon glyphicon-cutlery"></span></h1>
  <div class="container admin">
    <div class="row">
        <div class="col-sm-6">
           <h1><strong>Ajouter un produit </strong></h1>
           <br>
           <form class="form" action="insert.php" method="post" enctype="multipart/form-data">
               <div class="form-group">
                   <label for="name">Nom:</label>
                   <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name;?>">
                   <span class="help-inline"><?php echo $nameError; ?></span>
                </div>
                <div class="form-group">
                   <label for="description">Description:</label>
                   <input type="text" class="form-control" id="description" name="description" placeholder="DEscription" value="<?php echo $description;?>">
                   <span class="help-inline"><?php echo $descriptionError; ?></span>
                </div>
                <div class="form-group">
                   <label for="price">Prix: (en €)</label>
                   <input type="number" step="0.0.1" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price;?>">
                   <span class="help-inline"><?php echo $priceError; ?></span>
                </div>
                <div class="form-group">
                   <label for="category">Catégorie:</label>
                   <SELECT class="form-control" id="category" name="category">
                       <?php
                       $db = DatabaseAdmin::connect();
                       foreach($db->query('SELECT * FROM categories') as $row){
                           echo '<option value="'.$row['id']. '">' . $row['name']. '</option>';

                       }

                       DatabaseAdmin::disconnect();

                       ?>
                    </SELECT>
                   <span class="help-inline"><?php echo $categoryError; ?></span>
                </div>
                <div class="form-group">
                   <label for="image">Sélectionner une image :</label>
                   <input type="file"  id="image" name="image" >
                   <span class="help-inline"><?php echo $imageError; ?></span>
                </div>
           <br>

            <div class="form-actions">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>Ajouter</button>
                <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
             </div>
        </form>
        </div>
     </div>
    </body>
</html>
           