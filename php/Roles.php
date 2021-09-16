<?php
require_once "Base.php";
Class Roles
{
    private $db;
    public  $result;

	public function __construct()
	{
        $this->db = new Base();
	}

	// función donde se activa o desactiva un determinado producto
	public function listarRoles()
	{
		$this->db->query(" SELECT id,nombre FROM roles ");
		$this->result = $this->db->registros();
		return $this->result;
	}	

	
}