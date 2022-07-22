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


?>

<div class="card-header">
    <h4 class="text-center">Transparencia - Unidad de Seguimiento del Egresado</h4>
</div>



<br>

<h2>EGRESADOS POR PERIODO LECTIVO</h2>


<br>
<div class=" pt-4 pb-4">

    <div class="row d-flex justify-content-around ">

        <div class=" col-md-1 ">
        <h1>2021</h1>
        </div>

        <div class="col-8 col-md-2 col-lg-2  fondo m-1">
            <a href="javascript:void(0);" class=" m-4  p-2 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-graduation-cap"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Grados de Bachiller</h5>
                    <h5>2117</h5>
                </div>
            </a>
        </div>
        <div class="col-8 col-md-2 col-lg-2  fondo m-1">
            <a href="javascript:void(0);" class=" m-4  p-2 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-user-graduate"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Titúlos Profesionales</h5>
                    <h5>1139</h5>
                </div>
            </a>
        </div>
        <div class="col-8 col-md-2 col-lg-2  fondo m-1">
            <a href="javascript:void(0);" class=" m-4  p-2 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-user-graduate"></i><i class="icon fas fa-user-graduate"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Segundas Especialidades Prodesionales</h5>
                    <h5>110</h5>
                </div>
            </a>
        </div>
        <!-- <div class="col-8 col-md-2 col-lg-2  fondo m-1">
            <a href="javascript:void(0);" class=" m-4  p-2 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-graduation-cap"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Grados de Maestría</h5>
                </div>
            </a>
        </div>
        <div class="col-8 col-md-2 col-lg-2  fondo m-1">
            <a href="javascript:void(0);" class=" m-4  p-2 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-graduation-cap"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Grados de Doctor</h5>
                </div>
            </a>
        </div> -->
       

    


</div>






<!-- 
<h3 class="text-center">EGRESADOS - 2021</h3>

<br>
<div class="d-flex justify-content-center">
    <div class="widget-small info coloured-icon"><i class="icon fas fa-graduation-cap"></i>
        <div class="">&nbsp&nbsp&nbsp&nbsp
            <h4>&nbsp&nbsp Total de Egresados</h4>
            <h4><b>&nbsp&nbsp&nbsp3366</b></h4>
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
                    <p><b>2117</b></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-4">
        <a target="_blank" href="https://docs.google.com/spreadsheets/d/1EiFmFEOlE9nrUuAPas6McMZJeYtw7AMyxGkTkIfowNc/edit?usp=sharing" class="linkw">
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

</div> -->
<div class="d-flex align-items-end flex-column">
    <div class="p-2">
        <h5>Al 31 de Diciembre 2021</h5>
    </div>
</div>