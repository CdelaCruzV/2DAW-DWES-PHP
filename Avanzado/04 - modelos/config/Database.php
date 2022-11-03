<?php

class Database{
	public static function conectar(){
		$conexion = new mysqli("localhost", "root", "", "taller_master");
		$conexion->query("SET NAMES 'utf8'");
		
		return $conexion;
	}
}
