<?php head($data); ?>

<br>
<style>
    .reclamaciones {
        max-width: 1100px;
        margin: auto;

    }
</style>

<form id="frmempleo" class="col-12 d-flex flex-column" name="frmempleo" method="post" submit="return false">
    <div class="reclamaciones">
        <h2 class="text-center"><b>Ingresa tu reclamo</b></h2>
        <h4>Lamentamos el malestar generado, para darte una respuesta oportuna por favor completa la siguiente información:</h4>

        <div class="col-12">
            <h4>1. ¿De que sede eres?</h4>
            <div class="form-group col-md-6">
                <select class="form-control select2" name="p1" id="p1" data-live-search="true" class="mdb-select md-form" x>
                    <option disabled selected>Seleccionar</option>
                    <option value="HUAMACHUCO">FILIAL HUAMACHUCO</option>
                    <option value="SANTIAGO">FILIAL SANTIAGO DE CHUCO </option>
                    <option value="JEQUETEPEQUE">FILIAL VALLE JEQUETEPEQUE</option>
                    <option value="CENTRAL">SEDE CENTRAL</option>
                </select>
            </div>
        </div>

        <div class="col-12">
            <h4>2. ¿Cuándo ocurrió la situación que origina el presente reclamo?</h4>
            <input type="date" id="p2">
        </div>

        <div class="col-12">
            <h4>3. ¿Aproximadamente a qué hora sucedió?</h4>
            <input type="time" id="p3">
        </div>

        <div class="col-12">
            <h4>4. Descríbenos ¿qué sucedió?</h4>
            <textarea name="descripcion" id="p4" cols="70" rows="5"></textarea>
        </div>


        <div class="col-12">
            <h4>5. Adjuntar archivos (opcional)</h4>
            <input type="file" id="archivoSubido" name="archivoSubido">
        </div>

        <h3 class="text-center">Información adicional</h3>

        <div class="col-12">
            <h4>6. Identifica el motivo del reclamo. Puedes seleccionar máximo 2 opciones.</h4>
            <div class="form-check form-check">
                <input class="form-check-input" name="p6" type="checkbox" value="1">
                <label class="form-check-label" for="p6">Trato profesional en la atención: la persona que te atendió no lo hizo de forma adecuada.</label>
            </div>
            <div class="form-check form-check">
                <input class="form-check-input" name="p6" type="checkbox" value="2">
                <label class="form-check-label" for="p6">Tiempo: hubo demora antes y/o durante la atención que recibiste.</label>
            </div>
            <div class="form-check form-check">
                <input class="form-check-input" name="p6" type="checkbox" value="3">
                <label class="form-check-label" for="p6">Procedimiento: no se siguió el procedimiento de atención o no estás de acuerdo con este.</label>
            </div>
            <div class="form-check form-check">
                <input class="form-check-input" name="p6" type="checkbox" value="4">
                <label class="form-check-label" for="p6">Infraestructura: el ambiente en el que se realizó la atención y/o mobiliario no están en buen estado, no hay rutas accesibles que faciliten el desplazamiento de las personas o el local queda en un sitio inseguro.</label>
            </div>
            <div class="form-check form-check">
                <input class="form-check-input" name="p6" type="checkbox" value="5">
                <label class="form-check-label" for="p6">Información: la orientación sobre el servicio fue inadecuada, insuficiente o imprecisa.</label>
            </div>
            <div class="form-check form-check">
                <input class="form-check-input" name="p6" type="checkbox" value="6">
                <label class="form-check-label" for="p6">Resultado: no se pudo obtener un resultado concreto como parte del servicio y/o no se justifica la negativa en la atención del servicio.</label>
            </div>
            <div class="form-check form-check">
                <input class="form-check-input" name="p6" type="checkbox" value="7">
                <label class="form-check-label" for="p6">Confianza: ocurrió una situación que afectó la confianza y credibilidad de la entidad.</label>
            </div>
            <div class="form-check form-check">
                <input class="form-check-input" name="p6" type="checkbox" value="8">
                <label class="form-check-label" for="p6">Disponibilidad: el medio de atención (virtual, presencial o telefónico) por el que se brinda el servicio no responde a tus expectativas o tiene horarios restringidos.</label>
            </div>
            <div class="form-check form-check">
                <input class="form-check-input" name="p6" type="checkbox" value="9">
                <label class="form-check-label" for="p6">Otro.</label>
            </div>
        </div>

        <div class="col-12">
            <h4>7. ¿Trataron de darte una solución previa al registro del reclamo?.</h4>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="p7" type="radio" value="1">
                <label class="form-check-label" for="p7">Sí</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="p7" type="radio" value="2">
                <label class="form-check-label" for="p7">No</label>
            </div>
        </div>

        <h3 class="text-center">Tus datos personales</h3>
        <div class="col-12">
            <h4>8. ¿En qué sede te encontrabas?</h4>
            <div class="form-group col-md-6">
                <select class="form-control select2" name="p8" id="p8" data-live-search="true" class="mdb-select md-form" x>
                    <option disabled selected>Seleccionar</option>
                    <option value="1">Dni</option>
                    <option value="2">Carnet de Extranjeria</option>
                    <option value="3">Pasaporte</option>
                    <option value="4">Ruc</option>
                    <option value="5">Otro</option>
                </select>
            </div>
        </div>



        <div class="col-12">
            <h4>9. ¿Trataron de darte una solución previa al registro del reclamo?.</h4>
            <input type="text" class="col-6 p9">
        </div>

        <div class="col-12">
            <h4>10. ¿Nombres y apellidos?.</h4>
            <input type="text" class="col-6 p10">
        </div>

        <div class="col-12">
            <h4>11. Ingrese su correo para recibir una copia del Reclamo.</h4>
            <input type="text" class="col-6 p11">
        </div>
    </div>
    <button type="button" class="input bg-warning enviar pt-2 pb-2 pl-5 pr-5 text-white" onclick="enviarCuestionario()">
        <h4>ENVIAR</h4>
    </button>
</form>

<!-- SEGUNDAS ESPECIALIDADES -->
<div class="modal fade" id="modalRespuesta" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row d-flex justify-content-center" id="msgmodal">


                </div>
            </div>
        </div>
    </div>
</div>




<?php footer($data); ?>
<script>
    //get Idiomas
    $(".select2").select2({});


    function enviarCuestionario() {


        var p1 = $("#p1").val();
        var p2 = $("#p2").val();
        var p3 = $("#p3").val();
        var p4 = $("#p4").val();

        var inputElement = document.getElementById("archivoSubido");
        var archivoSubido = inputElement.files[0];

        let pregunta6 = document.querySelectorAll('input[name="p6"]:checked');
        var p6 = new Array();
        pregunta6.forEach((checkbox) => {
            p6.push(checkbox.value);
        });


        var p7 = document.querySelector('input[name="p7"]:checked').value;
        var p8 = $("#p8").val();
        var p9 = $(".p9").val();
        var p10 = $(".p10").val();
        var p11 = $(".p11").val();


        var fd = new FormData();
        fd.append("p1", p1);
        fd.append("p2", p2);
        fd.append("p3", p3);
        fd.append("p4", p4);
        fd.append("archivoSubido", archivoSubido);
        fd.append("p6", JSON.stringify(p6));
        fd.append("p7", p7);
        fd.append("p8", p8);
        fd.append("p9", p9);
        fd.append("p10", p10);
        fd.append("p11", p11);


        divLoading.style.display = "flex";
        $.ajax({
            method: "POST",
            url: "" + base_url + "/Libroreclamacionesadmin/set",
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);
            console.log(info);
            divLoading.style.display = "none";
            if (info.status == true) {
                listado =
                    `
                <div class="text-center  mb-2">
                    <h5 class="azul">` + info.msg + `</h5>
                </div>                          
            `;
                $("#msgmodal").html(listado);
            }
            if (info.status == false) {
                console.log(info.status);
                listado =
                    `
                <div class="text-center  mb-2">
                    <h5 class="azul">` + info.msg + `</h5>
                </div>                          
            `;
                $("#msgmodal").html(listado);
            }
            $('#modalRespuesta').modal('show');
        });
    }
</script>