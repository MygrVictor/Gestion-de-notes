<?php
require_once '../includes/Database.php';
require_once '../classes/GestionNotes.php';
require_once '../classes/Note.php';
session_start();

if (isset($_POST['idEtudiant'], $_POST['idMatiere'], $_POST['valeurNote'])) {
    $idEtudiant = trim($_POST['idEtudiant']);
    $idMatiere = trim($_POST['idMatiere']);
    $valeurNote = trim($_POST['valeurNote']);

    if ($idEtudiant && $idMatiere && $valeurNote !== false) {
        $note = new Note($idEtudiant, $idMatiere, $valeurNote);
        $gestionNotes = new GestionNotes();

        if ($gestionNotes->attribuerNote($note)) {
            $_SESSION['message'] = "Note attribuée avec succès!";
            header('Location: acceuil.php');
            exit();
        } else {
            $_SESSION['message'] = "Erreur lors de l'attribution de la note.";
        }
    } else {
        $_SESSION['message'] = "Veuillez remplir tous les champs.";
    }
} else {
    $_SESSION['message'] = "Données du formulaire manquantes.";
}

header('Location: ajoutNote.php');
exit();
?>