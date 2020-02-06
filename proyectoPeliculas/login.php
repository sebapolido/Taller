<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="doLogin.php" method="POST">
            Usuario: <input name="usuario" type="text"/><br>
            Clave: <input name="clave" type="password"/><br>
            <input value="Login" type="submit"/><br>
                <?php
                    if(isset($_GET["err"])) {
                        echo("<label>Usuario/clave incorrectos.</label>");
                    }
                ?>
            </form>
    </body>
</html>
