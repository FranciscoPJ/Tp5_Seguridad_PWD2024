<?php 
function data_submitted() {
    $_AAux= array();
    if (!empty($_POST))
        $_AAux =$_POST;
        else
            if(!empty($_GET)) {
                $_AAux =$_GET;
            }
        if (count($_AAux)){
            foreach ($_AAux as $indice => $valor) {
                if ($valor=="")
                    $_AAux[$indice] = 'null' ;
            }
        }
        return $_AAux;
        
} // muestra el $_GET, $_POST y $_AAux por print_r

function verEstructura($e){
    echo "<pre>";
    print_r($e);
    echo "</pre>"; 
}

spl_autoload_register(function ($class_name) {
    $directorys = array(
        $GLOBALS['ROOT'] . 'Modelo/',
        $GLOBALS['ROOT'] . 'Modelo/Conector/',
        $GLOBALS['ROOT'] . 'Control/',
        $GLOBALS['ROOT'] . 'Util/'
    );

    foreach ($directorys as $directory) {
        if (file_exists($directory . $class_name . '.php')) {
            require_once($directory . $class_name . '.php');
            return;
        }
    }
});

/*spl_autoload_register(function ($class_name) {
    $directorys = array(
        $_SESSION['ROOT'] . 'Modelo/',
        $_SESSION['ROOT'] . 'Modelo/Conector/',
        $_SESSION['ROOT'] . 'Control/'
    );

    foreach ($directorys as $directory) {
        if (file_exists($directory . $class_name . '.php')) {
            require_once($directory . $class_name . '.php');
            return;
        }
    }
});*/
?>