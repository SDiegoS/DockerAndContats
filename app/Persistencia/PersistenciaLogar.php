<?php

require_once './app/Persistencia/Persistencia.php';
require_once './app/Model/ModelLogin.php';

class PersistenciaLogar extends Persistencia
{

    /**
     *
     * @var Persistencia
     */
    protected $oConexao;

    /**
     *
     * @var ModelLogin
     */
    protected $ModelLogin;

    function getOConexao()
    {
        return $this->oConexao;
    }

    function getModelLogin()
    {
        return $this->ModelLogin;
    }

    function setOConexao($oConexao)
    {
        $this->oConexao = $oConexao;
    }

    function setModelLogin($ModelLogin)
    {
        $this->ModelLogin = $ModelLogin;
    }

    public function executa($sSQL)
    {
        $this->conecta();
        $oResult = pg_query($this->getOConexao(), $sSQL);

        $this->desconecta();

        return $oResult;
    }

    function login()
    {
        /* consulta a tabela do banco username, senha e dados */
        $verifica = ("SELECT * FROM tbusuarios WHERE usunome = '" . $this->ModelLogin->getSUsername() . "' AND ususenha = '" . $this->ModelLogin->getSSenha() . "'");
        $QueryUsuario = $this->executa($verifica);
        $aRetorno = [];

        while ($oResultado = pg_fetch_array($QueryUsuario)) {
            $aRetorno[] = $oResultado;
        }
        return $aRetorno;
    }

}
