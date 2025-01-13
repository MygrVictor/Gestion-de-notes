<?php
require_once '../includes/Database.php';
require_once '../classes/GestionNotes.php';
require_once '../classes/Matiere.php';
require_once '../classes/Matieresur10.php';
require_once '../classes/Matieresur20.php';
session_start();

if (isset($_POST['nomMatiere'], $_POST['codeMatiere'], $_POST['bareme'])) {
    $nomMatiere = trim($_POST['nomMatiere']);
    $codeMatiere = trim($_POST['codeMatiere']);
    $bareme = trim($_POST['bareme']);
   
    $matiere = new Matiere($nomMatiere, $codeMatiere, $bareme);
    $gestionNotes = new GestionNotes();

   $gestionNotes->ajouterMatiere($matiere);
   if($bareme === 10){
    $matiere = new Matieresur10($nomMatiere, $codeMatiere, $bareme);
   }
   if($bareme === 20){
    $matiere = new Matieresur20($nomMatiere, $codeMatiere, $bareme);
   }
   }
    
        
   

?>