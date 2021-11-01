<?php

/**
 * Description of PersistenciaUsuarios
 *
 * @author diego.santos
 */
require_once './app/Persistencia/Persistencia.php';
require_once './app/Model/ModelContatos.php';

class PersistenciaContatos extends Persistencia
{
    /**
     *
     * @var Persistencia
     */
    protected $oConexao;

    /**
     * @var ModelContatos
     */
    protected $ModelContatos;

    public function lista()
    {
        $aUsuario = unserialize($_SESSION['usuario']);
        $oRetorno = $this->executa('SELECT * FROM tbcontato WHERE usucodigo=' . $aUsuario[0]['usucodigo'] . ' ORDER BY concodigo');
        $aResultado = [];

        while ($aRes = pg_fetch_array($oRetorno, NULL, PGSQL_ASSOC)) {
            $oContato = new ModelContatos();
            $oContato->setICodigo($aRes['concodigo']);
            $oContato->setSEmail($aRes['conemail']);
            $oContato->setITelefone($aRes['contelefone']);
            $oContato->setITipoContato($aRes['contipo']);

            $aResultado[] = $oContato;
        }
        return $aResultado;
    }

    public function listaCodigo($codigo)
    {
        $oRetorno = $this->executa('SELECT * FROM tbcontato '
            . 'WHERE concodigo=' . $codigo);
        $aResultado = [];

        while ($aRes = pg_fetch_array($oRetorno, NULL, PGSQL_ASSOC)) {
            $oContato = new ModelContatos();
            $oContato->setICodigo($aRes['concodigo']);
            $oContato->setSEmail($aRes['conemail']);
            $oContato->setITelefone($aRes['contelefone']);
            $oContato->setITipoContato($aRes['contipo']);

            $aResultado[] = $oContato;
        }
        return $aResultado;
    }

    public function inserir()
    {
        $exesql = $this->executa("insert into tbcontato (conemail, contelefone, contipo, usucodigo) 
                                values ('" . $this->ModelContatos->getSEmail() . "', "
            . $this->ModelContatos->getITelefone() . ", "
            . $this->ModelContatos->getITipoContato() . ", "
            . $this->ModelContatos->getICodigoUsuario() . ");");

        echo"<script  type='text/javascript'>console.log(". $exesql .");</script>";
        if ($exesql) {
            echo"<script  type='text/javascript'>alert('Cadastrado com Sucesso!');</script>";
        } else {
            echo"<script  type='text/javascript'>alert('Erro no Cadastrado!');</script>";
        }
    }

    public function altera()
    {
        $this->executa("update tbcontato set conemail = '" . $this->ModelContatos->getSEmail() . "',"
            . " contelefone = " . $this->ModelContatos->getITelefone() . ","
            . " contipo = " . $this->ModelContatos->getITipoContato()
            . " where concodigo = " . $this->ModelContatos->getICodigo());
    }

    public function exclui()
    {
        //delete from tbcontato;
        $this->executa("delete from tbcontato where concodigo = " . $this->ModelContatos->getICodigo());
    }

    //Getter e Setter

    /**
     * @return mixed
     */
    public function getModelContatos()
    {
        return $this->ModelContatos;
    }

    /**
     * @param mixed $ModelContato
     */
    public function setModelContato($ModelContatos): void
    {
        $this->ModelContatos = $ModelContatos;
    }
}