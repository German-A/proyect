<br>
<div class="col-12">
    <footer class="row p-2" style="background-color: #12377b;">
        <div class="col-6 col-md-6 col-lg-6 col-xl-3 text-light text-center" style="margin: auto;" data-aos="fade-down-left">
            <img src="<?= media(); ?>/archivos/ferialaboralxvlll/logo_bicentenario.png" style="width: 60%; ">
        </div>
        <div class="col-6 col-md-6 col-lg-6 col-xl-3 text-light " style="margin: auto auto;" data-aos="fade-down">
            <img src="<?= media(); ?>/archivos/logos/logoUseBlanco.png" style="width: 60%; ">

            <br>
            <h5>www.use-dpa.unitru.edu.pe</h5>
            <br>


        </div>

        <div class="col-6 col-md-6 col-lg-6 col-xl-3 text-light text-center " style="margin: auto auto;" data-aos="fade-down">

            <br>
            <h5>Siguenos en nuestras redes</h5>
            <br>
            <div class="col-12 ">
                <a target="_blank" href="https://www.facebook.com/use.unt">
                    <img src="<?= media(); ?>/archivos/logos/fbwite.png" style="width:10%">
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a target="_blank" href="https://instagram.com/use.unt?igshid=YmMyMTA2M2Y=">
                    <img src="<?= media(); ?>/archivos/logos/instawite.png" style="width:10%">
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a target="_blank" href="https://www.youtube.com/channel/UCXyJxRPtWA72esjZKAQdeOw">
                    <img src="<?= media(); ?>/archivos/logos/youtwite.png" style="width:10%">
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a target="_blank" href="https://www.linkedin.com/in/unidad-de-seguimiento-del-egresado-unt-0b53aa23b/">
                    <img src="<?= media(); ?>/archivos/logos/inwite.png" style="width:10%">
                </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a target="_blank" href="https://www.tiktok.com/@use.unt">
                    <img src="<?= media(); ?>/archivos/logos/tkicon.png" style="width:10%">
                </a>
            </div>
            <br>

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

<script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
<script src="<?= media(); ?>/js/popper.min.js"></script>
<script src="<?= media(); ?>/js/bootstrap.min.js"></script>
<script src="<?= media(); ?>/js/main.js"></script>
<script src="<?= media(); ?>/js/fontawesome.js"></script>
<script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
<script type="text/javascript" src="<?= media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="<?= media(); ?>/js/plugins/select2.min.js"></script>
<script type="text/javascript" src="<?= media(); ?>/js/functions_admin.js"></script>
<script src="<?= media(); ?>/js/<?= $data['page_functions_js']; ?>"></script>
</body>




<script>
    const btnMenuExpoferiaXV = document.querySelector("#btnMenuExpoferiaxv");
    const menu = document.querySelector("#menuxv");


    btnMenuExpoferiaXV.addEventListener("click", function() {
        menu.classList.toggle("mostrarxv");
    });


    const subMenuBtn = document.querySelectorAll(".submenu-btnxv");
    for (let i = 0; i < subMenuBtn.length; i++) {
        subMenuBtn[i].addEventListener("click", function() {
            if (window.innerWidth < 1024) {
                const subMenu = this.nextElementSibling;
                const height = subMenu.scrollHeight;

                if (subMenu.classList.contains("desplegarxv")) {
                    subMenu.classList.remove("desplegarxv");
                    subMenu.removeAttribute("style");
                } else {
                    subMenu.classList.add("desplegarxv");
                    subMenu.style.height = height + "px";
                }

            }
        });
    }
</script>

<script>
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");


        // var alink = document.querySelectorAll(".menu__link");
        var alink = document.querySelectorAll("a");
        header.classList.toggle('down', window.scrollY > 0);

        var menu__itemxv = document.querySelectorAll(".menu__itemxv");
        console.log(menu__itemxv.length);
        for (let i = 0; i < menu__itemxv.length; i++) {
            menu__itemxv[i].classList.toggle('menu__itemxvp0', window.scrollY > 0);
        }


        for (let i = 0; i < alink.length; i++) {
            alink[i].classList.toggle('enlacesDown', window.scrollY > 0);
        }

        //change logo
        var logo = document.querySelector("img");

        for (let i = 0; i < alink.length; i++) {
            alink[i].classList.toggle('enlacesDown', window.scrollY > 0);
        }

        // if (window.scrollY > 0) {
        //     logo.setAttribute('src', 'Assets/img/logoUse.png');
        // } else {
        //     logo.setAttribute('src', 'Assets/img/uselogoazul.jpg');
        // }

    });
</script>