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
            echo '<h3>Seja bem Vindo ' . $aUsuario[0]['usunome'] . ', Hoje é dia ' . $data . '</h3>';
            ?>
            <script type='text/javascript'>$('body').css('background-color', sessionStorage.getItem('background_php_color'));</script>
        </div>
        <?php
    }

}
