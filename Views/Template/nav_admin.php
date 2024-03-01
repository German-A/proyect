    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <?php if (empty($_SESSION['userData']['imagen'])) { ?>
                <img class="app-sidebar__user-avatar img-fluid" src="<?= media(); ?>/images/avatar.png" alt="User Image">
            <?php } else { ?>
                <img class="app-sidebar__user-avatar img-fluid" src="<?= media(); ?>/archivos/usuarios/<?= $_SESSION['userData']['imagen'] ?>" alt="User Image">
            <?php } ?>

            <div>
                <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombres']; ?></p>
                <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombrerol']; ?></p>
            </div>
        </div>
        <ul class="app-menu">
            <?php if (!empty($_SESSION['permisos'][1]['r'])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                        <i class="app-menu__icon fa fa-dashboard"></i>
                        <span class="app-menu__label">Inicio</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($_SESSION['permisos'][2]['r'])) { ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                        <span class="app-menu__label">Usuarios</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
                        <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
                    </ul>
                </li>
            <?php } ?>

            <?php
            if (
                !empty($_SESSION['permisos'][3]['r']) ||  !empty($_SESSION['permisos'][4]['r']) ||
                !empty($_SESSION['permisos'][5]['r']) ||  !empty($_SESSION['permisos'][6]['r']) ||
                !empty($_SESSION['permisos'][7]['r'])  ||  !empty($_SESSION['permisos'][32]['r'])
            ) {
            ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fas fa-upload" aria-hidden="true"></i>
                        <span class="app-menu__label">Página Use</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (!empty($_SESSION['permisos'][3]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/portadas"><i class="icon fa fa-circle-o"></i> Banners</a></li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['permisos'][4]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/manualesyguias"><i class="icon fa fa-circle-o"></i> Manuales y guias</a></li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['permisos'][5]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/legalnacional"><i class="icon fa fa-circle-o"></i>Normativa Nacional</a></li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['permisos'][6]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/Legalinstitucional"><i class="icon fa fa-circle-o"></i>Normativa Institucional</a></li>
                        <?php } ?>
                        <!-- <?php if (!empty($_SESSION['permisos'][17]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/cursosmoocintranet"><i class="icon fa fa-circle-o"></i> cursosmoocintranet</a></li>
                        <?php } ?> -->

                        <?php if (!empty($_SESSION['permisos'][23]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/especialidades"><i class="icon fa fa-circle-o"></i>Trasnparencia</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][32]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/repositorio"><i class="icon fa fa-circle-o"></i> Repositorio</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>

            <?php
            if (
                !empty($_SESSION['permisos'][21]['r']) ||
                !empty($_SESSION['permisos'][22]['r'])
            ) {
            ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fas fa-upload" aria-hidden="true"></i>
                        <span class="app-menu__label">XlV Expoferia</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">

                        <?php if (!empty($_SESSION['permisos'][21]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/Bannervida2022"><i class="icon fa fa-circle-o"></i> Banner Vida2022</a></li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['permisos'][22]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/galeriavida2022"><i class="icon fa fa-circle-o"></i> Galeria vida2022</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>



            <?php
            if (

                !empty($_SESSION['permisos'][29]['r']) ||
                !empty($_SESSION['permisos'][30]['r']) ||
                !empty($_SESSION['permisos'][31]['r'])

            ) {
            ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fas fa-upload" aria-hidden="true"></i>
                        <span class="app-menu__label">XV Expoferia</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">

                        <?php if (!empty($_SESSION['permisos'][29]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/expoferialaboralxvadmin/galeria"><i class="icon fa fa-circle-o"></i>Galería</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][30]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/expoferialaboralxvadmin/ponencias"><i class="icon fa fa-circle-o"></i>Ponencias</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][31]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/expoferialaboralxvadmin/empresas"><i class="icon fa fa-circle-o"></i>Empresas</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>


            
            <?php
            if (

                !empty($_SESSION['permisos'][29]['r']) ||
                !empty($_SESSION['permisos'][30]['r']) ||
                !empty($_SESSION['permisos'][31]['r'])

            ) {
            ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fas fa-upload" aria-hidden="true"></i>
                        <span class="app-menu__label">XVll Expoferia</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">

                        <?php if (!empty($_SESSION['permisos'][29]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/expoferialaboralxvlladmin/galeria"><i class="icon fa fa-circle-o"></i>Galería</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][30]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/expoferialaboralxvlladmin/ponencias"><i class="icon fa fa-circle-o"></i>Ponencias</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][31]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/expoferialaboralxvlladmin/empresas"><i class="icon fa fa-circle-o"></i>Empresas</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>


            <?php
            if (

                !empty($_SESSION['permisos'][29]['r']) ||
                !empty($_SESSION['permisos'][30]['r']) ||
                !empty($_SESSION['permisos'][31]['r'])

            ) {
            ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fas fa-upload" aria-hidden="true"></i>
                        <span class="app-menu__label">XVlll Expoferia</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">

                        <?php if (!empty($_SESSION['permisos'][29]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/expoferialaboralxvllladmin/galeria"><i class="icon fa fa-circle-o"></i>Galería</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][30]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/expoferialaboralxvllladmin/ponencias"><i class="icon fa fa-circle-o"></i>Ponencias</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][31]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/expoferialaboralxvllladmin/empresas"><i class="icon fa fa-circle-o"></i>Empresas</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>









            <!------------------------- modulo de administador   ----------------------->
            <?php if (
                !empty($_SESSION['permisos'][8]['r']) || !empty($_SESSION['permisos'][9]['r'])
                || !empty($_SESSION['permisos'][12]['r'])
                ||  !empty($_SESSION['permisos'][25]['r']) ||  !empty($_SESSION['permisos'][26]['r'])
                ||  !empty($_SESSION['permisos'][27]['r'])

            ) { ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fas fa-briefcase" aria-hidden="true"></i>
                        <span class="app-menu__label">Expoferia Admin</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (!empty($_SESSION['permisos'][8]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/registroegresado"><i class="icon fa fa-circle-o"></i>Egresados</a></li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['permisos'][9]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/empresasadmin"><i class="icon fa fa-circle-o"></i>Empresas</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][25]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/empresaapobarempleoadmin/validarruc"><i class="icon fa fa-circle-o"></i>Validar Ruc</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][12]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/empresaapobarempleoadmin"><i class="icon fa fa-circle-o"></i>Aprobacion Empleos</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][26]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/empresaapobarempleoadmin/difusionempleos"><i class="icon fa fa-circle-o"></i>Difusión Empleos</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][27]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/empresaapobarempleoadmin/seguimientoempleo"><i class="icon fa fa-circle-o"></i>Seguimiento Empleos</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][12]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/sendcorreo"><i class="icon fa fa-circle-o"></i>Correo</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>








            <!------------------------- modulo de empresa  ----------------------->
            <?php if (!empty($_SESSION['permisos'][14]['r']) || !empty($_SESSION['permisos'][15]['r'])) { ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                        <span class="app-menu__label">Expoferia Egresados</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (!empty($_SESSION['permisos'][14]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/Registroempleo"><i class="icon fa fa-circle-o"></i>EMPLEOS Y PRACTICAS</a></li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['permisos'][15]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/conferenciaempresa"><i class="icon fa fa-circle-o"></i>CONFERENCIAS</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>

            <!------------------------- modulo de ALUMNO  ----------------------->
            <?php if (!empty($_SESSION['permisos'][18]['r'])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/empleos">
                        <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                        <span class="app-menu__label">Empleos</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($_SESSION['permisos'][19]['r'])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/conferencias">
                        <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                        <span class="app-menu__label">Conferencias</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (!empty($_SESSION['permisos'][24]['r'])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/postulaciones">
                        <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                        <span class="app-menu__label">Mis Postulaciones</span>
                    </a>
                </li>
            <?php } ?>

            <!-- <?php if (!empty($_SESSION['permisos'][28]['r'])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/usuarios/perfilUsuario">
                        <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                        <span class="app-menu__label">CONFIGURACIÓN</span>
                    </a>
                </li>
            <?php } ?>
             -->


            <?php if (!empty($_SESSION['permisos'][28]['r'])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/configuracion/configuracionegresado">
                        <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                        <span class="app-menu__label">Configuración Egresado</span>
                    </a>
                </li>
            <?php } ?>


            <!------------------------- modulo de administador   ----------------------->

            <!-- <?php if (!empty($_SESSION['permisos'][50]['r']) || !empty($_SESSION['permisos'][50]['r']) || !empty($_SESSION['permisos'][50]['r'])) { ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fas fa-briefcase" aria-hidden="true"></i>
                        <span class="app-menu__label">objetivoseducacionales</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (!empty($_SESSION['permisos'][50]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/objetivoseducacionales"><i class="icon fa fa-circle-o"></i>objetivoseducacionales</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?> -->






            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                    <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                    <span class="app-menu__label">Cerrar Sessión</span>
                </a>
            </li>
        </ul>
    </aside>