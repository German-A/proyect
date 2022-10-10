<?php

class ExpoferialaboralxvadminModel extends Mysql
{
	public int $idexpoxvgaleria;
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
		$sql = "SELECT * FROM expoxvgaleria where status>0";
		$request = $this->select_all($sql);
		return $request;
	}

	public function buscarArchivoGaleria($filename)
	{
		$sql = "SELECT archivo FROM expoxvgaleria where archivo = '$filename'";
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
		$query_insert  = "INSERT INTO expoxvgaleria(nombre,posicion,archivo,expoferiaslaboralesid)
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

	public function getOneGaleria($idexpoxvgaleria)
	{
		$sql = "SELECT * 
            FROM expoxvgaleria
            where status > 0 and idexpoxvgaleria = $idexpoxvgaleria
			";
		$request = $this->select($sql);
		return $request;
	}

	public function removeGaleria($idexpoxvgaleria)
	{
		$this->idexpoxvgaleria = $idexpoxvgaleria;
		$sql = "UPDATE expoxvgaleria SET status = ? WHERE idexpoxvgaleria = $this->idexpoxvgaleria ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateGaleria($txtNombre, $txtPosicion, $idexpoxvgaleria)
	{
		$this->nombre = $txtNombre;
		$this->posicion = $txtPosicion;
		$this->idexpoxvgaleria = $idexpoxvgaleria;

		$sql = "UPDATE expoxvgaleria SET nombre=?,posicion=?
			WHERE idexpoxvgaleria = $this->idexpoxvgaleria ";
		$arrData = array(
			$this->nombre,
			$this->posicion
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateGaleriaArchivo($txtNombre, $txtPosicion, $archivo, $idexpoxvgaleria)
	{
		$this->nombre = $txtNombre;
		$this->posicion = $txtPosicion;
		$this->archivo = $archivo;
		$this->idexpoxvgaleria = $idexpoxvgaleria;

		$sql = "UPDATE expoxvgaleria SET nombre=?,posicion=?,archivo=?
			WHERE idexpoxvgaleria = $this->idexpoxvgaleria ";
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
		$sql = "SELECT * FROM expoxvponencias where status > 0";
		$request = $this->select_all($sql);
		return $request;
	}

	public function buscarArchivoPonencias($filename)
	{
		$sql = "SELECT archivo FROM expoxvponencias where archivo = '$filename'";
		$request = $this->select_all($sql);
		return $request;
	}

	public function registerPonencias($txtNombre, $txtPosicion, $nuevonombre)
	{
		$this->txtNombre = $txtNombre;
		$this->txtPosicion = $txtPosicion;
		$this->nuevonombre = $nuevonombre;
		$this->expoferiaslaboralesid = 2;
		$return = 0;
		$query_insert  = "INSERT INTO expoxvponencias(nombre,posicion,archivo,expoferiaslaboralesid)
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

	public function getOnePonencia($idexpoxvponencias)
	{
		$sql = "SELECT * 
				FROM expoxvponencias
				where status > 0 and idexpoxvponencias = $idexpoxvponencias
				";
		$request = $this->select($sql);
		return $request;
	}

	public function removePonencias($idexpoxvgaleria)
	{
		$this->idexpoxvgaleria = $idexpoxvgaleria;
		$sql = "UPDATE expoxvponencias SET status = ? WHERE idexpoxvponencias = $this->idexpoxvgaleria ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updatePonencia($txtNombre, $txtPosicion, $idexpoxvponencias)
	{
		$this->nombre = $txtNombre;
		$this->posicion = $txtPosicion;
		$this->idexpoxvponencias = $idexpoxvponencias;

		$sql = "UPDATE expoxvponencias SET nombre=?,posicion=?
				WHERE idexpoxvponencias = $this->idexpoxvponencias ";
		$arrData = array(
			$this->nombre,
			$this->posicion
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updatePonenciaArchivo($txtNombre, $txtPosicion, $archivo, $idexpoxvponencias)
	{
		$this->nombre = $txtNombre;
		$this->posicion = $txtPosicion;
		$this->archivo = $archivo;
		$this->idexpoxvponencias = $idexpoxvponencias;

		$sql = "UPDATE expoxvponencias SET nombre=?,posicion=?,archivo=?
				WHERE idexpoxvponencias = $this->idexpoxvponencias ";
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
	
		public function registerEmpresa($txtNombre, $txtUrl, $txtPosicion, $nuevonombre)
		{
			$this->nombre = $txtNombre;
			$this->url = $txtUrl;
			$this->posicion = $txtPosicion;
			$this->archivo = $nuevonombre;
			$this->expoferiaslaboralesid = 2;
			$return = 0;
			$query_insert  = "INSERT INTO expoxvempresas(nombre,url,posicion,archivo,expoferiaslaboralesid)
									  VALUES(?,?,?,?,?)";
			$arrData = array(
				$this->nombre,
				$this->url,
				$this->posicion,
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
	
		public function updateEmpresa($txtNombre,$txtUrl, $txtPosicion, $idexpoxvempresas)
		{
			$this->nombre = $txtNombre;
			$this->url = $txtUrl;
			$this->posicion = $txtPosicion;
			$this->idexpoxvempresas = $idexpoxvempresas;
	
			$sql = "UPDATE expoxvempresas SET nombre=?,url=?,posicion=?
				WHERE idexpoxvempresas = $this->idexpoxvempresas ";
			$arrData = array(
				$this->nombre,
				$this->url,
				$this->posicion
			);
	
			$request = $this->update($sql, $arrData);
			return $request;
		}
	
		public function updateGaleriaEmpresa($txtNombre,$txtUrl,$txtPosicion, $archivo, $idexpoxvempresas)
		{
			$this->nombre = $txtNombre;
			$this->url = $txtUrl;
			$this->posicion = $txtPosicion;
			$this->archivo = $archivo;
			$this->idexpoxvempresas = $idexpoxvempresas;
	
			$sql = "UPDATE expoxvempresas SET nombre=?,url=?,posicion=?,archivo=?
				WHERE idexpoxvempresas = $this->idexpoxvempresas ";
			$arrData = array(
				$this->nombre,
				$this->posicion,
				$this->archivo
			);
			$request = $this->update($sql, $arrData);
			return $request;
		}
		/*END EMPRESA*/
}
