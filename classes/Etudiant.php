<?php
require_once 'Personne.php';

class Etudiant extends Personne {
    private $matricule;

    public function __construct($nom, $prenom, $matricule) {
        parent::__construct($nom, $prenom);
        $this->matricule = $matricule;
    }

    public function getMatricule() {
        return $this->matricule;
    }
}
?>