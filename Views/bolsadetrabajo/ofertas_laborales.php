<?php head($data); ?>

<?php obj($data); ?>

<style>
    .contenedor {
        max-width: 1200px;
        margin: auto;
    }


    @media (min-width: 800px) {
        .contedorlinkbolsa {
            max-width: 900px;
            margin: auto;
        }
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

        border-left: 5px solid #e9ecef;
        margin-bottom: 1rem;
        padding: 1rem;
    }



    .contenedor_ofertas {
        display: grid;
        grid-template-columns: 1fr;
        /* Ajusta el número de columnas según tus necesidades */
        margin: auto;
        gap: 20px;
        grid-auto-rows: auto;
    }

    @media (min-width: 800px) {
        .contenedor_ofertas {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
            grid-auto-rows: auto;
            margin: 10px;

        }
    }

    .cursos_empleabilidad {
        max-width: 200px;
        /* height: max-content; */

    }

    .imagen_ofertas {
        display: grid;
        grid-template-columns: 30% 70%;
        column-gap: 20px;
        grid-auto-rows: auto;
    }

    .modalidad_fecha {
        display: flex;
        width: 100%;
        flex-direction: row;
        justify-content: space-between;
        padding-left: 20px;
        padding-right: 20px;
    }

    .tarjeta a {
        display: flex;
        flex-direction: column;
    }

    .tarjeta a:hover {
        color: #12377B;

    }

    .condicion_laboral {
        background-color: rgba(33, 50, 109, 0.5);
        padding-top: 5px;
        padding-block: 5px;
        padding-left: 10px;
        padding-right: 10px;
        color: #000c4b;
    }
</style>


<!-- <div class="contenedor">
    <div class="row d-flex justify-content-around" id="empleos">

    </div>
</div> -->
<br><br><br><br>
<div class="contenedor">

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row d-flex justify-content-around">

                <div class="col-md-3">
                    <div class="form-group">
                        <h5 class="bluemedio">Programa de estudio:</h5>
                        <select class="escuela" data-placeholder="Seleccionar" id="escuela">
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <h5 class="bluemedio">Modalidad laboral</h5>
                        <select class="form-control lista" name="modalidad_laboral" id="modalidad_laboral" data-live-search="true" class="mdb-select md-form" x>
                            <option value="0" disabled selected>Seleccionar</option>
                            <option value="hibrido">Hibrido</option>
                            <option value="presencial">Presencial</option>
                            <option value="remoto">Remoto</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <h5 class="bluemedio">Tipo oferta</h5>
                    <select class="form-control lista" name="condicion_laboral" id="condicion_laboral" data-live-search="true" class="mdb-select md-form" x>
                        <option value="0" disabled selected>Seleccionar</option>
                        <option value="empleo">empleo</option>
                        <option value="practicas_pre">Practicas Preprofesionales</option>
                        <option value="practicas_pro">Practicas Profesionales</option>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-center">
                    <a href="javascript:void(0);" onclick="buscarOfertas()" class="btn btn-primary">QUITAR FILTROS</a>
                </div>

            </div>
        </div>
    </div>

    <div class="contenedor_ofertas" id="empleos">

    </div>
</div>

<br><br><br><br>
<?php footer($data); ?>

<script>
    $(".lista").select2({});

    $(document).ready(function() {
        empleos();
    });

    $(".escuela").select2({
        ajax: {
            url: " " + base_url + "/bolsadetrabajo/getSelectCarreras",
            type: "post",
            dataType: "json",
            delay: 250,
            data: function(params) {
                return {
                    palabraClave: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    $("#escuela").on("change", function() {
        empleos();
    });

    $("#modalidad_laboral").on("change", function() {
        empleos();
    });

    $("#condicion_laboral").on("change", function() {
        empleos();
    });
    
    function buscarOfertas() {
        var escuela = null;
        var modalidad_laboral = null;
        var condicion_laboral = null;

        var fd = new FormData();
        fd.append("escuela", escuela);
        fd.append("modalidad_laboral", modalidad_laboral);
        fd.append("condicion_laboral", condicion_laboral);

        $.ajax({
            method: "POST",
            url: "" + base_url + "/bolsadetrabajo/get_ofertas_laborales",
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);

            console.log(info);
            listado = '';

            for (i = 0; i < info.length; i++) {
                listado = listado +
                    `
                    <div class="tarjeta callout callout-danger">

                        <a Target="_blank" href="` + info[i].link + `">
                            <div class="imagen_ofertas">
                                <div class="div">
                                    <img style="width: 70px;" class="" src="<?= media() ?>/upload/difusiones_laborales/` + info[i].filename + `">
                                </div>
                                <div class="div">
                                    <h5><span>` + info[i].nombre_puesto + `</span></h5>
                                    <h5>Empresa: <span>` + info[i].descripcion + `</span></h5>
                                </div>
                            </div>

                            <div class="">
                                <h5>
                                    <span> ` + info[i].nombreEscuela + `</span>
                                </h5>
                            </div>

                            <div class="modalidad_fecha">
                                <div class="div">
                                    <span>Modalidad: ` + info[i].modalidad_laboral + `</span><br>
                                    <span>Hasta: ` + info[i].fecha_termino + `</span>
                                </div>
                                <div class="div">
                                    <p class="condicion_laboral">` + info[i].condicion_laboral + `</p>
                                </div>
                            </div>
                        </a>
                    </div>
                   
                `;

            }

            //console.log(listado);

            $("#empleos").html(listado);

        });


    }


    function empleos() {

        var escuela = $("#escuela").val();
        var modalidad_laboral = $("#modalidad_laboral").val();
        var condicion_laboral = $("#condicion_laboral").val();


        var fd = new FormData();
        fd.append("escuela", escuela);
        fd.append("modalidad_laboral", modalidad_laboral);
        fd.append("condicion_laboral", condicion_laboral);

        $.ajax({
            method: "POST",
            url: "" + base_url + "/bolsadetrabajo/get_ofertas_laborales",
            data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);

            console.log(info);
            listado = '';

            for (i = 0; i < info.length; i++) {
                listado = listado +
                    `
                    <div class="tarjeta callout callout-danger">

                        <a Target="_blank" href="` + info[i].link + `">
                            <div class="imagen_ofertas">
                                <div class="div">
                                    <img style="width: 70px;" class="" src="<?= media() ?>/upload/difusiones_laborales/` + info[i].filename + `">
                                </div>
                                <div class="div">
                                    <h5><span>` + info[i].nombre_puesto + `</span></h5>
                                    <h5>Empresa: <span>` + info[i].descripcion + `</span></h5>
                                </div>
                            </div>

                            <div class="">
                                <h5>
                                    <span> ` + info[i].nombreEscuela + `</span>
                                </h5>
                            </div>

                            <div class="modalidad_fecha">
                                <div class="div">
                                    <span>Modalidad: ` + info[i].modalidad_laboral + `</span><br>
                                    <span>Hasta: ` + info[i].fecha_termino + `</span>
                                </div>
                                <div class="div">
                                    <p class="condicion_laboral">` + info[i].condicion_laboral + `</p>
                                </div>
                            </div>
                        </a>
                    </div>
                   
                `;

            }

            //console.log(listado);

            $("#empleos").html(listado);

        });
    }
</script>