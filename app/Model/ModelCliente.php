<?php

/**
 * Description of ModelCliente
 *
 * @author diego.santos
 * 
 */
class ModelCliente{
    private $nome;
    private $iTipoUsuario;
    private $iCPFCNPJ;
    private $iSenha;
    
    function getNome() {
        return $this->nome;
    }

    function getITipoUsuario() {
        return $this->iTipoUsuario;
    }

    function getICPFCNPJ() {
        return $this->iCPFCNPJ;
    }

    function getISenha() {
        return $this->iSenha;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setITipoUsuario($iTipoUsuario) {
        $this->iTipoUsuario = $iTipoUsuario;
    }

    function setICPFCNPJ($iCPFCNPJ) {
        $this->iCPFCNPJ = $iCPFCNPJ;
    }

    function setISenha($iSenha) {
        $this->iSenha = $iSenha;
    }



}