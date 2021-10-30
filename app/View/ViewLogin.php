<?php
/**
 * Description of ViewLogin
 *
 * @author diego.santos
 */
class ViewLogin {

    function __construct() {
        $this->montaFormulario();
    }

    public function montaFormulario() {
        ?> <body>
            <nav>
                <div>
                    <h1 style="margin-bottom: 10px">LOGAR</h1>
                    <div style="margin-left: 500px">
                        <form  method="POST" action="index.php">
                            <label>Login:</label> <?php
                            if (isset($_COOKIE['usuarioLogin_php'])) {
                                echo '<input name="usuario" value="' . $_COOKIE['usuarioLogin_php'] . '">';
                            } else {
                                echo '<input name="usuario">';
                            }
                            echo "<br>";
                            echo "<br>";
                            echo "<label>Senha:</label>";
                            if (isset($_COOKIE['usuarioSenha_php'])) {
                                echo '<input name="senha" type="password" value="' . $_COOKIE['usuarioSenha_php'] . '">';
                            } else {
                                echo '<input name = "senha" type = "password">';
                            }
                            ?> 
                            <br>                        
                            <input type="checkbox" name="salvarLogin">
                            <label>Salvar Senha</label>
                            <br>                        
                            <br>                        
                            <label>Escola um tema:</label>
                            <select name="selectCor">
                                <option value="white">Branco</option>
                                <option value="#567bff">Azul</option>
                                <option value="green">Verde</option>
                                <option value="yellow">Amarelo</option>
                                <option value="red">Vermelho</option>
                                <option value="gray">Cinza</option>
                            </select>                        
                            <br>
                            <br>
                            <button type="submit" name="entrar">Entrar</button>
                            <a href="index.php?pagina=cadastrar"><button type="button" name="cadastrar">Cadastrar-se</button></a>
                        </form>    
                    </div>
                </div>
            </nav>
        </body>    <?php
                }

            }
            