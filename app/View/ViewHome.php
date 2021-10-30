<?php

/**
 * Description of ViewHome
 *
 * @author diego.santos
 */
class ViewHome
{

    function __construct()
    {
        $this->processar();
    }

    function processar()
    {
        ?>
        <div>
            <?php
            $data = date('d/m/Y');
            $aUsuario = unserialize($_SESSION['usuario']);
            echo "<script  type='text/javascript'>$('body').css('background-color', '" . $_COOKIE['background_php'] . "');</script>";
            echo '<h3>Seja bem Vindo ' . $aUsuario[0]['usunome'] . ', Hoje é dia ' . $data . '</h3>';
            ?>
        </div>
        <?php
    }

}
