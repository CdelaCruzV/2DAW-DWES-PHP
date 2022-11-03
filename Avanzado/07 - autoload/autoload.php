<?php
require_once 'config/Parameters.php';

// 
/** Este fichero nos servirá para cargar todas las clases necesarias en nuestro proyecto una única vez
 * Evita hacer los required o los required_once
 */

// Esta funcion va a recibir el nombre de la clase y le concatena el .php para cargarla
function autocargar($classname){
	include $classname . '.php';
}

// Carga automaticamente la funcion autocargar 
spl_autoload_register('autocargar');
?>