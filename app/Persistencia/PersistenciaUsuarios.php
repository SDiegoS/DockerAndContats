<?php

/**
 * Description of PersistenciaUsuarios
 *
 * @author diego.santos
 */
require_once './app/Persistencia/Persistencia.php';
require_once './app/Model/ModelUsuarios.php';

class PersistenciaUsuarios extends Persistencia {

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

    public function executa($sSQL) {
        $this->conecta();
        $oResult = pg_exec($this->getOConexao(), $sSQL);

        $this->desconecta();

        return $oResult;
    }

    public function lista() {
        $oRetorno = $this->executa('SELECT * FROM tbusuarios '
                . ' INNER JOIN tbendereco ON tbusuarios.endcodigo=tbendereco.endcodigo WHERE usutipo=2 ORDER BY usucodigo');
        $aResultado = [];

        while ($aRes = pg_fetch_array($oRetorno, NULL, PGSQL_ASSOC)) {
            $oCliente = new ModelUsuarios();
            $oCliente->setCodigo($aRes['usucodigo']);
            $oCliente->setNome($aRes['usunome']);
            $oCliente->setDataNasc($aRes['usudatanasc']);
            $oCliente->setCpf($aRes['usucpfcnpj']);
            $oCliente->setTelefone($aRes['usutelefone']);
            $oCliente->setEmail($aRes['usuemail']);
            if ($aRes['usutipo'] == 1) {
                $oCliente->setTipo('Administrador');
            } else if ($aRes['usutipo'] == 2) {
                $oCliente->setTipo('Cliente');
            } else if ($aRes['usutipo'] == 3) {
                $oCliente->setTipo('Restaurante');
            }
            $oCliente->setEndcodigo($aRes['endcodigo']);

            $aResultado[] = $oCliente;
        }
        return $aResultado;
    }

    public function listaCodigo($codigo) {
        $oRetorno = $this->executa('SELECT * FROM tbusuarios '
                . ' INNER JOIN tbendereco ON tbusuarios.endcodigo=tbendereco.endcodigo WHERE usucodigo=' . $codigo);
        $aResultado = [];

        while ($aRes = pg_fetch_array($oRetorno, NULL, PGSQL_ASSOC)) {
            $oCliente = new ModelUsuarios();
            $oCliente->setCodigo($aRes['usucodigo']);
            $oCliente->setNome($aRes['usunome']);
            $oCliente->setDataNasc($aRes['usudatanasc']);
            $oCliente->setCpf($aRes['usucpfcnpj']);
            $oCliente->setTelefone($aRes['usutelefone']);
            $oCliente->setEmail($aRes['usuemail']);
            $oCliente->setEndcodigo($aRes['endcodigo']);
            $oCliente->setEndnumero($aRes['endnumero']);
            $oCliente->setEndcidade($aRes['endcidade']);
            $oCliente->setEndbairro($aRes['endbairro']);
            $oCliente->setEndrua($aRes['endrua']);
            $oCliente->setEndcomplemento($aRes['endcomplemento']);

            $aResultado[] = $oCliente;
        }
        return $aResultado;
    }

    function SELECT($sTabela) {
        $oQuery = pg_exec($this->oConexao, 'SELECT * FROM ' . $sTabela);
        $aRetorno = [];
        while ($oResultado = pg_fetch_array($oQuery, NULL, PGSQL_ASSOC)) {
            $aRetorno[] = $oResultado;
        }

        return $aRetorno;
    }

    public function exclui() {
        //delete from tbusuario;
      $this->executa("delete from tbusuarios where usucodigo = " . $this->ModelUsuario->getCodigo());
      $this->executa("delete from tbendereco where endcodigo = " . $this->ModelUsuario->getEndcodigo());
    }

    public function altera() {
        $this->executa("update tbusuarios set usunome = '" . $this->ModelUsuario->getNome() . "',"
                        . " usudatanasc = '" . $this->ModelUsuario->getDataNasc() . "', "
                        . " usucpfcnpj = '" . $this->ModelUsuario->getCpf() . "', "
                        . " usutelefone = " . $this->ModelUsuario->getTelefone() . ", "
                        . " usuemail= '" . $this->ModelUsuario->getEmail() . "' "
                        . " where usucodigo = " . $this->ModelUsuario->getCodigo());
        $this->executa("update tbendereco set endnumero = " . $this->ModelUsuario->getEndnumero() . ","
                        . " endcidade = '" . $this->ModelUsuario->getEndcidade() . "', "
                        . " endbairro = '" . $this->ModelUsuario->getEndbairro() . "', "
                        . " endcomplemento = '" . $this->ModelUsuario->getEndcomplemento() . "', "
                        . " endrua= '" . $this->ModelUsuario->getEndrua() . "' "
                        . " where endcodigo = " . $this->ModelUsuario->getEndcodigo());
    }

    //Getter e Setter
    public function getModelUsuario() {
        return $this->ModelUsuario;
    }

    public function setModelUsuario($ModelUsuario) {
        $this->ModelUsuario = $ModelUsuario;
    }

}
