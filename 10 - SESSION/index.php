<?php

/**
 * Iniciamos la sesion dentro del proyecto
 */
session_start();

/**
 * Este index es nuestro CONTROLADOR FRONTAL, es decir, se encarga de cargar un fichero, una accion u otra en funcion de lo que llega por la URL.
 * Es el unico fichero que se encarga de cargarlo absolutamente todo
 */

 /**
  * Realizamos todas las cargas necesarias de otros ficheros.
  */
require_once 'autoload.php';
require_once 'config/Database.php';
require_once 'config/Parameters.php';
require_once 'vendor/autoload.php';

/**
 * Cargamos Twig asociando la ubicacion de las vistas.
 * Introducimos la variable $twig como variable global para poder acceder desde otros ficheros como controladores y lanzar las vistas.
 */
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/views/templates');
// $twig = new \Twig\Environment($loader);

$twig = new \Twig\Environment($loader,
[
    'debug' => true,
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());

$GLOBALS["twig"];

/**
 * Comprobamos el controlador que recibimos por url 
 */
if(isset($_GET['controller'])){
	$nombre_controlador = ucfirst($_GET['controller']).'Controller';
}
/**
 * En el caso de que no haya ningun controlador seleccionado, cargamos el controlador por defecto.
 */
elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
	$nombre_controlador = ucfirst(controller_default);
}
/**
 * En caso de que exista algún error, lanzamos mensaje de error y finalizamos ejecucion.
 */
else{
	echo "Error, no existe";
	exit();
}

/**
 * Una vez hemos realizado las comprobaciones con el controlador:
 * Buscamos si existe la clase o fichero del controlador y en tal caso, buscamos el método correspondiente
 */
if(class_exists($nombre_controlador)){	
	$c = ucfirst($nombre_controlador);
	$controlador = new $nombre_controlador();
    
    /**
     * Cargamos la acción que recibimos por URL
     */
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
		$action = $_GET['action'];
		$controlador->$action();
	}
    /**
     * En caso de no recibir ninguna, realizamos la carga de acción por defecto
     */
	elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$action_default = action_default;
		$controlador->$action_default();
	}
	else{
        /**
         * Si mi página no existe, se lanza el error correspondiente como excepcion
         */
		// $error = new ErrorController();
		// $error->index();
		// exit();
	}
}else{
	/**
     * Si mi controlador no existe, se lanza el error correspondiente como excepcion
     */
    // $error = new ErrorController();
    // $error->index();
    // exit();
}