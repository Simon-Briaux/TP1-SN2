<?php Session_start();

include "BDD.php";
include "Fonction.php";

Deconnexion();

Verif();

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
    <li><a href="Ajouter.php">Ajouter un User</a></li>
    <li><a href="Update.php">Modifier un User</a></li>
    <li><a href="delete.php">Supprimer un User</a></li>
    <li style="float: left;margin-top: 20px;">
      <form method="POST">
        <input type="submit" name="Exit" value="Se deconnecter">
      </form>
    </li>
  </ul>
</nav>
</body>

</html>
<script src="index.js"></script>