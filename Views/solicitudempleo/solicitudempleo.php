<?php head($data); ?>

<div class="row">
    <div class="d-none d-xl-block col-md-2 bg-danger">
        <img src="<?= media(); ?>/images/empleo/unt.jpg" alt="" style="max-width: 250px; height: 800px; object-fit: cover;">

    </div>
    <div class="col-12 col-xl-10">
        <div class="row ">
            <div class="col-6 col-md-3 pt-4 pb-4">
                <img class="img-fluid" src="<?= media(); ?>/img/logoUse.jpg" alt="">
            </div>
            <div class="col-6 col-md-3 pt-4 pb-4">
                <img class="img-fluid" src="<?= media(); ?>/img/logoDpa.png" alt="">
            </div>

            <div class="col-12 col-md-6 col-xl-6 border-right-2 bg-danger">
                <h1 class="text-center">SOLICITUD DE <br> REQUERIMIENTO LABORAL</h1>
            </div>
        </div>
        <br><br>
        <div class="col-5 bg-primary">
            <h1>prima</h1>
        </div>
        <div class="col-5 bg-secondary">
            <h1>prima</h1>
        </div>

        <form id="formmodal" name="formmodal" class="form-horizontal">
            <input type="hidden" id="id" name="id" value="">
            <p class="text-primary">Campos obligatorios <span class="text-danger">*</span></p>

            <div class="row">

                <!-- izquierda -->
                <div class="col-md-5">
                    <div class="form-row">
                        <h2 class="text-center">Acerca de la Oferta</h2>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombreempresa">Datos de la Empres <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombreempresa" name="nombreempresa" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ruc">Ruc <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ruc" name="ruc" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contacto">Contacto <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="contacto" name="contacto" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="logo">Logo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="logo" name="logo" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <h2 class="text-center">Acerca de la Oferta</h2>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="NombrePuesto">Puesto<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="NombrePuesto" name="NombrePuesto" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="TrabajoRemoto">Modalidad <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="TrabajoRemoto" name="TrabajoRemoto" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="NumeroVacantes">Vacantes <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="NumeroVacantes" name="NumeroVacantes" required="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="LugarTrabajo">Lugar de Trabajo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="LugarTrabajo" name="LugarTrabajo" required="">
                        </div>
                    </div>
                </div>

                <!-- derecha -->
                <div class="col-md-5">
                    <div class="form-row">
                        <h2 class="text-center">Requisitos</h2>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombreempresa">Datos de la Empres <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nombreempresa" name="nombreempresa" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ruc">Ruc <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="ruc" name="ruc" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contacto">Contacto <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="contacto" name="contacto" required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="logo">Logo <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="logo" name="logo" required="">
                        </div>
                    </div>
                </div>

            </div>






            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="nombreempresa">Nombre de la Empresa <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nombreempresa" name="nombreempresa" required="">
                </div>

                <div class="form-group col-md-3">
                    <label for="dni">Ruc <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="dni" name="dni" required="">
                </div>

                <div class="form-group col-md-3">
                    <label for="telefono">Contacto <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required="">
                </div>

            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="nombreEmpresa">Nombre de la Empresa</label>
                    <input type="text" class="form-control" id="nombreEmpresa" name="nombreEmpresa" required="">
                </div>

                <div class="form-group col-md-3">
                    <label for="ruc">Ruc</label>
                    <input type="text" class="form-control" id="ruc" name="ruc" required="">
                </div>

                <div class="form-group col-md-3">
                    <label for="Direccion">Dirección</label>
                    <input type="text" class="form-control" id="Direccion" name="Direccion" required="">
                </div>
            </div>



            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Foto:</label>
                    <input type="file" id="archivoSubido" name="archivoSubido">
                </div>
            </div>




            <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
            </div>
        </form>
    </div>





</div>




<br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>


<?php footer($data); ?>