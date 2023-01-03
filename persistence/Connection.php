<?php
class Connection {
	private $mysqli;
	private $result;

	/**
	 * Open the conection 
	 */ 
	function open(){
		$this -> mysqli = new mysqli("localhost", "root", "", "prueba");
		$this -> mysqli -> set_charset("utf8");
	}

	function lastId(){
		return $this -> mysqli -> insert_id;
	}

	function run($query){
		$this -> result = $this -> mysqli -> query($query);
	}

	function close(){
		$this -> mysqli -> close();
	}

	function numRows(){
		return ($this -> result != null)?$this -> result -> num_rows : 0;
	}

	function fetchRow(){
		return $this -> result -> fetch_row();
	}

	function querySuccess(){
		return $this -> result === TRUE;
	}
}
?>
