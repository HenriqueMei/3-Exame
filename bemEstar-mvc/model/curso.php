<?php
class Curso {
    public  
        $idCurso,
        $nome;
    
    public function __construct($idCurso, $nome) {
        $this->idCurso = $idCurso;
        $this->nome = $nome;
    }
}
?>