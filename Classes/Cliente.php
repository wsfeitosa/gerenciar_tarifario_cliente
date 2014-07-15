<?php
class Cliente {
	
	protected $conn = null;
	
	public function __construct() 
	{
		$this->conn = Zend_Conn();		
	}
	
	public function consultarPorId($id_cliente = null)
	{
		if( empty($id_cliente) )
		{
			throw new InvalidArgumentException("O cliente informado para realizar a busca não é um cliente válido!");
		}	
		
		$sql = $this->conn->
							select("*")->
							from("CLIENTES.clientes")->
							where("id_cliente = ?",$id_cliente);
		
		$rowSet = $this->conn->fetchRow($sql);
		
		return $rowSet;
	}
	
}