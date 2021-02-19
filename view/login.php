<?php  
session_start();
require '../controllers/loginCtrl.php';
require '../layout/header.php'; 
?>
<body>
    <div id="container-login">
        <div class="block-login">
            <div class="login">
                <form name="mon-formulaire1" action="login.php" method="post">
                    <p>
                    Votre prénom :<br />
                    <input type="text" name="firstname" value="" />
                    </p>
                    <p>
                    Votre nom :<br />
                    <input type="text" name="lastname" value="" />
                    </p>
                    <p>
                    Votre email :<br />
                    <input type="text" name="email" value="" />
                    </p>
                    <p>
                    Votre mot de passe :<br />
                    <input type="password" name="password" value="" />
                    </p>
                    <p>
                    <input type="submit" value="Envoyer"/>
                    <input type="reset" value="Annuler" />
                    </p>
                </form>
            </div>
        </div>
        <div class="block-login">
            <div class="login">
            <form name="mon-formulaire1" action="login.php" method="post">
                    <p>
                    Votre email :<br />
                    <input type="email" name="loginEmail" value="" />
                    </p>
                    <p>
                    Votre mot de passe :<br />
                    <input type="password" name="loginPassword" value="" />
                    </p>
                    <p>
                    <input type="submit" value="Envoyer" />
                    <input type="reset" value="Annuler" />
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>