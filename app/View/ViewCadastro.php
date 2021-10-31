<?php

/**
 * Description of ViewCadastro
 *
 * @author diego.santos
 */
class ViewCadastro
{

    function __construct()
    {
        $this->montaFormulario();
    }

    public function montaFormulario()
    {
        echo '
        <body>
            <form  method="POST" action="index.php?pagina=cadastrar">
                <h1 style="margin-bottom: 10px">Cadastrar-se</h1>
                <div>
                <table>
                    <tbody>
                        <tr>
                            <td><label>Nome:</label></td>
                            <td><input name="nome"></td>
                        </tr>
                        <tr>
                            <td><label>Cpf:</label></td>
                            <td><input maxlength="15" name="cpfcnpj"></td>
                        </tr>
                        <tr>
                            <td><label>Senha:</label></td>
                            <td><input name = "senha" maxlength="8" type = "password"></td>
                        </tr>
                        <tr>
                            <td><label>Confirmar Senha:</label></td>
                            <td><input name = "senhaconfirmacao" type = "password"></td>
                        </tr>                        
                    </tbody>
                </table>
                <input name = "tipo" type ="hidden" value="2">
                </div>
                <div>
                    <br>
                    <button type="submit" name="confirmar" value="confirmar">Confirmar</button>
                    <button type="reset">Excluir</button>
                </div>
            </form><br><hr><hr><br>
            <a href="index.php"><input type="submit" value="Voltar" /></a>
        </body>';
    }
}

?>

