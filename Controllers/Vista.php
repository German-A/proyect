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

		$datas = '
			<table style="width=100%" cellpadding="0" cellspacing="0"  colspan="11" border="1"  bordercolor="#000000" >
				<tr>
					<td colspan="1">Escuela Profesional</td>
					<td colspan="10">' . $carrera . '</td>
				</tr>
				<tr>
					<td colspan="1">Promocion o cohorte</td>
					<td colspan="10">' . $fechaInicio . ' - ' . $fechaFin . ' </td>
				</tr>
				<tr>
					<td colspan="1">Fecha de Informe</td>
					<td colspan="10">' . $fechaInforme . '</td>
				</tr>
				<tr>		
					<td colspan="1">N° de Ingresantes por promocion</td>
					<td colspan="1">N° de Egresados</td>
					<td colspan="1">% de Egresados</td>
					<td colspan="1">N° de Egresados en el tiempo esperado</td>
					<td colspan="1">% de Egresados en el tiempo esperado</td>

					<td colspan="1">N° de Egresados Grauados</td>
					<td colspan="1">% de Egresados Graduados</td>
					<td colspan="1">N° de Egresados no Graduados</td>
					<td colspan="1">% de Egresados no Graduados</td>
					<td colspan="1">% de Egresados graduados titulados</td>	
					<td colspan="1">% de egresados graduados no titulados</td>		
				</tr>
				<tr>
					<td colspan="1" align="center">' . $ingresantesPromocion . '</td>
					<td colspan="1" align="center">' . $egresadosPromocion . '</td>
					<td colspan="1" align="center">' . $porcentajeEgresados . ' %</td>
					<td colspan="1" align="center">' . $egresadosTiempoEsperando . '</td>
					<td colspan="1" align="center">' . $porcentajeEgresadosTiempoEsperado . ' %</td>

					<td colspan="1" align="center">' . $cantidadEgresadosGraduados . '</td>
					<td colspan="1" align="center">' . $porcentajeCantidadEgresadosGraduados . ' %</td>
					<td colspan="1" align="center">' . $cantidadEgresadosNoGraduados . '</td>
					<td colspan="1" align="center">' . $porcentajeCantidadEgresadosNoGraduados . '</td>
					<td colspan="1" align="center">' . $porcentajeTitulados . ' %</td>
					<td colspan="1" align="center">' . $porcentajeNoTitulados . ' %</td>		
				</tr>
				<tr>
					<td colspan="1">observaciones</td>
					<td colspan="10">' . $observaciones . '</td>		
				</tr>
				<tr>
					<td colspan="1">toma de desiciones</td>
					<td colspan="10">' . $tomaDesiciones . '</td>		
				</tr>
			</table>

		';

		$formulario2 = '
		<table style="min-width=100%" cellpadding="0" cellspacing="0"  colspan="12" border="1"  bordercolor="#000000" >
			<tr>
				<td colspan="2">Escuela Profesional</td>
				<td colspan="10">' . $carrera . '</td>
			</tr>
			<tr>
				<td colspan="2">Año y Semestr</td>
				<td colspan="10">' . $añoysemestre . '</td>
			</tr>
			<tr>
				<td colspan="2">Fecha de Informe</td>
				<td colspan="10">' . $fechaInforme . '</td>
			</tr>
			<tr>		
				<td colspan="5">PLANES DE ACCIÓN DE VINCULACIÓN CON LOS EGRESADOS</td>
				<td colspan="1" align="center">SI GRADO DE CUMPLIMIENTO</td>
				<td colspan="1" align="center">NO GRADO DE CUMPLIMIENTO</td>
				<td colspan="5">OBSERVACIONES</td>
			</tr>

			<tr>		
				<td colspan="5">Representación de egresados en el Consejo de Facultad y Consejo Universitario</td>
		
				<td colspan="1" align="center">' . $egresadosConsejoUniversiatario1 . '</td>
				<td colspan="1" align="center">' . $egresadosConsejoUniversiatario2 . '</td>
				<td colspan="5">' . $egresadosConsejoUniversiatarioO . '</td>	
			</tr>
			<tr>		
				<td colspan="5">Programas de educación continua</td>
				<td colspan="1" align="center">' . $programasEducacionContinua1 . '</td>
				<td colspan="1" align="center">' . $programasEducacionContinua2 . '</td>
				<td colspan="5">' . $programasEducacionContinuaO . '</td>	
			</tr>

			<tr>		
				<td colspan="5">
					Participacion como grupo de interes en los procesos de:
					<li>  Revisión periodica de sus políticas y objetivos institucionales</li>
					<li>  Revisión de la pertinencia del perfil del egresado</li>
					<li>  Revisión evaluación y actualización de los currículos</li>
					<li>  Otros</li>				
				</td>
				<td colspan="1" align="center">' . $participacionProcesos1 . '</td>
				<td colspan="1" align="center">' . $participacionProcesos2 . '</td>
				<td colspan="5">' . $participacionProcesosO . '</td>	
			</tr>

			<tr>		
				<td colspan="5">Asociacion de egresados</td>
				<td colspan="1" align="center">' . $asociacionEegresados1 . '</td>
				<td colspan="1" align="center">' . $asociacionEegresados2 . '</td>
				<td colspan="5">' . $asociacionEegresadosO . '</td>	
			</tr>

			<tr>		
				<td colspan="5">Premiacion o reconocimiento a egresados destacados</td>
				<td colspan="1" align="center">' . $reconocimientoEgresados1 . '</td>
				<td colspan="1" align="center">' . $reconocimientoEgresados2 . '</td>
				<td colspan="5">' . $reconocimientoEgresadosO . '</td>	
			</tr>

			<tr>		
				<td colspan="5">Participación en el desarrollo de investigaciones básicas y aplicadas de interés local, regional, nacional e internacional</td>
				<td colspan="1" align="center">' . $desarrolloInvestigaciones1 . '</td>
				<td colspan="1" align="center">' . $desarrolloInvestigaciones2 . '</td>
				<td colspan="5">' . $desarrolloInvestigacionesO . '</td>	
			</tr>

			<tr>		
				<td colspan="5">Publicación de resultados de investigación</td>
				<td colspan="1" align="center">' . $resultadosInvestigacion1 . '</td>
				<td colspan="1" align="center">' . $resultadosInvestigacion2 . '</td>
				<td colspan="5">' . $resultadosInvestigacionO . '</td>	
			</tr>

			<tr>		
				<td colspan="5">Promoción de la movilidad de egresados que destacan en investigación</td>
				<td colspan="1" align="center">' . $destacadosInvestigacion1 . '</td>
				<td colspan="1" align="center">' . $destacadosInvestigacion2 . '</td>
				<td colspan="5">' . $destacadosInvestigacionO . 'N</td>	
			</tr>

			<tr>		
				<td colspan="5">Entre Otros</td>
				<td colspan="1" align="center">' . $entreOtros1 . '</td>
				<td colspan="1" align="center">' . $entreOtros2 . '</td>
				<td colspan="5">' . $entreOtrosO . '</td>	
			</tr>

		</table>';

		$formulario3 = '

		
		<style>
			td,th {
			padding: 0.5em;
			border: 1px solid rgba(0,0,0,0.2);
			}
		</style>

		
		<table style="min-width=100%" cellpadding="0" cellspacing="0"  colspan="12" border="1"  bordercolor="#000000" >
			<tr>
				<td style="width: 60%;">Escuela Profesional</td>
				<td style="width: 40%;" colspan="2">' . $carrera . '</td>
			</tr>
			<tr>
				<td style="width: 60%;">Año y Semestre</td>
				<td style="width: 40%;" colspan="2">' . $añoysemestre . '</td>
			</tr>
			<tr>
				<td style="width: 60%;">Fecha de Informe</td>
				<td style="width: 40%;" colspan="2">' . $fechaInforme . '</td>
			</tr>
			<tr>		
				<td style="width: 60%;">EGRESADOS</td>
				<td style="width: 20%;" align="center">N° DE EGRESADOS</td>
				<td style="width: 20%;" align="center">% DE EGRESADOS</td>
			</tr>

			<tr>		
				<td style="width: 60%;">Laboran en el campo de su carrera</td>		
				<td style="width: 20%;" align="center">' . $laboranCampo . '</td>
				<td style="width: 20%;" align="center">' . $laboranCampo / $totalEgresados . '</td>
			</tr>
			<tr>		
				<td style="width: 60%;">No laboran en el campo de su carrera</td>
				<td style="width: 20%;" align="center">' . $noLaboranCampo . '</td>
				<td style="width: 20%;" align="center">' . $noLaboranCampo / $totalEgresados . '</td>
			</tr>

			<tr>		
				<td style="width: 60%;">Laboran Independientes</td>
				<td style="width: 20%;" align="center">' . $laboranIndependientes . '</td>
				<td style="width: 20%;" align="center">' . $laboranIndependientes / $totalEgresados . '</td>
			</tr>

			<tr>		
				<td style="width: 60%;">Nombrado</td>
				<td style="width: 20%;" align="center">' . $nombrado . '</td>
				<td style="width: 20%;" align="center">' . $nombrado / $totalEgresados . '</td>
			</tr>

			<tr>		
				<td style="width: 60%;">Contratado</td>
				<td style="width: 20%;" align="center">' . $contratado . '</td>
				<td style="width: 20%;" align="center">' . $contratado / $totalEgresados . '</td>
			</tr>

			<tr>		
				<td style="width: 60%;">Sector Publico</td>
				<td style="width: 20%;" align="center">' . $sectorPublico . '</td>
				<td style="width: 20%;" align="center">' . $sectorPublico / $totalEgresados . '</td>
			</tr>

			<tr>		
				<td style="width: 60%;">Sector Privado</td>
				<td style="width: 20%;" align="center">' . $sectorPrivado . '</td>
				<td style="width: 20%;" align="center">' . $sectorPrivado / $totalEgresados . '</td>
			</tr>

			<tr>		
				<td style="width: 30%;">Comentarios</td>
				<td style="width: 70%;" align="center" colspan="2">' . $comentarios . '</td>	
			</tr>

			</table>';

		$pdf = new Mpdf([
			'mode' => 'utf-8',
			'format' => 'A4',
			'setAutoTopMargin' => 'pad',
			'setAutoBottomMargin' => 'pad',
			'orientation' => 'L',
			'font-size' => 8,

		]);

		$pdf->SetHTMLHeader('

			<h1 align="center">ESCUELA PROFESIONAL - PREGRADO</h1>
			');

		$pdf->SetHTMLFooter('
        <div style=" text-align: right; ">		
            <img style="min-width: 300px; max-width: 300px; max-height: 300px;" src="' . media() . '/archivos/logos/logoUse.png" />
        </div>
        ');

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
