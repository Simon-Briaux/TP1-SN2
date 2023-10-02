
<?php Session_start();

include "BDD.php";
if(isset($_POST["connexionSubmit"])){


    $requete = "SELECT * FROM user";
$resultat = $connexion->query($requete);
if ($resultat === false) {
    die("Erreur d'exécution de la requête : " . $connexion->error);
}

// Afficher les données récupérées
while ($ligne = $resultat->fetch_assoc()) {
    echo "ID : " . $ligne["id"] . "<br>";
    echo "pseudo : " . $ligne["pseudo"] . "<br>";
    echo "mdp : " . $ligne["MDP"] . "<br>";
    echo "admin : " . $ligne["admin"] . "<br>";
    // Ajoutez ici d'autres colonnes que vous souhaitez afficher
    echo "<br>";
}

}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page </title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<nav>
  <ul>
    <li><a href='#'>Ajouter un User</a></li>
    <li><a href="#">Modifier un User</a></li>
    <li><a href="#">Supprimer un User</a></li>    
  </ul>
</nav>
</body>

</html>
<script src="index.js"></script>