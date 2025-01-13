<?php
require_once '../includes/Database.php';
require_once '../classes/GestionNotes.php';
require_once '../classes/Etudiant.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Erreur CSRF");
    }

    if (isset($_POST['nom'], $_POST['prenom'], $_POST['matricule'])) {
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $matricule = trim($_POST['matricule']);
        
        $etudiant = new Etudiant($nom, $prenom, $matricule);
        $gestionNotes = new GestionNotes();

        if ($gestionNotes->ajouterEtudiant($etudiant)) {
            header('Location: acceuil.php');
            exit();
        
}}}
?>