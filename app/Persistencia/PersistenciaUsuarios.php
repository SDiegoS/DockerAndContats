<?php

/**
 * Description of PersistenciaUsuarios
 *
 * @author diego.santos
 */
require_once './app/Persistencia/Persistencia.php';
require_once './app/Model/ModelUsuarios.php';

class PersistenciaUsuarios extends Persistencia
{

    /**
     *
     * @var Persistencia
     */
    protected $oConexao;

    /**
     *
     * @var ModelUsuarios
     */
    protected $ModelUsuario;

    public function lista()
    {
        $oRetorno = $this->executa('SELECT * FROM tbusuarios WHERE usutipo=2 ORDER BY usucodigo');
        $aResultado = [];

        while ($aRes = pg_fetch_array($oRetorno, NULL, PGSQL_ASSOC)) {
            $oCliente = new ModelUsuarios();
            $oCliente->setCodigo($aRes['usucodigo']);
            $oCliente->setNome($aRes['usunome']);
            $oCliente->setCpf($aRes['usucpfcnpj']);
            if ($aRes['usutipo'] == 1) {
                $oCliente->setTipo('Administrador');
            } else if ($aRes['usutipo'] == 2) {
                $oCliente->setTipo('Cliente');
            }

            $aResultado[] = $oCliente;
        }
        return $aResultado;
    }

    public function listaCodigo($codigo)
    {
        $oRetorno = $this->executa('SELECT * FROM tbusuarios '
            . 'WHERE usucodigo=' . $codigo);
        $aResultado = [];

        while ($aRes = pg_fetch_array($oRetorno, NULL, PGSQL_ASSOC)) {
            $oCliente = new ModelUsuarios();
            $oCliente->setCodigo($aRes['usucodigo']);
            $oCliente->setNome($aRes['usunome']);
            $oCliente->setCpf($aRes['usucpfcnpj']);

            $aResultado[] = $oCliente;
        }
        return $aResultado;
    }

    public function exclui()
    {
        //delete from tbusuario;
        $this->executa("delete from tbusuarios where usucodigo = " . $this->ModelUsuario->getCodigo());
    }

    public function altera()
    {
        $this->executa("update tbusuarios set usunome = '" . $this->ModelUsuario->getNome() . "',"
            . " usucpfcnpj = '" . $this->ModelUsuario->getCpf() . "' "
            . " where usucodigo = " . $this->ModelUsuario->getCodigo());
    }

    //Getter e Setter
    public function getModelUsuario()
    {
        return $this->ModelUsuario;
    }

    public function setModelUsuario($ModelUsuario)
    {
        $this->ModelUsuario = $ModelUsuario;
    }

}
