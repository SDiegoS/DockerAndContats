<?php

/**
 * Description of ModelLogin
 *
 * @author diego.santos
 */
class ModelLogin {

    private $sUsername;
    private $sEntrar;
    private $sSenha;
    private $sConteudo;
    private $aUsuarioSessao;

    /**
     * @return mixed
     */
    public function getSUsername()
    {
        return $this->sUsername;
    }

    /**
     * @param mixed $sUsername
     */
    public function setSUsername($sUsername)
    {
        $this->sUsername = $sUsername;
    }

    /**
     * @return mixed
     */
    public function getSEntrar()
    {
        return $this->sEntrar;
    }

    /**
     * @param mixed $sEntrar
     */
    public function setSEntrar($sEntrar)
    {
        $this->sEntrar = $sEntrar;
    }

    /**
     * @return mixed
     */
    public function getSSenha()
    {
        return $this->sSenha;
    }

    /**
     * @param mixed $sSenha
     */
    public function setSSenha($sSenha)
    {
        $this->sSenha = $sSenha;
    }

    /**
     * @return mixed
     */
    public function getSConteudo()
    {
        return $this->sConteudo;
    }

    /**
     * @param mixed $sConteudo
     */
    public function setSConteudo($sConteudo)
    {
        $this->sConteudo = $sConteudo;
    }

    /**
     * @return mixed
     */
    public function getAUsuarioSessao()
    {
        return $this->aUsuarioSessao;
    }

    /**
     * @param mixed $aUsuarioSessao
     */
    public function setAUsuarioSessao($aUsuarioSessao)
    {
        $this->aUsuarioSessao = $aUsuarioSessao;
    }

}
