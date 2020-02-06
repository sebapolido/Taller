<?php

require_once 'datos.php';

$usuario = $_POST["usuario"];
$clave = $_POST["clave"];

$usuarioLogueado = login($usuario, $clave);

if (isset($usuarioLogueado)) {
    session_start();
    $_SESSION["usuarioLogueado"] = $usuarioLogueado;
    header('location:index.php');
} else {
    header('location:login.php?err=1');
}