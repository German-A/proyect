<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$home = new HomeModel();


$perfiles = $home->listaPerfilesAcademicos();


//$perfiless = $año->selectañoEspecialidadesporaño($id);
?><br><br>


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
                <div class="row d-flex justify-content-center" id="escuelas">


                </div>
            </div>
        </div>
    </div>
</div>


<!-- SEGUNDAS ESPECIALIDADES POR AÑO -->
<div class="modal fade" id="modalPerfilesAño" tabindex="0" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class=" d-flex justify-content-center" id="escuelasPefilesaño">
                 
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br><br><br><br>



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
                            <a href="javascript:void(0);" class="pefilescuela mb-2 p-3 col-10 bgbluemedio" onclick="openModalSegundaEspecialidadesporaño(` + data.data[i].idEscuela + `)">
                                <div class="text-center  mb-2">
                                    <h5 class="blanco azul">` + data.data[i].nombreEscuela + `</h5>
                                </div>
                            </a>
                        `;
                    }
                    $("#escuelas").html(listado);
                }
                $('#modalPerfiles').modal('show');
            }
        });
    }

    function openModalSegundaEspecialidadesporaño(id) {
        $.ajax({
            method: "post",
            url: " " + base_url + "/home/getfacultadPerfilesAnios/" + id,
            dataType: 'json',
            success: function(data) {
                if (data.status) {
                    console.log(data.data[0].idEscuela);
                    console.log(data.data[0].archivo);
                    listado = '';

                    for (i = 0; i < data.data.length; i++) {
                        listado = listado +
                        `    
                           
                            <a class="pefilescuela m-2 p-3 col-3 bgbluemedio" href="<?= media(); ?>/archivos/perfilacademicos/` + data.data[i].archivo + `" target="_blank">
                        <div class="text-center  ">
                            <h6 class="blanco azul">` + data.data[i].año + `</h6>
                        </div>
                    </a>
                        `;
                    }
                    $("#escuelasPefilesaño").html(listado);
                }
                $('#modalPerfiles').modal('hide');

                $('#modalPerfilesAño').modal('show');


            }
        });
    }
</script>