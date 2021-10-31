<?php
require_once './app/View/ViewContatos.php';
require_once './app/Model/ModelContatos.php';
require_once './app/Persistencia/PersistenciaContatos.php';

class ControllerContatos
{
    /**
     *
     * @var ModelContatos
     */
    protected $ModelContatos;

    /**
     * @var ViewContatos
     */
    protected $ViewContatos;

    /**
     * @var PersistenciaContatos
     */
    protected $PersistenciaContatos;

    public function __construct()
    {
        $this->processar();
    }

    function processar()
    {
        $this->PersistenciaContatos = new PersistenciaContatos();
        if (isset($_POST['alterar'])) {
            $usucodigo = $_POST['alterar'];
            $aUsuarios = $this->PersistenciaContatos->listaCodigo($usucodigo);
            $this->ViewContatos = new ViewContatos();
            $this->ViewContatos->setAUsuarios($aUsuarios);
            $this->ViewContatos->montaAlterador();
        } else if (isset($_POST['confirmaalterar']) && $_POST['confirmaalterar'] == 'confirmaalterar') {
            $usucodigo = $_POST['usucodigo'];
            $usunome = $_POST['usunome'];
            $usucpfcnpj = $_POST['usucpfcnpj'];

            $this->ModelContatos = new ModelContatos();
            $this->ModelContatos->setCodigo($usucodigo);
            $this->ModelContatos->setNome($usunome);
            $this->ModelContatos->setCpf($usucpfcnpj);

            $this->PersistenciaContatos->setModelUsuario($this->ModelContatos);
            $this->PersistenciaContatos->altera();
            echo "<script  type='text/javascript'>window.location.href='index.php?pagina=contatos'</script>";
        } else if (isset($_POST['excluir'])) {
            $usucodigo = $_POST['excluir'];
            $endcodigo = $_POST['endcodigo'];
            $this->ModelContatos = new ModelContatos();
            $this->ModelContatos->setCodigo($usucodigo);
            $this->ModelContatos->setEndcodigo($endcodigo);
            $this->PersistenciaContatos->setModelUsuario($this->ModelContatos);
            $this->PersistenciaContatos->exclui();
            echo "<script  type='text/javascript'>window.location.href='index.php?pagina=contatos'</script>";

        } else {
            $aUsuarios = $this->PersistenciaContatos->lista();
            $this->ViewContatos = new ViewContatos();
            $this->ViewContatos->setAContatos($aUsuarios);
            $this->ViewContatos->montaFormulario();
        }
    }
}