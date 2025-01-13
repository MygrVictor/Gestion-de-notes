<?php
class Note {
    private $id_etudiant;
    private $id_matiere;
    private $valeurNote;

    public function __construct($id_etudiant, $id_matiere, $valeurNote) {
        $this->id_etudiant = $id_etudiant;
        $this->id_matiere = $id_matiere;
        $this->valeurNote = $valeurNote;
    }

    public function getIdEtudiant() {
        return $this->id_etudiant;
    }

    public function getIdMatiere() {
        return $this->id_matiere;
    }

    public function getValeurNote() {
        return $this->valeurNote;
    }
}
?>