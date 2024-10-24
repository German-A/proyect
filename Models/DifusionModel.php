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
