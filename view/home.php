<?php  
session_start();
require '../layout/header.php'; 
require '../controllers/loginCtrl.php';
?>

<body>
<?php   
			if($_SESSION['status']  == 1){
				echo " JE SUIS ADMIN CHACAL";
			} else{
				echo "JE SUIS USERS LIFE IS A BITCH";
			}

?>

</body>
</html>