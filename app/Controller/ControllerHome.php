<?php

/**
 * Description of ControllerHome
 *
 * @author diego.santos
 */
require_once './app/View/ViewHome.php';

class ControllerHome {

    function __construct() {
        $this->processar();
    }

    function processar() {
        new ViewHome();
    }

}
