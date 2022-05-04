<?php
headerAdmin($data);
//getModal('modalUsuarios', $data);
?>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script> -->


<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>

            </h1>
            <input type="hidden" id="idUser" name="idUser" value="<?php echo $data['idUser'] ?>">

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/usuarios"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">

                <form id="frmempleo" class="col-12 d-flex flex-column" name="frmempleo" method="post" submit="return false">

                    <input type="hidden" name="accion" id="accion" value="REGISTRAR_EMPLEO">

                    <input type="hidden" id="idEmpresa" name="idEmpresa" value="<?php echo$data['idempresa']  ?>">



                    <div class="row">
                        <div class="col-4 col-md-4">
                            <label for="NombrePuesto">Nombre de Puesto </label>
                            <textarea type="text" class="form-control" name="NombrePuesto" id="NombrePuesto" placeholder="Ingresar Nombre Puesto" required></textarea>
                        </div>
                        <div class="col-4 col-md-4">
                            <label for="NombrePuesto">Elegir las Carreras </label>
                            <select class="carreras form-control" name="carreras[]" data-live-search="true" id="carreras" multiple="multiple" required>
                            </select>
                        </div>
                        <div class="col-4 col-md-4">
                            <label for="titulaciones">Elegir las Titulaciónes</label>
                            <select class="titulaciones form-control" name="titulaciones[]" data-live-search="true" id="titulaciones" multiple="multiple" required>
                            </select>
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-6 col-md-6">
                            <label for="DescripcionPuesto">Descripción del Puesto</label>
                            <textarea type="text" class="form-control summernote" id="DescripcionPuesto" name="DescripcionPuesto" placeholder="Ingresar Descripción Puesto"></textarea>
                        </div>
                        <div class="col-6 col-md-6">
                            <label for="InformacionAdicional">Información Adicional</label>
                            <textarea type="text" class="form-control summernote" id="InformacionAdicional" name="InformacionAdicional" id="InformacionAdicional" placeholder="Ingresar Informacion Adicional"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-8">
                            <label for="LugarTrabajo">Lugar Trabajo</label>
                            <input type="text" class="form-control" name="LugarTrabajo" id="LugarTrabajo" placeholder="Ingresar el Lugar Trabajo" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="TrabajoRemoto">Modalidad de trabajo</label>
                            <select class="form-control" name="TrabajoRemoto" id="TrabajoRemoto" data-live-search="true" class="mdb-select md-form" required>
                                <option disabled selected>Seleccionar una Opcion</option>
                                <option value="Remoto">Remoto</option>
                                <option value="Presencial">Presencial</option>
                                <option value="Remoto/Presencial">Remoto/Presencial</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label for="NumeroVacantes">NumeroVacantes</label>
                            <input type="number" class="form-control" name="NumeroVacantes" id="NumeroVacantes" placeholder="Ingresar el Número de Vacantes" required>
                        </div>

                        <div class="col-4 col-md-4">
                            <label for="competencias">Elegir las Competencias</label>
                            <select class="competencias form-control" name="competencias[]" data-live-search="true" id="competencias" multiple="multiple" required>
                            </select>
                        </div>

                        <div class="col-4 col-md-4">
                            <label for="ProgramaEstudio">Elegir los Idiomas</label>
                            <select class="idiomas form-control" name="idiomas[]" id="idiomas" multiple="multiple" required>

                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label for="Experiencias">Experiencias</label>
                            <input type="text" class="form-control" name="Experiencias" id="Experiencias" placeholder="Ingresar las Experiencias" required>
                        </div>
                        <!-- <div class="col-12 col-md-4">
                            <label for="TipoContrato">Modalidad de Contrato</label>
                            <input type="text" class="form-control" name="TipoContrato" id="TipoContrato" placeholder="Ingresar el Tipo Contrato" required>
                        </div> -->

                        <!-- <div class="col-12 col-md-4">
                            <label for="TipoContrato">Modalidad de Contrato</label>
                            <select class="form-control" name="TipoContrato" id="TipoContrato" class="form-control-lg mdb-select md-form">
                                <option disabled selected>Seleccionar una Opcion</option>
                                <option value="Ofertalaboral">Oferta de Empleo</option>
                                <option value="preprofesionales">Practicas Pre Profesionales </option>
                                <option value="proprefesionales">Practicas Pro Profesionales</option>                                
                            </select>
                        </div> -->

                        <div class="col-12 col-md-4">
                            <label for="TipoContrato">Modalidad de Contrato</label>
                            <select class="form-control select2 narrow wrap " name="TipoContrato" id="TipoContrato" class="form-control-lg mdb-select md-form">
                                <option disabled selected>Seleccionar una Opcion</option>
                                <option value="Ofertalaboral">Oferta de Empleo</option>
                                <option value="preprofesionales">Practicas Pre Profesionales </option>
                                <option value="proprefesionales">Practicas Pro Profesionales</option>                                
                            </select>
                        </div>

                        <div class="col-12 col-md-4">
                            <label for="JornadaLaboral">JornadaLaboral</label>
                            <select class="form-control select2 narrow wrap " name="JornadaLaboral" id="JornadaLaboral" class="mdb-select md-form">
                                <option disabled selected>Seleccionar una Opcion</option>
                                <option value="Parcial">Parcial </option>
                                <option value="Completa">Completa</option>
                                <option value="Otro">Otro</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label for="HorasSemanales">HorasSemanales</label>
                            <input type="number" class="form-control" name="HorasSemanales" id="HorasSemanales" placeholder="Ingresar la Horas Semanales" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="HorarioTrabajo">HorarioTrabajo</label>
                            <input type="text" class="form-control" name="HorarioTrabajo" id="HorarioTrabajo" placeholder="Ingresar las Horario Trabajo" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="RemuneracionBruta">Remuneración Bruta</label>
                            <input type="number" class="form-control" name="RemuneracionBruta" id="RemuneracionBruta" placeholder="Ingresar la Remuneración Bruta" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-4">
                            <label for="Contacto">Contacto</label>
                            <input type="text" class="form-control" name="Contacto" id="Contacto" placeholder="Ingresar los Contactos" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="FechaInico">Fecha Inicio Convocatoria</label>
                            <input type="date" class="form-control" name="FechaInico" id="FechaInico" placeholder="Ingresar FechaInico">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="FechaFin">Fecha Fin Convocatoria</label>
                            <input type="date" class="form-control" name="FechaFin" id="FechaFin" placeholder="Ingresar Fecha Fin">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="btn btn-primary col-6" onclick="publicarOferta()">PUBLICAR OFERTA LABORAL</button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-danger col-6" class="close" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</main>


<?php footerAdmin($data); ?>

<!-- <script>
      $('.summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script> -->

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['lineHeights', ['0.2']],

            ]
        });
    });
</script>


<script>


    //get Idiomas
    $(".select2").select2({
        
    });
    
</script>
