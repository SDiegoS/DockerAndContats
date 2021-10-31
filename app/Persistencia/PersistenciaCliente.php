<?php

require_once './app/Model/ModelCliente.php';
require_once './app/Persistencia/Persistencia.php';

class PersistenciaCliente extends Persistencia {

    /**
     *
     * @var Persistencia 
     */
    protected $oConexao;

    /**
     *
     * @var ModelCliente 
     */
    protected $ModelCliente;

    /**
     *
     * @var ModelEndereco 
     */
    protected $ModelEndereco;

    public function executa($sSQL) {
        $this->conecta();
        $oResult = pg_query($this->getOConexao(), $sSQL);

        $this->desconecta();

        return $oResult;
    }

    public function gravaUsuario() {
        //Inserir
        $exesql = $this->executa("insert into tbusuarios (usunome,usucpfcnpj,ususenha,usutipo)"
                . " values ('" . $this->ModelCliente->getNome() . "','" . $this->ModelCliente->getICPFCNPJ() . "','" . $this->ModelCliente->getISenha() . "','" . $this->ModelCliente->getITipoUsuario() . "')");
        if ($exesql) {
            echo"<script  type='text/javascript'>alert('Cadastrado com Sucesso!');window.location.href='index.php'</script>";
        } else {
            echo"<script  type='text/javascript'>alert('Erro no Cadastrado!');window.location.href='index.php?pagina=cadastrar'</script>";
        }
    }

    //Getter e Setter

    public function getModelCliente() {
        return $this->ModelCliente;
    }

    public function setModelCliente($ModelCliente) {
        $this->ModelCliente = $ModelCliente;
    }

}
