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





<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center">Transparencia - Unidad de Seguimiento del Egresado</h4>
        </div>

        <div class="card-body">
            <h3 class="text-muted m-b-15 text-center">Más detalle</h3>
            <br>
            <div class="d-flex justify-content-around">
                <a class="btn btn-primary" target="_blank" href="https://docs.google.com/spreadsheets/d/1wKk9gGxt-gt1tgz90FWCPGrwnWzx_lsVm_wrnxV9kSE/edit?usp=sharing">
                    <h5>Facultades</h5>
                </a>

                <a class="btn btn-primary" target="_blank" href="https://docs.google.com/spreadsheets/d/1ySjbiL7jFv7lLXbw4WSVfRuOZHgS_iVetHcuw6gujbU/edit?usp=sharing">
                    <h5>Escuelas</h5>
                </a>
            </div>
        </div>
    </div>
</div>

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



<br>

<div class="contedor90 pt-4 pb-4  bgbluemedio rounded ">
    <div class="row">
        <div class="col-12 col-md-3">
            <h5 class="blanco text-center">¡Información sobre una formación superior de excelencia!</h5>
        </div>
        <div class="col-12 col-md-9">
            <div class="d-flex justify-content-around mt-2">
                <a href="javascript:void(0);" class="col-4 col-md-3 pt-2 pb-2 text-center" style="background-color: #CC9966;" onclick="openModalMaestrias()">
                    <h5 class="blanco">Maestrías</h5>
                    <img src="<?= media() ?>/images/postgrado/maestria.png" style="max-height: 150px; max-height: 50px;">
                </a>
                <div class="col-4 col-md-3 pt-2 pb-2 text-center" style="background-color: #4886ff;" onclick="openModalDoctorados()">
                    <h5 class="blanco">Doctorados</h5>
                    <img src="<?= media() ?>/images/postgrado/doctorado.png" style="max-height: 150px; max-height: 50px;">
                </div>
                <div class="col-4 col-md-3 pt-2 pb-2 text-center" style="background-color: #009688;" onclick="openModalSegundaEspecialidades()">
                    <h5 class="blanco">Segundas Especialidades</h5>
                    <img src="<?= media() ?>/images/postgrado/segundaespecialidad.png" style="max-height: 150px; max-height: 50px;">
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br>


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
        <?php foreach ($idmaestria as $key => $fila) { ?>
            <div class="col-8 col-md-4 col-lg-3  fondo m-2">
                <a href="javascript:void(0);" class=" m-4  p-2 ">
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
<!-- Modal -->


<div class="modal fade" id="modalMaestria" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <div class="contedor80">
                    <div class="row d-flex justify-content-around">
                        <?php foreach ($idmaestria as $key => $fila) { ?>
                            <a href="javascript:void(0);" onclick="openModal(<?= $fila['Facultadid'] ?>);" class="col-12 amarillo  col-md-3 text-center pt-3 pb-3 p-2 m-3">
                                <div class="col-12 text-cente col-md-12">
                                    <h1 class="t mostaza bg-white m-auto p-1 col-3 col-md-7"><?php echo $fila['descripcion'] ?></h1>
                                    <br>
                                </div>
                                <div class="col-12 text-cente col-md-12">
                                    <h5 class="t bluemedio">Maestría en <?php echo $fila['nombreFacultad'] ?></h5>
                                </div>
                                <div class="t col-12 text-cente col-md-12">
                                    <p class="t bluemedio">Ver maestrías</p>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalRegistro" tabindex="-4" role="dialog" aria-hidden="true" style="overflow-y: scroll;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="bluemedio text-center" id="titulo"></h4>
                <br>
                <div class="row">
                    <div class="col-12">
                        <h5 class="bluemedio" id="titulo1"></h5>
                        <p class="text-justify" id="descripcion">
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h5 class="bluemedio" id="titulo2"></h5>
                        <p class="text-justify" id="ventajas">

                        </p>
                    </div>
                    <div class="col-12 mb-2 col-lg-6 text-center" id="imgmaestria">

                    </div>
                </div>

                <div class="row">
                    <div class="col-8">

                        <h5 class="bluemedio" id="titulo3"></h5>
                        <p class="text-justify" id="mencion">

                        </p>
                    </div>

                    <div class="col-4" id="linkmaestria">
                        <br> <br>
                        <br><br>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Doctorados -->
<div class="modal fade" id="modalDoctorados" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">Doctorados</h1>
                    </div>
                    <br>
                    <div class="col-12">
                        <h6>La Escuela de Posgrado de la UNT oferta a todos aquellos que han cursado estudios de maestría, un conjunto de 26 programas de doctorado que cubre un amplio rango de disciplinas científicas, de ingeniería y humanísticas. </h6>
                    </div>
                    <br><br>
                    <div class="col-12 text-center">
                        <img src="<?= media() ?>/images/postgrado/postGrado.jpg" style="max-height: 250px; max-height: 150px;">
                    </div>
                </div>
                <br>
                <div class="row">
                    <?php foreach ($doctorados as $key => $fila) { ?>
                        <div class="col-12 col-md-6">
                            <h6><?php echo $fila['descripcion'] ?></h6>
                        </div>
                    <?php } ?>
                </div>
                <br>
                <div class="col-12 m-auto">
                    <a href="https://posgrado.unitru.edu.pe/doctorados/" target="_blank" class="btn btn-primary"><span>Más Información</span></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SEGUNDAS ESPECIALIDADES -->
<div class="modal fade" id="modalSegundasEspecialidades" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">SEGUNDAS ESPECIALIDADES</h1>
                    </div>
                    <br>
                    <div class="col-12 text-center">
                        <img src="<?= media() ?>/images/postgrado/postGrado.jpg" style="max-height: 250px; max-height: 150px;">
                    </div>
                </div>
                <br>
                <div class="row">
                    <?php foreach ($segundasEspecialidades as $key => $fila) { ?>
                        <div class="col-12 col-md-3">
                            <h6><?php echo $fila['descripcion'] ?></h6>
                        </div>
                    <?php } ?>
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
    function openModal(i) {
        switch (i) {
            case 1:
                $('#modalMaestria').modal("hide");
                $('#modalRegistro').modal('show');
                document.querySelector('#titulo').innerHTML = "Maestría en Ciencias Agropecuarias";
                document.querySelector('#titulo1').innerHTML = 'Descripción de la maestría';
                document.querySelector('#descripcion').innerHTML = "Programa de formación especializada en ciencias agrarias que busca formar profesionales de gran capacidad analítica y de investigación, orientado a soluciones en el área de protección de cultivos, nutrición animal, sanidad animal, gestión de recursos hídricos y agroexportación. Formamos Egresados en las diferentes maestrías y doctorados con valores éticos y con criterio de calidad.";
                document.querySelector('#titulo2').innerHTML = 'Ventajas';
                document.querySelector('#imgmaestria').innerHTML = '<img src="<?= media() ?>/images/postgrado/ciencias-agropecuarias.jpg" style="max-height: 250px; max-height: 150px;">';
                document.querySelector('#ventajas').innerHTML = `                            1. Dominio practico en la gestión de proyectos agropecuarios en el sector público y privado
                            <br>
                            2. Participar en líneas de investigación prioritarias para solucionar los problemas del sector agropecuario
                            <br>
                            3. Gestión en la publicación de artículos científicos en revistas indizadas de alto impacto en concordancia a la normatividad vigente.`;
                document.querySelector('#titulo3').innerHTML = 'Maestría en Ciencias, mención:';
                document.querySelector('#mencion').innerHTML = `                            P042 Nutrición y alimentación animal
                            <br>
                            P043 Producción y sanidad animal
                            <br>
                            P044 Ingeniería de recursos hídricos
                            <br>
                            P045 Agroexportación
                            <br>
                            P046 Tecnología de alimentos
                            <br>
                            P047 Manejo integrado de plagas y enfermedades en sistemas agroecológicos`;
                document.querySelector('#linkmaestria').innerHTML = `
                        <a href="https://posgrado.unitru.edu.pe/maestria-en-ciencias-agropecuarias/" target="_blank" href="au" class="btn btn-primary"><span id="btnText">Más Información</span></a>
                        <br>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar Ventana</button>`;

                break;

            case 2:
                $('#modalMaestria').modal("hide");
                $('#modalRegistro').modal('show');
                document.querySelector('#titulo').innerHTML = "Maestría en Ciencias Biológicas";
                document.querySelector('#titulo1').innerHTML = 'Descripción de la maestría';
                document.querySelector('#descripcion').innerHTML = "Formamos líderes en ciencias económicas y negocios, comprometidos con el desarrollo integral de la Región La Libertad y el país, nuestros programas de estudio están diseñados para el desarrollo de la competitividad, la sostenibilidad y el progreso, brindamos una  sólida formación en diversas áreas de las ciencias económicas y de otras disciplinas con un alto dominio de la teoría económica y con el conocimiento y habilidad en el uso de instrumentos para abordar problemas de la economía relevantes para el país.";
                document.querySelector('#titulo2').innerHTML = "¿Porqué estudiar una maestría en Ciencias Biológicas?";
                document.querySelector('#imgmaestria').innerHTML = '<img src="<?= media() ?>/images/postgrado/ciencias-biologicas.jpg" style="max-height: 250px; max-height: 150px;">';

                document.querySelector('#ventajas').innerHTML = `Nuestros programas académicos  cuentan con un plan de estudios actualizado y un cuerpo de profesores de reconocido prestigio a nivel nacional e internacional, capaces de desarrollar investigaciones teóricas o aplicadas en cada una de las áreas de conocimiento.`;
                document.querySelector('#titulo3').innerHTML = 'Maestría en Ciencias, mención:';
                document.querySelector('#mencion').innerHTML = `
                                                                P048 Biotecnología Agroindustrial y Ambiental <br>
                                                                P049 Biotecnología y Fermentaciones Industriales <br>
                                                                P050 Gestión de Plantas Medicinales del Perú <br>
                                                                P051 Gestión Económica Medio Ambiental y los Recursos Naturales <br>
                                                                P052 Microbiología Clínica <br>
                                                                P053 Microbiología y Tecnología de Alimentos <br>
                                                                P054 Gestión Ambiental <br>
                                                                P055 Parasitología`;
                document.querySelector('#linkmaestria').innerHTML = `
                        <a href="https://posgrado.unitru.edu.pe/maestria-en-ciencias-biologicas/" target="_blank" href="au" class="btn btn-primary"><span id="btnText">Más Información</span></a>
                        <br>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar Ventana</button>`;

                break;

            case 3:
                $('#modalMaestria').modal("hide");
                $('#modalRegistro').modal('show');
                document.querySelector('#titulo').innerHTML = "Maestría en Ciencias Económicas";
                document.querySelector('#titulo1').innerHTML = '¿Por qué estudiar Ciencias Económicas?';
                document.querySelector('#descripcion').innerHTML = "Formamos líderes en ciencias económicas y negocios, comprometidos con el desarrollo integral de la Región La Libertad y el país, nuestros programas de estudio están diseñados para el desarrollo de la competitividad, la sostenibilidad y el progreso, brindamos una  sólida formación en diversas áreas de las ciencias económicas y de otras disciplinas con un alto dominio de la teoría económica y con el conocimiento y habilidad en el uso de instrumentos para abordar problemas de la economía relevantes para el país.";
                document.querySelector('#titulo2').innerHTML = "¿Cómo es el programa de estudios?";
                document.querySelector('#imgmaestria').innerHTML = '<img src="<?= media() ?>/images/postgrado/ciencias-Economicas.jpg" style="max-height: 250px; max-height: 150px;">';

                document.querySelector('#ventajas').innerHTML = `Nuestros programas académicos  cuentan con un plan de estudios actualizado y un cuerpo de profesores de reconocido prestigio a nivel nacional e internacional, capaces de desarrollar investigaciones teóricas o aplicadas en cada una de las áreas de conocimiento.`;
                document.querySelector('#titulo3').innerHTML = 'Maestría en Ciencias Económicas, mención:';
                document.querySelector('#mencion').innerHTML = `
                                                                P060 Administración de Negocios<br>
                                                                P061 Finanzas<br>
                                                                P062 Gestión Empresarial<br>
                                                                P063 Tributación<br>
                                                                P064 Gestión Pública y Desarrollo Local<br>
                                                                P065 Auditoría<br>
                                                                P066 Gerencia de Sistemas de Información y Negocios<br>
                                                                P067 MBA Dirección Bancaria y Mercado de Capitales<br>
                                                                P068 Dirección y Organización de Talento Humano<br>
                                                                P069 Dirección de Marketing y Negocios Globales`;
                document.querySelector('#linkmaestria').innerHTML = `
                        <a href="https://posgrado.unitru.edu.pe/maestria-en-ciencias-economicas/" target="_blank" href="au" class="btn btn-primary"><span id="btnText">Más Información</span></a>
                        <br>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar Ventana</button>`;
                break;
            case 4:
                $('#modalMaestria').modal("hide");
                $('#modalRegistro').modal('show');
                document.querySelector('#titulo').innerHTML = "Maestría en Ciencias Físicas y Matemáticas";
                document.querySelector('#titulo1').innerHTML = 'Descripción de la maestría en matemáticas';
                document.querySelector('#descripcion').innerHTML = "En esta maestría todos sus docentes son doctores en matemáticas, de universidades prestigiosas, lo cual contribuye a la excelencia del nivel científico del programa. El Posgrado en Matemáticas (formado por el Doctorado en Matemática y la Maestría en Matemáticas) tiene como objetivo preparar los cuadros que el país necesita para satisfacer la demanda de desarrollo científico, tecnológico, económico y social, en la formación de investigadores en matemáticas y en docencia universitaria. La finalidad de la maestría es dar al alumno las condiciones no solo para desempeñar, con competencia y destreza, las funciones docentes antes de la graduación o licenciatura, sino también para iniciarlo profesionalmente en la investigación como por ejemplo seguir un doctorado en matemáticas. En tal sentido nuestros egresados podrían desempeñarse en universidades o empresas.";
                document.querySelector('#titulo2').innerHTML = "Descripción de la maestría en física";
                document.querySelector('#imgmaestria').innerHTML = '<img src="<?= media() ?>/images/postgrado/ciencias-matematicas.jpg" style="max-height: 250px; max-height: 150px;">';

                document.querySelector('#ventajas').innerHTML = `La investigación se desarrolla en estrecha colaboración con grupos de investigación nacionales y extranjeros. Ello ha permitido que nuestros estudiantes puedan realizar estadías en universidades e institutos de renombre internacional, en el marco de programas de investigación conjunta. Los estudiantes del programa normalmente se integran en grupos de investigación de modo que sus aportes les sirvan de base para las tesis de maestría, las que en muchos casos van acompañadas de una publicación en revistas indexadas. De este modo resulta frecuente que nuestros estudiantes, al término de sus estudios de maestría, sean coautores de artículos publicados en estas revistas.`;
                document.querySelector('#titulo3').innerHTML = 'Maestría en Ciencias,Informática, mención:';
                document.querySelector('#mencion').innerHTML = `
                                                            P083 Estadística Aplicada<br>
                                                            P084 Matemática<br>
                                                            P085 Materiales<br>
                                                            P148 Informática<br>
                                                            P150 Ingeniería de Software<br>
                                                            P086 Maestría en Ciencias de la Computación<br>
                                                            P087 Maestría en Ciencias Físicas<br>
                                                            P088 Maestría en Ingeniería Matemática<br>
                                                            P089 Maestría en Matemática para las Finanzas y Riesgos`;

                document.querySelector('#linkmaestria').innerHTML = `
                        <a href="https://posgrado.unitru.edu.pe/maestria-en-ciencias-fisicas-y-matematicas/" target="_blank" href="au" class="btn btn-primary"><span id="btnText">Más Información</span></a>
                        <br>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar Ventana</button>`;

                break;
            case 5:
                $('#modalMaestria').modal("hide");
                $('#modalRegistro').modal('show');
                document.querySelector('#titulo').innerHTML = "Maestría en Ciencias Sociales";
                document.querySelector('#titulo1').innerHTML = '¿Por qué estudiar la maestría/doctorado en Ciencias Sociales?';
                document.querySelector('#descripcion').innerHTML = "El profesional que elige estudiar una de las Maestrías en Ciencias Sociales aprenden conceptos, herramientas, metodologías y aplicaciones que tiene el propósito de encaminar con éxito la innovación orientada a la promoción y desarrollo social dirigido a la comunidad y minorías étnicas para elevar el nivel de vida de los pueblos, desarrollar una conciencia crítica respetando y promoviendo sus valores y tradiciones.";
                document.querySelector('#titulo2').innerHTML = "Ventajas";
                document.querySelector('#imgmaestria').innerHTML = '<img src="<?= media() ?>/images/postgrado/ciencias-Sociales.jpg" style="max-height: 250px; max-height: 150px;">';

                document.querySelector('#ventajas').innerHTML = `Las Maestrías en Ciencias Sociales y Maestría en Trabajo Social, forman profesionales acordes con los avances humanísticos, científicos y técnicos, capaces de comprender las dimensiones culturales y sociales de procesos nacionales y globales.
                                                                <br>El campo laboral del profesional egresado en las diferentes menciones de Ciencias Sociales se extiende dentro de las Instituciones públicas o privadas en área sociocultural que oriente sus resultados en la realización de pro­gra­mas y proyectos de desarrollo.`;
                document.querySelector('#titulo3').innerHTML = 'Maestría en Ciencias Sociales,Trabajo Social,Arqueología Sudamericana, mención:';
                document.querySelector('#mencion').innerHTML = `
                                                            P113 Administración y Desarrollo Humano<br>
                                                            P114 Planificación y Gestión Turística<br>
                                                            P115 Arqueología Andina<br>
                                                            P116 Gestión del Patrimonio Cultural<br>
                                                            P117 Gestión Social y Relaciones Comunitarias<br>
                                                            P153 Familia y Redes Sociales<br>
                                                            P147 Modelización, Experimentación y Técnicas Analíticas`;

                document.querySelector('#linkmaestria').innerHTML = `
                        <a href="https://posgrado.unitru.edu.pe/maestria-en-ciencias-sociales/" target="_blank" href="au" class="btn btn-primary"><span id="btnText">Más Información</span></a>
                        <br>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar Ventana</button>`;

                break;

            case 6:
                $('#modalMaestria').modal("hide");
                $('#modalRegistro').modal('show');
                document.querySelector('#titulo').innerHTML = "Maestría en Derecho y Ciencias Políticas";
                document.querySelector('#titulo1').innerHTML = 'Descripción de la maestría';
                document.querySelector('#descripcion').innerHTML = `Tenemos más de 30 años formando generaciones de investigadores y especialistas, fruto de nuestro esfuerzo tenemos a egresados ejerciendo la profesión en las instancias de más alto nivel en el Poder Judicial, Ministerio Público y demás entidades públicas y privadas, a nivel nacional e internacional.
                                                                    Los grados de maestría y doctorado de la UNT, tienen especial relevancia por el prestigio y solvencia intelectual que trasmitimos a nuestros egresados.
                                                                    El avance de la ciencia y tecnología constante, así como el mundo globalizado nos obliga ser competitivos con responsabilidad social.`;
                document.querySelector('#titulo2').innerHTML = "Ventajas";
                document.querySelector('#imgmaestria').innerHTML = '<img src="<?= media() ?>/images/postgrado/ciencias-derecho.jpg" style="max-height: 250px; max-height: 150px;">';

                document.querySelector('#ventajas').innerHTML = `1. Científicos y expertos en cada materia formando a nuestros alumnos en maestría y doctorado<br>
                                                                2. Docentes nacionales e internacionales referentes del pensamiento jurídico<br>
                                                                3. Todos los asesores de tesis debidamente acreditados con su código Orcid y Turnitin<br>
                                                                4. Nuestra malla curricular, actualizada permanentemente ante los avances de la ciencia y tecnología jurídica.`;
                document.querySelector('#titulo3').innerHTML = 'Maestría en Derecho, mención:';
                document.querySelector('#mencion').innerHTML = `
                                                            P056 Derecho Civil y Comercial<br>
                                                            P057 Derecho Penal y Ciencias Criminológicas<br>
                                                            P058 Derecho del Trabajo y de la Seguridad Social<br>
                                                            P059 Derecho Constitucional y Administrativo`;

                document.querySelector('#linkmaestria').innerHTML = `
                        <a href="https://posgrado.unitru.edu.pe/maestria-en-ciencias-politicas/" target="_blank" href="au" class="btn btn-primary"><span id="btnText">Más Información</span></a>
                        <br>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar Ventana</button>`;

                break;

            case 7:
                $('#modalMaestria').modal("hide");
                $('#modalRegistro').modal('show');
                document.querySelector('#titulo').innerHTML = "Maestría en Educación y Ciencias de la Comunicación";
                document.querySelector('#titulo1').innerHTML = 'Descripción de la maestría';
                document.querySelector('#descripcion').innerHTML = `El perfil del estudiante de la Maestría en Educación y Ciencias de la Comunicación debe ser un investigador crítico, creativo, ético, reflexivo, con elevado sentido de responsabilidad para crear y recrear el conocimiento, resolver problemas y participar como consultor y experto de organismos nacionales e internacionales.`;
                document.querySelector('#titulo2').innerHTML = "¿Porqué estudiar una maestría en Educación y Ciencias de la Comunicación?";
                document.querySelector('#imgmaestria').innerHTML = '"<img src="<?= media() ?>/images/postgrado/ciencias-comunicacion.jpg" style="max-height: 250px; max-height: 150px;">';

                document.querySelector('#ventajas').innerHTML = `Nuestra misión es formar profesionales creativos, críticos con ética y
                                                                calidad que trabajen en las competencias de docencia, investigación y
                                                                responsabilidad social.
                                                                Nuestros propósitos institucionales son:
                                                                 Desarrollar el proceso enseñanza aprendizaje con calidad y ética
                                                                 Promover y publicar las investigaciones educacionales y
                                                                comunicacionales de nuestros agentes
                                                                 Impulsar la responsabilidad social permanente en nuestros procesos
                                                                 Gestionar una administración moderna.`;
                document.querySelector('#titulo3').innerHTML = 'Maestría en Educación,Ciencias de la Comunicación , mención:';
                document.querySelector('#mencion').innerHTML = `
                                                                P070 Educación Infantil<br>
                                                                P071 Gestión Educativa y Desarrollo Regional<br>
                                                                P072 Lingüística y Comunicación<br>
                                                                P073 Lingüística<br>
                                                                P074 Pedagogía Universitaria<br>
                                                                P149 Psicología Educativa<br>
                                                                P151 Didáctica del Francés como Lengua Extranjera<br>
                                                                P155 Gestión Educativa<br>
                                                                P146 Relaciones Públicas y Responsabilidad Social`;

                document.querySelector('#linkmaestria').innerHTML = `
                        <a href="https://posgrado.unitru.edu.pe/maestria-en-educacion-y-ciencias-de-la-comunicacion/" target="_blank" href="au" class="btn btn-primary"><span id="btnText">Más Información</span></a>
                        <br>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar Ventana</button>`;

                break;

            case 8:
                $('#modalMaestria').modal("hide");
                $('#modalRegistro').modal('show');
                document.querySelector('#titulo').innerHTML = "Maestría en Enfermería";
                document.querySelector('#titulo1').innerHTML = '¿Por que estudiar?';
                document.querySelector('#descripcion').innerHTML = `Estudiar nuestras menciones en enfermería tanto como maestria o doctorado es, a grandes rasgos, esforzarse por brindar la mejor calidad de vida a los pacientes que se atiende. Independiente de la enfermedad o discapacidad que este tenga en un momento determinado.
                                                                    Es en este último punto en el que radica la importancia del porqué estudiar Enfermería: preocuparte por los miembros de una comunidad desde su concepción hasta su muerte dentro del proceso de salud-enfermedad`;
                document.querySelector('#titulo2').innerHTML = "Ventajas:";
                document.querySelector('#imgmaestria').innerHTML = '<img src="<?= media() ?>/images/postgrado/ciencias-enfermeria.jpg" style="max-height: 250px; max-height: 150px;">';

                document.querySelector('#ventajas').innerHTML = `Contamos con el campo de acción, son los escenarios investigativos de innovación, asesoría y docencia.
                                                                Contamos con plana docente a nivel nacional e internacional tales como de la Universidad Federal Fluminense Brasil, la Universidad Federal de Bahía Brasil, la Universidad Castilla de la Mancha España, así como del país de Cuba.
                                                                Contamos con las maestrías y doctorados privilegiados y reconocidos por la SUNEDU, promocionando la salud y bienestar.`;
                document.querySelector('#titulo3').innerHTML = 'Maestría en Ciencias de Enfermería, Salud Pública, mención:';
                document.querySelector('#mencion').innerHTML = `P075 Maestría en Ciencias de Enfermería<br>
                                                                P076 Geriatría<br>
                                                                P077 Gerencia y Políticas Públicas`;

                document.querySelector('#linkmaestria').innerHTML = `
                        <a href="https://posgrado.unitru.edu.pe/maestria-en-enfermeria/" target="_blank" href="au" class="btn btn-primary"><span id="btnText">Más Información</span></a>
                        <br>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar Ventana</button>`;

                break;

            case 9:
                $('#modalMaestria').modal("hide");
                $('#modalRegistro').modal('show');
                document.querySelector('#titulo').innerHTML = "Maestría en Farmacia y Bioquímica";
                document.querySelector('#titulo1').innerHTML = 'Descripción de la maestría';
                document.querySelector('#descripcion').innerHTML = `El Posgrado en Farmacia y Bioquímica tiene la misión de formar académicos y profesionales de alta calidad humana, científica y tecnológica, útiles para ejercer el liderazgo social, con sus diferentes programas de maestrías que ofertamos para contribuir con el progreso del país.`;
                document.querySelector('#titulo2').innerHTML = "Ventajas";
                document.querySelector('#imgmaestria').innerHTML = '<img src="<?= media() ?>/images/postgrado/ciencias-farmacia.jpg" style="max-height: 250px; max-height: 150px;">';

                document.querySelector('#ventajas').innerHTML = `Los programas de estudio, cuentan con un plan de estudios actualizado y un cuerpo de profesores de reconocido prestigio a nivel nacional e internacional, capaces de desarrollar investigaciones teóricas o aplicadas en cada una de las áreas de conocimiento.`;
                document.querySelector('#titulo3').innerHTML = 'Maestría en Farmacia y Bioquímica, mención:';
                document.querySelector('#mencion').innerHTML = `P078 Bioquímica Clínica<br>
                                                                P079 Farmacia Clínica<br> 
                                                                P080 Farmacología<br>
                                                                P081 Productos Naturales Terapéuticos<br>
                                                                P082 Atención Farmacológica Nutricional y Dietética`;

                document.querySelector('#linkmaestria').innerHTML = `
                        <a href="https://posgrado.unitru.edu.pe/maestria-en-farmacia-y-bioquimica/" target="_blank" href="au" class="btn btn-primary"><span id="btnText">Más Información</span></a>
                        <br>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar Ventana</button>`;

                break;

            case 10:
                $('#modalMaestria').modal("hide");
                $('#modalRegistro').modal('show');
                document.querySelector('#titulo').innerHTML = "Maestría en Ingeniería";
                document.querySelector('#titulo1').innerHTML = 'Descripción de la maestría';
                document.querySelector('#descripcion').innerHTML = `La Maestría en Ingeniería tiene la misión de formar académicos y profesionales de alta calidad humana y del más alto nivel profesional, capaces de ejercer el liderazgo en las diferentes áreas. Con nuestros diferentes programas de maestrías que ofertamos buscamos contribuir con el progreso del país formando grandes profesionales.`;
                document.querySelector('#titulo2').innerHTML = "Ventajas";
                document.querySelector('#imgmaestria').innerHTML = '<img src="<?= media() ?>/images/postgrado/ciencias-ingenieria.jpg" style="max-height: 250px; max-height: 150px;">';

                document.querySelector('#ventajas').innerHTML = `Brindando magnificas oportunidades de especialización a los académicos y profesionales del país. Contamos con excelente plana docente, doctores y magísteres graduados en las más prestigiosas universidades nacionales con destacada trayectoria académica y presencia en la investigación, encargados de garantizar la alta calidad de nuestros programas.`;
                document.querySelector('#titulo3').innerHTML = 'Maestría en Ciencias, Ingeniería Industrial, Ingeniería de Sistemas, Ingeniería Mecánica, Ingeniería de Minas, mención:';
                document.querySelector('#mencion').innerHTML = `P098 Gestión de Riesgos Ambientales y de Seguridad en las Empresas<br>
                                                                P099 Sistemas Integrados de Gestión de la Calidad, Ambiente, Seguridad y Responsabilidad Social Corporativa<br>
                                                                P100 Gestión Urbana y Vulnerabilidad Socioambiental<br>
                                                                P101 Gerencia de Operaciones<br>
                                                                P102 Organización y Dirección de Recursos Humanos<br>
                                                                P103 Dirección de Proyectos<br>
                                                                P104 Administración y Dirección de Tecnología de la Información<br>
                                                                P105 Diseño y Manufactura<br>
                                                                P106 Gestión del Diseño y Manufactura<br>
                                                                P165 Con mención en gestión de seguridad minera`;
                document.querySelector('#linkmaestria').innerHTML = `
                        <a href="https://posgrado.unitru.edu.pe/maestria-en-ingenieria/" target="_blank" href="au" class="btn btn-primary"><span id="btnText">Más Información</span></a>
                        <br>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar Ventana</button>`;

                break;

            case 11:
                $('#modalMaestria').modal("hide");
                $('#modalRegistro').modal('show');
                document.querySelector('#titulo').innerHTML = "Maestría en Ingeniería Química";
                document.querySelector('#titulo1').innerHTML = 'La ingeniera Química en la sociedad';
                document.querySelector('#descripcion').innerHTML = `En la sociedad actual subsisten necesidades insatisfechas que retardan o limitan el desarrollo de muchas actividades socio–industriales. Entre éstas se pueden señalar las siguientes:
                                                                    1.Crear conocimiento para el desarrollo de la Química, Ingeniería Química Ambiental como ciencia y tecnología.
                                                                    2.Crear nuevas tecnologías tendientes a desarrollar la industria sucroquímica, carboquímica, agroindustria, petroquímica y de curtición.`;
                document.querySelector('#titulo2').innerHTML = "Campo laboral";
                document.querySelector('#imgmaestria').innerHTML = '<img src="<?= media() ?>/images/postgrado/ciencias-quimica.jpg" style="max-height: 250px; max-height: 150px;">';

                document.querySelector('#ventajas').innerHTML = `Las áreas donde se desempeñarán eficientemente los maestros en Ingeniería Química/Ambiental son: universidades, empresa públicas y privadas, empresas dedicadas al tratamiento y reusó de las aguas residuales, centros de investigación para resolver problemas ambientales, asesor independiente y/o dependiente.`;
                document.querySelector('#titulo3').innerHTML = 'Maestría en Ciencias, Ciencias de la Ingeniería mención:';
                document.querySelector('#mencion').innerHTML = `P091 Maestría en Ciencias Químicas<br>
                                                                P092 Maestría en Ingeniería Química<br>
                                                                P093 Maestría en Ingeniería Químico Ambiental<br>
                                                                P094 Maestría en Ingeniería Ambiental<br>
                                                                P095 Maestría en Ingeniería de Procesos Industriales<br>
                                                                P096 Didáctica de las Ciencias Experimentales<br>
                                                                P097 Gestión y Procesamiento de Minerales`;

                document.querySelector('#linkmaestria').innerHTML = `
                        <a href="https://posgrado.unitru.edu.pe/maestria-en-ingenieria-quimica/" target="_blank" href="au" class="btn btn-primary"><span id="btnText">Más Información</span></a>
                        <br>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar Ventana</button>`;

                break;

            case 12:
                $('#modalMaestria').modal("hide");
                $('#modalRegistro').modal('show');
                document.querySelector('#titulo').innerHTML = "Maestría en Ciencias Médicas";
                document.querySelector('#titulo1').innerHTML = 'Descripción';
                document.querySelector('#descripcion').innerHTML = `Te invitamos a unirte a nuestra Escuela de Posgrado en Ciencias Médicas de la Universidad Nacional de Trujillo (UNT), la primera fundada en la época Republicana del Perú.
                                                                    Te ofrecemos una sólida formación a cargo de reconocidos académicos pertenecientes a la Facultad de Medicina de la UNT y a otras Universidades del país y próximamente del extranjero, que harán de ti un académico que contribuya a resolver las necesidades de la sociedad.
                                                                    `;
                document.querySelector('#titulo2').innerHTML = "Ventajas:";
                document.querySelector('#imgmaestria').innerHTML = '<img src="<?= media() ?>/images/postgrado/ciencias-medicas.jpg" style="max-height: 250px; max-height: 150px;">';

                document.querySelector('#ventajas').innerHTML = `Para tu preparación académica empleamos actualmente Tecnologías de Información y Comunicación virtuales y cuando haya las condiciones de seguridad las combinaremos con actividades presenciales.`;
                document.querySelector('#titulo3').innerHTML = 'Maestría en Ciencias de Enfermería, Salud Pública, mención:';
                document.querySelector('#mencion').innerHTML = `P107 Maestría en Estomatología<br>
                                                                P108 Maestría en Medicina<br>
                                                                P109 Fisiología y Biofísica<br>
                                                                P110 Planificación y Gestión<br>
                                                                P111 Epidemiología<br>
                                                                P112 Nutrición Humana`;
                document.querySelector('#linkmaestria').innerHTML = `
                        <a href="https://posgrado.unitru.edu.pe/maestria-en-ciencias-medicas/" target="_blank" href="au" class="btn btn-primary"><span id="btnText">Más Información</span></a>
                        <br>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar Ventana</button>`;

                break;
            default:
                console.log('Lo lamentamos, por el momento no disponemos de ' + i + '.');
        }
    }

    function openModalMaestrias() {
        $('#modalMaestria').modal('show');
    }

    function openModalDoctorados() {
        $('#modalDoctorados').modal('show');
    }

    function openModalSegundaEspecialidades() {
        $('#modalSegundasEspecialidades').modal('show');
    }
</script>