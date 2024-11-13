<?php head($data); ?>

<?php obj($data); ?>

<style>
    .contenedor_cursos_talleres {
        display: grid;
        grid-template-columns: 20% 80%;
        /* Ajusta el número de columnas según tus necesidades */
        margin: auto;
        gap: 30px;
        grid-auto-rows: auto;
    }

    .cursos_talleres {
        display: grid;
        grid-template-columns: 1fr 1fr;
        /* Ajusta el número de columnas según tus necesidades */
        gap: 20px;
        grid-auto-rows: auto;

    }

    .informacion {
        display: grid;
        grid-template-columns: 20% 80%;
        padding: 20px;
        /* Ajusta el número de columnas según tus necesidades */

        column-gap: 10px;
        grid-auto-rows: auto;
        -webkit-box-shadow: 18px 12px 3px -10px rgba(247, 228, 17, 1);
        -moz-box-shadow: 18px 12px 3px -10px rgba(247, 228, 17, 1);
        box-shadow: 18px 12px 3px -10px rgba(247, 228, 17, 1);


    }

    .text-decoration {
        text-decoration: underline;
        text-decoration: underline #12377b;
        text-decoration: underline #12377b 10px;
    }

    .egresado {
        max-width: 120px !important;
    }

    .titulo_curso {}
</style>

<div class="container">
    <h2 class="text-decoration">Potencia <b>tu empleabilidad</b></h2>
</div>

<div class="container">

    <div class="contenedor_cursos_talleres">
        <div class="cursos_empleabilidad " data-aos="fade-left">
            <img class="egresado" src="<?= media() ?>/upload/empresa_difusion/egresado.png" alt="">
        </div>


        <div class="cursos_talleres" id="cursos" data-aos="fade-up">

        </div>
    </div>

</div>




<?php footer($data); ?>

<script>
    $(document).ready(function() {
        empleos();
    });

    function empleos() {
        $.ajax({
            method: "GET",
            url: "" + base_url + "/bolsadetrabajo/getCursosTalleres",
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
                <div class="" data-aos="fade-up">
                    <div class="informacion">
                        <div>
                            <img width="50px" src="<?= media() ?>/upload/empresa_difusion/` + info[i].filename + `" alt="">
                        </div>
                        <div>
                            <h5 class="titulo_curso">` + info[i].nombre_curso + `</h5>
                        </div>
                    </div>
                </div>
                `;
            }

            //console.log(listado);

            $("#cursos").html(listado);

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