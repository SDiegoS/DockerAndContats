<?php

/**
 * Description of ModelUsuarios
 *
 * @author diego.santos
 * 
 */
class ModelUsuarios {

    private $codigo;
    private $nome;
    private $dataNasc;
    private $cpf;
    private $tipo;


    //Getter e Setter    
    function getCodigo() {
        return $this->codigo;
    }

    function getNome() {
        return $this->nome;
    }

    function getDataNasc() {
        return $this->dataNasc;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getEmail() {
        return $this->email;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getEndcodigo() {
        return $this->endcodigo;
    }

    function getEndnumero() {
        return $this->endnumero;
    }

    function getEndcidade() {
        return $this->endcidade;
    }

    function getEndbairro() {
        return $this->endbairro;
    }

    function getEndrua() {
        return $this->endrua;
    }

    function getEndcomplemento() {
        return $this->endcomplemento;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDataNasc($dataNasc) {
        $this->dataNasc = $dataNasc;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setEndcodigo($endcodigo) {
        $this->endcodigo = $endcodigo;
    }

    function setEndnumero($endnumero) {
        $this->endnumero = $endnumero;
    }

    function setEndcidade($endcidade) {
        $this->endcidade = $endcidade;
    }

    function setEndbairro($endbairro) {
        $this->endbairro = $endbairro;
    }

    function setEndrua($endrua) {
        $this->endrua = $endrua;
    }

    function setEndcomplemento($endcomplemento) {
        $this->endcomplemento = $endcomplemento;
    }

}
