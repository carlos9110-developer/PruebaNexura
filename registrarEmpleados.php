<?php
    require_once "php/Roles.php";
    require_once "php/Areas.php";
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
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Registro Empleados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

        </div>
    </nav>
    <div class="container contenido-vista">

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h5 class="text-info">Registro Empleado</h5>
                    </div>
                    <div class="col-lg-6 col-md-6 text-right">
                        <a class="btn btn-info btn-sm" href="index.php"><b>Listado Empleados</b></a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <form action="#" method="POST" name="form" id="form">
                    <input type="hidden"  id="op" name="op" value="1" >
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
                                    <?php foreach($roles as $rol ): ?>
                                        <option value="<?php echo $rol->id ?>"><?php echo $rol->nombre ?></option>
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
                                    <input class="form-check-input" type="checkbox" value="<?php echo $rol->id ?>" name="roles[]" >
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
                            <button id="btn-submit" type="submit" class="btn btn-success"><i class="bi bi-save"></i> Registrar Información</button>
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

    <script>
        $("#form").on("submit", function(e) {
            registrar(e);
        });

        // función donde se registran los productos
        function registrar(e) {
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
                    console.log("eee",res);
                    if(res==1){
                        alertify.success('<b>Registro Empleado Exitoso</b>');
                        $("#form")[0].reset();
                    }else{
                        alertify.error('<b>Error, se presento un problema al realizar el registro, por favor intelo de nuevo</b>');
                    }
                }
            });
        }
    </script>

</body>

</html>