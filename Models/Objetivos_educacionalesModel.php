<?php

class objetivos_educacionalesModel extends Mysql
{

	#region variables
	private $id_objetivos_educacionales;
	private $descripcion;
	private $status;
	private $status_delete = 0;


	#endregion variables


	public function __construct()
	{
		parent::__construct();
	}

	#region objetivos_educacionales

	public function get_all_objetivos_educacionales()
	{
		$whereAdmin = "";
		if ($_SESSION['idUser'] != 1) {
			$whereAdmin = "and obd.status > 0";
		}
		$sql = "SELECT *
		FROM objetivos_educacionales obd $whereAdmin";
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

	public function get_one_objetivos_educacionales(int $id_objetivos_educacionales)
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

		$sql = "UPDATE objetivos_educacionales SET descripcion=?, status=?
		WHERE id_objetivos_educacionales = $this->id_objetivos_educacionales ";

		$arrData = array(
			$this->descripcion,
			$this->status
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function del_objetivos_educacionales(int $id_objetivos_educacionales)
	{
		$this->id_objetivos_educacionales = $id_objetivos_educacionales;
		$sql = "UPDATE objetivos_educacionales SET status = ? WHERE id_objetivos_educacionales = $this->id_objetivos_educacionales ";
		$arrData = array($this->status_delete);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	#endregion objetivos_educacionales


	public function getCarrera()
	{
		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idEscuela,nombreEscuela from escuela where status!=0";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idEscuela'],
				"text" => $user['nombreEscuela']
			);
		}

		return $response;
	}
	public function getCareraFind($search)
	{
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idEscuela,descripcion from escuela where status!=0 and nombreEscuela LIKE '%$search%' ORDER BY idEscuela";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idEscuela'],
				"text" => $user['nombreEscuela']
			);
		}
		return $response;
	}

}
