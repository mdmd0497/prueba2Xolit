<?php
require_once ("persistence/ClienteDAO.php");
require_once ("persistence/Connection.php");

class Cliente {
	private $idCliente;
	private $nombre;
	private $cuenta;
	private $saldo;
	private $clienteDAO;
	private $connection;

	function getIdCliente() {
		return $this -> idCliente;
	}

	function setIdCliente($pIdCliente) {
		$this -> idCliente = $pIdCliente;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getCuenta() {
		return $this -> cuenta;
	}

	function setCuenta($pCuenta) {
		$this -> cuenta = $pCuenta;
	}

	function getSaldo() {
		return $this -> saldo;
	}

	function setSaldo($pSaldo) {
		$this -> saldo = $pSaldo;
	}

	function Cliente($pIdCliente = "", $pNombre = "", $pCuenta = "", $pSaldo = ""){
		$this -> idCliente = $pIdCliente;
		$this -> nombre = $pNombre;
		$this -> cuenta = $pCuenta;
		$this -> saldo = $pSaldo;
		$this -> clienteDAO = new ClienteDAO($this -> idCliente, $this -> nombre, $this -> cuenta, $this -> saldo);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> clienteDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> clienteDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> clienteDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idCliente = $result[0];
		$this -> nombre = $result[1];
		$this -> cuenta = $result[2];
		$this -> saldo = $result[3];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> clienteDAO -> selectAll());
		$clientes = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($clientes, new Cliente($result[0], $result[1], $result[2], $result[3]));
		}
		$this -> connection -> close();
		return $clientes;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> clienteDAO -> selectAllOrder($order, $dir));
		$clientes = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($clientes, new Cliente($result[0], $result[1], $result[2], $result[3]));
		}
		$this -> connection -> close();
		return $clientes;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> clienteDAO -> search($search));
		$clientes = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($clientes, new Cliente($result[0], $result[1], $result[2], $result[3]));
		}
		$this -> connection -> close();
		return $clientes;
	}

	function delete(){
		$this -> connection -> open();
		$this -> connection -> run($this -> clienteDAO -> delete());
		$success = $this -> connection -> querySuccess();
		$this -> connection -> close();
		return $success;
	}
}
?>
