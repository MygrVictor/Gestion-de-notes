<?php

require_once '../includes/Database.php';
require_once '../classes/GestionNotes.php';
session_start();

$gestionNotes = new GestionNotes();
$etudiants = $gestionNotes->getEtudiants();
$matieres = $gestionNotes->getMatieres();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attribuer une Note</title>
</head>
<body>
    <h1>Attribuer une Note à un Étudiant</h1>

    <form action="traitementNote.php" method="POST">
        <label for="idEtudiant">Choisir un étudiant :</label>
        <select id="idEtudiant" name="idEtudiant" required>
            <option value="">-- Sélectionner un étudiant --</option>
            <?php foreach ($etudiants as $etudiant): ?>
                <option value="<?= htmlspecialchars($etudiant['id']) ?>"><?= htmlspecialchars($etudiant['nom']) . " " . htmlspecialchars($etudiant['prenom']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="idMatiere">Choisir une matière :</label>
        <select id="idMatiere" name="idMatiere" required>
            <option value="">-- Sélectionner une matière --</option>
            <?php foreach ($matieres as $matiere): ?>
                <option value="<?= htmlspecialchars($matiere['id_Matiere']) ?>"><?= htmlspecialchars($matiere['nomMatiere']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="valeurNote">Valeur de la note :</label>
        <input id="valeurNote" type="number" name="valeurNote" min="0" max="20" required>

        <button type="submit">Attribuer la note</button>
    </form>
</body>
</html>