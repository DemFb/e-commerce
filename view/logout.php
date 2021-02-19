<?php 
    session_start(); //to ensure you are using same session

    header("location: /view/login.php"); //to redirect back to "index.php" after logging out
    session_destroy();  //destroy the session

?>