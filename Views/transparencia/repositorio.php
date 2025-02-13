<?php head($data); ?>

<?php obj($data);

$obj = new HomeModel();
$obj2 = new HomeModel();

$perfiles = $obj->listaRepositorio();
$primero = $obj2->selectprimerRepositorio();

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

<br><br>

<br>

<div class="row text-center" style="max-width: 1600px; margin:auto">

 
    <div class="col-12  col-lg-4">
        <br>
        <div class="col-md-10  m-auto">
            <h3 class="blueoscuro">Repositorio</h3>
        </div>

        <div class="row">
            <div class="col-md-10  m-auto itemY list_informacion">
                <?php foreach ($perfiles as $key => $fila) { ?>
                    <a class="col-md-12 ml-2  mb-1 btn btn-outline-warning p-2 m-2  d-flex justify-content-center" onclick="verArchivo('<?php echo $fila['filename'] ?>');">
                        <div class="col-11 col-md-9">
                            <h5 class=""><?php echo $fila['nombre'] ?></h5>                      
                        </div>                 
                    </a>
                <?php } ?>
                
            </div>
        </div>

        <br>


    </div>

    <div class="col-8 libro" id="elid">
        <br>
        <?php foreach ($primero as $key => $fila) { ?>
            <object class="pdfview" type="application/pdf" id="video_id" data="<?= media(); ?>/upload/repositorio/<?php echo $fila['filename'] ?>"></object>
        <?php } ?>
    </div>

</div>




<?php footer($data); ?>

<script>
    function verArchivo(a) {
        var b = a;
        let newUrl = `<?= media(); ?>/upload/repositorio/${b}`;
        let newUrl2 = `https://docs.google.com/viewer?url=https://use-dpa.unitru.edu.pe/INTRANET/archivos/base/${b}`;
        $("#video_id").attr("data", newUrl);
    }
</script>