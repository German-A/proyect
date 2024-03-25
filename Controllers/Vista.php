<?php

/*importacion de librerias*/
require 'vendor/autoload.php';

use Mpdf\Mpdf;
use Mpdf\Utils\Arrays;


class vista extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}
	/*PAGINA DE INICIO*/
	public function vista()
	{
		$data['page_id'] = 1;
		$data['page_tag'] = "vista";
		$data['page_title'] = "Página principal";
		$data['page_name'] = "vista";
		$data['page_functions_js'] = "functions_vista.js";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "vista", $data);
	}



	#region informe_1
	public function informe1()
	{

		$id_carrera = intval(strClean($_POST['carrera']));

		$arrData = $this->model->buscar_carrera($id_carrera);

		#region formulario_1

		$nombre_escuela = $arrData['nombreEscuela'];
		$año_egreso = intval(strClean($_POST['anioEgreso']));
		$fechaInicio = intval(strClean($_POST['fechaInicio']));
		$fechaFin = intval(strClean($_POST['fechaFin']));

		$ingresantesPromocion = intval(strClean($_POST['ingresantesPromocion']));
		$egresadosPromocion = intval(strClean($_POST['egresadosPromocion']));
		$egresadosTiempoEsperando = intval(strClean($_POST['tiempoEsperando']));
		$cantidadEgresadosGraduados = intval(strClean($_POST['cantidadGraduados']));
		$cantidadTitulados = intval(strClean($_POST['cantidadTitulados']));
		$observaciones = strval(strClean($_POST['observaciones']));
		$tomaDesiciones = strval(strClean($_POST['tomaDesiciones']));

		$porcentajeEgresados = ($egresadosPromocion / $ingresantesPromocion) * 100;

		$porcentajeEgresadosTiempoEsperado = ($egresadosTiempoEsperando / $egresadosPromocion) * 100;

		$porcentajeCantidadEgresadosGraduados = ($cantidadEgresadosGraduados / $egresadosPromocion) * 100;
		$porcentajeCantidadEgresadosNoGraduados = 100 - $porcentajeCantidadEgresadosGraduados;
		$porcentajeTitulados = ($cantidadTitulados / $egresadosPromocion) * 100;
		$porcentajeNoTitulados = 100 - $porcentajeTitulados;
		$cantidadEgresadosNoGraduados = $ingresantesPromocion - $cantidadEgresadosGraduados;

		#endregion formulario_1


		$fechaInforme  = date("d-m-Y");

		$css = '
			<style>
				.fondoCelda{
					background-color: rgb(0, 0, 102);
					color: #ffffff;
					padding: 5px;
				}
				td{
					padding: 4px 8px;
				}
				.firma {
					text-align: center;
					border-top: 2px dashed #000000;       
					margin: auto;
					width: 320px;
				}
			</style>
		';

		$form1 = '
		<br><br>
	
				<h2 style="text-align: center;">ESCUELA PROFESIONAL - PREGRADO</h2>
	
				<h3 style="text-align: center;">Informe estadístico anual sobre el estado de los egresados, graduados y titulados laboral</h3>
	
				<table style="width=100%" cellpadding="0" cellspacing="0"  colspan="11" border="1"  bordercolor="#000000" >
					<tr>
						<td >Escuela Profesional</td>
						<td colspan="10">' . $nombre_escuela . '</td>
					</tr>
					<tr>
						<td >Promocion o <br> cohorte</td>
						<td colspan="10">' . $fechaInicio . ' - ' . $fechaFin . ' </td>
					</tr>
					<tr>
					<td >Año de Egreso</td>
						<td colspan="10">' . $año_egreso . '</td>
					</tr>
					<tr>
						<td >Fecha de <br> Informe</td>
						<td colspan="10">' . $fechaInforme . '</td>
					</tr>
					<tr>		
						<td >N° de Ingresantes por promocion</td>
						<td >N° de Egresados</td>
						<td >% de Egresados</td>
						<td >N° de Egresados en el tiempo esperado</td>
						<td >% de Egresados en el tiempo esperado</td>
	
						<td >N° de Egresados Grauados</td>
						<td >% de Egresados Graduados</td>
						<td >N° de Egresados no Graduados</td>
						<td >% de Egresados no Graduados</td>
						<td >% de Egresados graduados titulados</td>	
						<td >% de egresados graduados no titulados</td>		
					</tr>
					<tr>
						<td  align="center">' . $ingresantesPromocion . '</td>
						<td  align="center">' . $egresadosPromocion . '</td>
						<td  align="center">' . $porcentajeEgresados . ' %</td>
						<td  align="center">' . $egresadosTiempoEsperando . '</td>
						<td  align="center">' . $porcentajeEgresadosTiempoEsperado . ' %</td>
	
						<td  align="center">' . $cantidadEgresadosGraduados . '</td>
						<td  align="center">' . $porcentajeCantidadEgresadosGraduados . ' %</td>
						<td  align="center">' . $cantidadEgresadosNoGraduados . '</td>
						<td  align="center">' . $porcentajeCantidadEgresadosNoGraduados . ' %</td>
						<td  align="center">' . $porcentajeTitulados . ' %</td>
						<td  align="center">' . $porcentajeNoTitulados . ' %</td>		
					</tr>
					<tr>
						<td >Observaciones</td>
						<td colspan="10">' . $observaciones . '</td>		
					</tr>
					<tr>
						<td >Toma de <br> desiciones</td>
						<td colspan="10">' . $tomaDesiciones . '</td>		
					</tr>
				</table>
				
				<br><br><br>
				<div class="firma">
					<h5>V° B°</h5>
					<h5><b>DIRECTOR DE ESCUELA PROFESIONAL</b></h5>
				</div>

	
		';

		$pdf = new Mpdf([
			'mode' => 'utf-8',
			'format' => 'A4',
			'orientation' => 'L',
			'font-size' => 8,
		]);

		$pdf->SetHTMLHeader('
			<div style="text-align: left; padding:0 ">		
				<img style="min-width: 200px; max-width: 200px; max-height: 40px;" src="' . media() . '/archivos/logos/logoUse.png" />
			</div>
			
		');

		$pdf->SetHTMLFooter('
	
		');

		$pdf->WriteHTML($css);
		$pdf->WriteHTML($form1);
		$pdf->Output('use.pdf', 'I');
		$data = '';

		$this->views->getView($this, "vista", $data);
	}
	#endregion informe_1

	#region informe_2
	/*PAGINA DE INICIO*/
	public function informe2()
	{

		$id_carrera = intval(strClean($_POST['carrera']));
		$arrData = $this->model->buscar_carrera($id_carrera);
		$nombre_escuela = $arrData['nombreEscuela'];

		$fechaInforme  = date("d-m-Y");
		#region formulario_2

		/*FORMULARIO 2*/

		$asociacionEegresadosO = '';

		$añoysemestre = $_POST['añoysemestre'];
		$egresadosConsejoUniversiatario = strClean($_POST['egresadosConsejoUniversiatario']);
		$egresadosConsejoUniversiatarioO = strClean($_POST['egresadosConsejoUniversiatarioO']);
		$programasEducacionContinua = strClean($_POST['programasEducacionContinua']);

		$programasEducacionContinuaO = strClean($_POST['programasEducacionContinuaO']);
		$asociacionEegresados = strClean($_POST['asociacionEegresados']);
		$asociacionEegresadosO = strClean($_POST['asociacionEegresadosO']);
		$reconocimientoEgresados = strClean($_POST['reconocimientoEgresados']);
		$reconocimientoEgresadosO = strClean($_POST['reconocimientoEgresadosO']);

		$desarrolloInvestigaciones = strClean($_POST['desarrolloInvestigaciones']);
		$desarrolloInvestigacionesO = strClean($_POST['desarrolloInvestigacionesO']);
		$resultadosInvestigacion = strClean($_POST['resultadosInvestigacion']);
		$resultadosInvestigacionO = strClean($_POST['resultadosInvestigacionO']);
		$destacadosInvestigacion = strClean($_POST['destacadosInvestigacion']);

		$destacadosInvestigacionO = strClean($_POST['destacadosInvestigacionO']);
		$entreOtros = strClean($_POST['entreOtros']);
		$entreOtrosO = strClean($_POST['entreOtrosO']);
		$participacionProcesos = strClean($_POST['participacionProcesos']);
		$participacionProcesosO = strClean($_POST['participacionProcesosO']);

		$egresadosConsejoUniversiatario1 = '';
		$egresadosConsejoUniversiatario2 = '';

		$programasEducacionContinua1 = '';
		$programasEducacionContinua2 = '';

		$asociacionEegresados1 = '';
		$asociacionEegresados2 = '';

		$reconocimientoEgresados1 = '';
		$reconocimientoEgresados2 = '';

		$desarrolloInvestigaciones1 = '';
		$desarrolloInvestigaciones2 = '';

		$resultadosInvestigacion1 = '';
		$resultadosInvestigacion1 = '';

		$destacadosInvestigacion1 = '';
		$destacadosInvestigacion2 = '';

		$entreOtros1 = '';
		$entreOtros2 = '';
		$participacionProcesos1 = '';
		$participacionProcesos2 = '';

		if ($egresadosConsejoUniversiatario == 'si') {
			$egresadosConsejoUniversiatario1 = 'X';
		} else {
			$egresadosConsejoUniversiatario2 = 'X';
		}

		if ($programasEducacionContinua == 'si') {
			$programasEducacionContinua1 = 'X';
		} else {
			$programasEducacionContinua2 = 'X';
		}

		if ($asociacionEegresados == 'si') {
			$asociacionEegresados1 = 'X';
		} else {
			$asociacionEegresados2 = 'X';
		}

		if ($reconocimientoEgresados == 'si') {
			$reconocimientoEgresados1 = 'X';
		} else {
			$reconocimientoEgresados2 = 'X';
		}

		if ($desarrolloInvestigaciones == 'si') {
			$desarrolloInvestigaciones1 = 'X';
		} else {
			$desarrolloInvestigaciones2 = 'X';
		}

		if ($resultadosInvestigacion == 'si') {
			$resultadosInvestigacion1 = 'X';
		} else {
			$resultadosInvestigacion2 = 'X';
		}

		if ($destacadosInvestigacion == 'si') {
			$destacadosInvestigacion1 = 'X';
		} else {
			$destacadosInvestigacion2 = 'X';
		}

		if ($entreOtros == 'si') {
			$entreOtros1 = 'X';
		} else {
			$entreOtros2 = 'X';
		}

		if ($participacionProcesos == 'si') {
			$participacionProcesos1 = 'X';
		} else {
			$participacionProcesos2 = 'X';
		}

		#endregion formulario_2


		$estilos = '
			<style>
				.fondoCelda{
					background-color: rgb(0, 0, 102);
					color: #ffffff;
					padding: 5px;
				}
				td{
					padding: 4px 2px;
				}

				.firma {
					text-align: center;
					border-top: 2px dashed #000000;       
					margin: auto;
					width: 320px;
				}
			</style>
			';

		$formulario2 = '
	
				<h2 style="text-align: center;">ESCUELA PROFESIONAL - PREGRADO</h2>
			
				<h3 style="text-align: center;">Informe Semestral y Anual sobre la Evaluación de Resultados de Planes de Acción</h3>
	
				<table style="min-width=100%" cellpadding="0" cellspacing="0"  colspan="12" border="1"  bordercolor="#000000" >
					<tr>
						<td class="fondoCelda" colspan="4">Escuela Profesional: ' . $nombre_escuela . '</td>
					</tr>
					<tr>
						<td class="fondoCelda" colspan="4">Año y Semestre: ' . $añoysemestre . '</td>
					</tr>
					<tr>
						<td class="fondoCelda" colspan="4">Fecha de Informe: ' . $fechaInforme . '</td>
					</tr>
					<tr>		
						<td class="fondoCelda" >PLANES DE ACCIÓN DE VINCULACIÓN CON LOS EGRESADOS</td>
						<td class="fondoCelda"  align="center">SI GRADO DE CUMPLIMIENTO</td>
						<td class="fondoCelda"  align="center">NO GRADO DE CUMPLIMIENTO</td>
						<td class="fondoCelda" >OBSERVACIONES</td>
					</tr>
	
					<tr>		
						<td >Representación de egresados en el Consejo de Facultad y Consejo Universitario</td>
				
						<td  align="center">' . $egresadosConsejoUniversiatario1 . '</td>
						<td  align="center">' . $egresadosConsejoUniversiatario2 . '</td>
						<td >' . $egresadosConsejoUniversiatarioO . '</td>	
					</tr>
					<tr>		
						<td >Programas de educación continua</td>
						<td  align="center">' . $programasEducacionContinua1 . '</td>
						<td  align="center">' . $programasEducacionContinua2 . '</td>
						<td >' . $programasEducacionContinuaO . '</td>	
					</tr>
	
					<tr>		
						<td >
							Participacion como grupo de interes en los procesos de:
							<li>  Revisión periodica de sus políticas y objetivos institucionales</li>
							<li>  Revisión de la pertinencia del perfil del egresado</li>
							<li>  Revisión evaluación y actualización de los currículos</li>
							<li>  Otros</li>				
						</td>
						<td  align="center">' . $participacionProcesos1 . '</td>
						<td  align="center">' . $participacionProcesos2 . '</td>
						<td >' . $participacionProcesosO . '</td>	
					</tr>
	
					<tr>		
						<td >Asociacion de egresados</td>
						<td  align="center">' . $asociacionEegresados1 . '</td>
						<td  align="center">' . $asociacionEegresados2 . '</td>
						<td >' . $asociacionEegresadosO . '</td>	
					</tr>
	
					<tr>		
						<td >Premiacion o reconocimiento a egresados destacados</td>
						<td  align="center">' . $reconocimientoEgresados1 . '</td>
						<td  align="center">' . $reconocimientoEgresados2 . '</td>
						<td >' . $reconocimientoEgresadosO . '</td>	
					</tr>
	
					<tr>		
						<td >Participación en el desarrollo de investigaciones básicas y aplicadas de interés local, regional, nacional e internacional</td>
						<td  align="center">' . $desarrolloInvestigaciones1 . '</td>
						<td  align="center">' . $desarrolloInvestigaciones2 . '</td>
						<td >' . $desarrolloInvestigacionesO . '</td>	
					</tr>
	
					<tr>		
						<td >Publicación de resultados de investigación</td>
						<td  align="center">' . $resultadosInvestigacion1 . '</td>
						<td  align="center">' . $resultadosInvestigacion2 . '</td>
						<td >' . $resultadosInvestigacionO . '</td>	
					</tr>
	
					<tr>		
						<td >Promoción de la movilidad de egresados que destacan en investigación</td>
						<td  align="center">' . $destacadosInvestigacion1 . '</td>
						<td  align="center">' . $destacadosInvestigacion2 . '</td>
						<td >' . $destacadosInvestigacionO . '</td>	
					</tr>
	
					<tr>		
						<td >Entre Otros</td>
						<td  align="center">' . $entreOtros1 . '</td>
						<td  align="center">' . $entreOtros2 . '</td>
						<td >' . $entreOtrosO . '</td>	
					</tr>
	
				</table>


				<br><br><br>
				<div class="firma">
					<h5>V° B°</h5>
					<h5><b>DIRECTOR DE ESCUELA PROFESIONAL</b></h5>
				</div>

			';


		$pdf = new Mpdf([
			'mode' => 'utf-8',
			'format' => 'A4',
			'setAutoTopMargin' => 'pad',
			'setAutoBottomMargin' => 'pad',
			'orientation' => 'P',
			'font-size' => 6,
		]);

		$pdf->SetHTMLHeader('
			<div style=" text-align: left; ">		
				<img style="min-width: 200px; max-width: 200px; max-height: 200px;" src="' . media() . '/archivos/logos/logoUse.png" />
			</div>
			');

		$pdf->SetHTMLFooter('
	
			');

		$pdf->WriteHTML($estilos);
		$pdf->WriteHTML($formulario2);

		$pdf->Output('use.pdf', 'I');
		$data = 'z';

		$this->views->getView($this, "vista", $data);
	}
	#endregion informe_2

	#region informe_3
	public function informe3()
	{

		$id_carrera = intval(strClean($_POST['carreraf3']));

		$arrData = $this->model->buscar_carrera($id_carrera);

		$nombre_escuela = $arrData['nombreEscuela'];

		#region formulario_3

		/*FORMULARIO 3*/
		$añoysemestref3 = $_POST['añoysemestref3'];

		$laboranCampo = intval($_POST['laboranCampo']);
		$noLaboranCampo = intval($_POST['noLaboranCampo']);
		$laboranDependientes = intval($_POST['laboranDependientes']);
		$laboranIndependientes = intval($_POST['laboranIndependientes']);
		$nombrado = intval($_POST['nombrado']);
		$contratado = intval($_POST['contratado']);
		$sectorPublico = intval($_POST['sectorPublico']);
		$sectorPrivado = intval($_POST['sectorPrivado']);
		$comentarios = strClean($_POST['comentarios']);

		$fechaInforme  = date("d-m-Y");


		$total_insecion_laboral = ($laboranCampo + $noLaboranCampo + $laboranDependientes + $laboranIndependientes +
			$nombrado + $contratado + $sectorPublico + $sectorPrivado);

		$porcentaje_laboranCampo = round((($laboranCampo / $total_insecion_laboral) * 100), 2);
		$porcentaje_noLaboranCampo = round((($noLaboranCampo / $total_insecion_laboral) * 100), 2);
		$porcentaje_laboranDependientes = round((($laboranDependientes / $total_insecion_laboral) * 100), 2);
		$porcentaje_laboranIndependientes = round((($laboranIndependientes / $total_insecion_laboral) * 100), 2);
		$porcentaje_nombrado = round((($nombrado / $total_insecion_laboral) * 100), 2);
		$porcentaje_contratado = round((($contratado / $total_insecion_laboral) * 100), 2);
		$porcentaje_sectorPublico = round((($sectorPublico / $total_insecion_laboral) * 100), 2);
		$porcentaje_sectorPrivado = round((($sectorPrivado / $total_insecion_laboral) * 100), 2);

		$porcentaje_total_insecion_laboral = (($total_insecion_laboral / $total_insecion_laboral) * 100);

		#endregion formulario_3








		$estilos = '
		<style>
			.fondoCelda{
				background-color: rgb(0, 0, 102);
				color: #ffffff;
				padding: 5px;
			}
			td{
				padding: 6px 4px;
			}
		</style>
		';

		$formulario3 = '

			<h2 style="text-align: center;">ESCUELA PROFESIONAL - PREGRADO</h2>

			<h3 style="text-align: center;">Informe Estadístico Anual y Semestral de Inserción Laboral</h3>
					
			<table width=100% cellpadding="0" cellspacing="0" colspan="12" border="1" bordercolor="#000000">
				<tr>
					<td class="fondoCelda" colspan="3">&nbsp;<b>ESCUELA PROFESIONAL: </b> ' . $nombre_escuela . '</td>
				</tr>
				<tr>
					<td class="fondoCelda" colspan="3">&nbsp;<b>AÑO Y SEMESTRE: </b>' . $añoysemestref3 . '</td>
				</tr>
				<tr>
					<td class="fondoCelda" colspan="3">&nbsp;<b>FECHA DE INFORME:</b> ' . $fechaInforme . '</td>
				</tr>
				<tr>
					<td align="center"><b>EGRESADOS</b></td>
					<td align="center"><b>N° DE EGRESADOS</b></td>
					<td align="center"><b>% DE EGRESADOS</b></td>
				</tr>

				<tr>
					<td height="40"  align="center">Laboran en el campo de su carrera</td>
					<td align="center">' . $laboranCampo . '</td>
					<td align="center">' . $porcentaje_laboranCampo . '</td>
				</tr>
				<tr>
					<td height="40"  align="center">No laboran en el campo de su carrera</td>
					<td align="center">' . $noLaboranCampo . '</td>
					<td align="center">' . $porcentaje_noLaboranCampo . '</td>
				</tr>

				<tr>
					<td height="40"  align="center">Laboran Dependientes</td>
					<td align="center">' . $laboranDependientes . '</td>
					<td align="center">' . $porcentaje_laboranDependientes . '</td>
				</tr>

				<tr>
					<td height="40"  align="center">Laboran Independientes</td>
					<td align="center">' . $laboranIndependientes . '</td>
					<td align="center">' . $porcentaje_laboranIndependientes . '</td>
				</tr>

				<tr>
					<td height="40"  align="center">Nombrado</td>
					<td align="center">' . $nombrado . '</td>
					<td align="center">' . $porcentaje_nombrado . '</td>
				</tr>

				<tr>
					<td height="40" align="center">Contratado</td>
					<td align="center">' . $contratado . '</td>
					<td align="center">' . $porcentaje_contratado . '</td>
				</tr>

				<tr>
					<td height="40" align="center">Sector Publico</td>
					<td align="center">' . $sectorPublico . '</td>
					<td align="center">' . $porcentaje_sectorPublico . '</td>
				</tr>

				<tr>
					<td height="40" align="center">Sector Privado</td>
					<td align="center">' . $sectorPrivado . '</td>
					<td align="center">' . $porcentaje_sectorPrivado . '</td>
				</tr>

				<tr>
					<td height="40" align="center"><b>TOTAL</b></td>
					<td align="center"> ' . $total_insecion_laboral . '</td>
					<td align="center"> ' . $porcentaje_total_insecion_laboral . '</td>
				</tr>

				<tr>
					<td colspan="3" height="70" valign="top" style="text-align:justify">&nbsp;COMENTARIOS:
						<br>
						' . $comentarios . '
					</td>					
				</tr>

			</table>
		';

		$pdf = new Mpdf([
			'mode' => 'utf-8',
			'format' => 'A4',
			'setAutoTopMargin' => 'pad',
			'setAutoBottomMargin' => 'pad',
			'orientation' => 'P',
			'font-size' => 8,
		]);

		$pdf->SetHTMLHeader('
        <div style=" text-align: left; ">		
            <img style="min-width: 200px; max-width: 200px; max-height: 200px;" src="' . media() . '/archivos/logos/logoUse.png" />
        </div>
		');

		$pdf->SetHTMLFooter('

        ');

		$pdf->WriteHTML($estilos);

		$pdf->WriteHTML($formulario3);

		$pdf->Output('use.pdf', 'I');
		$data = 'z';

		$this->views->getView($this, "vista", $data);
	}
	#endregion informe_3

	#region informe_4

	public function informe4()
	{

		$id_carrera = intval(strClean($_POST['carreraf4']));
		$arrData = $this->model->buscar_carrera($id_carrera);
		$nombre_escuela = $arrData['nombreEscuela'];

		$fechaInforme  = date("d-m-Y");
		#region formulario_2

		/*FORMULARIO 2*/

		$añoysemestre = $_POST['añoysemestref4'];

		$feriaslaborales = strClean($_POST['feriaslaborales']);
		$feriaslaboralesO = strClean($_POST['feriaslaboralesO']);

		$showroom = strClean($_POST['showroom']);
		$showroomO = strClean($_POST['showroomO']);

		$empleabilidad = strClean($_POST['empleabilidad']);
		$empleabilidadO = strClean($_POST['empleabilidadO']);

		$bolsalaboral = strClean($_POST['bolsalaboral']);
		$bolsalaboralO = strClean($_POST['bolsalaboralO']);

		$redessociales = strClean($_POST['redessociales']);
		$redessocialesO = strClean($_POST['redessocialesO']);

		$otros = strClean($_POST['otros']);
		$otrosO = strClean($_POST['otrosO']);

		$feriaslaborales1 = '';
		$feriaslaborales2 = '';

		$showroom1 = '';
		$showroom2 = '';

		$bolsalaboral1 = '';
		$bolsalaboral2 = '';

		$bolsalaboral1 = '';
		$bolsalaboral2 = '';

		$redessociales1 = '';
		$redessociales2 = '';

		$otros1 = '';
		$otros2 = '';

		if ($feriaslaborales == 'si') {
			$feriaslaborales1 = 'X';
		} else {
			$feriaslaborales2 = 'X';
		}

		if ($showroom == 'si') {
			$showroom1 = 'X';
		} else {
			$showroom2 = 'X';
		}

		if ($empleabilidad == 'si') {
			$empleabilidad1 = 'X';
		} else {
			$empleabilidad2 = 'X';
		}

		if ($bolsalaboral == 'si') {
			$bolsalaboral1 = 'X';
		} else {
			$bolsalaboral2 = 'X';
		}

		if ($redessociales == 'si') {
			$redessociales1 = 'X';
		} else {
			$redessociales2 = 'X';
		}

		if ($otros == 'si') {
			$otros1 = 'X';
		} else {
			$otros2 = 'X';
		}

		#endregion formulario_2


		$estilos = '
				<style>
					.fondoCelda{
						background-color: rgb(0, 0, 102);
						color: #ffffff;
						padding: 5px;
					}
					td{
						padding: 4px 2px;
					}
	
					.firma {
						text-align: center;
						border-top: 2px dashed #000000;       
						margin: auto;
						width: 320px;
					}
				</style>
				';

		$formulario4 = '
		
					<h2 style="text-align: center;">ESCUELA PROFESIONAL - PREGRADO</h2>
				
					<h3 style="text-align: center;">Informe Semestral y Anual sobre la Evaluación de Resultados de Planes de Acción</h3>
		
					<table style="min-width=100%" cellpadding="0" cellspacing="0"  colspan="12" border="1"  bordercolor="#000000" >

						<tr>
							<td class="fondoCelda" colspan="4">Escuela Profesional: ' . $nombre_escuela . '</td>
						</tr>
						<tr>
							<td class="fondoCelda" colspan="4">Año y Semestre: ' . $añoysemestre . '</td>
						</tr>
						<tr>
							<td class="fondoCelda" colspan="4">Fecha de Informe: ' . $fechaInforme . '</td>
						</tr>
						<tr>		
							<td class="fondoCelda" >PLANES DE ACCIÓN DE VINCULACIÓN CON LOS EGRESADOS</td>
	
				
						
							
						
							<td class="fondoCelda"  align="center">SI GRADO DE CUMPLIMIENTO</td>
							<td class="fondoCelda"  align="center">NO GRADO DE CUMPLIMIENTO</td>
					
							<td class="fondoCelda" >OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos)</td>
						</tr>
		
						<tr>		
							<td >Ferias Laborales</td>
					
							<td  align="center">' . $feriaslaborales1 . '</td>
							<td  align="center">' . $feriaslaborales2 . '</td>
							<td >' . $feriaslaboralesO . '</td>	
						</tr>
						<tr>		
							<td >Showroom</td>
							<td  align="center">' . $showroom1 . '</td>
							<td  align="center">' . $showroom2 . '</td>
							<td >' . $showroomO . '</td>	
						</tr>
		
						<tr>		
							<td >Eventos de empleabilidad</td>
							<td  align="center">' . $empleabilidad1 . '</td>
							<td  align="center">' . $empleabilidad2 . '</td>
							<td >' . $empleabilidadO . '</td>	
						</tr>
		
						<tr>		
							<td >Bolsa Laboral</td>
							<td  align="center">' . $bolsalaboral1 . '</td>
							<td  align="center">' . $bolsalaboral2 . '</td>
							<td >' . $bolsalaboralO . '</td>	
						</tr>
		
						<tr>		
							<td >Manejo de redes sociales</td>
							<td  align="center">' . $redessociales1 . '</td>
							<td  align="center">' . $redessociales2 . '</td>
							<td >' . $redessocialesO . '</td>	
						</tr>
		
						<tr>		
							<td >Otros</td>
							<td  align="center">' . $otros1 . '</td>
							<td  align="center">' . $otros2 . '</td>
							<td >' . $otrosO . '</td>	
						</tr>

					</table>
	
	
					<br><br><br>
					<div class="firma">
						<h5>V° B°</h5>
						<h5><b>DIRECTOR DE ESCUELA PROFESIONAL</b></h5>
					</div>
	
		';


		$pdf = new Mpdf([
			'mode' => 'utf-8',
			'format' => 'A4',
			'orientation' => 'P',
			'font-size' => 8,
		]);

		$pdf->SetHTMLHeader('
				<div style=" text-align: left; ">		
					<img style="min-width: 200px; max-width: 200px; max-height: 200px;" src="' . media() . '/archivos/logos/logoUse.png" />
				</div>
				');

		$pdf->SetHTMLFooter('
		
				');

		$pdf->WriteHTML($estilos);
		$pdf->WriteHTML($formulario4);

		$pdf->Output('use.pdf', 'I');
		$data = 'z';

		$this->views->getView($this, "vista", $data);
	}

	#endregion informe_4

	#region informe_5

	public function informe5()
	{

		$id_carrera = intval(strClean($_POST['carreraf5']));
		$arrData = $this->model->buscar_carrera($id_carrera);
		$nombre_escuela = $arrData['nombreEscuela'];

		$fechaInforme  = date("d-m-Y");
		#region formulario_2

		/*FORMULARIO 2*/

		$añoysemestre = $_POST['añoysemestref4'];

		$feriaslaborales = strClean($_POST['feriaslaborales']);
		$feriaslaboralesO = strClean($_POST['feriaslaboralesO']);

		$showroom = strClean($_POST['showroom']);
		$showroomO = strClean($_POST['showroomO']);

		$empleabilidad = strClean($_POST['empleabilidad']);
		$empleabilidadO = strClean($_POST['empleabilidadO']);

		$bolsalaboral = strClean($_POST['bolsalaboral']);
		$bolsalaboralO = strClean($_POST['bolsalaboralO']);

		$redessociales = strClean($_POST['redessociales']);
		$redessocialesO = strClean($_POST['redessocialesO']);

		$otros = strClean($_POST['otros']);
		$otrosO = strClean($_POST['otrosO']);

		$feriaslaborales1 = '';
		$feriaslaborales2 = '';

		$showroom1 = '';
		$showroom2 = '';

		$bolsalaboral1 = '';
		$bolsalaboral2 = '';

		$bolsalaboral1 = '';
		$bolsalaboral2 = '';

		$redessociales1 = '';
		$redessociales2 = '';

		$otros1 = '';
		$otros2 = '';

		if ($feriaslaborales == 'si') {
			$feriaslaborales1 = 'X';
		} else {
			$feriaslaborales2 = 'X';
		}

		if ($showroom == 'si') {
			$showroom1 = 'X';
		} else {
			$showroom2 = 'X';
		}

		if ($empleabilidad == 'si') {
			$empleabilidad1 = 'X';
		} else {
			$empleabilidad2 = 'X';
		}

		if ($bolsalaboral == 'si') {
			$bolsalaboral1 = 'X';
		} else {
			$bolsalaboral2 = 'X';
		}

		if ($redessociales == 'si') {
			$redessociales1 = 'X';
		} else {
			$redessociales2 = 'X';
		}

		if ($otros == 'si') {
			$otros1 = 'X';
		} else {
			$otros2 = 'X';
		}

		#endregion formulario_2


		$estilos = '
				<style>
					.fondoCelda{
						background-color: rgb(0, 0, 102);
						color: #ffffff;
						padding: 5px;
					}
					td{
						padding: 4px 2px;
					}
	
					.firma {
						text-align: center;
						border-top: 2px dashed #000000;       
						margin: auto;
						width: 320px;
					}
				</style>
				';

		$formulario4 = '
		
					<h2 style="text-align: center;">ESCUELA PROFESIONAL - PREGRADO</h2>
				
					<h3 style="text-align: center;">Informe Semestral y Anual sobre la Evaluación de Resultados de Planes de Acción</h3>
		
					<table style="min-width=100%" cellpadding="0" cellspacing="0"  colspan="12" border="1"  bordercolor="#000000" >

						<tr>
							<td class="fondoCelda" colspan="4">Escuela Profesional: ' . $nombre_escuela . '</td>
						</tr>
						<tr>
							<td class="fondoCelda" colspan="4">Año y Semestre: ' . $añoysemestre . '</td>
						</tr>
						<tr>
							<td class="fondoCelda" colspan="4">Fecha de Informe: ' . $fechaInforme . '</td>
						</tr>
						<tr>		
							<td class="fondoCelda" >PLANES DE ACCIÓN DE VINCULACIÓN CON LOS EGRESADOS</td>
	
				
						
							
						
							<td class="fondoCelda"  align="center">SI GRADO DE CUMPLIMIENTO</td>
							<td class="fondoCelda"  align="center">NO GRADO DE CUMPLIMIENTO</td>
					
							<td class="fondoCelda" >OBSERVACIONES (Si no cumplió proponer planes de mejora y con plazos)</td>
						</tr>
		
						<tr>		
							<td >Ferias Laborales</td>
					
							<td  align="center">' . $feriaslaborales1 . '</td>
							<td  align="center">' . $feriaslaborales2 . '</td>
							<td >' . $feriaslaboralesO . '</td>	
						</tr>
						<tr>		
							<td >Showroom</td>
							<td  align="center">' . $showroom1 . '</td>
							<td  align="center">' . $showroom2 . '</td>
							<td >' . $showroomO . '</td>	
						</tr>
		
						<tr>		
							<td >Eventos de empleabilidad</td>
							<td  align="center">' . $empleabilidad1 . '</td>
							<td  align="center">' . $empleabilidad2 . '</td>
							<td >' . $empleabilidadO . '</td>	
						</tr>
		
						<tr>		
							<td >Bolsa Laboral</td>
							<td  align="center">' . $bolsalaboral1 . '</td>
							<td  align="center">' . $bolsalaboral2 . '</td>
							<td >' . $bolsalaboralO . '</td>	
						</tr>
		
						<tr>		
							<td >Manejo de redes sociales</td>
							<td  align="center">' . $redessociales1 . '</td>
							<td  align="center">' . $redessociales2 . '</td>
							<td >' . $redessocialesO . '</td>	
						</tr>
		
						<tr>		
							<td >Otros</td>
							<td  align="center">' . $otros1 . '</td>
							<td  align="center">' . $otros2 . '</td>
							<td >' . $otrosO . '</td>	
						</tr>

					</table>
	
	
					<br><br><br>
					<div class="firma">
						<h5>V° B°</h5>
						<h5><b>DIRECTOR DE ESCUELA PROFESIONAL</b></h5>
					</div>
	
		';


		$pdf = new Mpdf([
			'mode' => 'utf-8',
			'format' => 'A4',
			'orientation' => 'P',
			'font-size' => 6,
		]);

		$pdf->SetHTMLHeader('
				<div style=" text-align: left; ">		
					<img style="min-width: 200px; max-width: 200px; max-height: 200px;" src="' . media() . '/archivos/logos/logoUse.png" />
				</div>
				');

		$pdf->SetHTMLFooter('
		
				');

		$pdf->WriteHTML($estilos);
		$pdf->WriteHTML($formulario4);

		$pdf->Output('use.pdf', 'I');
		$data = 'z';

		$this->views->getView($this, "vista", $data);
	}

	#endregion informe_5
}
