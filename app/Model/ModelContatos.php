<?php

class ModelContatos
{
    private $iCodigo;
    private $sEmail;
    private $iTelefone;
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
    public function setICodigo($iCodigo): int
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
    public function setSEmail($sEmail): string
    {
        $this->sEmail = $sEmail;
    }

    /**
     * @return mixed
     */
    public function getITelefone()
    {
        return $this->iTelefone;
    }

    /**
     * @param mixed $iTelefone
     */
    public function setITelefone($iTelefone): int
    {
        $this->iTelefone = $iTelefone;
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
    public function setITipoContato($iTipoContato): int
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
    public function setICodigoUsuario($iCodigoUsuario): void
    {
        $this->iCodigoUsuario = $iCodigoUsuario;
    }

}