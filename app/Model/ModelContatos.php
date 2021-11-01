<?php

class ModelContatos
{
    private $iCodigo;
    private $sEmail;
    private $sTelefone;
    private $iTipoContato;
    private $iCodigoUsuario;

    /**
     * @return mixed
     */
    public function getICodigo()
    {
        return $this->iCodigo;
    }

    /**
     * @param mixed $iCodigo
     */
    public function setICodigo($iCodigo)
    {
        $this->iCodigo = $iCodigo;
    }

    /**
     * @return mixed
     */
    public function getSEmail()
    {
        return $this->sEmail;
    }

    /**
     * @param mixed $sEmail
     */
    public function setSEmail($sEmail)
    {
        $this->sEmail = $sEmail;
    }

    /**
     * @return mixed
     */
    public function getSTelefone()
    {
        return $this->sTelefone;
    }

    /**
     * @param mixed $iTelefone
     */
    public function setSTelefone($sTelefone)
    {
        $this->sTelefone = $sTelefone;
    }

    /**
     * @return mixed
     */
    public function getITipoContato()
    {
        return $this->iTipoContato;
    }

    /**
     * @param mixed $iTipoContato
     */
    public function setITipoContato($iTipoContato)
    {
        $this->iTipoContato = $iTipoContato;
    }

    /**
     * @return mixed
     */
    public function getICodigoUsuario()
    {
        return $this->iCodigoUsuario;
    }

    /**
     * @param mixed $iCodigoUsuario
     */
    public function setICodigoUsuario($iCodigoUsuario)
    {
        $this->iCodigoUsuario = $iCodigoUsuario;
    }

}