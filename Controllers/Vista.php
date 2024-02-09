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

	/*PAGINA DE INICIO*/
	public function informeAnual()
	{

		$carrera = intval(strClean($_POST['carrera']));
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
		$porcentajeEgresadosTiempoEsperado = ($egresadosTiempoEsperando / $ingresantesPromocion) * 100;
		$porcentajeCantidadEgresadosGraduados = ($cantidadEgresadosGraduados / $ingresantesPromocion) * 100;
		$porcentajeCantidadEgresadosNoGraduados = 100 - $porcentajeCantidadEgresadosGraduados;
		$porcentajeTitulados = ($cantidadTitulados / $ingresantesPromocion) * 100;
		$porcentajeNoTitulados = 100 - $porcentajeTitulados;
		$cantidadEgresadosNoGraduados = $ingresantesPromocion - $cantidadEgresadosGraduados;

		/*FORMULARIO 2*/

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


		/*FORMULARIO 3*/
		$totalEgresados = intval($_POST['totalEgresados']);
		$laboranCampo = intval($_POST['laboranCampo']);
		$noLaboranCampo = intval($_POST['noLaboranCampo']);
		$laboranIndependientes = intval($_POST['laboranIndependientes']);
		$nombrado = intval($_POST['nombrado']);
		$contratado = intval($_POST['contratado']);
		$sectorPublico = intval($_POST['sectorPublico']);
		$sectorPrivado = intval($_POST['sectorPrivado']);
		$comentarios = strClean($_POST['comentarios']);





		$fechaInforme  = date("Y-m-d");

		$estilos='
		<style>
			.fondoCelda{
				background-color: rgb(0, 0, 102);
				color: #ffffff;
				padding: 5px;
			}
		</style>
		';

		$datas = '
			<table style="width=100%" cellpadding="0" cellspacing="0"  colspan="11" border="1"  bordercolor="#000000" >
				<tr>
					<td >Escuela Profesional</td>
					<td colspan="10">' . $carrera . '</td>
				</tr>
				<tr>
					<td >Promocion o cohorte</td>
					<td colspan="10">' . $fechaInicio . ' - ' . $fechaFin . ' </td>
				</tr>
				<tr>
					<td >Fecha de Informe</td>
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
					<td  align="center">' . $porcentajeCantidadEgresadosNoGraduados . '</td>
					<td  align="center">' . $porcentajeTitulados . ' %</td>
					<td  align="center">' . $porcentajeNoTitulados . ' %</td>		
				</tr>
				<tr>
					<td >observaciones</td>
					<td colspan="10">' . $observaciones . '</td>		
				</tr>
				<tr>
					<td >toma de desiciones</td>
					<td colspan="10">' . $tomaDesiciones . '</td>		
				</tr>
			</table>

		';

		$formulario2 = '
		<table style="min-width=100%" cellpadding="0" cellspacing="0"  colspan="12" border="1"  bordercolor="#000000" >
			<tr>
				<td class="fondoCelda" colspan="4">Escuela Profesional: ' . $carrera . '</td>
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
				<td >' . $destacadosInvestigacionO . 'N</td>	
			</tr>

			<tr>		
				<td >Entre Otros</td>
				<td  align="center">' . $entreOtros1 . '</td>
				<td  align="center">' . $entreOtros2 . '</td>
				<td >' . $entreOtrosO . '</td>	
			</tr>

		</table>';

		$formulario3 = '



		<h3 style="text-align: center;">Informe Estadístico Anual y Semestral de Inserción Laboral</h3>
		<br><br>
		
		<table width=100% cellpadding="0" cellspacing="0" colspan="12" border="1" bordercolor="#000000">
		<tr>
			<td class="fondoCelda" colspan="3">&nbsp;<b>ESCUELA PROFESIONAL: </b> ' . $carrera . '</td>
		</tr>
		<tr>
			<td class="fondoCelda" colspan="3">&nbsp;<b>AÑO Y SEMESTRE: </b>' . $añoysemestre . '</td>
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
			<td align="center">' . $laboranCampo / $totalEgresados . '</td>
		</tr>
		<tr>
			<td height="40"  align="center">No laboran en el campo de su carrera</td>
			<td align="center">' . $noLaboranCampo . '</td>
			<td align="center">' . $noLaboranCampo / $totalEgresados . '</td>
		</tr>

		<tr>
			<td height="40"  align="center">Laboran Dependientes</td>
			<td align="center">' . $laboranIndependientes . '</td>
			<td align="center">' . $laboranIndependientes / $totalEgresados . '</td>
		</tr>

		<tr>
			<td height="40"  align="center">Laboran Independientes</td>
			<td align="center">' . $laboranIndependientes . '</td>
			<td align="center">' . $laboranIndependientes / $totalEgresados . '</td>
		</tr>

		<tr>
			<td height="40"  align="center">Nombrado</td>
			<td align="center">' . $nombrado . '</td>
			<td align="center">' . $nombrado / $totalEgresados . '</td>
		</tr>

		<tr>
			<td height="40" align="center">Contratado</td>
			<td align="center">' . $contratado . '</td>
			<td align="center">' . $contratado / $totalEgresados . '</td>
		</tr>

		<tr>
			<td height="40" align="center">Sector Publico</td>
			<td align="center">' . $sectorPublico . '</td>
			<td align="center">' . $sectorPublico / $totalEgresados . '</td>
		</tr>

		<tr>
			<td height="40" align="center">Sector Privado</td>
			<td align="center">' . $sectorPrivado . '</td>
			<td align="center">' . $sectorPrivado / $totalEgresados . '</td>
		</tr>

		<tr>
			<td height="40" align="center"><b>TOTAL</b></td>
			<td align="center"></td>
			<td align="center"></td>
		</tr>

		<tr>
			<td colspan="3" height="70" valign="top" style="text-align:justify">&nbsp;COMENTARIOS:</td>
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

		$pdf = new \Mpdf\Mpdf(['orientation' => 'L']);
		$pdf->WriteHTML($datas);

		$pdf->AddPage();
		$pdf->WriteHTML($formulario2);

		$pdf->AddPage();
		$pdf->WriteHTML($formulario3);



		$pdf->Output('use.pdf', 'I');
		$data = 'z';






		$this->views->getView($this, "vista", $data);
	}
}
