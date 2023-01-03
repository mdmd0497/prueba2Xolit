<?php
require_once ("persistence/AdministradorDAO.php");
require_once ("persistence/Connection.php");

class Administrador {
	private $idAdministrador;
	private $nombre;
	private $apellido;
	private $correo;
	private $clave;
	private $foto;
	private $telefono;
	private $celular;
	private $estado;
	private $administradorDAO;
	private $connection;

	function getIdAdministrador() {
		return $this -> idAdministrador;
	}

	function setIdAdministrador($pIdAdministrador) {
		$this -> idAdministrador = $pIdAdministrador;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getApellido() {
		return $this -> apellido;
	}

	function setApellido($pApellido) {
		$this -> apellido = $pApellido;
	}

	function getCorreo() {
		return $this -> correo;
	}

	function setCorreo($pCorreo) {
		$this -> correo = $pCorreo;
	}

	function getClave() {
		return $this -> clave;
	}

	function setClave($pClave) {
		$this -> clave = $pClave;
	}

	function getFoto() {
		return $this -> foto;
	}

	function setFoto($pFoto) {
		$this -> foto = $pFoto;
	}

	function getTelefono() {
		return $this -> telefono;
	}

	function setTelefono($pTelefono) {
		$this -> telefono = $pTelefono;
	}

	function getCelular() {
		return $this -> celular;
	}

	function setCelular($pCelular) {
		$this -> celular = $pCelular;
	}

	function getEstado() {
		return $this -> estado;
	}

	function setEstado($pEstado) {
		$this -> estado = $pEstado;
	}

	function Administrador($pIdAdministrador = "", $pNombre = "", $pApellido = "", $pCorreo = "", $pClave = "", $pFoto = "", $pTelefono = "", $pCelular = "", $pEstado = ""){
		$this -> idAdministrador = $pIdAdministrador;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> foto = $pFoto;
		$this -> telefono = $pTelefono;
		$this -> celular = $pCelular;
		$this -> estado = $pEstado;
		$this -> administradorDAO = new AdministradorDAO($this -> idAdministrador, $this -> nombre, $this -> apellido, $this -> correo, $this -> clave, $this -> foto, $this -> telefono, $this -> celular, $this -> estado);
		$this -> connection = new Connection();
	}

	function logIn($email, $password){
		$this -> connection -> open();
		$this -> connection -> run($this -> administradorDAO -> logIn($email, $password));
		if($this -> connection -> numRows()==1){
			$result = $this -> connection -> fetchRow();
			$this -> idAdministrador = $result[0];
			$this -> nombre = $result[1];
			$this -> apellido = $result[2];
			$this -> correo = $result[3];
			$this -> clave = $result[4];
			$this -> foto = $result[5];
			$this -> telefono = $result[6];
			$this -> celular = $result[7];
			$this -> estado = $result[8];
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> administradorDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> administradorDAO -> update());
		$this -> connection -> close();
	}

	function updateClave($password){
		$this -> connection -> open();
		$this -> connection -> run($this -> administradorDAO -> updateClave($password));
		$this -> connection -> close();
	}

	function existEmail($email){
		$this -> connection -> open();
		$this -> connection -> run($this -> administradorDAO -> existEmail($email));
		if($this -> connection -> numRows()==1){
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
	}

	function recoverPassword($email, $password){
		$this -> connection -> open();
		$this -> connection -> run($this -> administradorDAO -> recoverPassword($email, $password));
		$this -> connection -> close();
	}

	function updateImage($attribute, $value){
		$this -> connection -> open();
		$this -> connection -> run($this -> administradorDAO -> updateImage($attribute, $value));
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> administradorDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idAdministrador = $result[0];
		$this -> nombre = $result[1];
		$this -> apellido = $result[2];
		$this -> correo = $result[3];
		$this -> clave = $result[4];
		$this -> foto = $result[5];
		$this -> telefono = $result[6];
		$this -> celular = $result[7];
		$this -> estado = $result[8];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> administradorDAO -> selectAll());
		$administradors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($administradors, new Administrador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8]));
		}
		$this -> connection -> close();
		return $administradors;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> administradorDAO -> selectAllOrder($order, $dir));
		$administradors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($administradors, new Administrador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8]));
		}
		$this -> connection -> close();
		return $administradors;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> administradorDAO -> search($search));
		$administradors = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($administradors, new Administrador($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8]));
		}
		$this -> connection -> close();
		return $administradors;
	}
}
?>
