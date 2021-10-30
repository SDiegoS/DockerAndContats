<?php

/**
 * Description of ViewUsuarios
 *
 * @author diego.santos
 */
class ViewUsuarios {

    private $aUsuarios = [];

    function getAUsuarios() {
        return $this->aUsuarios;
    }

    function setAUsuarios($aUsuarios) {
        $this->aUsuarios = $aUsuarios;
    }

    public function montaFormulario() {
        ?><body>
            <nav>
                <div>
                    <form  method="POST" action="index.php?pagina=clientes">
                        <h1 style="margin-bottom: 10px">Usuarios</h1>
                        <div style="margin-left: 300px">
                            <table border="1px">
                                <tr>
                                    <td>Código</td>
                                    <td>Nome</td>
                                    <td>Data de Nascimento</td>
                                    <td>Cpf</td>
                                    <td>Telefone</td>
                                    <td>Email</td>
                                    <td>Tipo Usuario</td>
                                    <td>Ação</td>
                                </tr><?php
                                foreach ($this->aUsuarios as $oUsuarios) {
                                    ?><tr>
                                        <td>
                                            <?php echo $oUsuarios->getCodigo(); ?>
                                            <input type="hidden" value="<?php echo $oUsuarios->getEndcodigo(); ?>" name="endcodigo">
                                        </td>
                                        <td><?php echo $oUsuarios->getNome(); ?> </td>
                                        <td><?php echo $oUsuarios->getDataNasc(); ?> </td>                                        
                                        <td><?php echo $oUsuarios->getCpf(); ?> </td>
                                        <td><?php echo $oUsuarios->getTelefone(); ?> </td>
                                        <td><?php echo $oUsuarios->getEmail(); ?> </td>
                                        <td><?php echo $oUsuarios->getTipo(); ?> </td>
                                        <td>
                                            <button type="submit" name="alterar" value="<?php echo $oUsuarios->getCodigo(); ?>">Alterar</button>
                                            <button type="submit" name="excluir" value="<?php echo $oUsuarios->getCodigo(); ?>">Exclir Usuario</button>
                                        </td>
                                    </tr><?php
                                }
                                ?>
                            </table>
                        </div>
                    </form>
                </div>
            </nav>
        </body><?php
    }

    function montaAlterador() {
        ?><body>
            <nav>
                <div style="margin-left: 400px">
                    <form  method="POST" action="index.php?pagina=clientes">
                        <h1 style="margin-bottom: 10px">Usuarios</h1>
                        <div>
                            <table border="1px">
                                <?php
                                foreach ($this->aUsuarios as $oUsuarios) {
                                    ?>
                                    <tr>
                                        <td>Código</td>
                                        <td><input type="hidden" value="<?php echo $oUsuarios->getCodigo(); ?>" name="usucodigo"> <?php echo $oUsuarios->getCodigo(); ?> </td>
                                        <input type="hidden" value="<?php echo $oUsuarios->getEndcodigo(); ?>" name="endcodigo">
                                    </tr>
                                    <tr>
                                        <td>Nome</td>
                                        <td><input type="text" value="<?php echo $oUsuarios->getNome(); ?>" name="usunome"></td>
                                    </tr>                                
                                    <tr>
                                        <td>Nome</td>
                                        <td><input type="text" value="<?php echo $oUsuarios->getDataNasc(); ?>" name="usudatanasc"></td>
                                    </tr>                                
                                    <tr>
                                        <td>Cpf</td>
                                        <td><input type="text" value="<?php echo $oUsuarios->getCpf(); ?>" name="usucpfcnpj"></td>
                                    </tr>
                                    <tr>
                                        <td>Telefone</td>
                                        <td><input type="text" value="<?php echo $oUsuarios->getTelefone(); ?>" name="usutelefone"></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input type="text" value="<?php echo $oUsuarios->getEmail(); ?>" name="usuemail"></td>
                                    </tr>
                                    <tr>
                                        <td>Cidade</td>
                                        <td><input type="text" value="<?php echo $oUsuarios->getEndcidade(); ?>" name="endcidade" ></td>
                                    </tr>
                                    <tr>
                                        <td>Bairro</td>
                                        <td><input type="text" value="<?php echo $oUsuarios->getEndbairro(); ?>" name="endbairro" ></td>
                                    </tr>
                                    <tr>
                                        <td>Rua</td>
                                        <td><input type="text" value="<?php echo $oUsuarios->getEndrua(); ?>" name="endrua" ></td>
                                    </tr>
                                    <tr> 
                                        <td>Numero</td>
                                        <td><input type="text" value="<?php echo $oUsuarios->getEndnumero(); ?>" name="endnumero" ></td>
                                    </tr>
                                    <tr>
                                        <td>Complemento</td>
                                        <td><input type="text" value="<?php echo $oUsuarios->getEndcomplemento(); ?>" name="endcomplemento" ></td>
                                    </tr>
                                    <tr>
                                        <td>Ação</td>
                                        <td>
                                            <button type="submit" name="confirmaalterar" value="confirmaalterar">Confirmar Alteração</button>
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
        </body><?php
    }

}
