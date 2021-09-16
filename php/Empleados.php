<?php
require_once "Base.php";
Class Empleados
{
    private $db;
    public  $result;

	public function __construct()
	{
        $this->db = new Base();
	}

	// función donde se activa o desactiva un determinado producto
	public function RegistrarEmpleados(array $datos):int
	{
        try {
            $this->db->query(" INSERT INTO  empleados (nombre,email,sexo,area_id,boletin,descripcion) VALUES(:nombre,:email,:sexo,:area_id,:boletin,:descripcion) ");
            $this->db->bind(':nombre',$datos['nombre_completo']);
            $this->db->bind(':email',$datos['correo_electronico']);
            $this->db->bind(':sexo',$datos['radioSexo']);
            $this->db->bind(':area_id',$datos['area']);
            $this->db->bind(':boletin', ( isset($datos['boletin']) && $datos['boletin'] == '1' ) ? $datos['boletin'] : 0);
            $this->db->bind(':descripcion',$datos['descripcion']);
            $this->db->execute();

            if(isset($datos['roles'])){
                $this->RegistrarRoles($datos['roles'],$this->db->con->lastInsertId());
            }
            return 1;

        } catch (Exception $ex) {
            return 0;
        }
	}	


    // función donde se activa o desactiva un determinado producto
	public function EditarEmpleados(array $datos):int
	{
        try {
            $this->db->query(" UPDATE   empleados  SET nombre=:nombre,email=:email,sexo=:sexo,area_id=:area_id,boletin=:boletin,descripcion=:descripcion WHERE id=:id  ");
            $this->db->bind(':nombre',$datos['nombre_completo']);
            $this->db->bind(':email',$datos['correo_electronico']);
            $this->db->bind(':sexo',$datos['radioSexo']);
            $this->db->bind(':area_id',$datos['area']);
            $this->db->bind(':boletin', ( isset($datos['boletin']) && $datos['boletin'] == '1' ) ? $datos['boletin'] : 0);
            $this->db->bind(':descripcion',$datos['descripcion']);
            $this->db->bind(':id',$datos['id_empleado']);
            $this->db->execute();

            if(isset($datos['roles'])){
                $this->EliminarRoles($datos['id_empleado']);
                $this->RegistrarRoles($datos['roles'],$datos['id_empleado']);
            }
            return 1;

        } catch (Exception $ex) {
            return 0;
        }
	}	

    private function EliminarRoles(int $id)
    {
        $this->db->query(" DELETE FROM  empleado_rol  WHERE empleado_id=:id  ");
        $this->db->bind(':id',$id);
        $this->db->execute();
    }

    private function RegistrarRoles(array $roles, int $id_empleado)
    {    
        foreach ($roles as $rol) {
            $this->db->query(" INSERT INTO  empleado_rol (empleado_id,rol_id) VALUES(:empleado_id,:rol_id) ");
            $this->db->bind(':empleado_id',$id_empleado);
            $this->db->bind(':rol_id',$rol);
            $this->db->execute();
        }
    }


    public function ListarEmpleados()
    {
        $this->db->query(" SELECT  e.id,e.nombre,e.email,e.sexo,e.area_id,e.boletin,e.descripcion,a.nombre AS area FROM empleados AS e INNER JOIN areas AS a ON e.area_id=a.id  ");
		$this->result = $this->db->registros();
		return $this->result;
    }

    public function TraerInfoEmpleado(int $id)
    {
        $this->db->query(" SELECT * FROM empleados WHERE id=:id ");
        $this->db->bind(':id',$id);
        return $this->db->registro();
    }

    public function TraerRolesEmpleado(int $id)
    {
        $this->db->query(" SELECT * FROM empleado_rol WHERE empleado_id=:id ");
        $this->db->bind(':id',$id);
        return $this->db->registros();
    }




	
}