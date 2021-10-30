<?php

/**
 * Description of Persistencia
 *
 * @author diego.santos
 */

class Persistencia
{

    protected $oConexao;

    function getOConexao()
    {
        return $this->oConexao;
    }

    function setOConexao($oConexao)
    {
        $this->oConexao = $oConexao;
    }

    public function getConexao()
    {

        $dbHost = getenv('DB_HOST');
        $dbName = getenv('DB_NAME');
        $dbPort = getenv('DB_PORT');
        $dbUser = getenv('DB_USER');
        $dbPassword = getenv('DB_PASSWORD');

        $sConexao = "host=$dbHost
                     port=$dbPort
                     dbname=$dbName
                     user=$dbUser
                     password=$dbPassword";

        return $sConexao;
    }


    public function conecta()
    {
        $this->setOConexao(pg_connect($this->getConexao()));
    }

    public function desconecta()
    {
        return pg_close($this->oConexao);
    }

}
