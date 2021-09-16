<?php
require_once "Empleados.php";
date_default_timezone_set("America/Bogota");
$fecha_hora_actual =  date('Y-m-d H:i:s'); // formato fecha colombiana

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        if($_POST['op']=='1'){
            $empleados = new Empleados();
            echo $empleados->RegistrarEmpleados($_POST);
        }
        else if($_POST['op']=='2')
        {
            $empleados = new Empleados();
            $array = array(
                'infoEmpleado'=> $empleados->TraerInfoEmpleado($_POST['id']),
                'roles' => $empleados->TraerRolesEmpleado($_POST['id'])
            );
            header('Content-Type: application/json');
            echo  json_encode($array);
        }
        else if($_POST['op']=='3')
        {
            $empleados = new Empleados();
            echo $empleados->EditarEmpleados($_POST);
        }
        else if($_POST['op']=='4')
        {
            $empleados = new Empleados();
            echo $empleados->EliminarEmpleado($_POST['id']);
        }
    break;
}