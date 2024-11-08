<?php

class DifusionModel extends Mysql
{
	private $id_disusion;
	private $descripcion;
	private $link;

	private $intborrar = 0;

	public function __construct()
	{
		parent::__construct();
	}

	public function getDifusion()
	{
		$sql = "SELECT * FROM disusion where status=1";
		$request = $this->select_all($sql);
		return $request;
	}

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
		$sql = "SELECT * FROM escuela WHERE nombreEscuela LIKE '%$search%' ORDER BY nombreEscuela";
		$request = $this->select_all($sql);
		foreach ($request as $line) {
			$response[] = array(
				"id" => $line['idEscuela'],
				"text" => $line['nombreEscuela']
			);
		}
		return $response;
	}

	public function getSelectEmpresa()
	{
		$response = null;
		$sql = "SELECT * 
			FROM usuario u 
			INNER JOIN empresa e on e.personaid = u.idpersona
			WHERE u.rolid = 4 ";
		$request = $this->select_all($sql);

		foreach ($request as $line) {
			$response[] = array(
				"id" => $line['idpersona'],
				"text" => $line['nombreEmpresa']
			);
		}
		return $response;
	}

	public function getSelectEmpresaW($search)
	{
		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT * 
		FROM usuario u 
		INNER JOIN empresa e on e.personaid = u.idpersona
		WHERE u.rolid = 4 and e.nombreEmpresa LIKE '%$search%' ORDER BY nombreEmpresa";

		$request = $this->select_all($sql);
		foreach ($request as $line) {
			$response[] = array(
				"id" => $line['idpersona'],
				"text" => $line['nombreEmpresa']
			);
		}
		return $response;
	}




	public function newRegister($descripcion, $link)
	{
		$this->descripcion = $descripcion;
		$this->link = $link;
		$return = 0;
		$query_insert  = "INSERT INTO disusion(descripcion,link)
								  VALUES(?,?)";
		$arrData = array(
			$this->descripcion,
			$this->link
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}

	public function newUpdate($id_disusion, $descripcion, $link)
	{
		$this->id_disusion = $id_disusion;
		$this->descripcion = $descripcion;
		$this->link = $link;
		$sql = "UPDATE disusion SET descripcion=?, link=?
			WHERE id_disusion = $this->id_disusion ";
		$arrData = array(
			$this->descripcion,
			$this->link
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function removeDifusion(int $IdDifusion)
	{
		$this->intIdUsuario = $IdDifusion;
		$sql = "UPDATE banner SET Habilitado = ? WHERE IdDifusion = $this->intIdUsuario ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
		return $request;
	}
}
