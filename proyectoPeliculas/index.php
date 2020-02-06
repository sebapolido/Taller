<!DOCTYPE html>
<?php
require_once 'datos.php';
ini_set('display_errors', 1);
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Movie Zone</title>
        <link rel="stylesheet" type="text/css" href="css/index.css">
    </head>
    <body>
        <div id="encabezado">
            <img id="imagenEncabezado" src="img/banner.png">
        </div>                    
        <header>
            <nav>

                <ul id="menu">
                    <li><a href="index.php">Pagina Principal</a></li>
                    <li><a href="#">Categorias</a>
                        <ul id="ul">
                            <?php
                            foreach (getCategorias() as $categoria) {
                                echo('<li><a href="index.php?catId=' .
                                $categoria["id"]
                                . '">' .
                                $categoria["nombre"] .
                                '</a></li>');
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION["usuarioLogueado"])) {
                        $usuario = $_SESSION["usuarioLogueado"];
                        echo('<li><a href="#">' . $usuario["nombre"] . '</a><ul id="ul"><a href="doLogout.php">Salir</a></ul></li>');
                        echo('<li><a href="crearPelicula.php">Alta Pelicula</a></li>');
                    } else {
                        echo('<li><a href="login.php">Inicio de Sesión</a></li>');
                    }
                    ?>
                    <li id="buscador"><a>Ingresa tu busqueda
                            <input type="text"/>
                            <input type="button" value="Buscar" /></a></li>
                </ul> 
            </nav>

        </header>
        <div id="productos">
            <h3>
                <?php
                $catId = 1;
                if (isset($_COOKIE["ultimaCategoria"])) {
                    $catId = $_COOKIE["ultimaCategoria"];
                }

                if (isset($_GET["catId"])) {
                    $catId = $_GET["catId"];
                }

                $categoria = getCategoria($catId);

                if (isset($categoria)) {
                    echo $categoria["nombre"];
                    setcookie("ultimaCategoria", $catId, time() + (60 * 60 * 24), "/");
                } else {
                    echo "Categoria inexistente";
                }
                ?>
            </h3>
            <?php
            foreach (getProductosDeCategoria($catId) as $producto) {
                echo('<div class="producto">');
                echo('<img src="img/' . $producto["imagen"] . '" />');
                echo('<a href="producto.php?id=' .
                $producto["id"] . '"');
                echo('<span class="nombre-producto">' .
                $producto["nombre"] . '</span></a>');
                echo('<p>' . $producto["descripcion"] . '</p>');
                echo('<span class="precio-producto">' .
                $producto["precio"] . '</span>');
                echo('</div>');
            }
            ?>
        </div>
    </body>
</html>