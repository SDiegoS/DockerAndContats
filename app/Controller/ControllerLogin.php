<?php

require_once './app/View/ViewLogin.php';
require_once './app/Model/ModelLogin.php';
require_once './app/Persistencia/PersistenciaLogar.php';

class ControllerLogin {

    /**
     *
     * @var ModelLogin 
     */
    protected $ModelLogin;

    /**
     * @var PersistenciaLogar 
     */
    protected $PersistenciaLogar;

    public function __construct() {
        $this->processa();
    }

    public function armazenaSessao() {
        $sSerializaUsuario = serialize($this->ModelLogin->getAUsuarioSessao());
        $_SESSION['usuario'] = $sSerializaUsuario;
        
    }

    function criarCookie() {
//        setcookie($this->ModelLogin->getSNomeCookie(), $this->ModelLogin->getSConteudo(), time() + 3600);
        echo "<script type='text/javascript'>sessionStorage.setItem( 'background_php_color', '".$this->ModelLogin->getSConteudo()."')</script>";
    }

    function deslogar() {
        session_destroy();
        //redirecionar o usuario para a página de login
        echo"<script  type='text/javascript'>window.location.href='index.php'</script>";
    }

    public function processa() {

        if (isset($_GET['acao']) && $_GET['acao'] == 'sair') {
            $this->deslogar();
        }

        if (isset($_POST['entrar'])) {
            $username = $_POST['usuario'];
            $entrar = $_POST['entrar'];
            $senha = $_POST['senha'];
            $selectCor = $_POST['selectCor'];

            $this->ModelLogin = new ModelLogin();
            $this->ModelLogin->setSUsername($username);
            $this->ModelLogin->setSEntrar($entrar);
            $this->ModelLogin->setSSenha(md5($senha));
            $this->ModelLogin->setSConteudo($selectCor);

            $this->PersistenciaLogar = new PersistenciaLogar();
            $this->PersistenciaLogar->setModelLogin($this->ModelLogin);
            /* Verifica se é o usuario administrador e o seta */
            if ($this->ModelLogin->getSUsername() == '' && $this->ModelLogin->getSSenha() == md5($senha)) {
                $data = date('d/m/Y');
                $aAdministrador = [0 => ['usunome' => 'Administrador', 'usutipo' => '1']];
                $this->ModelLogin->setAUsuarioSessao($aAdministrador);
                $this->armazenaSessao();
                $this->criarCookie();
            } else {
                $QueryUsuario = $this->PersistenciaLogar->login();
                /* verifica se o usuario existe */
                if ($QueryUsuario == FALSE) {
                    echo"<script type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='index.php';</script>";
                    die();
                } else {
                    $this->ModelLogin->setAUsuarioSessao($QueryUsuario);
                    $this->armazenaSessao();
                    $this->criarCookie();
                }
            }
            if (isset($_POST['salvarLogin'])) {
                $this->ModelLogin->setSConteudo($username);
                $this->ModelLogin->setSNomeCookie('usuarioLogin_php');
                $this->criarCookie();
                $this->ModelLogin->setSConteudo($senha);
                $this->ModelLogin->setSNomeCookie('usuarioSenha_php');
                $this->criarCookie();
            }
            echo"<script  type='text/javascript'>window.location.href='index.php'</script>";
        }
        new ViewLogin();
    }

}
