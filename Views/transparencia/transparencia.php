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



<br><br>

<h2>EGRESADOS POR PERIODO LECTIVO</h2>
<br><br>

<div class="pt-1">
    <div class="row d-flex justify-content-around ">
        <div class="col-12 col-md-1">
            <h1>2024</h1>
        </div>
        <div class="col-3 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/16j_PX0cHZOUiqujq6DQi21J13ZUIqqVv/edit?usp=sharing&ouid=104637188327252951961&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-graduation-cap"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Egresados</h5>
                    <h5>201</h5>
                </div>
            </a>
        </div>
        <div class="col-3 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1UQ4F2RrqGYyJhwYl8nzv1kDhfuJ4AVE-/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-graduation-cap"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Grados de Bachiller</h5>
                    <h5>2177</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1zG2IO23FOUZDEYQ9Ymod_QMG2fzrTxPF/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-user-graduate"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Títulos Profesionales</h5>
                    <h5>924</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1kVP-YPvUABjSv5w-97UOkmiBLwSF-mNf/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-user-graduate"></i><i class="icon fas fa-user-graduate"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Segundas Especialidades Profesionales</h5>
                    <h5>282</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/16HjP27GArON5zltat9bPed5Xfeyte78j/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="far fa-university"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Maestrias</h5>
                    <h5>174</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1srZc5gcbjdQTReYrcmb712N67-quiELh/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza"><i class="far fa-university"></i><i class="far fa-university"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Doctorados</h5>
                    <h5>167</h5>
                </div>
            </a>
        </div>
    </div>
    <div class="d-flex align-items-end flex-column">
        <div class="p-2">
            <h5>Al 21 de noviembre 2024</h5>
        </div>
    </div>
</div>

<div class="pt-1">
    <div class="row d-flex justify-content-around ">
        <div class="col-12 col-md-1">
            <h1>2023</h1>
        </div>
        <div class="col-3 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1IB4zveaWYktBldRm1BQ9IEdvqDReHtLU/edit?usp=sharing&ouid=104637188327252951961&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-graduation-cap"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Egresados</h5>
                    <h5>2502</h5>
                </div>
            </a>
        </div>
        <div class="col-3 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1q4o-uWSVkXMIl2hxdYu4wqlyLYwgJNuI/edit?usp=share_link&ouid=115190337207338943725&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-graduation-cap"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Grados de Bachiller</h5>
                    <h5>1680</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1BaQKABbmxheryzTkZtIJoIRYbJmD_KQ_/edit?usp=share_link&ouid=115190337207338943725&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-user-graduate"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Títulos Profesionales</h5>
                    <h5>1312</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1xZ6KUYm97KWxQmwWZpLGm1Wg_mvfwvIm/edit?usp=share_link&ouid=115190337207338943725&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-user-graduate"></i><i class="icon fas fa-user-graduate"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Segundas Especialidades Profesionales</h5>
                    <h5>84</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1vVJtR2aP1NyYkK6Ajhy056HlS7syB3f3/edit?usp=share_link&ouid=115190337207338943725&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="far fa-university"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Maestrias</h5>
                    <h5>284</h5>
                </div>
            </a>
        </div>
        <div class="col-4 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1L9dYZNCEjfN0ZgOv7YXotmdmS3ICPpV2/edit?usp=share_link&ouid=115190337207338943725&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza"><i class="far fa-university"></i><i class="far fa-university"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Doctorados</h5>
                    <h5>61</h5>
                </div>
            </a>
        </div>
    </div>
    <div class="d-flex align-items-end flex-column">
        <div class="p-2">
            <h5>Al 31 de diciembre 2023</h5>
        </div>
    </div>
</div>

<div class="pt-1">
    <div class="row d-flex justify-content-around ">
        <div class="col-12 col-md-1">
            <h1>2022</h1>
        </div>
        <div class="col-3 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1tTwPq4vtLTGydJsYCGM8-DTeqafF9uKh/edit?usp=sharing&ouid=104637188327252951961&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-graduation-cap"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Egresados</h5>
                    <h5>2220</h5>
                </div>
            </a>
        </div>
        <div class="col-3 col-md-3 col-lg-2   fondo m-1">
            <a href="https://docs.google.com/spreadsheets/d/1g2Eni-DIN81gvAsesz0p3iATS9lA0XlG/edit?usp=sharing&ouid=103502351721971787980&rtpof=true&sd=true" target="_blank" class=" m-3  p-1 ">
                <div class="col-12 text-right col-md-12">
                    <h1 class="mostaza "><i class="icon fas fa-graduation-cap"></i></h1>
                    <br>
                </div>
                <div class="col-12 text-left col-md-12">
                    <h5 class="">Grados de Bachiller</h5>
                    <h5>1176</h5>
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
                    <h5>529</h5>
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
            <h5>Al 31 de diciembre 2022</h5>
        </div>
    </div>
</div>

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
<br><br>




<br><br>

<br>

<?php footer($data); ?>