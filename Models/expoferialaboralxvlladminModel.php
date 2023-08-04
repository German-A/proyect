<?php

class ExpoferialaboralxvlladminModel extends Mysql
{
	public int $idexpoxvllgaleria;
	public int $idexpoxvempresas;

	public string $nombre;
	public int $posicion;
	public string $archivo;
	public int $intborrar = 0;

	public function __construct()
	{
		parent::__construct();
	}

	/*GALERIA*/
	public function listGaleria()
	{
		$sql = "SELECT * FROM expoxvllgaleria where status>0 and expoferiaslaboralesid = 2";
		$request = $this->select_all($sql);
		return $request;
	}

	public function buscarArchivoGaleria($filename)
	{
		$sql = "SELECT archivo FROM expoxvllgaleria where archivo = '$filename'";
		$request = $this->select_all($sql);
		return $request;
	}

	public function registerGaleria($txtNombre, $txtPosicion, $nuevonombre)
	{
		$this->txtNombre = $txtNombre;
		$this->txtPosicion = $txtPosicion;
		$this->nuevonombre = $nuevonombre;
		$this->expoferiaslaboralesid = 2;
		$return = 0;
		$query_insert  = "INSERT INTO expoxvllgaleria(nombre,posicion,archivo,expoferiaslaboralesid)
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

	public function getOneGaleria($idexpoxvllgaleria)
	{
		$sql = "SELECT * 
            FROM expoxvllgaleria
            where status > 0 and idexpoxvllgaleria = $idexpoxvllgaleria
			";
		$request = $this->select($sql);
		return $request;
	}

	public function removeGaleria($idexpoxvllgaleria)
	{
		$this->idexpoxvllgaleria = $idexpoxvllgaleria;
		$sql = "UPDATE expoxvllgaleria SET status = ? WHERE idexpoxvllgaleria = $this->idexpoxvllgaleria ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateGaleria($txtNombre, $txtPosicion, $idexpoxvllgaleria)
	{
		$this->nombre = $txtNombre;
		$this->posicion = $txtPosicion;
		$this->idexpoxvllgaleria = $idexpoxvllgaleria;

		$sql = "UPDATE expoxvllgaleria SET nombre=?,posicion=?
			WHERE idexpoxvllgaleria = $this->idexpoxvllgaleria ";
		$arrData = array(
			$this->nombre,
			$this->posicion
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateGaleriaArchivo($txtNombre, $txtPosicion, $archivo, $idexpoxvllgaleria)
	{
		$this->nombre = $txtNombre;
		$this->posicion = $txtPosicion;
		$this->archivo = $archivo;
		$this->idexpoxvllgaleria = $idexpoxvllgaleria;

		$sql = "UPDATE expoxvllgaleria SET nombre=?,posicion=?,archivo=?
			WHERE idexpoxvllgaleria = $this->idexpoxvllgaleria ";
		$arrData = array(
			$this->nombre,
			$this->posicion,
			$this->archivo
		);
		$request = $this->update($sql, $arrData);
		return $request;
	}
	/*END GALERIA*/


	/*PONENCIAS*/
	public function listPonencias()
	{
		$sql = "SELECT * FROM expoxvllponencias where status > 0 and expoferiaslaboralesid = 5";
		$request = $this->select_all($sql);
		return $request;
	}

	public function buscarArchivoPonencias($filename)
	{
		$sql = "SELECT archivo FROM expoxvllponencias where archivo = '$filename' and expoferiaslaboralesid = 2";
		$request = $this->select_all($sql);
		return $request;
	}

	public function registerPonencias($txtNombre, $txtPosicion, $nuevonombre)
	{
		$this->txtNombre = $txtNombre;
		$this->txtPosicion = $txtPosicion;
		$this->nuevonombre = $nuevonombre;
		$this->expoferiaslaboralesid = 5;
		$return = 0;
		$query_insert  = "INSERT INTO expoxvllponencias(nombre,posicion,archivo,expoferiaslaboralesid)
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

	public function getOnePonencia($idexpoxvllponencias)
	{
		$sql = "SELECT * 
				FROM expoxvllponencias
				where status > 0 and idexpoxvllponencias = $idexpoxvllponencias
				";
		$request = $this->select($sql);
		return $request;
	}

	public function removePonencias($idexpoxvllgaleria)
	{
		$this->idexpoxvllgaleria = $idexpoxvllgaleria;
		$sql = "UPDATE expoxvllponencias SET status = ? WHERE idexpoxvllponencias = $this->idexpoxvllgaleria ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updatePonencia($txtNombre, $txtPosicion, $idexpoxvllponencias)
	{
		$this->nombre = $txtNombre;
		$this->posicion = $txtPosicion;
		$this->idexpoxvllponencias = $idexpoxvllponencias;

		$sql = "UPDATE expoxvllponencias SET nombre=?,posicion=?
				WHERE idexpoxvllponencias = $this->idexpoxvllponencias ";
		$arrData = array(
			$this->nombre,
			$this->posicion
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updatePonenciaArchivo($txtNombre, $txtPosicion, $archivo, $idexpoxvllponencias)
	{
		$this->nombre = $txtNombre;
		$this->posicion = $txtPosicion;
		$this->archivo = $archivo;
		$this->idexpoxvllponencias = $idexpoxvllponencias;

		$sql = "UPDATE expoxvllponencias SET nombre=?,posicion=?,archivo=?
				WHERE idexpoxvllponencias = $this->idexpoxvllponencias ";
		$arrData = array(
			$this->nombre,
			$this->posicion,
			$this->archivo
		);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	/*END PONENCIAS*/
















	/*EMPRESA*/
	public function listEmpresa()
	{
		$sql = "SELECT * FROM expoxvempresas where status>0";
		$request = $this->select_all($sql);
		return $request;
	}

	public function buscarArchivoEmpresa($filename)
	{
		$sql = "SELECT archivo FROM expoxvempresas where archivo = '$filename'";
		$request = $this->select_all($sql);
		return $request;
	}

	public function registerEmpresa($txtNombre, $txtUrl, $txtPosicion, $descripcion, $nuevonombre)
	{
		$this->nombre = $txtNombre;
		$this->url = $txtUrl;
		$this->posicion = $txtPosicion;
		$this->descripcion = $descripcion;
		$this->archivo = $nuevonombre;
		$this->expoferiaslaboralesid = 2;
		$return = 0;
		$query_insert  = "INSERT INTO expoxvempresas(nombre,url,posicion,descripcion,archivo,expoferiaslaboralesid)
									  VALUES(?,?,?,?,?,?)";
		$arrData = array(
			$this->nombre,
			$this->url,
			$this->posicion,
			$this->descripcion,
			$this->archivo,
			$this->expoferiaslaboralesid
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}

	public function getOneEmpresa($idexpoxvempresas)
	{
		$sql = "SELECT * 
				FROM expoxvempresas
				where status > 0 and idexpoxvempresas = $idexpoxvempresas
				";
		$request = $this->select($sql);
		return $request;
	}

	public function removeEmpresa($idexpoxvempresas)
	{
		$this->idexpoxvempresas = $idexpoxvempresas;
		$sql = "UPDATE expoxvempresas SET status = ? WHERE idexpoxvempresas = $this->idexpoxvempresas ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateEmpresa($txtNombre, $txtUrl, $txtPosicion, $descripcion, $idexpoxvempresas)
	{
		$this->nombre = $txtNombre;
		$this->url = $txtUrl;
		$this->posicion = $txtPosicion;
		$this->descripcion = $descripcion;
		$this->idexpoxvempresas = $idexpoxvempresas;

		$sql = "UPDATE expoxvempresas SET nombre=?,url=?,posicion=?,descripcion=?
				WHERE idexpoxvempresas = $this->idexpoxvempresas ";
		$arrData = array(
			$this->nombre,
			$this->url,
			$this->posicion,
			$this->descripcion
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateGaleriaEmpresa($txtNombre, $txtUrl, $txtPosicion, $descripcion, $archivo, $idexpoxvempresas)
	{
		$this->nombre = $txtNombre;
		$this->url = $txtUrl;
		$this->posicion = $txtPosicion;
		$this->descripcion = $descripcion;
		$this->archivo = $archivo;
		$this->idexpoxvempresas = $idexpoxvempresas;

		$sql = "UPDATE expoxvempresas SET nombre=?,url=?,posicion=?,archivo=?
				WHERE idexpoxvempresas = $this->idexpoxvempresas ";
		$arrData = array(
			$this->nombre,
			$this->url,
			$this->posicion,
			$this->archivo
		);
		$request = $this->update($sql, $arrData);
		return $request;
	}
	/*END EMPRESA*/
}
