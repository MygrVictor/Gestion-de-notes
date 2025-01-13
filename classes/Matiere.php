<?php
abstract class Matiere {
    protected $nomMatiere;
    protected $codeMatiere;
    protected $bareme;

    public function __construct($nomMatiere, $codeMatiere, $bareme) {
        $this->nomMatiere = $nomMatiere;
        $this->codeMatiere = $codeMatiere;
        $this->bareme = $bareme;
    }

    public function getNomMatiere() {
        return $this->nomMatiere;
    }

    public function getCodeMatiere() {
        return $this->codeMatiere;
    }
    public function getBareme() {
        return $this->bareme;
    }

    abstract public function validerNote($valeurnote): bool;
}
?>