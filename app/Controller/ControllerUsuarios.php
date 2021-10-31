<?php

/**
 * Description of ControllerUsuarios
 *
 * @author diego.santos
 */
require_once './app/View/ViewUsuarios.php';
require_once './app/Model/ModelUsuarios.php';
require_once './app/Persistencia/PersistenciaUsuarios.php';

class ControllerUsuarios
{

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

    public function __construct()
    {
        $this->processar();
    }

    function processar()
    {
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
            $usucpfcnpj = $_POST['usucpfcnpj'];

            $oUsuarios = new ModelUsuarios();
            $oUsuarios->setCodigo($usucodigo);
            $oUsuarios->setNome($usunome);
            $oUsuarios->setCpf($usucpfcnpj);

            $this->PersistenciaUsuarios->setModelUsuario($oUsuarios);
            $this->PersistenciaUsuarios->altera();
            echo "<script  type='text/javascript'>window.location.href='index.php?pagina=clientes'</script>";
//            header('location: http://localhost/index.php?pagina=clientes');
        } else if (isset($_POST['excluir'])) {
            $usucodigo = $_POST['excluir'];
            $endcodigo = $_POST['endcodigo'];
            $oUsuarios = new ModelUsuarios();
            $oUsuarios->setCodigo($usucodigo);
            $oUsuarios->setEndcodigo($endcodigo);
            $this->PersistenciaUsuarios->setModelUsuario($oUsuarios);
            $this->PersistenciaUsuarios->exclui();
            echo "<script  type='text/javascript'>window.location.href='index.php?pagina=clientes'</script>";
//            header('location: http://localhost/index.php?pagina=clientes');

        } else {
            $aUsuarios = $this->PersistenciaUsuarios->lista();
            $this->ViewUsuarios = new ViewUsuarios();
            $this->ViewUsuarios->setAUsuarios($aUsuarios);
            $this->ViewUsuarios->montaFormulario();
        }
    }
}
