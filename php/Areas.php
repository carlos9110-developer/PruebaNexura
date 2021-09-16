<?php
require_once "Base.php";
Class Areas
{
    private $db;
    public  $result;

	public function __construct()
	{
        $this->db = new Base();
	}

	// función donde se activa o desactiva un determinado producto
	public function listarAreas()
	{
		$this->db->query(" SELECT id,nombre FROM areas ");
		$this->result = $this->db->registros();
		return $this->result;
	}	

	
}