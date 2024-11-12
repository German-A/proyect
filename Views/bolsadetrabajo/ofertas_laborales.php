<?php head($data); ?>

<?php obj($data); ?>


<div class="col-12">
    <div class="row d-flex justify-content-around" id="empleos">
        <div class="col-5 pb-4 cardempleo ">
            <div class="row">
                <div class="col-3">

                </div>
                <div class="col-8">
                    <h4></h4>
                    <br>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</div>



<?php footer($data); ?>


<script>
    $(document).ready(function() {
        empleos();
    });

    function empleos() {
        console.log('x');
        $.ajax({
            method: "GET",
            url: "" + base_url + "/bolsadetrabajo/get_ofertas_laborales",
            //data: datax
            //data: fd,
            processData: false, // tell jQuery not to process the data
            contentType: false // tell jQuery not to set contentType

        }).done(function(response) {
            var info = JSON.parse(response);

            console.log(info);
            listado = '';

            for (i = 0; i < info.length; i++) {
                listado = listado +

                    `
                    <div class="col-12 row callout callout-danger">
                        <div class="col-4">
                            <img width="60px" class="img-fluid" src="<?= media() ?>/upload/difusiones_laborales/` + info[i].filename + `">
                        </div>
                        <div class="col-8">
                            <h5><span>` + info[i].nombre_puesto + `</span></h5>
                            <h5>Empresa: <span>` + info[i].descripcion + `</span></h5>                           
                        </div>                      
                            <div class="col-12">
                                <h5><span> ` + info[i].nombreEscuela + `</span></h5>
                            </div>
                            <div class="col-12 text-center">
                                <a href="javascript:void(0);" class="btn btn-outline-primary" onclick="ver(` + info[i].id_difusion_ofertas + ` )" >Más Información</a>
                            </div>                       
                    </div>
                   
                `;

            }

            //console.log(listado);

            $("#empleos").html(listado);

        });
    }
</script>