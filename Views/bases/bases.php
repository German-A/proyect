<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$obj2 = new HomeModel();
$perfiles=$obj->selectLegal();
$perfiless=$obj2->selectinstitucional();
$perfilesss=$obj2->selectprimerNacional();
$n=1;

?>
<br><br><br>

<div class="contenedor">
        <aside>
            <div class="contenedor-temario" id="temario">
                <h3 class="titulo">Normatividad Nacional</h3>
                <ul class="lista">                    
                    <?php foreach ($perfiles as $key => $fila) { ?>
                        <?php if ($n==1){ ?> 
                            <li class="activo">
                            <?php  $n=0; ?>
                        <?php }else{ ?>                     
                           <li>
                        <?php }?>                        
                                <div class="itemY">
                                    <h1 data-id="<?php echo$fila['NombreArchivo'] ?>"></h1>                     
                                    <a href="#"><?php echo $fila['Nombre'] ?></a>                           
                                </div>
                            </li>
                    <?php } ?>      
                </ul>
                
                <h3 class="titulo">Normatividad Institucional</h3>
                <ul class="lista">

                    <?php  $n=1;       ?>                       
                       <?php foreach ($perfiless as $key => $fila) { ?>
                            <?php if ($n==1){ ?> 
                                <li >
                                <?php  $n=0; ?>
                            <?php }else{ ?>                     
                            <li>
                            <?php }?>             
                                    <div class="itemY">
                                        <h1 data-id="<?php echo$fila['NombreArchivo'] ?>"></h1>                            
                                        <a href="#"><?php echo $fila['Nombre'] ?></a>                           
                                    </div>
                                </li>
                        <?php } ?>

                     
                </ul>
            </div>
        </aside>






        <div class="seccion2">
            <?php foreach ($perfilesss as $key => $fila) { ?>
                <main>
                     <div class="colMd1">      
                        <object class="pdfview" type="application/pdf" id="video_id"  data="<?= media();?>/archivos/documentoslegales/<?php echo$fila['NombreArchivo']  ?>"></object>
                    </div>

                    <div class="colMd">      
                    <iframe id="video_id2" src="https://docs.google.com/viewer?url=<?= media();?>/archivos/documentoslegales/<?php echo$fila['NombreArchivo']?>&amp;embedded=true" frameborder="0" width="100%" height="500"> </iframe> 

                    </div>

      
                
                </main>

            <?php } ?>  
        </div>



</div>

  

<?php footer($data); ?>


 <script>
        $(document).ready(function () {
            $(".itemY").click(function () {
                let youtube_id = $(this).children("h1").attr("data-id");
                console.log(youtube_id);
                let newUrl = `<?= media();?>/archivos/documentoslegales/${youtube_id}`;
                let amp = "&amp;embedded=true";
                let newUrl2 = `https://docs.google.com/viewer?url=<?= media();?>/archivos/documentoslegales/${youtube_id}`;
                $("#video_id").attr("data", newUrl);
                $("#video_id2").attr("src", newUrl2+`&embedded=true`);
            })      
        })        
</script>
