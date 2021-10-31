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
    protected $ModelContato;

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
            if ($aRes['contipo'] == 1) {
                $oContato->setITipoContato('Email');
            } else if ($aRes['contipo'] == 2) {
                $oContato->setITipoContato('Cliente');
            }

            $aResultado[] = $oContato;
        }
        return $aResultado;
    }

    //Getter e Setter

    /**
     * @return mixed
     */
    public function getModelContato()
    {
        return $this->ModelContato;
    }

    /**
     * @param mixed $ModelContato
     */
    public function setModelContato($ModelContato): void
    {
        $this->ModelContato = $ModelContato;
    }
}