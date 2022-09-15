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


<div class="pt-1">
    <div class="row d-flex justify-content-around ">
        <div class="col-12 col-md-1">
            <h1>2021</h1>
        </div>
        <div class="col-3 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/135kWRc6Dfm5qRhdws9eh_1gSJYHLI6Jy/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
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
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1b2PFMvYevtIESI8385i7l6Fg818Uh-8U/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-user-graduate"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Títulos Profesionales</h5>           
                    <h5>1139</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1spDb7wnoFa3k4Gu63LZx7Uo7oGNkFHbU/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-user-graduate"></i><i class="icon fas fa-user-graduate"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Segundas Especialidades Profesionales</h5>
                    <h5>110</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1sQ6-pytIy4pHRrvQewqUloK14RliBaDe/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="far fa-university"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Maestrias</h5>
                    <h5>142</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1NStfhzKUNaGiMicYbq2JYf2-z6PPHxXm/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="far fa-university"></i><i class="far fa-university"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Doctorados</h5>
                    <h5>44</h5>
                </div>
            </a>
        </div>
    </div>
    <div class="d-flex align-items-end flex-column">
        <div class="p-2">
            <h5>Al 31 de diciembre 2021</h5>
        </div>
    </div>
</div>


<div class="pt-1">
    <div class="row d-flex justify-content-around ">
        <div class="col-12 col-md-1">
            <h1>2022</h1>
        </div>
        <div class="col-3 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1g2Eni-DIN81gvAsesz0p3iATS9lA0XlG/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-graduation-cap"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Grados de Bachiller</h5>
                    <h5>1065</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1LrTJsRC5-0PK6yluprOIsZfV--BN6uBL/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-user-graduate"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Títulos Profesionales</h5>           
                    <h5>709</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1xNcUl9vSvqD7GSvNfT89ZZC1BzSeMrfu/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-user-graduate"></i><i class="icon fas fa-user-graduate"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Segundas Especialidades Profesionales</h5>
                    <h5>32</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1SBdYC_Bld4N1_pwFDApv7SrIcYe5nHV9/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="far fa-university"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Maestrias</h5>
                    <h5>89</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1Z2vqJcCBTEPD6ef_b6g9DTPvtkef7qNg/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza"><i class="far fa-university"></i><i class="far fa-university"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Doctorados</h5>
                    <h5>17</h5>
                </div>
            </a>
        </div>
    </div>
    <div class="d-flex align-items-end flex-column">
        <div class="p-2">
            <h5>Al 15 de septiembre 2022</h5>
        </div>
    </div>
</div>




<br>

<?php footer($data); ?>