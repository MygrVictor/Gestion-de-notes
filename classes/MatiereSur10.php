<?php
class Matieresur10 extends Matiere {

public function __construct($nomMatiere, $codeMatiere,) {
        parent::__construct($nomMatiere, $codeMatiere, 10);
    }



    public function validerNote($valeurnote): bool {
        return $valeurnote >= 0 && $valeurnote <= 10;
    }
    
}