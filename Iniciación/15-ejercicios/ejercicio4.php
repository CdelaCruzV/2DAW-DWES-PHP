<?php

/* 
Ejercicio 4. Crear un script en php que tenga 4 variables, una de tipo array,
 * otra de tipo string, otra int y otra booleana y que imprima un mensaje
 * segun el tipo de variable que sea.
 
 */

$matriz = array("hola mundo", 88);
$titulo = "Ejercicio en PHP";
$numero = 77;
$verdadero = true;

if(is_array($matriz)){
	echo "<h1>El array es un array</h1>";
}

if(is_string($titulo)){
	echo "<h1>$titulo</h1>";
}

if(is_integer($numero)){
	echo "<h1>$numero</h1>";
}

if(is_bool($verdadero)){
	echo "El boleano es verdadero";
}


// Crea una función que se llame FILTRO, que tenga un parámetro, los argumentos serán diferentes variables analizará para ver que tipo de 


$listado = array("Pedro", "Almudena", "Francisco");
$cadena = "Esto es un texto muy agradable de leer";
$valor = 85;
$booleano = false;