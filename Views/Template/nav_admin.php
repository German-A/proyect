    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png" alt="User Image">
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
                        <span class="app-menu__label">Dashboard</span>
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

            <?php if (
                !empty($_SESSION['permisos'][3]['r']) || !empty($_SESSION['permisos'][4]['r']) ||
                !empty($_SESSION['permisos'][5]['r']) || !empty($_SESSION['permisos'][6]['r']) ||  !empty($_SESSION['permisos'][7]['r'])
                ||  !empty($_SESSION['permisos'][21]['r']) ||  !empty($_SESSION['permisos'][22]['r'])
            ) { ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fas fa-upload" aria-hidden="true"></i>
                        <span class="app-menu__label">PAGINA-WEB</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">

                        <?php if (!empty($_SESSION['permisos'][3]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/banner"><i class="icon fa fa-circle-o"></i> banner</a></li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['permisos'][4]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/manualesyguias"><i class="icon fa fa-circle-o"></i> manualesyguias</a></li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['permisos'][5]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/legalnacional"><i class="icon fa fa-circle-o"></i> Nacional</a></li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['permisos'][6]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/Legalinstitucional"><i class="icon fa fa-circle-o"></i> Institucional</a></li>
                        <?php } ?>
                        <!-- <?php if (!empty($_SESSION['permisos'][17]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/cursosmoocintranet"><i class="icon fa fa-circle-o"></i> cursosmoocintranet</a></li>
                        <?php } ?> -->
                        <?php if (!empty($_SESSION['permisos'][21]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/Bannervida2022"><i class="icon fa fa-circle-o"></i> Bannervida2022</a></li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['permisos'][22]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/galeriavida2022"><i class="icon fa fa-circle-o"></i> galeriavida2022</a></li>
                        <?php } ?>

                    </ul>
                </li>
            <?php } ?>

            <!------------------------- modulo de administador   ----------------------->
            <?php if (!empty($_SESSION['permisos'][8]['r']) || !empty($_SESSION['permisos'][9]['r']) || !empty($_SESSION['permisos'][12]['r'])) { ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fas fa-briefcase" aria-hidden="true"></i>
                        <span class="app-menu__label">Expoferia-ADMIN</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if (!empty($_SESSION['permisos'][8]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/registroegresado"><i class="icon fa fa-circle-o"></i>Egresado</a></li>
                        <?php } ?>
                        <?php if (!empty($_SESSION['permisos'][9]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/empresasadmin"><i class="icon fa fa-circle-o"></i>Empresas</a></li>
                        <?php } ?>

                        <?php if (!empty($_SESSION['permisos'][12]['r'])) { ?>
                            <li><a class="treeview-item" href="<?= base_url(); ?>/empresaapobarempleoadmin"><i class="icon fa fa-circle-o"></i>Aprobacion Empleos</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>

            <?php if (!empty($_SESSION['permisos'][23]['r'])) { ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/especialidades"><i class="icon fa fa-circle-o"></i>Especialidades</a></li>
            <?php } ?>


            <!------------------------- modulo de empresa  ----------------------->
            <?php if (!empty($_SESSION['permisos'][14]['r']) || !empty($_SESSION['permisos'][15]['r'])) { ?>
                <li class="treeview">
                    <a class="app-menu__item" href="#" data-toggle="treeview">
                        <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                        <span class="app-menu__label">EXPOFERIA LABORAL</span>
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
                        <span class="app-menu__label">EMPLEOS</span>
                    </a>
                </li>
            <?php } ?>

            <?php if (!empty($_SESSION['permisos'][19]['r'])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/conferencias">
                        <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                        <span class="app-menu__label">CONFERENCIAS</span>
                    </a>
                </li>
            <?php } ?>
            <?php if (!empty($_SESSION['permisos'][24]['r'])) { ?>
                <li>
                    <a class="app-menu__item" href="<?= base_url(); ?>/postulaciones">
                        <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                        <span class="app-menu__label">MIS POSTULACIONES</span>
                    </a>
                </li>
            <?php } ?>




            <li>
                <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                    <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                    <span class="app-menu__label">Cerrar Sessión</span>
                </a>
            </li>
        </ul>
    </aside>