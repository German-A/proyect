<?php

class Objetivos_educacionalesModel extends Mysql
{

	#region variables
	private $id_objetivos_educacionales;
	private $descripcion;
	private $status;


	#endregion variables


	public function __construct()
	{
		parent::__construct();
	}

	#region objetivos_educacionales

	public function get_all()
	{
		$whereAdmin = "";
		if ($_SESSION['idUser'] != 1) {
			$whereAdmin = "and obd.status > 0";
		}
		$sql = "SELECT *
		FROM objetivos_educacionales obd . $whereAdmin";
		$request = $this->select_all($sql);
		return $request;
	}

	public function insert_objetivos_educacionales($descripcion, $status)
	{
	
		$this->descripcion = $descripcion;
		$this->status = $status;
		$query_insert  = "INSERT INTO objetivos_educacionales(descripcion,status) VALUES(?,?)";
		$arrData = array(
			$this->descripcion,
			$this->status
		);

		$request = $this->insert($query_insert, $arrData);
		return $request;
	}

	public function select_objetivos_educacionales(int $id_objetivos_educacionales)
	{
		$this->id_objetivos_educacionales = $id_objetivos_educacionales;

		$sql = "SELECT od.*
		from objetivos_educacionales od
		WHERE od.id_objetivos_educacionales = $this->id_objetivos_educacionales";
		$request = $this->select($sql);
		return $request;
	}

	public function update_objetivos_educacionales($id_objetivos_educacionales, $descripcion, $status)
	{
		$this->id_objetivos_educacionales = $id_objetivos_educacionales;
		$this->descripcion = $descripcion;
		$this->status = $status;

		$sql = "UPDATE convocatoria SET descripcion=?, status=?
		WHERE id_objetivos_educacionales = $this->id_objetivos_educacionales ";

		$arrData = array(
			$this->descripcion,
			$this->status
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function update_convocatoria_file($idconvocatoria, $descripcionconvocatoria, $fechainiciopostulacion, $fechalimitepostulacion, $status, $rangosueldos, $linkbolsaconvocatoria, $empresaid, $filename, $id)
	{
		$this->idconvocatoria = $idconvocatoria;
		$this->descripcionconvocatoria = $descripcionconvocatoria;
		$this->fechainiciopostulacion = $fechainiciopostulacion;
		$this->fechalimitepostulacion = $fechalimitepostulacion;
		$this->linkbolsaconvocatoria = $linkbolsaconvocatoria;
		$this->rangosueldos = $rangosueldos;
		$this->empresaid = $empresaid;
		$this->personaid = $id;
		$this->status = $status;
		$this->filename = $filename;


		$sql_documento = "SELECT documentoid from convocatoria where idconvocatoria = $this->idconvocatoria ";
		$request_documento = $this->select($sql_documento);

		$iddocumento = $request_documento['documentoid'];

		$sql = "UPDATE documento SET status=?
		WHERE iddocumento = $iddocumento";
		$arrData = array(
			$this->status_delete
		);
		$request = $this->update($sql, $arrData);



		$query_insert  = "INSERT INTO documento(descripcion) VALUES(?)";
		$arrData = array($this->filename);
		$this->filename = $this->insert($query_insert, $arrData);

		$sql = "UPDATE convocatoria SET descripcionconvocatoria=?, fechainiciopostulacion=?, fechalimitepostulacion=?, 
		linkbolsaconvocatoria=?, rangosueldos=?, empresaid=?, personaid=?, documentoid=?, status=?
		WHERE idconvocatoria = $this->idconvocatoria ";

		$arrData = array(
			$this->descripcionconvocatoria,
			$this->fechainiciopostulacion,
			$this->fechalimitepostulacion,
			$this->linkbolsaconvocatoria,
			$this->rangosueldos,
			$this->empresaid,
			$this->personaid,
			$this->filename,
			$this->status
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function delete_convocatoria(int $idconvocatoria)
	{
		$this->idconvocatoria = $idconvocatoria;
		$sql = "UPDATE convocatoria SET status = ? WHERE idconvocatoria = $this->idconvocatoria ";
		$arrData = array($this->status_delete);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function select_emoresa($id_persona)
	{
		$response = null;
		$sql = "SELECT CONCAT(u.nombres, ' ', u.apellidop, ' ', u.apellidom) AS nombrecompleto, emp.*
		from empresa emp
		inner join empresas_asignadas tda on emp.idempresa = tda.id_empresa
		inner join usuario u on u.idpersona = tda.id_persona
		where emp.status >0 and id_persona = $id_persona";
		$request = $this->select_all($sql);

		foreach ($request as $line) {
			$response[] = array(
				"id" => $line['idempresa'],
				"text" => $line['nombreempresa']
			);
		}
		return $response;
	}

	public function select_emoresas($id_persona, $search)
	{
		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT CONCAT(u.nombres, ' ', u.apellidop, ' ', u.apellidom) AS nombrecompleto, emp.*
		from empresa emp
		inner join empresas_asignadas tda on emp.idempresa = tda.id_empresa
		inner join usuario u on u.idpersona = tda.id_persona
		where emp.status >0 and id_persona = $id_persona and LIKE '%$search%' ";
		$request = $this->select_all($sql);

		foreach ($request as $line) {
			$response[] = array(
				"id" => $line['idempresa'],
				"text" => $line['nombreempresa']
			);
		}
		return $response;
	}

	#endregion CONVOCATORIA

	#region ASIGNAR_CONVOCATORIAS

	public function select_usuarios_asignar()
	{
		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idpersona,nombres from usuario where status!=0";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idpersona'],
				"text" => $user['nombres']
			);
		}

		return $response;
	}

	public function select_usuarios_asignar_like($search)
	{
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idpersona,nombres from usuario where status!=0 and nombres LIKE '%$search%' ORDER BY nombres";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idpersona'],
				"text" => $user['nombres']
			);
		}
		return $response;
	}

	public function asignar_publicaciones(int $id_convocatoria, int $id_persona)
	{
		$this->id_convocatoria = $id_convocatoria;
		$this->id_persona = $id_persona;

		/*ACTUALIZAR ESTADO*/
		$sql = "UPDATE convocatoria SET status = ?
		WHERE idconvocatoria = $this->id_convocatoria";
		$arrData = array($this->status_convocatoria_asignada);
		$request = $this->update($sql, $arrData);

		/*ASIGNAR CONVOCATORIA*/
		$query_insert  = "INSERT INTO convocatorias_asignadas(id_convocatoria,id_persona)
		VALUES(?,?)";
		$arrData = array(
			$this->id_convocatoria,
			$this->id_persona
		);
		$request = $this->insert($query_insert, $arrData);

		return $request;
	}
	#endregion ASIGNAR_CONVOCATORIAS
}
