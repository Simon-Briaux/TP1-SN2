<?php
session_start();	// Nous connect à la base de donnee
include "BDD.php";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="main.css">

</head>
<body class="bodyCo">
    <?php
    if(isset($_POST["connexionSubmit"])){
        if(!empty($_POST["pseudo"]) && !empty($_POST["MDP"])){

            $pseudo = $_POST["pseudo"];
            $MDP = $_POST["MDP"];
            $req = "INSERT INTO `user`(`pseudo`, `MDP`) VALUES (??)";
            $RequeteStatement = $BasePDO->query($req);
            
            $userData = $RequeteStatement->fetch();
            if(!empty($userData['pseudo']) && !empty($userData['MDP'])){
                $_SESSION['id'] = $userData['id'];
                $_SESSION['pseudo'] = $userData['pseudo'];
                $_SESSION['MDP'] = $userData['MDP'];
                header("Location: index.php");
                echo"l'utisateur a ete ajouter avec succes";

            }else{
                echo "echec d'ajout</p1>";
            }
           
        }
    }    
    ?>
    <H1>Connexion </H1>
    <div class="formulaire">
        <form action="" id="login-form" method="post">
            <h2 style="text-align:center;">Login</h2>
            <div class="group-form">
               <input type="text" class="fat" name="pseudo" id="pseudo" required>
               <label for="pseudo">first name</label>
            </div>
            <div class="group-form">
                <input type="password"   class="fat" name="MDP" id="MDP" required>
                <label for="MDP" class="text-info">Password</label>
            </div>
            <div class="group-form">
                <input type="submit" name="connexionSubmit" value="Connexion" class="fat">
            </div>
           
        </form>
    </div>

    
</body>
</html>
<!--
 if(isset($_POST["inscriptionSubmit"])){
        if(!empty($_POST["pseudo"]) && !empty($_POST["MDP"])){

            $Pseudo = $_POST["pseudo"];
            $mdp = $_POST["MDP"];
            #"Admin"

            $req = "INSERT INTO User (pseudo,MDP,admin) VALUES ('".$pseudo."','".$MDP."','".$admin."'))";
            $RequeteStatement = $BasePDO->query($req);
            
            if($RequeteStatement){
                if($RequeteStatement->errorCode()=='00000'){
                    header("Location: index.php");
            }
        }
    }
}    
    ?>
    <H1>Inscription </H1>
    <div class="formulaire">
        <form action="" method="post" class="formConnexion">
            <h3 style="text-align:center;">Register</h3>
        <div class="form-example">
                <label for="Pseudo">Pseudo : </label>
                <input type="text" name="Pseudo" id="Pseudo" required>
            </div>
            <div class="form-example">
                <label for="mdp">Mot de passe : </label>
                <input type="password" name="mdp" id="mdp" required>
            </div>
            <div class="form-example">
                <input type="submit" name="inscriptionSubmit" value="S'inscrire" class="btnConnexion">
            </div>

            <div class="form-example">
                <a href="connexion.php">Retour</a>
            </div>
        </form>
    </div>
-->