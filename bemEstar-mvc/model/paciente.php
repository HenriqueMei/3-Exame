<?php
class Paciente {
    public 
        $idPaciente, $nome, $sexo,
        $endereco, $bairro, $complemento,
        $cep, $cidade, $uf,
        $nascimento, $telefone, $email,
        $peso, $altura, $fuma,
        $bebe, $hipertensao, $diabete,
        $doencaCardiaca, $outrasDoencas, $medicacao;
    
    public function __construct(
        $idPaciente, $nome, $sexo,
        $endereco, $bairro, $complemento,
        $cep, $cidade, $uf,
        $nascimento, $telefone, $email,
        $peso, $altura, $fuma,
        $bebe, $hipertensao, $diabete,
        $doencaCardiaca, $outrasDoencas, $medicacao
    ) {
        $this->idPaciente = $idPaciente;
        $this->nome = $nome;
        $this->sexo = $sexo;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->complemento = $complemento;
        $this->cep = $cep;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->nascimento = $nascimento;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->peso = $peso;
        $this->altura = $altura;
        $this->fuma = $fuma;
        $this->bebe = $bebe;
        $this->hipertensao = $hipertensao;
        $this->diabete = $diabete;
        $this->doencaCardiaca = $doencaCardiaca;
        $this->outrasDoencas = $outrasDoencas;
        $this->medicacao = $medicacao;
    }
}
?>