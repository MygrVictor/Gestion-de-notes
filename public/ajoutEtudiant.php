<?php
require_once '../includes/Database.php';
require_once '../classes/GestionNotes.php';
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un étudiant</title>
</head>
<body>
    <h1>Ajouter un étudiant</h1>
    <form action="traitementEtudiant.php" method="POST">
    
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <label for="nom">Nom : </label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom : </label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="matricule">Matricule : </label>
        <input type="text" id="matricule" name="matricule" required>

        <button type="submit">Ajouter l'étudiant</button>
    </form>
</body>
</html>