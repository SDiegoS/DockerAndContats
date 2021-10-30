<?php

require_once './app/Model/ModelCliente.php';
require_once './app/Model/ModelEndereco.php';
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

    public function gravaEndereco() {
        //Inserir
        if ($this->ModelCliente->getITipoUsuario() == 2) {
            $exesql = $this->executa("insert into tbendereco (endnumero,endcidade,endbairro,endrua,endcomplemento)"
                    . " values ('" . $this->ModelEndereco->getINumero() . "','" . $this->ModelEndereco->getSCidade() . "','" . $this->ModelEndereco->getSBairro() . "','" . $this->ModelEndereco->getSRua() . "','" . $this->ModelEndereco->getSComplemento() . "')");
            if ($exesql) {
                
            } else {
                echo"<script  type='text/javascript'>alert('Endereço não Cadastrado!');window.location.href='index.php?pagina=cadastrar'</script>";
            }
        } else if ($this->ModelCliente->getITipoUsuario() == 3) {
            $exesql = $this->executa("insert into tbendereco (endnumero, endcidade, endbairro, endrua, endcomplemento, endcoordenada)"
                    . " values ('" . $this->ModelEndereco->getINumero() . "','" . $this->ModelEndereco->getSCidade() . "','" . $this->ModelEndereco->getSBairro() . "','" . $this->ModelEndereco->getSRua() . "','" . $this->ModelEndereco->getSComplemento() . "','" . $this->ModelEndereco->getICoordenadas() . ")");
            if ($exesql) {
                
            } else {
                echo"<script  type='text/javascript'>alert('Endereço não Cadastrado!');window.location.href='index.php?pagina=cadastrar'</script>";
            }
        }
    }

    public function gravaUsuario() {
        $oResultado = $this->executa('SELECT MAX(endcodigo) FROM tbendereco');
        $aRes = pg_fetch_array($oResultado);
        $aResult = [$aRes];
        //Inserir
        $exesql = $this->executa("insert into tbusuarios (usunome,usucpfcnpj,usudatanasc,usutelefone,usuemail,ususenha,usutipo,endcodigo)"
                . " values ('" . $this->ModelCliente->getNome() . "','" . $this->ModelCliente->getICPFCNPJ() . "','" . $this->ModelCliente->getSDataNasc() . "','"
                . $this->ModelCliente->getITelefone() . "','" . $this->ModelCliente->getSEmail() . "','" . $this->ModelCliente->getISenha() . "','" . $this->ModelCliente->getITipoUsuario() . "','"
                . $aResult[0][0] . "')");
        if ($exesql) {
            echo"<script  type='text/javascript'>alert('Cadastrado com Sucesso!');window.location.href='index.php'</script>";
        } else {
            echo"<script  type='text/javascript'>alert('Erro no Cadastrado!');window.location.href='index.php?pagina=cadastrar'</script>";
        }
    }

    //Getter e Setter
    function getModelEndereco() {
        return $this->ModelEndereco;
    }

    function setModelEndereco($ModelEndereco) {
        $this->ModelEndereco = $ModelEndereco;
    }

    public function getModelCliente() {
        return $this->ModelCliente;
    }

    public function setModelCliente($ModelCliente) {
        $this->ModelCliente = $ModelCliente;
    }

}
