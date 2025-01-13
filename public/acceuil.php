<?php
require_once '../includes/Database.php';
require_once '../classes/GestionNotes.php';

$gestionNotes = new GestionNotes();

$etudiants = $gestionNotes->getEtudiants();
$matieres = $gestionNotes->getMatieres();
$notes = $gestionNotes->getNotes();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des étudiants, matières et notes</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Gestion des Étudiants, Matières et Notes</h1>
    </header>

    <main>

        <section>
            <h2>Liste des Étudiants</h2>
            <ul>
                <?php foreach ($etudiants as $etudiant): ?>
                    <li>
                        <?php echo htmlspecialchars($etudiant['nom']) . ' ' . htmlspecialchars($etudiant['prenom']) . ' - ' . htmlspecialchars($etudiant['matricule']); ?>
                        <ul>
                            <?php
                            $etudiantNotes = array_filter($notes, function ($note) use ($etudiant) {
                                return $note['id_etudiant'] === $etudiant['id'];
                            });
                            ?>
                            <?php if (empty($etudiantNotes)): ?>
                                <li>Aucune note disponible</li>
                            <?php else: ?>
                                <?php foreach ($etudiantNotes as $note): ?>
                                    <li>
                                        Matière : <?php echo htmlspecialchars($note['nomMatiere']); ?> -
                                        Note : <?php echo htmlspecialchars($note['valeurNote']); ?>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
            <a href="ajoutNote.php">Ajouter une Note</a> <br>
            <a href="ajoutEtudiant.php">Ajouter un étudiant</a>
        </section>

        <section>
            <h2>Liste des Matières</h2>
            <ul>
                <?php foreach ($matieres as $matiere): ?>
                    <li><?= htmlspecialchars($matiere['nomMatiere']) ?></li>
                <?php endforeach; ?>
            </ul>
            <a href="ajoutMatiere.php">Ajouter une Matière</a>
        </section>

    </main>
</body>

</html>