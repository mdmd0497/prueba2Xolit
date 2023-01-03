<?php
class AdministradorDAO{
	private $idAdministrador;
	private $nombre;
	private $apellido;
	private $correo;
	private $clave;
	private $foto;
	private $telefono;
	private $celular;
	private $estado;

	function AdministradorDAO($pIdAdministrador = "", $pNombre = "", $pApellido = "", $pCorreo = "", $pClave = "", $pFoto = "", $pTelefono = "", $pCelular = "", $pEstado = ""){
		$this -> idAdministrador = $pIdAdministrador;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> foto = $pFoto;
		$this -> telefono = $pTelefono;
		$this -> celular = $pCelular;
		$this -> estado = $pEstado;
	}

	function logIn($correo, $clave){
		return "select idAdministrador, nombre, apellido, correo, clave, foto, telefono, celular, estado
				from Administrador
				where correo = '" . $correo . "' and clave = '" . md5($clave) . "'";
	}

	function insert(){
		return "insert into Administrador(nombre, apellido, correo, clave, foto, telefono, celular, estado)
				values('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> foto . "', '" . $this -> telefono . "', '" . $this -> celular . "', '" . $this -> estado . "')";
	}

	function update(){
		return "update Administrador set 
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				correo = '" . $this -> correo . "',
				telefono = '" . $this -> telefono . "',
				celular = '" . $this -> celular . "',
				estado = '" . $this -> estado . "'	
				where idAdministrador = '" . $this -> idAdministrador . "'";
	}

	function updateClave($password){
		return "update Administrador set 
				clave = '" . md5($password) . "'
				where idAdministrador = '" . $this -> idAdministrador . "'";
	}

	function existEmail($email){
		return "select idAdministrador, nombre, apellido, correo, clave, foto, telefono, celular, estado
				from Administrador
				where email = '" . $email . "'";
	}

	function recoverPassword($email, $password){
		return "update Administrador set 
				clave = '" . md5($password) . "'
				where correo = '" . $email . "'";
	}

	function updateImage($attribute, $value){
		return "update Administrador set "
				. $attribute . " = '" . $value . "'
				where idAdministrador = '" . $this -> idAdministrador . "'";
	}

	function select() {
		return "select idAdministrador, nombre, apellido, correo, clave, foto, telefono, celular, estado
				from Administrador
				where idAdministrador = '" . $this -> idAdministrador . "'";
	}

	function selectAll() {
		return "select idAdministrador, nombre, apellido, correo, clave, foto, telefono, celular, estado
				from Administrador";
	}

	function selectAllOrder($orden, $dir){
		return "select idAdministrador, nombre, apellido, correo, clave, foto, telefono, celular, estado
				from Administrador
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idAdministrador, nombre, apellido, correo, clave, foto, telefono, celular, estado
				from Administrador
				where nombre like '%" . $search . "%' or apellido like '%" . $search . "%' or correo like '%" . $search . "%' or telefono like '%" . $search . "%' or celular like '%" . $search . "%' or estado like '%" . $search . "%'";
	}
}
?>
