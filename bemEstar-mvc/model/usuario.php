<?php
class Usuario {
    public 
        $id, 
        $idCurso,
        $nome,
        $nascimento,
        $senha,
        $perfil,
        $status;
    
    public function __construct(
        $id, $idCurso, $nome,
        $nascimento, $senha, $perfil,
        $status
    ) {
        $this->id = $id;
        $this->idCurso = $idCurso;
        $this->nome = $nome;
        $this->nascimento = $nascimento;
        $this->senha = $senha;
        $this->perfil = $perfil;
        $this->status = $status;
    }
}
?>