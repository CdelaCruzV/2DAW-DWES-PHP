<?php
require_once 'config/database.php';
include 'Model.php';

class User implements Model{
	private $id;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
	
	public function __construct() {

	}
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getApellidos() {
		return $this->apellidos;
	}

	function getEmail() {
		return $this->email;
	}

	function getPassword() {
		return $this->password;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setApellidos($apellidos) {
		$this->apellidos = $apellidos;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function setPassword($password) {
		$this->password = password_hash($password, PASSWORD_BCRYPT, ['cont' => 4]) ;
	}

	/**
	 * 
	 */
	public function findAll(){
		$db = Database::conectar();
		$sql = "SELECT * FROM users;";
		$findAll = $db->query($sql);
		return $findAll;
	}

	/**
	 * 
	 */
    public function findById($id){
		$db = Database::conectar();
		$sql = "SELECT * FROM users WHERE id={$id};";
		$findById = $db->query($sql)->fetch_row();
		return $findById;
	}

	/**
	 * 
	 */
    public function save(){
		$db = Database::conectar();
		$sql = "INSERT INTO users(nombre, apellidos, email, password, fecha) VALUES('{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', NULL);";
		$save = $db->query($sql);
		return $save;
	}

	/**
	 * 
	 */ 
    public function update(){
		$db = Database::conectar();
		$sql = "UPDATE users SET nombre = '{$this->getNombre()}', apellidos = '{$this->getApellidos()}', email = '{$this->getEmail()}', password = '{$this->getPassword()}' WHERE id={$this->getId()};";
		$update = $db->query($sql);
		return $update;
	}

	/**
	 * 
	 */
    public function delete($id){
		$db = Database::conectar();
		$sql = "DELETE FROM users WHERE id={$id}";
		$delete = $db->query($sql);
		return $delete;
	}
}