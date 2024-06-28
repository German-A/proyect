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




	public int $expoferiaslaboralesid = 5;

	public int $return = 0;
	public int $intborrar = 0;




	public function __construct()
	{
		parent::__construct();
	}

	/*GALERIA*/
	public function listGaleria()
	{
		$sql = "SELECT * FROM expoferiaslaboralesgaleria where status>0 and expoferiaslaboralesid = 5";
		$request = $this->select_all($sql);
		return $request;
	}

	/*GALERIA*/
	public function listGaleriaweb()
	{
		$sql = "SELECT * FROM expoferiaslaboralesgaleria where status>0 and expoferiaslaboralesid = 5";
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
		$this->expoferiaslaboralesid = 5;
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


	/*PONENCIAS*/
	public function listPonencias()
	{
		$sql = "SELECT * FROM expoferiaslaboralesponencias 
		where status > 0 and expoferiaslaboralesid = 5";
		$request = $this->select_all($sql);
		return $request;
	}
	public function listPonenciasdia7()
	{
		$sql = "SELECT * FROM expoferiaslaboralesponencias 
		where status > 0 and expoferiaslaboralesid = 5 and date = 7 ";
		$request = $this->select_all($sql);
		return $request;
	}
	/*PONENCIAS*/
	public function listPonenciasdia8()
	{
		$sql = "SELECT * FROM expoferiaslaboralesponencias 
			where status > 0 and expoferiaslaboralesid = 5 and date = 8 ";
		$request = $this->select_all($sql);
		return $request;
	}

	public function buscarArchivoPonencias($filename)
	{
		$sql = "SELECT archivo FROM expoferiaslaboralesponencias where archivo = '$filename' and expoferiaslaboralesid = 2";
		$request = $this->select_all($sql);
		return $request;
	}

	public function registerPonencias($txtNombre, $txtPosicion, $nuevonombre, $date)
	{
		$this->txtNombre = $txtNombre;
		$this->txtPosicion = $txtPosicion;
		$this->nuevonombre = $nuevonombre;
		$this->date = $date;
		$this->expoferiaslaboralesid = 5;
		$return = 0;
		$query_insert  = "INSERT INTO expoferiaslaboralesponencias(nombre,posicion,archivo,expoferiaslaboralesid,date)
									  VALUES(?,?,?,?,?)";
		$arrData = array(
			$this->txtNombre,
			$this->txtPosicion,
			$this->nuevonombre,
			$this->expoferiaslaboralesid,
			$this->date
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}

	public function getOnePonencia($idexpoferiaslaboralesponencias)
	{
		$sql = "SELECT * 
				FROM expoferiaslaboralesponencias
				where status > 0 and idexpoferiaslaboralesponencias = $idexpoferiaslaboralesponencias
				";
		$request = $this->select($sql);
		return $request;
	}

	public function removePonencias($idexpoferiaslaboralesgaleria)
	{
		$this->idexpoferiaslaboralesgaleria = $idexpoferiaslaboralesgaleria;
		$sql = "UPDATE expoferiaslaboralesponencias SET status = ? WHERE idexpoferiaslaboralesponencias = $this->idexpoferiaslaboralesgaleria ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updatePonencia($txtNombre, $txtPosicion, $idexpoferiaslaboralesponencias, $date)
	{
		$this->nombre = $txtNombre;
		$this->posicion = $txtPosicion;
		$this->idexpoferiaslaboralesponencias = $idexpoferiaslaboralesponencias;
		$this->date = $date;

		$sql = "UPDATE expoferiaslaboralesponencias SET nombre=?,posicion=?,date=?
				WHERE idexpoferiaslaboralesponencias = $this->idexpoferiaslaboralesponencias ";
		$arrData = array(
			$this->nombre,
			$this->posicion,
			$this->date

		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updatePonenciaArchivo($txtNombre, $txtPosicion, $archivo, $idexpoferiaslaboralesponencias, $date)
	{
		$this->nombre = $txtNombre;
		$this->posicion = $txtPosicion;
		$this->archivo = $archivo;
		$this->idexpoferiaslaboralesponencias = $idexpoferiaslaboralesponencias;
		$this->date = $date;

		$sql = "UPDATE expoferiaslaboralesponencias SET nombre=?,posicion=?,archivo=?,date=?
				WHERE idexpoferiaslaboralesponencias = $this->idexpoferiaslaboralesponencias ";
		$arrData = array(
			$this->nombre,
			$this->posicion,
			$this->archivo,
			$this->date
		);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	/*END PONENCIAS*/
















	/*EMPRESA*/
	public function listEmpresa()
	{
		$sql = "SELECT * FROM expoferiaslaboralesempresas 
		where status>0 and expoferiaslaboralesid = 5";
		$request = $this->select_all($sql);
		return $request;
	}

	public function buscarArchivoEmpresa($filename)
	{
		$sql = "SELECT archivo FROM expoferiaslaboralesempresas where archivo = '$filename'";
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
		$this->expoferiaslaboralesid = 5;
		$return = 0;
		$query_insert  = "INSERT INTO expoferiaslaboralesempresas(nombre,url,posicion,descripcion,archivo,expoferiaslaboralesid)
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

	public function getOneEmpresa($idexpoferiaslaboralesempresas)
	{
		$sql = "SELECT * 
				FROM expoferiaslaboralesempresas
				where status > 0 and idexpoferiaslaboralesempresas = $idexpoferiaslaboralesempresas
				";
		$request = $this->select($sql);
		return $request;
	}

	public function removeEmpresa($idexpoferiaslaboralesempresas)
	{
		$this->idexpoferiaslaboralesempresas = $idexpoferiaslaboralesempresas;
		$sql = "UPDATE expoferiaslaboralesempresas SET status = ? WHERE idexpoferiaslaboralesempresas = $this->idexpoferiaslaboralesempresas ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateEmpresa($txtNombre, $txtUrl, $txtPosicion, $descripcion, $idexpoferiaslaboralesempresas)
	{
		$this->nombre = $txtNombre;
		$this->url = $txtUrl;
		$this->posicion = $txtPosicion;
		$this->descripcion = $descripcion;
		$this->idexpoferiaslaboralesempresas = $idexpoferiaslaboralesempresas;

		$sql = "UPDATE expoferiaslaboralesempresas SET nombre=?,url=?,posicion=?,descripcion=?
				WHERE idexpoferiaslaboralesempresas = $this->idexpoferiaslaboralesempresas ";
		$arrData = array(
			$this->nombre,
			$this->url,
			$this->posicion,
			$this->descripcion
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateGaleriaEmpresa($txtNombre, $txtUrl, $txtPosicion, $descripcion, $archivo, $idexpoferiaslaboralesempresas)
	{
		$this->nombre = $txtNombre;
		$this->url = $txtUrl;
		$this->posicion = $txtPosicion;
		$this->descripcion = $descripcion;
		$this->archivo = $archivo;
		$this->idexpoferiaslaboralesempresas = $idexpoferiaslaboralesempresas;

		$sql = "UPDATE expoferiaslaboralesempresas SET nombre=?,url=?,posicion=?,archivo=?
				WHERE idexpoferiaslaboralesempresas = $this->idexpoferiaslaboralesempresas ";
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
