<?php head($data); ?>

<?php obj($data); ?>
<?php

//require_once  "../Models/HomeModel.php";
$año = new HomeModel();

$perfiles = $año->selectañoEspecialidades();
//$perfiless = $año->selectañoEspecialidadesporaño($id);


?><br><br>

<h3 class="text-center">EGRESADOS - 2021</h3>

<br>
<div class="row p-2">
    <div class="col-md-6 col-lg-3">
        <a href="#" class="linkw">
            <div class="widget-small primary coloured-icon"><i class="icon fas fa-university "></i>
                <div class="info">
                    <h4>FACULTADES</h4>
                    <p><b>13</b></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="#" class="linkw">
            <div class="widget-small info coloured-icon"><i class="icon fas fa-graduation-cap"></i>
                <div class="info">
                    <h4>BACHILLERES</h4>
                    <p><b>2117</b></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="#" class="linkw">
            <div class="widget-small warning coloured-icon"><i class="icon fas fa-user-graduate"></i>
                <div class="info">
                    <h4>TITULADOS</h4>
                    <p><b>1139</b></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-lg-3">
        <a href="#" class="linkw">
            <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-graduate"><span class="fas fa-user-graduate"></span></i>
                <div class="info">
                    <h4>2° ESPECIALIDAD</h4>
                    <p><b>110</b></p>
                </div>
            </div>
        </a>
    </div>

</div>




<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center">Transparencia - Unidad de Seguimiento del Egresado</h4>
        </div>

        <div class="card-body">
            <h3 class="text-muted m-b-15 text-center">Más detalle</h3>
         
            <a class="btn btn-primary" target="_blank" href="https://docs.google.com/spreadsheets/d/1Qsl3g_XTSYhMlZg4MMZg2QKGl_0gRNTMsVuV8KGXGFM/edit?usp=sharing" hr><h5>Ir al Dashboard</h5></a>

   
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <!-- <li class="nav-item">
                    <a href="https://docs.google.com/spreadsheets/d/1Qsl3g_XTSYhMlZg4MMZg2QKGl_0gRNTMsVuV8KGXGFM/edit?usp=sharing" class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">
                        <h3>Egresados por Año</h3>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                        <h3>SISEU</h3>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link active show" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="true">Contact</a>
                </li> -->
            <!-- </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="col-12 col-md-6">
                    <h2 for="TipoContrato">Seleccionar el año de Egresado:</h2>
                </div>
                <br><br>
                
                <div class="col-12 col-md-12 ">        
                <h4>Filtros:</h4><select  onchange="Buscar()" id="id" class="form-control" name="TipoContrato" id="TipoContrato" >
                        <option disabled selected>Seleccionar una Opcion</option>
                        <?php foreach ($perfiles as $key => $fila) { ?>
                            <option value="<?php echo $fila['año'] ?>"><?php echo $fila['año'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <br><br>

           
                <div class="row p-2">           

                    <div class="col-md-6 col-lg-3">
                        <a href="<?= base_url() ?>/clientes" class="linkw">
                            <div class="widget-small info coloured-icon"><i class="icon fas fa-graduation-cap"></i>
                                <div class="info">
                                    <h4>BACHILLERES</h4>
                                    <p><b id="bachiller"></b></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <a href="<?= base_url() ?>/productos" class="linkw">
                            <div class="widget-small warning coloured-icon"><i class="icon fas fa-user-graduate"></i>
                                <div class="info">
                                    <h4>TITULADOS</h4>
                                    <p><b id="titulo"></b></p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <a href="<?= base_url() ?>/pedidos" class="linkw">
                            <div class="widget-small primary coloured-icon"><i class="icon fas fa-user-graduate"><span class="fas fa-user-graduate"></span></i>
                                <div class="info">
                                    <h4>2° ESPECIALIDAD</h4>
                                    <p><b id="segundaespecialidad"></b></p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>



            </div> -->


            <!-- seccion siseu -->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <h3>Profile</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nobis, fugit pariatur minima! Dolorum modi pariatur aperiam quas odio nulla, illo necessitatibus dolor a.
                </p>
            </div>
            <!-- <div class="tab-pane fade active show" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <h3>Cotanct</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste nobis, fugit pariatur minima! Dolorum modi pariatur aperiam quas odio nulla, illo necessitatibus dolor a.
                    </p>
                </div> -->
        </div>






    </div>
</div>
</div>




<?php footer($data); ?>

<script>
    function Buscar(){
        var id = document.getElementById("id").value;
        
        cadena = "id=" + id;

    $.ajax({
        type: "POST",
        async: true,
        url: "Home/getcantidades",
        data: cadena,

        success: function(response) {
            console.log(response);

            var info = JSON.parse(response);
            //console.log(info.data[0]['bachiller']);
    
            document.getElementById('bachiller').innerHTML =info.data[0]['bachiller'];
            document.getElementById('titulo').innerHTML =info.data[0]['titulo'];
            document.getElementById('segundaespecialidad').innerHTML =info.data[0]['segundaespecialidad'];
        }
    });
    }

</script>