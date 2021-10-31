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

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getITipoUsuario()
    {
        return $this->iTipoUsuario;
    }

    /**
     * @param mixed $iTipoUsuario
     */
    public function setITipoUsuario($iTipoUsuario): void
    {
        $this->iTipoUsuario = $iTipoUsuario;
    }

    /**
     * @return mixed
     */
    public function getICPFCNPJ()
    {
        return $this->iCPFCNPJ;
    }

    /**
     * @param mixed $iCPFCNPJ
     */
    public function setICPFCNPJ($iCPFCNPJ): void
    {
        $this->iCPFCNPJ = $iCPFCNPJ;
    }

    /**
     * @return mixed
     */
    public function getISenha()
    {
        return $this->iSenha;
    }

    /**
     * @param mixed $iSenha
     */
    public function setISenha($iSenha): void
    {
        $this->iSenha = $iSenha;
    }
    




}