<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$año = new HomeModel();

$perfiles = $año->selectañoEspecialidades();

?>
<style>
    .contedorlinkbolsa {
        max-width: 100%;
        margin: auto;
    }

    @media (min-width: 800px) {
        .contedorlinkbolsa {
            max-width: 900px;
            margin: auto;
        }
    }

    @media (min-width: 1024px) {
        .contedorlinkbolsa {
            max-width: 1200px;
            margin: auto;
        }
    }
</style>




<div class="contedorlinkbolsa pt-4 pb-1">
    <div class="row d-flex justify-content-around ">
        <a class="col-8 col-md-3 col-lg-2 fondo m-1" target="_blank" href="https://jobboard.universia.net/unitruoportunidades">
            <div class="col-12 text-right col-md-12">
                <h1 class="mostaza"><i class="fas fa-briefcase"></i></h1>
                <br>
            </div>
            <div class="col-12 text-left col-md-12">
                <h5 class="">BOLSA DE TRABAJO UNT</h5>
            </div>
        </a>

        <a class="col-8 col-md-3 col-lg-2 fondo m-1" target="_blank" href="https://www.empleosperu.gob.pe/portal-mtpe/">
            <div class="col-12 text-right col-md-12">
                <h1 class="mostaza"><i class="fas fa-briefcase"></i></h1>
                <br>
            </div>
            <div class="col-12 text-left col-md-12">
                <h5 class="">PORTAL EMPLEOS PERÚ</h5>
            </div>
        </a>

        <a class="col-8 col-md-3 col-lg-2 fondo m-1" target="_blank" href="https://www.abriljobs.com/jobs?page=1">
            <div class="col-12 text-right col-md-12">
                <h1 class="mostaza"><i class="fas fa-briefcase"></i></h1>
                <br>
            </div>
            <div class="col-12 text-left col-md-12">
                <h5 class="">AbrilATS+</h5>
            </div>
        </a>


        <a class="col-8 col-md-3 col-lg-2 fondo m-1" href="<?= base_url(); ?>/solicitudempleo">
            <div class="col-12 text-right col-md-12">
                <h1 class="mostaza"><i class="fas fa-edit"></i></h1>
                <br>
            </div>
            <div class="col-12 text-left col-md-12">
                <h5 class="">SOLICITUD DE OFERTA LABORAL</h5>
            </div>
        </a>

        <a class="col-8 col-md-3 col-lg-2 fondo m-1" href="<?= base_url(); ?>/encuestaempresas">
            <div class="col-12 text-right col-md-12">
                <h1 class="mostaza"><i class="fas fa-user-edit"></i></h1>
                <br>
            </div>
            <div class="col-12 text-left col-md-12">
                <h5 class="">ENCUESTA EMPLEADORES</h5>
            </div>
        </a>

    </div>
</div>







<style>
    .contenedor {
        max-width: 1200px;
        margin: auto;
    }

    .listempleos {
        min-height: 60vh;
        max-height: 60vh;
        overflow-y: auto;
    }

    .callout.callout-danger {
        border-left-color: #12377b;

    }

    .callout {
        border-radius: 0.25rem;
        box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
        background-color: #fff;
        border-left: 5px solid #e9ecef;
        margin-bottom: 1rem;
        padding: 1rem;
    }
</style>


<div class="col-12 row contenedor">

    <div class="col-5 listempleos " id="empleos">

    </div>

    <div class="col-7 listempleos  ">
        <h5 id="nombrePuesto"></h5>
        <br>

        <p id="DescripcionPuesto"></p>
        <br>
    </div>

</div>

<!-- registro de usuarios -->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <form id="formUsuario" name="formUsuario" class="form-horizontal">

                    <div class="form-group col-md-12">
                        <label for="dni">Dni</label>
                        <input type="text" class="form-control  " id="dni" name="dni" required="">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="nombre">Nombres</label>
                        <input type="text" class="form-control  " id="nombre" name="nombre" required="">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="escuela">escuela</label>
                        <input type="text" class="form-control  " id="escuela" name="escuela" required="">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="celular">celular</label>
                        <input type="text" class="form-control  " id="celular" name="celular" required="">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="email">email</label>
                        <input type="text" class="form-control  " id="email" name="email" required="">
                    </div>

                    <a href="javascript:void(0);" onclick="registroUsuario()" class="btn btn-outline-primary pl-5 pr-5">
                        Guardar
                    </a>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- usuarios registrados -->

<div class="modal fade" id="modalUsuariosRegistrados" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <form id="formUsuario" name="formUsuario" class="form-horizontal">

                    <div class="form-group col-md-12">
                        <label for="dni_usuario">Dni</label>
                        <input type="text" class="form-control  " id="dni_usuario" name="dni_usuario" required="">
                    </div>

                    <div id="usuarioInfo">

                    </div>

                    <a href="javascript:void(0);" onclick="buscarUsuario()" class="btn btn-outline-primary pl-5 pr-5">
                        Accedor
                    </a>
                </form>
            </div>

        </div>
    </div>
</div>


<style>
    .contenedor_ofertas_curos {
        display: grid;
        grid-template-columns: auto auto auto;
        /* Ajusta el número de columnas según tus necesidades */
        margin: auto;
        column-gap: 10px;
        grid-auto-rows: auto;

    }

    .cursos_empleabilidad {
        max-width: 200px;
        /* height: max-content; */

    }
</style>


<div class="contenedor_ofertas_curos">
    <div class="cursos_empleabilidad desarrollo_personal" data-aos="fade-left">
        <a href="<?= base_url(); ?>/desarrollo_personal"><img src="<?= media(); ?>/archivos/bolsa_de_trabajo/desarrollo_personal.png" alt=""></a>
    </div>
    <div class="cursos_empleabilidad imagen_egresados" data-aos="fade-up">
      <img src="<?= media(); ?>/archivos/bolsa_de_trabajo/egresados.png" alt="">
    </div>
    <div class="cursos_empleabilidad empleos" data-aos="fade-right">
        <a href="<?= base_url();?>/ofertas_laborales"><img src="<?= media(); ?>/archivos/bolsa_de_trabajo/empleos.png" alt=""></a>
    </div>
</div>




<!-- SEGUNDAS ESPECIALIDADES -->
<div class="modal fade" id="modalInformacionSesion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">

                <form id="formUsuario" name="formUsuario" class="form-horizontal text-center">

                    <div class="form-group  col-md-12">
                        <img style="max-width: 250px;" src="<?= media(); ?>/archivos/logos/logoUse.png" alt="">
                    </div>

                    <div class="form-group col-md-12 ">
                        <a href="javascript:void(0);" onclick="modalNuevoUsuario()" class="btn btn-outline-primary pl-5 pr-5">
                            Nuevo usuario
                        </a>
                    </div>

                    <div class="form-group col-md-12 ">
                        <a href="javascript:void(0);" onclick="modalUsuariosRegistrados()" class="btn btn-outline-primary pl-5 pr-5">
                            Ya estoy registrado
                        </a>
                    </div>

                    <div class="form-group col-md-12 ">
                        <a href="<?= base_url(); ?>/solicitudempleo" class="btn btn-outline-primary pl-5 pr-5">
                            Acceso a empresa
                        </a>


                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<?php footer($data); ?>

<script>
    function empleos() {
        $.ajax({
            method: "GET",
            url: "" + base_url + "/bolsadetrabajo/get",
            //data: datax
            //data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);
            listado = '';

            for (i = 0; i < info.length; i++) {
                listado = listado +

                    `
                    <div class="col-12 row callout callout-danger">
                        <div class="col-4">
                            <img class="img-fluid" src="<?= media() ?>/archivos/empresa/` + info[i].imagen + `">
                        </div>
                        <div class="col-8">
                            <h5><span>` + info[i].NombrePuesto + `</span></h5>
                            <h5>Empresa: <span>` + info[i].nombreEmpresa + `</span></h5>                           
                        </div>                      
                            <div class="col-12">
                                <h5><span> ` + info[i].nombreEscuela + `</span></h5>
                            </div>
                            <div class="col-12 text-center">
                                <a href="javascript:void(0);" class="btn btn-outline-primary" onclick="ver(` + info[i].idEmpleos + ` )" >Más Información</a>
                            </div>                       
                    </div>
                   
                `;

            }

            //console.log(listado);

            $("#empleos").html(listado);

        });
    }

    function ver(id) {
        $.ajax({
            method: "GET",
            url: "" + base_url + "/bolsadetrabajo/getOne/" + id,
            //data: datax
            //data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);
            console.log(info);
            console.log(info[0].NombrePuesto);

            var descripcionpuesto = null;

            descripcionpuesto = '<h4>Descripcion Puesto:</h4>' + info[0].DescripcionPuesto;

            $("#nombrePuesto").html(info[0].NombrePuesto);
            $("#DescripcionPuesto").html(descripcionpuesto);


            //console.log(listado);



        });
    }

    $(document).ready(function() {
        // modal();
    });

    function modal() {
        $('#modalInformacionSesion').modal({
            backdrop: 'static',
            keyboard: false
        });
    }

    function modalNuevoUsuario() {
        $('#modalInformacionSesion').modal('hide');
        $('#modalRegistro').modal({
            backdrop: 'static',
            keyboard: false
        });
    }

    function modalUsuariosRegistrados() {
        $('#modalInformacionSesion').modal('hide');
        $('#modalUsuariosRegistrados').modal({
            backdrop: 'static',
            keyboard: false
        });
    }

    function registroUsuario() {
        $('#modalInformacionSesion').modal('hide');
        $('#modalRegistro').modal({
            backdrop: 'static',
            keyboard: false
        });

        var dni = $("#dni").val();
        var nombre = $("#nombre").val();
        var escuela = $("#escuela").val();
        var celular = $("#celular").val();
        var email = $("#email").val();

        if (dni == 0) {
            swal("Atención!", "Debe Ingresar el número de dni", "warning");
            return;
        }

        if (nombre == 0) {
            swal("Atención!", "Debe Ingresar el nombre", "warning");
            return;
        }

        if (escuela == 0) {
            swal("Atención!", "Debe Ingresar la carrera", "warning");
            return;
        }

        if (celular == 0) {
            swal("Atención!", "Debe Ingresar el numero de celular", "warning");
            return;
        }

        if (email == 0) {
            swal("Atención!", "Debe Ingresar el email", "warning");
            return;
        }

        var fd = new FormData();
        fd.append("dni", dni);
        fd.append("nombre", nombre);
        fd.append("escuela", escuela);
        fd.append("celular", celular);
        fd.append("email", email);

        divLoading.style.display = "flex";

        $.ajax({
            method: "POST",
            url: "" + base_url + "/Usuarios_bolsa_trabajo/set",
            //data: datax
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            location.reload();
        });

    }

    function buscarUsuario() {

        var dni_usuario = $("#dni_usuario").val();

        var fd = new FormData();
        fd.append("dni_usuario", dni_usuario);

        $.ajax({
            method: "POST",
            url: "" + base_url + "/usuarios_bolsa_trabajo/getone",
            //data: datax
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {

            var info = JSON.parse(response);

            console.log(info.data.dni);

            listado =
                `
                    <div class="text-center  mb-2">
                       <h5 class="azul">bienbenido: ` + info.data.nombres + `</h5>
                    </div>                          
                `;
            $("#usuarioInfo").html(listado);

            console.log(info);
        });
    }
</script>