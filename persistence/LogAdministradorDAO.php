<?php
class LogAdministradorDAO{
	private $idLogAdministrador;
	private $accion;
	private $informacion;
	private $fecha;
	private $hora;
	private $ip;
	private $so;
	private $explorador;
	private $administrador;

	function LogAdministradorDAO($pIdLogAdministrador = "", $pAccion = "", $pInformacion = "", $pFecha = "", $pHora = "", $pIp = "", $pSo = "", $pExplorador = "", $pAdministrador = ""){
		$this -> idLogAdministrador = $pIdLogAdministrador;
		$this -> accion = $pAccion;
		$this -> informacion = $pInformacion;
		$this -> fecha = $pFecha;
		$this -> hora = $pHora;
		$this -> ip = $pIp;
		$this -> so = $pSo;
		$this -> explorador = $pExplorador;
		$this -> administrador = $pAdministrador;
	}

	function insert(){
		return "insert into LogAdministrador(accion, informacion, fecha, hora, ip, so, explorador, administrador_idAdministrador)
				values('" . $this -> accion . "', '" . $this -> informacion . "', '" . $this -> fecha . "', '" . $this -> hora . "', '" . $this -> ip . "', '" . $this -> so . "', '" . $this -> explorador . "', '" . $this -> administrador . "')";
	}

	function update(){
		return "update LogAdministrador set 
				accion = '" . $this -> accion . "',
				informacion = '" . $this -> informacion . "',
				fecha = '" . $this -> fecha . "',
				hora = '" . $this -> hora . "',
				ip = '" . $this -> ip . "',
				so = '" . $this -> so . "',
				explorador = '" . $this -> explorador . "',
				administrador_idAdministrador = '" . $this -> administrador . "'	
				where idLogAdministrador = '" . $this -> idLogAdministrador . "'";
	}

	function select() {
		return "select idLogAdministrador, accion, informacion, fecha, hora, ip, so, explorador, administrador_idAdministrador
				from LogAdministrador
				where idLogAdministrador = '" . $this -> idLogAdministrador . "'";
	}

	function selectAll() {
		return "select idLogAdministrador, accion, informacion, fecha, hora, ip, so, explorador, administrador_idAdministrador
				from LogAdministrador";
	}

	function selectAllByAdministrador() {
		return "select idLogAdministrador, accion, informacion, fecha, hora, ip, so, explorador, administrador_idAdministrador
				from LogAdministrador
				where administrador_idAdministrador = '" . $this -> administrador . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idLogAdministrador, accion, informacion, fecha, hora, ip, so, explorador, administrador_idAdministrador
				from LogAdministrador
				order by " . $orden . " " . $dir;
	}

	function selectAllByAdministradorOrder($orden, $dir) {
		return "select idLogAdministrador, accion, informacion, fecha, hora, ip, so, explorador, administrador_idAdministrador
				from LogAdministrador
				where administrador_idAdministrador = '" . $this -> administrador . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idLogAdministrador, accion, informacion, fecha, hora, ip, so, explorador, administrador_idAdministrador
				from LogAdministrador
				where accion like '%" . $search . "%' or fecha like '%" . $search . "%' or hora like '%" . $search . "%' or ip like '%" . $search . "%' or so like '%" . $search . "%' or explorador like '%" . $search . "%'
				order by fecha desc, hora desc";
	}
}
?>
