<?php
class ClienteDAO{
	private $idCliente;
	private $nombre;
	private $cuenta;
	private $saldo;

	function ClienteDAO($pIdCliente = "", $pNombre = "", $pCuenta = "", $pSaldo = ""){
		$this -> idCliente = $pIdCliente;
		$this -> nombre = $pNombre;
		$this -> cuenta = $pCuenta;
		$this -> saldo = $pSaldo;
	}

	function insert(){
		return "insert into Cliente(nombre, cuenta, saldo)
				values('" . $this -> nombre . "', '" . $this -> cuenta . "', '" . $this -> saldo . "')";
	}

	function update(){
		return "update Cliente set 
				nombre = '" . $this -> nombre . "',
				cuenta = '" . $this -> cuenta . "',
				saldo = '" . $this -> saldo . "'	
				where idCliente = '" . $this -> idCliente . "'";
	}

	function select() {
		return "select idCliente, nombre, cuenta, saldo
				from Cliente
				where idCliente = '" . $this -> idCliente . "'";
	}

	function selectAll() {
		return "select idCliente, nombre, cuenta, saldo
				from Cliente";
	}

	function selectAllOrder($orden, $dir){
		return "select idCliente, nombre, cuenta, saldo
				from Cliente
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idCliente, nombre, cuenta, saldo
				from Cliente
				where nombre like '%" . $search . "%' or cuenta like '%" . $search . "%' or saldo like '%" . $search . "%'";
	}

	function delete(){
		return "delete from Cliente
				where idCliente = '" . $this -> idCliente . "'";
	}
}
?>
