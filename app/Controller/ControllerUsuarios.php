<?php

/**
 * Description of ControllerUsuarios
 *
 * @author diego.santos
 */
require_once './app/View/ViewUsuarios.php';
require_once './app/Model/ModelUsuarios.php';
require_once './app/Persistencia/PersistenciaUsuarios.php';

class ControllerUsuarios {

    /**
     *
     * @var ModelCliente 
     */
    protected $ModelUsuarios;

    /**
     * @var ViewUsuarios 
     */
    protected $ViewUsuarios;

    /**
     * @var PersistenciaUsuarios 
     */
    protected $PersistenciaUsuarios;

    public function __construct() {
        $this->processar();
    }

    function processar() {
        $this->PersistenciaUsuarios = new PersistenciaUsuarios();
        if (isset($_POST['alterar'])) {
            $usucodigo = $_POST['alterar'];
            $aUsuarios = $this->PersistenciaUsuarios->listaCodigo($usucodigo);
            $this->ViewUsuarios = new ViewUsuarios();
            $this->ViewUsuarios->setAUsuarios($aUsuarios);
            $this->ViewUsuarios->montaAlterador();
        } else if (isset($_POST['confirmaalterar']) && $_POST['confirmaalterar'] == 'confirmaalterar') {
            $usucodigo = $_POST['usucodigo'];
            $usunome = $_POST['usunome'];
            $usudataNasc = $_POST['usudatanasc'];
            $usucpfcnpj = $_POST['usucpfcnpj'];
            $usutelefone = $_POST['usutelefone'];
            $usuemail = $_POST['usuemail'];
            $endcodigo= $_POST['endcodigo'];
            $endnumero= $_POST['endnumero'];
            $endcidade= $_POST['endcidade'];
            $endbairro= $_POST['endbairro'];
            $endrua= $_POST['endrua'];
            $endcomplemento= $_POST['endcomplemento'];
             
            $oUsuarios = new ModelUsuarios();
            $oUsuarios->setCodigo($usucodigo);
            $oUsuarios->setNome($usunome);
            $oUsuarios->setDataNasc($usudataNasc);
            $oUsuarios->setCpf($usucpfcnpj);
            $oUsuarios->setTelefone($usutelefone);
            $oUsuarios->setEmail($usuemail);
            $oUsuarios->setEndcodigo($endcodigo);
            $oUsuarios->setEndnumero($endnumero);
            $oUsuarios->setEndcidade($endcidade);
            $oUsuarios->setEndbairro($endbairro);
            $oUsuarios->setEndrua($endrua);
            $oUsuarios->setEndcomplemento($endcomplemento);
            
            $this->PersistenciaUsuarios->setModelUsuario($oUsuarios);
            $this->PersistenciaUsuarios->altera();
            header('location: index.php?pagina=clientes');
        } else if(isset($_POST['excluir'])){
            $usucodigo = $_POST['excluir'];
            $endcodigo= $_POST['endcodigo'];
            $oUsuarios = new ModelUsuarios();
            $oUsuarios->setCodigo($usucodigo);
            $oUsuarios->setEndcodigo($endcodigo);
            $this->PersistenciaUsuarios->setModelUsuario($oUsuarios);
            $this->PersistenciaUsuarios->exclui();
            header('location: index.php?pagina=clientes');

        }        
        else {
            $aUsuarios = $this->PersistenciaUsuarios->lista();
            $this->ViewUsuarios = new ViewUsuarios();
            $this->ViewUsuarios->setAUsuarios($aUsuarios);
            $this->ViewUsuarios->montaFormulario();
        }
    }

    //Getter e Setter
}
