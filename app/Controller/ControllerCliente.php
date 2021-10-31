<?php

require_once './app/Model/ModelCliente.php';
require_once './app/Persistencia/PersistenciaCliente.php';
require_once './app/View/ViewCadastro.php';

class ControllerCliente {

    /**
     *
     * @var ModelCliente 
     */
    protected $ModelCliente;

    /**
     * @var ViewCadastro 
     */
    protected $ViewCadastro;

    /**
     * @var PersistenciaCliente 
     */
    protected $PersistenciaCliente;

    public function __construct() {
        $this->processa();
    }

    public function gravaDados() {
        $sNome = $_POST['nome'];
        $iTipoUsuario = $_POST['tipo'];
        $iCPFCNPJ = $_POST['cpfcnpj'];
        $iSenha = $_POST['senha'];


        $this->ModelCliente = new ModelCliente();
        $this->ModelCliente->setNome($sNome);
        $this->ModelCliente->setITipoUsuario($iTipoUsuario);
        $this->ModelCliente->setICPFCNPJ($iCPFCNPJ);
        $this->ModelCliente->setISenha(md5($iSenha));

        $this->PersistenciaCliente = new PersistenciaCliente();
        $this->PersistenciaCliente->setModelCliente($this->ModelCliente);
        $this->PersistenciaCliente->gravaUsuario();
    }

    public function processa() {
        if (isset($_POST['confirmar']) && $_POST['confirmar'] == 'confirmar') {
            if ($_POST['senha'] == $_POST['senhaconfirmacao']) {
                $this->gravaDados();
            } else {
                    echo"<script  type='text/javascript'>alert('As senhas não são iguais!');window.location.href='index.php?pagina=cadastrar'</script>";
                    die;
            }
        } else if (isset($_GET['pagina']) && $_GET['pagina'] == "cadastrar") {
            new viewCadastro();
        }
    }

}

