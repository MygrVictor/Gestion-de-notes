<?php
class Matieresur20 extends Matiere {

public function __construct($nomMatiere, $codeMatiere,) {
        parent::__construct($nomMatiere, $codeMatiere, 20);
    }



    public function validerNote($valeurnote): bool {
        return $valeurnote >= 0 && $valeurnote <= 20;
    }
}