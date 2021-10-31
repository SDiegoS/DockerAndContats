<?php

/**
 * Description of ViewUsuarios
 *
 * @author diego.santos
 */
class ViewUsuarios
{

    private $aUsuarios = [];

    function getAUsuarios()
    {
        return $this->aUsuarios;
    }

    function setAUsuarios($aUsuarios)
    {
        $this->aUsuarios = $aUsuarios;
    }

    public function montaFormulario()
    {
        ?>
        <body>
        <script type='text/javascript'>$('body').css('background-color', sessionStorage.getItem('background_php_color'));</script>
        <nav>
            <div>
                <form method="POST" action="index.php?pagina=clientes">
                    <h1 style="margin-bottom: 10px">Usuarios</h1>
                    <div style="margin-left: 300px">
                        <table style="border: 1px">
                            <tr>
                                <td>Código</td>
                                <td>Nome</td>
                                <td>Cpf</td>
                                <td>Tipo Usuario</td>
                                <td>Ação</td>
                            </tr><?php
                            foreach ($this->aUsuarios as $oUsuarios) {
                                ?>
                                <tr>
                                <td>
                                    <?php echo $oUsuarios->getCodigo(); ?>
                                    <input type="hidden" value="<?php echo $oUsuarios->getEndcodigo(); ?>"
                                           name="endcodigo">
                                </td>
                                <td><?php echo $oUsuarios->getNome(); ?> </td>
                                <td><?php echo $oUsuarios->getCpf(); ?> </td>
                                <td><?php echo $oUsuarios->getTipo(); ?> </td>
                                <td>
                                    <button type="submit" name="alterar" value="<?php echo $oUsuarios->getCodigo(); ?>">
                                        Alterar
                                    </button>
                                    <button type="submit" name="excluir" value="<?php echo $oUsuarios->getCodigo(); ?>">
                                        Exclir Usuario
                                    </button>
                                </td>
                                </tr><?php
                            }
                            ?>
                        </table>
                    </div>
                </form>
            </div>
        </nav>
        </body>
        <?php
    }

    function montaAlterador()
    {
        ?>
        <body>
        <script type='text/javascript'>$('body').css('background-color', sessionStorage.getItem('background_php_color'));</script>
        <nav>
            <div style="margin-left: 400px">
                <form method="POST" action="index.php?pagina=clientes">
                    <h1 style="margin-bottom: 10px">Usuarios</h1>
                    <div>
                        <table style="border: 1px">
                            <?php
                            foreach ($this->aUsuarios as $oUsuarios) {
                                ?>
                                <tr>
                                    <td>Código</td>
                                    <td><input type="hidden" value="<?php echo $oUsuarios->getCodigo(); ?>"
                                               name="usucodigo"> <?php echo $oUsuarios->getCodigo(); ?> </td>
                                    <input type="hidden" value="<?php echo $oUsuarios->getEndcodigo(); ?>"
                                           name="endcodigo">
                                </tr>
                                <tr>
                                    <td>Nome</td>
                                    <td><input type="text" value="<?php echo $oUsuarios->getNome(); ?>" name="usunome">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cpf</td>
                                    <td><input type="text" value="<?php echo $oUsuarios->getCpf(); ?>"
                                               name="usucpfcnpj">
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>Ação</td>
                                    <td>
                                        <button type="submit" name="confirmaalterar" value="confirmaalterar">Confirmar
                                            Alteração
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </form>
            </div>
        </nav>
        </body>
        <?php
    }

}
