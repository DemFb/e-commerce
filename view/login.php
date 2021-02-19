<?php  
session_start();
require_once '../controllers/loginCtrl.php';
require_once '../layout/header.php';
?>
<body>
    <div id="container-login">
        <div class="block-login">
            <div class="login">
                <form name="mon-formulaire1" action="login.php" method="post">
                    <p class="labele">
                    Votre prénom :<br />
                    </p>
                    <input type="text" name="firstname" value="" />
                    <br />
                    <p class="labele">
                    Votre nom :<br />
                    </p>
                    <input type="text" name="lastname" value="" />
                    <br />
                    <p class="labele">
                    Votre email :<br />
                    </p>
                    <input type="text" name="email" value="" />
                    <br />
                    <p class="labele">
                    Votre mot de passe :<br />
                    </p>
                    <input type="password" name="password" value="" />
                    <br />
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
                    <p class="labele">
                    Votre email :<br />
                    
                    </p>
                    <input type="email" name="loginEmail" value="" />
                    <br />
                    <p class="labele">
                    Votre mot de passe :<br />
                    </p>
                    <input type="password" name="loginPassword" value="" />
                    <br />
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