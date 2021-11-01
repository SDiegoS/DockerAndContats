<?php

class ViewContatos
{
    /**
     * @var array
     */
    private $aContatos = [];

    /**
     * @return array
     */
    public function getAContatos(): array
    {
        return $this->aContatos;
    }

    public function setAContatos($aContatos)
    {
        $this->aContatos = $aContatos;
    }

    public function montaFormulario()
    {
        ?>
        <body>
        <nav>
            <div>
                <form method="POST" action="index.php?pagina=contatos">
                    <h1 style="margin-bottom: 10px">Contatos</h1>
                    <div style="margin-left: 300px">
                        <table style="border: 1px">
                            <tr>
                                <td>Código</td>
                                <td>Email</td>
                                <td>Telefone</td>
                                <td>Tipo Contato</td>
                                <td>Ação</td>
                            </tr><?php
                            foreach ($this->aContatos as $oContatos) {
                                ?>
                                <tr>
                                <td><?php echo $oContatos->getICodigo(); ?> </td>
                                <td><?php echo $oContatos->getSEmail(); ?> </td>
                                <td><?php echo $oContatos->getITelefone(); ?> </td>
                                <td><?php
                                    if ($oContatos->getITipoContato() == 1) {
                                        echo 'Administrador';
                                    } else if ($oContatos->getITipoContato() == 2) {
                                        echo 'Cliente';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <button type="submit" name="alterar"
                                            value="<?php echo $oContatos->getICodigo(); ?>">
                                        Alterar
                                    </button>
                                    <button type="submit" name="excluir"
                                            value="<?php echo $oContatos->getICodigo(); ?>">
                                        Exclir Contato
                                    </button>
                                </td>
                                </tr><?php
                            }
                            ?>
                        </table>
                    </div>
                    <div>
                        <button type="submit" name="adicionar" value="adicionar">Adicionar Contato</button>
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
        <nav>
            <div style="margin-left: 400px">
                <form method="POST" action="index.php?pagina=contatos">
                    <h1 style="margin-bottom: 10px">Contatos</h1>
                    <div>
                        <table style="border: 1px">
                            <?php
                            foreach ($this->aContatos as $oContatos) {
                                ?>
                                <tr>
                                    <td>Código</td>
                                    <td><input type="hidden" value="<?php echo $oContatos->getICodigo(); ?>"
                                               name="concodigo"> <?php echo $oContatos->getICodigo(); ?> </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" value="<?php echo $oContatos->getSEmail(); ?>"
                                               name="conemail">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Telefone</td>
                                    <td><input type="text" value="<?php echo $oContatos->getITelefone(); ?>"
                                               name="contelefone"></td>
                                </tr>
                                <tr>
                                    <td>Tipo Contato</td>
                                    <td>
                                        <select name="contipo" value="<?php echo $oContatos->getITipoContato(); ?>">
                                            <option value="1">Email</option>
                                            <option value="2">Telefone</option>
                                        </select>
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

    function montaCadastro()
    {
        ?>
        <body>
        <nav>
            <div style="margin-left: 400px">
                <form method="POST" action="index.php?pagina=contatos">
                    <h1 style="margin-bottom: 10px">Contatos</h1>
                    <div>
                        <table style="border: 1px">
                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="conemail">
                                </td>
                            </tr>
                            <tr>
                                <td>Telefone</td>
                                <td><input type="text" name="contelefone"></td>
                            </tr>
                            <tr>
                                <td>Tipo Contato</td>
                                <td>
                                    <select name="contipo">
                                        <option value="1">Email</option>
                                        <option value="2">Telefone</option>
                                    </select>
                                </td>
                            </tr>
                            </tr>
                            <tr>
                                <td>Ação</td>
                                <td>
                                    <button type="submit" name="adicionar" value="confirmaAdicionar">Adicionar</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </nav>
        </body>
        <?php
    }
}