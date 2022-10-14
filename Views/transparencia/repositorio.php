<?php head($data); ?>

<?php obj($data);

$obj = new HomeModel();
$obj2 = new HomeModel();
$perfiles = $obj->selectManual();
$primermanual = $obj2->selectprimerManual();
$tutoriales = $obj2->selectCursosTUTORIALES();
$capacitaciones = $obj2->selectCursosCAPACITACIONES();

$n = 1;

?>


<style>
    .libro {
        display: none;
    }

    @media(min-width:994px) {
        .pdfview {
            /* Centrado */
            margin: auto;
            display: block;
            /* Tamaño */
            min-width: 100%;
            height: 58rem;
            /* Mejorar aspecto */
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .libro {
            display: block;
        }
    }


    @media(min-width:1024px) {

        .pdfview {
            /* Centrado */
            margin: auto;
            display: block;
            /* Tamaño */
            width: 100%;
            height: 50rem;
            /* Mejorar aspecto */
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .libro {
            display: block;
        }
    }
</style>
<div id="elid">

</div>
<div class="card-header">
    <h4 class="text-center">Transparencia - Unidad de Seguimiento del Egresado</h4>
</div>
<br>
<br><br>


<br>

<div class="row text-center" style="max-width: 1600px; margin:auto">


    <div class="col-12  col-lg-4">
        <div class="col-md-10 m-auto">
            <h3 class="blueoscuro">Repositorio 2021-II</h3>
        </div>



        <br>

        <div class="row">
            <div class="col-md-10  m-auto">

                <div class="col-md-12 ml-2 btn btn-outline-warning  p-2 m-2  d-flex justify-content-center">
                    <div class="col-11 col-md-9">
                        <h5 class="">Informe de inserción laboral y evaluación de objetivos educaciones 2021-II</h5>
                    </div>

                    <div class="col-1 col-md-3">
                        <div class="row">
                            <a href="#elid" class="btn btn-primary libro" onclick="verArchivo('INFORME2021-II.pdf');"><i class="fas fa-book-open"></i></a>
                            &nbsp
                            <a href="<?= media(); ?>/archivos/repositorio/INFORME2021-II.pdf" class="btn btn-primary" download><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 ml-2 btn btn-outline-warning  p-2 m-2  d-flex justify-content-center">
                    <div class="col-11 col-md-9">
                        <h5 class="">Plan de Trabajo año 2022</h5>
                    </div>
                    <div class="col-1 col-md-3">
                        <div class="row">
                            <a href="#elid" class="btn btn-primary libro" onclick="verArchivo('plantrabajo.pdf');"><i class="fas fa-book-open"></i></a>
                            &nbsp
                            <a href="<?= media(); ?>/archivos/repositorio/plantrabajo.pdf" class="btn btn-primary" download><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 ml-2 btn btn-outline-warning  p-2 m-2  d-flex justify-content-center">
                    <div class="col-11 col-md-9">
                        <h5 class="">Ciclo de Deming</h5>
                    </div>
                    <div class="col-1 col-md-3">
                        <div class="row">
                            <a href="#elid" class="btn btn-primary libro" onclick="verArchivo('informebienal.pdf');"><i class="fas fa-book-open"></i></a>
                            &nbsp
                            <a href="<?= media(); ?>/archivos/repositorio/informebienal.pdf" class="btn btn-primary" download><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>



                <div class="col-md-12 ml-2 btn btn-outline-warning  p-2 m-2  d-flex justify-content-center">
                    <div class="col-11 col-md-9">
                        <h5 class="">Informe Bienal sobre la realidad universitaria Peruana</h5>
                    </div>
                    <div class="col-1 col-md-3">
                        <div class="row">
                            <a href="#elid" class="btn btn-primary libro" onclick="verArchivo('demming.pdf');"><i class="fas fa-book-open"></i></a>
                            &nbsp
                            <a href="<?= media(); ?>/archivos/repositorio/demming.pdf" class="btn btn-primary" download><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 ml-2 btn btn-outline-warning  p-2 m-2  d-flex justify-content-center">
                    <div class="col-11 col-md-9">
                        <h5 class="">Informe Bienal sobre la realidad universitaria Peruana</h5>
                    </div>
                    <div class="col-1 col-md-3">
                        <div class="row">
                            <a href="#elid" class="btn btn-primary libro" onclick="verArchivo('demming.pdf');"><i class="fas fa-book-open"></i></a>
                            &nbsp
                            <a href="<?= media(); ?>/archivos/repositorio/demming.pdf" class="btn btn-primary" download><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>

                

                <div class="col-md-12 ml-2 btn btn-outline-warning  p-2 m-2  d-flex justify-content-center">
                    <div class="col-11 col-md-9">
                        <h5 class="">Informe XIII Expoferia laboral virtual 2021- UNT</h5>
                    </div>
                    <div class="col-1 col-md-3">
                        <div class="row">
                            <a href="#elid" class="btn btn-primary libro" onclick="verArchivo('informeExpoferia2021.pdf');"><i class="fas fa-book-open"></i></a>
                            &nbsp
                            <a href="<?= media(); ?>/archivos/repositorio/informeExpoferia2021.pdf" class="btn btn-primary" download><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 ml-2 btn btn-outline-warning  p-2 m-2  d-flex justify-content-center">
                    <div class="col-11 col-md-9">
                        <h5 class="">Informe Informe XIV Expoferia laboral Modalidad Hibrida 2022 </h5>
                    </div>
                    <div class="col-1 col-md-3">
                        <div class="row">
                            <a href="#elid" class="btn btn-primary libro" onclick="verArchivo('modaldidadHibrida.pdf');"><i class="fas fa-book-open"></i></a>
                            &nbsp
                            <a href="<?= media(); ?>/archivos/repositorio/modaldidadHibrida.pdf" class="btn btn-primary" download><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>


                

                





            </div>
        </div>

        <br><br>

        <br>
        <br>

    </div>
    <div class="col-8 libro">
        <br>
        <?php foreach ($primermanual as $key => $fila) { ?>
            <object class="pdfview" type="application/pdf" id="video_id" data="<?= media(); ?>/archivos/repositorio/INFORME2021-II.pdf"></object>
        <?php } ?>
    </div>

</div>




<?php footer($data); ?>

<script>
    function verArchivo(a) {
        var b = a;
        let newUrl = `<?= media(); ?>/archivos/repositorio/${b}`;
        let newUrl2 = `https://docs.google.com/viewer?url=https://use-dpa.unitru.edu.pe/INTRANET/archivos/base/${b}`;
        $("#video_id").attr("data", newUrl);
    }
</script>