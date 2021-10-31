<?php
session_start();
?>
    <!DOCTYPE html>
    <html>
    <head lang="pt-br">
        <title>Contatos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="estilo/estilo.css"/>
        <script src="https://code.jquery.com/jquery-3.6.0.js"
                integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>
<?php
if (isset($_SESSION['usuario'])) {
    $aUsuario = unserialize($_SESSION['usuario']);
    $tipo = $aUsuario[0]['usutipo'];
    /* Verificar se o usuario estão logado */
    if ($tipo == 1) {
        /* inclui menu do adiministrador */
        include('menu_administrador.php');
    } else if ($tipo == 2) {
        /* inclui menu do cliente */
        include('menu_cliente.php');
    }
}

if (isset($_GET['pagina'])) {
    $sPagina = $_GET['pagina'];
    switch ($sPagina) {
        case 'cadastrar':
            require './app/Controller/ControllerCliente.php';
            new ControllerCliente();
            break;
        case 'clientes':
            require './app/Controller/ControllerUsuarios.php';
            new ControllerUsuarios();
            break;
        case 'contatos':
            require './app/Controller/ControllerContatos.php';
            new ControllerContatos();
            break;
    }
} else if (!isset($_SESSION['usuario'])) {
//    echo"<script  type='text/javascript'>alert('Faça Login!');window.location.href='index.php'</script>";
    require_once './app/Controller/ControllerLogin.php';
    new ControllerLogin();
} else if (isset($_GET['acao']) && $_GET['acao'] == 'sair') {
    require_once './app/Controller/ControllerLogin.php';
    new ControllerLogin();
} else {
    require_once './app/Controller/ControllerHome.php';
    new ControllerHome();
}
    
    