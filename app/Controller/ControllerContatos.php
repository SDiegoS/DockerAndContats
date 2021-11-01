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
            $concodigo = $_POST['alterar'];
            $aContato = $this->PersistenciaContatos->listaCodigo($concodigo);
            $this->ViewContatos = new ViewContatos();
            $this->ViewContatos->setAContatos($aContato);
            $this->ViewContatos->montaAlterador();
        } else if (isset($_POST['adicionar']) && $_POST['adicionar'] == 'confirmaAdicionar') {
            $conemail = $_POST['conemail'];
            $contelefone = $_POST['contelefone'];
            $contipo = $_POST['contipo'];
            $aUsuario = unserialize($_SESSION['usuario']);

            $this->ModelContatos = new ModelContatos();
            $this->ModelContatos->setSEmail($conemail);
            $this->ModelContatos->setSTelefone($contelefone);
            $this->ModelContatos->setITipoContato($contipo);
            $this->ModelContatos->setICodigoUsuario($aUsuario[0]['usucodigo']);

            $this->PersistenciaContatos->setModelContato($this->ModelContatos);
            $this->PersistenciaContatos->inserir();
            echo "<script  type='text/javascript'>window.location.href='index.php?pagina=contatos'</script>";
        } else if (isset($_POST['confirmaalterar']) && $_POST['confirmaalterar'] == 'confirmaalterar') {
            $concodigo = $_POST['concodigo'];
            $conemail = $_POST['conemail'];
            $contelefone = $_POST['contelefone'];
            $contipo = $_POST['contipo'];

            $this->ModelContatos = new ModelContatos();
            $this->ModelContatos->setICodigo($concodigo);
            $this->ModelContatos->setSEmail($conemail);
            $this->ModelContatos->setSTelefone($contelefone);
            $this->ModelContatos->setITipoContato($contipo);

            $this->PersistenciaContatos->setModelContato($this->ModelContatos);
            $this->PersistenciaContatos->altera();
            echo "<script  type='text/javascript'>window.location.href='index.php?pagina=contatos'</script>";
        } else if (isset($_POST['excluir'])) {
            $concodigo = $_POST['excluir'];
            $this->ModelContatos = new ModelContatos();
            $this->ModelContatos->setICodigo($concodigo);
            $this->PersistenciaContatos->setModelContato($this->ModelContatos);
            $this->PersistenciaContatos->exclui();
            echo "<script  type='text/javascript'>window.location.href='index.php?pagina=contatos'</script>";

        } else if (isset($_POST['adicionar']) && $_POST['adicionar'] == 'adicionar') {
            $this->ViewContatos = new ViewContatos();
            $this->ViewContatos->montaCadastro();
        } else {
            $aUsuarios = $this->PersistenciaContatos->lista();
            $this->ViewContatos = new ViewContatos();
            $this->ViewContatos->setAContatos($aUsuarios);
            $this->ViewContatos->montaFormulario();
        }
    }
}