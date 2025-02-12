<br>

<div class="col-12">
<footer class="row p-2" style="background-color: var(--azul-medio);" >
    <div class="col-6 col-md-6 col-lg-6 col-xl-3 text-light text-center" style="margin: auto;" >
        <img src="<?= media(); ?>/archivos/logos/logoUseBlanco.png" style="width: 80%; " >
    </div>
    <div class="col-6 col-md-6 col-lg-6 col-xl-3 text-light " style="margin: auto auto;" data-aos="fade-down">
        <h5>Unidad de Seguimiento del Egresado</h5>
        <br>
        <h5>use@unitru.edu.pe</h5>
        <br>
        <div class="col-12 ">
            <a target="_blank" href="https://www.facebook.com/use.unt">
                <img src="<?= media(); ?>/archivos/logos/fbwite.png" style="width:10%">
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a target="_blank" href="https://www.instagram.com/use.unt/">
                <img src="<?= media(); ?>/archivos/logos/instawite.png" style="width:10%">
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a target="_blank" href="https://www.youtube.com/channel/UCXyJxRPtWA72esjZKAQdeOw">
                <img src="<?= media(); ?>/archivos/logos/youtwite.png" style="width:10%">
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a target="_blank" href="https://www.linkedin.com/in/use-unt-a94592276/">
                <img src="<?= media(); ?>/archivos/logos/inwite.png" style="width:10%">
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a target="_blank" href="https://www.tiktok.com/@use.unt">
                <img src="<?= media(); ?>/archivos/logos/tkicon.png" style="width:10%">
            </a>
        </div>
        <br>
        <div class="col-12">
            <div class="col-6 m-auto">
                <a href="<?= base_url(); ?>/libroreclamaciones">
                    <img class="img-fluid" src="<?= media(); ?>/img/libro-reclamaciones.png" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-12 col-xl-6 text-light" style="margin: auto auto;" data-aos="fade-down-rigth">
        <!-- <form class="formulario" action="enviar-prueba.php" method="POST"> -->
        <form id="frmempleo" class="col-12 d-flex flex-column" name="frmempleo" method="post" submit="return false">
            <input type="hidden" name="accion" id="accion" value="REGISTRAR_EMPLEO">
            <div class="row" style="width: 100%;" data-aos="fade-down-left">
                <div class="col-md-9">
                    <div class="d-flex flex-column">
                        <p>Envíanos un mensaje</p>
                        <input type="text" id="email" class="input p-3" placeholder="Ingresar el correo Electrónico" required>
                        <br>
                        <textarea name="" id="mensaje" class="input p-3" rows="4" placeholder="Ingresar el Mensaje"></textarea>
                    </div>
                </div>
                <div class="col-md-2 text-center">
                    <br><br>
                    <input type="text" id="contacto" class="input p-3" placeholder="Número de Contacto" required>
                    <br><br>
                    <button type="button" class="input bg-warning enviar pt-2 pb-2 pl-5 pr-5 text-white" onclick="crearTicket()">
                        <h4>ENVIAR</h4>
                    </button>
                    <div class="p-3 text-center" id="visitas">

                    </div>

                </div>

            </div>
        </form>
    </div>

</footer>

</div>

<!-- SEGUNDAS ESPECIALIDADES -->
<div class="modal fade" id="modalPerfiles" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row d-flex justify-content-center" id="correoweb">


                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function fecha() {

        $.ajax({
            method: "post",
            url: " " + base_url + "/home/cantidadvisitas/",
            dataType: 'json',
            success: function(data) {
                if (data.status) {
                    listado = '';
                    listado =
                        `
                        <h4>` + data['data']['cantidad'] + `</h4>
                        <h4>Visitantes</h4>                        
                    `;
                    $("#visitas").html(listado);
                }
            }
        });
    }

    window.onload = function() {
        fecha();

        divLoading.style.display = "none";
    }

    function crearTicket() {
        let divLoading = document.querySelector("#divLoading");
        var em = $("#email").val();
        var me = $("#mensaje").val();
        var co = $("#contacto").val();

        if (em == '') {
            swal("Atención!", "Debe ingresar un correo Electronico", "warning");
            return;
        }
        if (me == '') {
            swal("Atención!", "Debe Ingresar el mensaje", "warning");
            return;
        }
        if (co == '') {
            swal("Atención!", "Debe Ingresar el numero de Celular", "warning");
            return;
        }

        cadena = "email=" + em + "&mensaje=" + me + "&contacto=" + co;
        divLoading.style.display = "flex";
        $.ajax({
            method: "post",
            url: " " + base_url + "/home/crearTicket/",
            data: cadena,
            success: function(response) {
                var info = JSON.parse(response);
                divLoading.style.display = "none";
                if (info.status == true) {
                    listado =
                        `
                            <div class="text-center  mb-2">
                                <h5 class="azul">` + info.msg + `</h5>
                            </div>                          
                        `;
                    $("#correoweb").html(listado);
                    document.getElementById('email').value = "";
                    document.getElementById('mensaje').value = "";
                    document.getElementById('contacto').value = "";
                }
                $('#modalPerfiles').modal('show');


            }
        });
    }
</script>

<script>
    const base_url = "<?= base_url(); ?>";
</script>

<script type="text/javascript" src="<?= media(); ?>/jsinicio/menu.js"></script>
<script type="text/javascript" src="<?= media(); ?>/aos/aos.js"></script>
<!-- <script type="text/javascript" src="<?= media(); ?>/jsinicio/menu.js"></script> -->
<script type="text/javascript" src="<?= media(); ?>/jsinicio/aos.js"></script>
<script type="text/javascript" src="<?= media(); ?>/jsinicio/Swiper8.0.6.js"></script>

<script type="text/javascript" src="<?= media(); ?>/jsinicio/funciones.js"></script>
<script type="text/javascript" src="<?= media(); ?>/jsinicio/enlacesScroll.js"></script>
<script type="text/javascript" src="<?= media(); ?>/jsinicio/main.js"></script>
<script type="text/javascript" src="<?= media(); ?>/jsinicio/jquery3.1.0.min.js"></script>

<script src="<?= media(); ?>/js/bootstrap.min.js"></script>
<script src="<?= media(); ?>/js/main.js"></script>
<script src="<?= media(); ?>/js/fontawesome.js"></script>
<script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
<script src="<?= media(); ?>/js/popper.min.js"></script>
<script src="<?= media(); ?>/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script type="text/javascript" src="<?= media(); ?>/js/plugins/select2.min.js"></script>
<script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>