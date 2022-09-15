


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