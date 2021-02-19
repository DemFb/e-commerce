<?php
session_start();
require_once 'database.php';


require_once '../models/admin.php';

require_once '../layout/header.php'; 

$deleteManagers = new Admin();

if(!empty($_GET['id'])){
    $id = checkInput($_GET['id']);
}
if(!empty($_POST)){
    $id = checkInput($_POST['id']);

    // $deleteManagers->delete();
    $db = DatabaseAdmin::connect();
    $statement = $db->prepare("DELETE FROM items WHERE id = ?");
    $statement->execute(array($id));

    DatabaseAdmin::disconnect();
    header("Location: index.php");
}

function checkInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


  <body>
  <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span>King Burger<span class="glyphicon glyphicon-cutlery"></span></h1>
  <div class="container admin">
    <div class="row">
        <div class="col-sm-6">
           <h1><strong>Supprimer un produit </strong></h1>
           <br>
           <form class="form" role = "form" action="<?php echo 'delete.php?id=' .$id; ?>" method="post" >
           <input type="hidden" name="id" value="<?php echo $id;?>"/>
           <p class="alert alert-warning"> Etes vous sur de vouloir supprimer ce produit?</p>
            <div class="form-actions">
                <button type="submit" class="btn btn-warning">Oui</button>
                <a class="btn btn-default" href="index.php"> Non</a>
             </div>
        </form>
        </div>
     </div>
    </body>
</html>
           