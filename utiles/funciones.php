<?php
// Archivo llamado por ../configuracion.php

function data_submitted() {
    // Función auxiliar para tomar los datos recibidos sin importar el método usado
    $_AAux= array();
    if (!empty($_POST))
        $_AAux =$_POST;
    else if(!empty($_GET)) {
            $_AAux =$_GET;
    }
    if (count($_AAux)){
        foreach ($_AAux as $indice => $valor) {
            if ($valor=="")
                $_AAux[$indice] = 'null';
        }
    }
    return $_AAux;
}

spl_autoload_register(function ($clase) {
    $directorys = array(
        $GLOBALS['ROOT'].'modelo/',
        $GLOBALS['ROOT'].'control/',
    );
    foreach($directorys as $directory){
        if(file_exists($directory.$clase.'.php')){
            require_once($directory.$clase.'.php');
            return;
        }
    }
});

?>