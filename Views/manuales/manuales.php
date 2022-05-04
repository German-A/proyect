<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$obj = new HomeModel();
$obj2 = new HomeModel();
$perfiles=$obj->selectManual();
$perfiless=$obj2->selectprimerManual();
$n=1;

?>

<!-- <script src="http://localhost:89/app-use-web/Assets/jsinicio/jquery3.1.0.min.js">   </script> -->


<br><br><br>

<div class="contenedor">
    
        <div class="seccion1">

            <aside>            
                <div class="contenedor-temario" id="temario">
                    <h3 class="titulo">Manuales y Guías</h3>
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
                </div>
            </aside>

        </div>
        <div class="seccion2">
        <?php foreach ($perfiless as $key => $fila) { ?> 
                <main>
                     <div class="colMd1">      
                        <object class="pdfview" type="application/pdf" id="video_id"  data="<?= media();?>/archivos/manuales/<?php echo$fila['NombreArchivo']  ?>"></object>
                    </div>

                    <div class="colMd">      
                        <iframe id="video_id2" src="https://docs.google.com/viewer?url=<?= media();?>/archivos/manuales/<?php echo$fila['NombreArchivo']?>&amp;embedded=true" frameborder="0" width="100%" height="500"> </iframe> 

                    </div>
                
                </main>

            <?php } ?>  
        </div>

        


        
</div>
<br>

<!-- <iframe id="video_id2" src="https://docs.google.com/viewer?url=https://use-dpa.unitru.edu.pe/INTRANET/archivos/manuales/EmpresaEmpleos-SAAE.pdf&embedded=true" frameborder="0" width="100%" height="1000"> </iframe>  -->
<?php footer($data); ?>

<script>
    document.querySelectorAll('#temario .lista  a').forEach((elemento) => {
    elemento.addEventListener('click', () => {
        document.querySelector('#temario .activo').classList.remove('activo');
        elemento.parentElement.parentElement.classList.add('activo');
    });
});
</script>




 <script>
        $(document).ready(function () {
            
        
            $(".itemY").click(function () {
                let youtube_id = $(this).children("h1").attr("data-id");
                console.log(youtube_id);
                let newUrl = `<?= media();?>/archivos/manuales/${youtube_id}`;
                let amp = "&amp;embedded=true";
                let newUrl2 = `https://docs.google.com/viewer?url=<?= media();?>/archivos/manuales/${youtube_id}`;
                $("#video_id").attr("data", newUrl);
                $("#video_id2").attr("src", newUrl2+`&embedded=true`);
            })

      
        })
        
</script>
