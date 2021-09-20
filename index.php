<?php
    require_once "php/Empleados.php";
    require_once "php/Roles.php";
    require_once "php/Areas.php";
    $obj_empleados =new Empleados();
    $empleados = $obj_empleados->ListarEmpleados();
    $obj_roles =new Roles();
    $roles = $obj_roles->listarRoles();
    $obj_areas = new Areas();
    $areas = $obj_areas->listarAreas();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Prueba Nexura</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <link rel="stylesheet" href="css/css.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Gestión Empleados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

        </div>
    </nav>
    <div class="container contenido-vista">

        <div class="card" id="card-tabla">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h5 class="text-info">Listado Empleados</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 text-right">
                    <a class="btn btn-info btn-sm" href="registrarEmpleados.php"><b>Registrar Empleado</b></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="tbl_empleados" width="100%">
                    <thead>
                        <tr>
                            <th scope="col"><i class="bi bi-person"></i> Nombre</th>
                            <th scope="col"><i class="bi bi-envelope"></i> Email</th>
                            <th scope="col"><i class="bi bi-gender-ambiguous"></i> Sexo</th>
                            <th scope="col"><i class="bi bi-bag"></i> Área</th>
                            <th scope="col"><i class="bi bi-envelope"></i> Boletín</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($empleados as $empleado ): ?>
                            <tr>
                                <td><?php  echo $empleado->nombre  ?></td>
                                <td><?php  echo $empleado->email  ?></td>
                                <td><?php  echo ($empleado->sexo=="M") ?  "Masculino" : "Femenino"  ?></td>
                                <td><?php  echo $empleado->area  ?></td>
                                <td><?php echo ($empleado->boletin==1) ?  "Si" : "No"   ?></td>
                                <td><button type="button" class="btn btn-sm btn-warning"  onclick="abrirEditar('<?php echo $empleado->id ?>')"><i class="bi bi-pencil-square"></i></button> </td>
                                <td><button type="button" class="btn btn-sm btn-danger"  onclick="abrirEliminar('<?php echo $empleado->id ?>')"><i class="bi bi-trash"></i></button> </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                
            </div>
        </div>


        <div class="card" id="card-form-editar">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h5 class="text-info">Editar Información Empleado</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 text-right">
                        <a class="btn btn-info btn-sm" href="index.php"><b>Listado Empleados</b></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <form action="#" method="POST" name="form" id="form">
                    <input type="hidden"  id="op" name="op" value="3" >
                    <input type="hidden"  id="id_empleado" name="id_empleado"  >
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                            <label>Nombre Completo *</label>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person"></i></span>
                                </div>
                                <input class="form-control" type="text" id="nombre_completo" name="nombre_completo" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                            <label>Correo electrónico *</label>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                                </div>
                                <input class="form-control" type="email" id="correo_electronico" name="correo_electronico" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                            <label>Sexo *</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioSexo" id="radio_sexo_masculino" value="M" required>
                                <label class="form-check-label" for="exampleRadios1">
                                  Masculino
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioSexo" id="radio_sexo_femenino" value="F" required>
                                <label class="form-check-label" for="exampleRadios2">
                                  Femenino
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                            <label>Area *</label>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-bag"></i></span>
                                </div>
                                <select class="form-control" name="area" id="area" required>
                                <option value="">Seleccione una opción:</option>
                                    <?php foreach($areas as $area ): ?>
                                        <option value="<?php echo $area->id ?>"><?php echo $area->nombre ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="boletin" id="boletin">
                                <label class="form-check-label" for="boletin">
                                  Deseo recibir boletín informativo
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 mb-1">
                            <label>Roles *</label>
                            <?php foreach($roles as $rol ): ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rol_<?php echo $rol->id ?>" value="<?php echo $rol->id ?>" name="roles[]" >
                                    <label class="form-check-label" for="roles">
                                        <?php echo $rol->nombre ?>
                                    </label>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-1">
                            <label>Descripción *</label>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-heading"></i></span>
                                </div>
                                <textarea name="descripcion" id="descripcion" cols="10" rows="4" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12 text-center" id="div-respuesta-form">
                        </div>

                        <div id="div-btn-submit" class="text-center col-lg-12 col-md-12  col-sm-12 mb-1">
                            <button id="btn-submit" type="submit" class="btn btn-success"><i class="bi bi-save"></i> <b>Editar Información</b></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <footer>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>       
    <script type="text/javascript" charset="utf8" src="js/funciones.js"></script>                     
    <script>
        function abrirEditar(id)
        {
            $("#card-tabla").hide();
            $("#card-form-editar").show();
            $.post("php/controlador.php", { id:id, op:'2' }, function(data, status)
            {
                console.log(data);
                $("#id_empleado").val(data.infoEmpleado.id);
                $("#nombre_completo").val(data.infoEmpleado.nombre);
                $("#correo_electronico").val(data.infoEmpleado.email);
                ( data.infoEmpleado.sexo == "M" ) ? $("#radio_sexo_masculino").prop("checked", true) : $("#radio_sexo_femenino").prop("checked", true);
                $("#area").val(data.infoEmpleado.area_id);
                ( data.infoEmpleado.boletin == "1" ) ? $("#boletin").prop("checked", true) : $("#boletin").prop("checked", false);
                $("#descripcion").val(data.infoEmpleado.descripcion);

                data.roles.forEach(function(rol, index) {
                    $("#rol_"+rol.rol_id).prop("checked", true)
                });
            });
        }

        function VolverListado()
        {
            $("#card-tabla").show();
            $("#card-form-editar").hide();
        }

        function inicio()
        {
            $('#tbl_empleados').DataTable({
                responsive: true,
                processing: true,
                pageLength: 5,
                aaSorting: [],//Agregar o Quitar segun se necesite desactivar orden
                language: Funciones.retornarIdiomaDatatable(),
                lengthMenu: [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50]
                ]
            });
            $("#form").on("submit", function(e) {
                editar(e);
            });
        }
        inicio();


        function abrirEliminar(id_em)
        {
            alertify.confirm('Eliminar', 'Presione Ok para confirmar la eliminación del usuario', 
            function()
            {
                $.post("php/controlador.php", { id:id_em, op:'4' }, function(data, status)
                {
                    if(data==1){
                        alertify.success('<b>Empleado eliminado con exito</b>');
                        setTimeout(function(){ window.location.href="index.php" }, 3000);
                    }else{
                        alertify.error('<b>Error, se presento un problema al eliminar el empleado por favor intentelo de nuevo</b>');
                    }
                });   
            },
            function()
            {

            });
        }

        

        // función donde se registran los productos
        function editar(e) {
            e.preventDefault(); //No se activará la acción predeterminada del evento
            var datos_formulario = new FormData($("#form")[0]);
            $.ajax({
                url: "php/controlador.php",
                type: "POST",
                data: datos_formulario,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    //$('#div_btn_submit_formulario').html('<button  class="btn btn-primary btn-lg" type="button"><i class="fa fa-spinner fa-spin"></i> <b>Validando Información, Espere un Momento Por Favor</b></button>');
                },
                success: function(res) {
                    if(res==1){
                        alertify.success('<b>Información empleado editada con exito</b>');
                    }else{
                        alertify.error('<b>Error, se presento un problema al editar la información por favor intentelo de nuevo</b>');
                    }
                }
            });
        }

    </script>

</body>

</html>