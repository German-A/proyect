<?php

class bolsadetrabajoModel extends Mysql
{
	private $intIdUsuario;
	private $nombreArchivo;
	private $nuevonombre;
	private $cantidad;
	private $intborrar = 0;

	public function __construct()
	{
		parent::__construct();
	}

	/*CARRERAS*/
	public function getSelectCarrera()
	{
		$response = null;
		$sql = "SELECT * FROM escuela";
		$request = $this->select_all($sql);

		foreach ($request as $line) {
			$response[] = array(
				"id" => $line['idEscuela'],
				"text" => $line['nombreEscuela']
			);
		}
		return $response;
	}

	public function getSelectCarreras($search)
	{

		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT * FROM escuela WHERE nombreEscuela LIKE '%$search%'  ORDER BY nombreEscuela";
		$request = $this->select_all($sql);
		foreach ($request as $line) {
			$response[] = array(
				"id" => $line['idEscuela'],
				"text" => $line['nombreEscuela']
			);
		}
		return $response;
	}

	public function get_ofertas_laborales($escuela,$modalidad_laboral,$condicion_laboral)
	{
		$escuelaid = '';
		if ($escuela != null) {
			$escuelaid = 'and oc.id_escuela = ' . $escuela;
		}

		$b_modalidad_laboral = '';
		if ($modalidad_laboral != null) {
			$b_modalidad_laboral = "and difo.modalidad_laboral = '$modalidad_laboral'";
		}

		$b_condicion_laboral = '';
		if ($condicion_laboral != null) {
			$b_condicion_laboral = "and difo.condicion_laboral = '$condicion_laboral'";
		}

		$sql = "SELECT * 
			FROM difusion_ofertas difo
			INNER JOIN empresa_feria ef on difo.id_empresa_feria=ef.id_empresa_feria
			INNER JOIN disusion_ofertas_carreras oc on oc.id_difusion_ofertas=difo.id_difusion_ofertas
			INNER JOIN escuela e on oc.id_escuela = e.idEscuela
			where difo.status > 0 $escuelaid $b_modalidad_laboral $b_condicion_laboral
				";
		$request = $this->select_all($sql);
		return $request;
	}

	public function listaCarrerasRequeridas($idempresa)
	{
		$sql = "SELECT * 
		from disusion_ofertas_carreras oc
		inner join escuela e on oc.id_escuela = e.idEscuela
		where oc.id_difusion_ofertas = $idempresa";
		$request = $this->select_all($sql);
		return $request;
	}



	// cursos y talleres 
	public function getCursosTalleres()
	{


		$sql = "SELECT * 
		FROM difusion_cursos dc
		INNER JOIN empresa_cursos ec on  dc.id_empresa_cursos = ec.id_empresa_cursos";
		$request = $this->select_all($sql);
		return $request;
	}












	// LISTA DE EMPLEOS POR APROBAR
	public function listEmpleos()
	{
		$sql = "SELECT u.imagen,u.idpersona,em.idEmpleos,em.status,emp.nombreEmpresa,
			em.NombrePuesto,em.DescripcionPuesto,em.InformacionAdicional,em.LugarTrabajo,em.TrabajoRemoto,em.NumeroVacantes,em.Experiencias,
			em.TipoContrato,em.JornadaLaboral,em.HorasSemanales,em.HorarioTrabajo,em.RemuneracionBruta,em.Contacto,em.FechaInico,em.FechaFin
			from empleos em
			inner join empresa emp
			on em.empresaid = emp.idempresa
			inner join usuario u
			on u.idpersona=emp.personaid			
			-- where em.status >2
			where em.status >0
			order by em.idEmpleos DESC
			";
		$request = $this->select_all($sql);
		return $request;
	}

	public function listaTitulaciones($idempresa)
	{
		$sql = "SELECT nombreTitulaciones
			FROM detalletitulaciones dt
			inner join titulaciones t
			on dt.titulacionesid = t.idTitulaciones
			where empleosid = $idempresa";
		$request = $this->select_all($sql);
		return $request;
	}

	public function listaCarreras($idempresa)
	{
		$sql = "SELECT nombreEscuela
			FROM detallecarreras dt
			inner join escuela e
			on dt.escuelaid = e.idEscuela
			where empleosid = $idempresa";
		$request = $this->select_all($sql);
		return $request;
	}

	public function oneEmpleo($id)
	{
		$sql = "SELECT u.imagen,u.idpersona,em.idEmpleos,em.status,emp.nombreEmpresa,
			em.NombrePuesto,em.DescripcionPuesto,em.InformacionAdicional,em.LugarTrabajo,em.TrabajoRemoto,em.NumeroVacantes,em.Experiencias,
			em.TipoContrato,em.JornadaLaboral,em.HorasSemanales,em.HorarioTrabajo,em.RemuneracionBruta,em.Contacto,em.FechaInico,em.FechaFin,em.NombrePuesto
			from empleos em
			inner join empresa emp
			on em.empresaid = emp.idempresa
			inner join usuario u
			on u.idpersona=emp.personaid			
			-- where em.status >2
			where em.status >0 and em.idEmpleos = $id
			order by em.idEmpleos DESC
			";
		$request = $this->select_all($sql);
		return $request;
	}

	public function getOne($idusuario)
	{
		$sql = "SELECT * 
            FROM banner
            where Habilitado=1 and IdBaner=$idusuario
			";
		$request = $this->select($sql);
		return $request;
	}
}
