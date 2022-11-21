<?php
class Exame {
    public 
        $idExame,
        $idPaciente,
        $idUsuario,
        $data,
        $colesterol,
        $pressao,
        $glicemia;
    
    public function __construct(
        $idExame, $idPaciente, $idUsuario,
        $data, $colesterol, $pressao,
        $glicemia
    ) {
        $this->idExame = $idExame;
        $this->idPaciente = $idPaciente;
        $this->idUsuario = $idUsuario;
        $this->data = $data;
        $this->colesterol = $colesterol;
        $this->pressao = $pressao;
        $this->glicemia = $glicemia;
    }
}
?>