<?php

class ferialaboralxvllladminModel extends Mysql
{
	public int $idexpoferiaslaboralesgaleria;
	public int $idexpoferiaslaboralesempresas;
	public string $idexpoferiaslaboralesponencias;

	public string $nombre;
	public int $posicion;
	public string $archivo;

	public string $txtNombre;
	public string $txtPosicion;
	public string $nuevonombre;

	public int $date;
	public string $txtUrl;
	public string $descripcion;
	public string $url;




	public int $expoferiaslaboralesid = 7;

	public int $return = 0;
	public int $intborrar = 0;




	public function __construct()
	{
		parent::__construct();
	}

	/*GALERIA*/
	public function listGaleria()
	{
		$sql = "SELECT * FROM expoferiaslaboralesgaleria where status>0 and expoferiaslaboralesid = $this->expoferiaslaboralesid";
		$request = $this->select_all($sql);
		return $request;
	}

	/*GALERIA*/
	public function listGaleriaweb()
	{
		$sql = "SELECT * FROM expoferiaslaboralesgaleria where status>0 and expoferiaslaboralesid = $this->expoferiaslaboralesid";
		$request = $this->select_all($sql);
		return $request;
	}

	public function buscarArchivoGaleria($filename)
	{
		$sql = "SELECT archivo FROM expoferiaslaboralesgaleria where archivo = '$filename'";
		$request = $this->select_all($sql);
		return $request;
	}

	public function registerGaleria($txtNombre, $txtPosicion, $nuevonombre)
	{
		$this->txtNombre = $txtNombre;
		$this->txtPosicion = $txtPosicion;
		$this->nuevonombre = $nuevonombre;
		$this->expoferiaslaboralesid = $this->expoferiaslaboralesid;
		$return = 0;
		$query_insert  = "INSERT INTO expoferiaslaboralesgaleria(nombre,posicion,archivo,expoferiaslaboralesid)
								  VALUES(?,?,?,?)";
		$arrData = array(
			$this->txtNombre,
			$this->txtPosicion,
			$this->nuevonombre,
			$this->expoferiaslaboralesid
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}

	public function getOneGaleria($idexpoferiaslaboralesgaleria)
	{
		$sql = "SELECT * 
            FROM expoferiaslaboralesgaleria
            where status > 0 and idexpoferiaslaboralesgaleria = $idexpoferiaslaboralesgaleria
			";
		$request = $this->select($sql);
		return $request;
	}

	public function removeGaleria($idexpoferiaslaboralesgaleria)
	{
		$this->idexpoferiaslaboralesgaleria = $idexpoferiaslaboralesgaleria;
		$sql = "UPDATE expoferiaslaboralesgaleria SET status = ? WHERE idexpoferiaslaboralesgaleria = $this->idexpoferiaslaboralesgaleria ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateGaleria($txtNombre, $txtPosicion, $idexpoferiaslaboralesgaleria)
	{
		$this->nombre = $txtNombre;
		$this->posicion = $txtPosicion;
		$this->idexpoferiaslaboralesgaleria = $idexpoferiaslaboralesgaleria;

		$sql = "UPDATE expoferiaslaboralesgaleria SET nombre=?,posicion=?
			WHERE idexpoferiaslaboralesgaleria = $this->idexpoferiaslaboralesgaleria ";
		$arrData = array(
			$this->nombre,
			$this->posicion
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateGaleriaArchivo($txtNombre, $txtPosicion, $archivo, $idexpoferiaslaboralesgaleria)
	{
		$this->nombre = $txtNombre;
		$this->posicion = $txtPosicion;
		$this->archivo = $archivo;
		$this->idexpoferiaslaboralesgaleria = $idexpoferiaslaboralesgaleria;

		$sql = "UPDATE expoferiaslaboralesgaleria SET nombre=?,posicion=?,archivo=?
			WHERE idexpoferiaslaboralesgaleria = $this->idexpoferiaslaboralesgaleria ";
		$arrData = array(
			$this->nombre,
			$this->posicion,
			$this->archivo
		);
		$request = $this->update($sql, $arrData);
		return $request;
	}
	/*END GALERIA*/


}
