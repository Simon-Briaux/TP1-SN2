<?php
session_start();

include "BDD.php";
include "Fonction.php";

Deconnexion();
Verif();

// Vérification de la soumission du formulaire de mise à jour
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Traitement de la mise à jour des informations de l'utilisateur
    if (isset($_POST['update']) && isset($_POST['id']) && isset($_POST['field']) && isset($_POST['newValue'])) {
        $userId = $_POST['id'];
        $field = $_POST['field'];
        $newValue = $_POST['newValue'];

        // Requête SQL UPDATE pour mettre à jour le champ de l'utilisateur
        $updateQuery = "UPDATE user SET $field = :newValue WHERE id = :id";
  

        try {
            $stmt = $BasePDO->prepare($updateQuery);
            $stmt->bindParam(':newValue', $newValue);
            $stmt->bindParam(':id', $userId);
            $stmt->execute();
            echo "L'utilisateur avec l'ID $userId a été mis à jour avec $field = $newValue.";
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}

// Requête SQL SELECT pour obtenir tous les utilisateurs
$query = "SELECT * FROM user";

try {
    // Exécuter la requête
    $result = $BasePDO->query($query);

    // Vérifier si la requête a réussi
    if ($result) {
        // Afficher les résultats dans un tableau
        echo "<h2>Liste des utilisateurs</h2>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Pseudo</th><th>Mot de passe</th><th>Admin</th></tr>";

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td><span class='editable' data-id='" . $row['id'] . "' data-field='pseudo'>" . $row['pseudo'] . "</span></td>";
            echo "<td><span class='editable' data-id='" . $row['id'] . "' data-field='MDP'>" . $row['MDP'] . "</span></td>";
            echo "<td>" . $row['admin'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "La requête a échoué.";
    }
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
<script>
document.addEventListener('click', function(event) {
    const target = event.target;
    if (target.classList.contains('editable')) {
        const userId = target.getAttribute('data-id');
        const field = target.getAttribute('data-field');
        const newValue = prompt('Nouvelle valeur pour ' + field + ' :', target.innerText);
        if (newValue !== null) {
            // Envoyer la mise à jour au serveur
            const formData = new FormData();
            formData.append('id', userId);
            formData.append('field', field);
            formData.append('newValue', newValue);

            fetch('Update.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                alert(data);  // Afficher la réponse du serveur
                if (data.startsWith('L\'utilisateur')) {
                    target.innerText = newValue;
                }
            })
            .catch(error => console.error('Erreur :', error));
        }
    }
});
</script>
