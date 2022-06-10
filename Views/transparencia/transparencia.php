<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$año = new HomeModel();

$perfiles = $año->selectañoEspecialidades();
$segundasEspecialidades = $año->SegundasEspecialidades();
$doctorados = $año->doctorados();
$idmaestria = $año->listaFacultadpostgrado();
//$perfiless = $año->selectañoEspecialidadesporaño($id);


?><br><br>


<br>
<!-- <div class="row" style="margin: auto;">
    <div class="col-md-6 col-lg-4">
        <a target="_blank" href="https://docs.google.com/spreadsheets/d/1v8pgqvTEWWA_QkMyxV1aTjt2lVYJligto6tNGKtp2Hk/edit?usp=sharing" class="linkw">
            <div class="widget-small info coloured-icon"><i class="icon fas fa-graduation-cap"></i>
                <div class="info">
                    <h4>BACHILLERES</h4>
                    <p><b>3366</b></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-4">
        <a target="_blank" href="https://docs.google.com/spreadsheets/d/1WvLqY7uYFPUx740VArlorEWlrqWyeMkua8J421-UZOM/edit?usp=sharing" class="linkw">
            <div class="widget-small warning coloured-icon"><i class="icon fas fa-user-graduate"></i>
                <div class="info">
                    <h4>TITULADOS</h4>
                    <p><b>1139</b></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-4">
        <a target="_blank" href="https://docs.google.com/spreadsheets/d/1QtaAYv8Ot6-bDVstc0tVfhxXo9tbKmwhXoFIY6w3wpU/edit?usp=sharing" class="linkw">
            <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-graduate"><span class="fas fa-user-graduate"></span></i>
                <div class="info">
                    <h4>2° ESPECIALIDAD</h4>
                    <p><b>110</b></p>
                </div>
            </div>
        </a>
    </div>

</div>
<div class="d-flex align-items-end flex-column">
    <div class="p-2">
        <h5>Al 31 de Diciembre 2021</h5>
    </div>
</div>
 -->


<h3 class="text-center">EGRESADOS - 2022</h3>

<br>
<div class="d-flex justify-content-center">
    <div class="widget-small info coloured-icon"><i class="icon fas fa-graduation-cap"></i>
        <div class="">&nbsp&nbsp&nbsp&nbsp
            <h4>&nbsp&nbsp Total de Egresados</h4>
            <h4><b>&nbsp&nbsp&nbsp1195</b></h4>
        </div>
    </div>



</div>

<br>
<div class="row" style="margin: auto;">
    <div class="col-md-6 col-lg-4">
        <a target="_blank" href="https://docs.google.com/spreadsheets/d/1jAZTMS1DX7KLhhgqhQZMaOlMbt-FcwNaBckd2nKVA4Q/edit?usp=sharing" class="linkw">
            <div class="widget-small info coloured-icon"><i class="icon fas fa-graduation-cap"></i>
                <div class="info">
                    <h4>BACHILLERES</h4>
                    <p><b>634</b></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-4">
        <a target="_blank" href="https://docs.google.com/spreadsheets/d/1EiFmFEOlE9nrUuAPas6McMZJeYtw7AMyxGkTkIfowNc/edit?usp=sharing" class="linkw">
            <div class="widget-small warning coloured-icon"><i class="icon fas fa-user-graduate"></i>
                <div class="info">
                    <h4>TITULADOS</h4>
                    <p><b>529</b></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-4">
        <a target="_blank" href="https://docs.google.com/spreadsheets/d/1QtaAYv8Ot6-bDVstc0tVfhxXo9tbKmwhXoFIY6w3wpU/edit?usp=sharing" class="linkw">
            <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-graduate"><span class="fas fa-user-graduate"></span></i>
                <div class="info">
                    <h4>2° ESPECIALIDAD</h4>
                    <p><b>32</b></p>
                </div>
            </div>
        </a>
    </div>

</div>
<div class="d-flex align-items-end flex-column">
    <div class="p-2">
        <h5>Al 01 de Junio 2022</h5>
    </div>
</div>
