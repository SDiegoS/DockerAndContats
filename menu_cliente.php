<?php
echo'
<div id = "menu">
<script  type="text/javascript">$("body").css("background-color", sessionStorage.getItem("background_php_color"));</script>
<nav id="menu">
    <div>
        <ul>
            <li style="margin-bottom:30px;"><a href="index.php"><img id="icone" src="img/img_1.png"/></a></li>
            <br>
            <li><a href="index.php">Inicio</a></li>
                <li><a href="?pagina=contatos">Contato</a></li>
            <li><a href="index.php?acao=sair">Sair</a></li>
        </ul>
    </div>
</nav>
</div>

';
