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
    <title>Ajouter une matière</title>
</head>
<body>
    <h1>Ajouter une matière</h1>
    <form action="traitementMatiere.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">    
    <label for="nomMatiere">Nom de la matière : </label>
        <input type="text" id="nomMatiere" name="nomMatiere" required>
<label for="bareme">Bareme de la matière : </label>
<input type="number" id="bareme" name="bareme">
        <label for="codeMatiere">Code de la matière : </label>
        <input type="text" id="codeMatiere" name="codeMatiere" required>

        

        <button type="submit">Ajouter la matière</button>
    </form>
</body>
</html>