<?php
session_start();
?>
<!DOCTYPE html>

<html >
    <head lang="pt-br">
        <title>Contatos</title>
        <meta charset="UTF-8">
        <link rel="stylesheet"  href="estilo/estilo.css"/>
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>       
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
            include ('menu_cliente.php');
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
            case 'restaurantes':
                require './app/Controller/ControllerRestaurantes.php';
                new ControllerRestaurantes();
                break;
            case 'pedidos':
                require '';
                new ControllerPedido();
                break;
            case 'servico':
                require '';
                new ControllerServico();
                break;
        }
    } else if (!isset($_SESSION['usuario'])) {
        //echo"<script  type='text/javascript'>alert('Faça Login!');window.location.href='index.php'</script>";
        require_once './app/Controller/ControllerLogin.php';
        new ControllerLogin();
    } else if (isset($_GET['acao']) && $_GET['acao'] == 'sair') {
        require_once './app/Controller/ControllerLogin.php';
        new ControllerLogin();
    } else {
        require_once './app/Controller/ControllerHome.php';
        new ControllerHome();
    }  
    
    