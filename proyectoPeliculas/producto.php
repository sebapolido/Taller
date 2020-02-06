<!DOCTYPE html>
<?php
require_once 'datos.php';
require_once 'libs/Smarty.class.php';

$prodId = 1;
if (isset($_GET["id"])) {
    $prodId = $_GET["id"];
}

$producto = getProducto($prodId);

if (isset($producto)) {
    $mySmarty = getSmarty();
    $mySmarty->assign("producto", $producto);
    $mySmarty->display('producto.tpl');
}
                   
       
