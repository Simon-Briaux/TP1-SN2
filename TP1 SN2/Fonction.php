<?php
function Deconnexion(){
    if (isset($_POST['Exit'])) {
        session_unset();
        session_destroy();
        }
}
function Verif(){
    if ((empty($_SESSION['id'])) || (empty($_SESSION['pseudo'])) || (empty($_SESSION['MDP']))) {
        header('Location: connexion.php');
    }
}
?>
 <h1> <b>Logitok<b></h1>