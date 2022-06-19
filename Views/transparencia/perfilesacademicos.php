<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$home = new HomeModel();


$perfiles = $home->listaPerfilesAcademicos();


//$perfiless = $año->selectañoEspecialidadesporaño($id);


?><br><br>




<style>
    .contedor80 {
        max-width: 80%;
        margin: auto;
    }

    .contedor90 {
        max-width: 100%;
        margin: auto;
    }

    @media (min-width: 1024px) {
        .contedor90 {
            max-width: 1000px;
            margin: auto;
        }
    }



    .amarillo {
        align-items: center;
        justify-content: center;
        width: 100%;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        position: relative;
        overflow: hidden;
    }

    .amarillo::after {
        content: "";
        width: 100%;
        height: 100%;
        background: #FFC90D;
        position: absolute;

        z-index: 1;
        top: -800px;
        left: 0;
        transition: .5s ease-in-out all;
    }

    .amarillo:hover::after {
        top: 0;
        transition: .5s ease-in-out all;

    }


    .amarillo .t {
        position: relative;
        z-index: 2;
        transition: .2s ease all;

    }
</style>


<style>
    .fondo {
        color: blue;
        border-color: #aaaaaa;
        border-width: 1px;
        border-style: solid;
        border-bottom-right-radius: 80px;
    }

    .fondo:hover h1 {
        color: white;
    }

    .fondo:hover h5 {
        color: white;
    }


    .fondo:hover {
        background-color: #FFC90D;
        color: white;
    }
</style>

<div class="contedor90 pt-4 pb-4">
    <div class="col-12 text-center">
        <h1 class="text-center">Perfiles de Egreso</h1>
    </div>
    <div class="row d-flex justify-content-around ">
        <?php foreach ($perfiles as $key => $fila) { ?>
            <div class="col-8 col-md-4 col-lg-3  fondo m-2">
                <a href="javascript:void(0);" class=" m-4  p-2 " onclick="openModalSegundaEspecialidades(<?php echo $fila['idFacultad'] ?>)">
                    <div class="col-12 text-right col-md-12">
                        <h1 class="mostaza "><?php echo $fila['descripcion'] ?></h1>
                        <br>
                    </div>
                    <div class="col-12 text-left col-md-12">
                        <h5 class=""><?php echo $fila['nombreFacultad'] ?></h5>
                    </div>
                </a>
            </div>

        <?php } ?>
    </div>
</div>



<!-- Modal -->

<!-- SEGUNDAS ESPECIALIDADES -->
<div class="modal fade" id="modalPerfiles" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div id="escuelas">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php footer($data); ?>

<script>
    function Buscar() {
        var id = document.getElementById("id").value;
        cadena = "id=" + id;
        $.ajax({
            type: "POST",
            async: true,
            url: "Home/getcantidades",
            data: cadena,

            success: function(response) {
                console.log(response);
                var info = JSON.parse(response);
                //console.log(info.data[0]['bachiller']);
                document.getElementById('bachiller').innerHTML = info.data[0]['bachiller'];
                document.getElementById('titulo').innerHTML = info.data[0]['titulo'];
                document.getElementById('segundaespecialidad').innerHTML = info.data[0]['segundaespecialidad'];
            }
        });
    }
</script>

<script>
    function openModalSegundaEspecialidades(id) {

        $.ajax({
            method: "post",
            url: " " + base_url + "/home/getfacultadPerfiles/" + id,
            dataType: 'json',
            success: function(data) {
                if (data.status) {              
                    console.log(data.data[0].idEscuela);
                    console.log(data.data[0].nombreEscuela);
                    listado = '';

                    for (i = 0; i < data.data.length; i++) {

                    listado = listado + 
                        `
                        <div class="col-12 col-md-12 text-center">
                            <h6>`+data.data[i].nombreEscuela+`</h6>
                        </div>
                        `;
                    }

                    $("#escuelas").html(listado);
                }

                $('#modalPerfiles').modal('show');


            }
        });
    }
</script>