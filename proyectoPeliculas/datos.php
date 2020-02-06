<?php

require_once 'libs/Smarty.class.php';

/*
 * Todas las funciones en este archivo devuelven datos.
 * Por ahora son datos "harcoded", pero en el futuro las vamos 
 * a cambiar para que hagan consultas a la base de datos. 
 *  */

function getCategorias() {
    $categorias = array(
        array("id" => 1, "nombre" => "Procesadores"), 
        array("id" => 2, "nombre" => "Memorias"), 
        array("id" => 3, "nombre" => "Discos"), 
        array("id" => 4, "nombre" => "Gabinetes"), 
        array("id" => 5, "nombre" => "Monitores"), 
        array("id" => 6, "nombre" => "Perifericos"),
        array("id" => 7, "nombre" => "Impresoras"), 
        array("id" => 8, "nombre" => "Coolers")
    );
    return $categorias;
}

function getCategoria($id){
    $categoria = NULL;
    foreach (getCategorias() as $aux) {
        if ($aux["id"] == $id) {
            $categoria = $aux;
        }
    }
    return $categoria;
}

function getProductosDeCategoria($idCategoria){
    $productos = array();
    
    if ($idCategoria==1) {
        $productos[] = array("id"=> 1, 
            "nombre"=> "Pentium II", 
            "descripcion" => "muy viejo y muy lento",
            "precio" => 10, "imagen" => "logo.png");
        $productos[] = array("id"=> 2, 
            "nombre"=> "Pentium III", 
            "descripcion" => "muy viejo y lento",
            "precio" => 20, "imagen" => "logo.png");
        $productos[] = array("id"=> 3, 
            "nombre"=> "i9", 
            "descripcion" => "lo mejor que se puede comprar",
            "precio" => 200, "imagen" => "logo.png");
    } else if ($idCategoria== 2) {
         $productos[] = array("id"=> 4, 
            "nombre"=> "4GB DDR 2", 
            "descripcion" => "poca memoria y lenta",
            "precio" => 50, "imagen" => "logo.png");
        $productos[] = array("id"=> 5, 
            "nombre"=> "8 GB DDR 3", 
            "descripcion" => "bastante memoria y velocidad normal",
            "precio" => 120, "imagen" => "logo.png");
        $productos[] = array("id"=> 6, 
            "nombre"=> "16 GB DDR5", 
            "descripcion" => "mucha memoria y super rapida",
            "precio" => 195, "imagen" => "logo.png");
    }
    
    return $productos;
    
}

function getProducto($id){
    foreach (getCategorias() as $categoria){
        foreach(getProductosDeCategoria($categoria["id"]) as $aux){
            if($aux["id"]== $id) {
                return $aux;
            }
        }
    }
    
    return NULL;
}

function login($usuario, $password) {
    if($usuario == "test" && $password== "test"){
        return array(
            "usuario" => "test",
            "nombre" => "Usuario de Prueba"
        );
    }
    
    return NULL;
}

function getSmarty() {
    $mySmarty = new Smarty();
    $mySmarty->template_dir = 'templates';
    $mySmarty->compile_dir = 'templates_c';
    $mySmarty->config_dir = 'config';
    $mySmarty->cache_dir = 'cache';
    return $mySmarty;
}