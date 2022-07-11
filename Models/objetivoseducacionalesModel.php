<?php

class objetivoseducacionalesModel extends Mysql
{
	private $tarea;
	private $personaid;
	private $cursoobjetivosid;
	private $intborrar = 0;

	public function __construct()
	{
		parent::__construct();
	}

	public function lista()
	{
		$sql = "SELECT * FROM banner where Habilitado=1";
		$request = $this->select_all($sql);
		return $request;
	}

	//obtener ruc
	public function buscarusuario($personaid)
	{
		$sql = "SELECT personaid
				FROM claseobjetivos 
				where status>0 and personaid=$personaid
				";
		$request = $this->select($sql);
		return $request;
	}


	public function register($tarea, $personaid, $cursoobjetivosid)
	{
		$this->tarea = $tarea;
		$this->personaid = $personaid;
		$this->cursoobjetivosid = $cursoobjetivosid;
		$return = 0;
		$query_insert  = "INSERT INTO claseobjetivos(tarea,cursoobjetivosid,personaid)
								  VALUES(?,?,?)";
		$arrData = array(
			$this->tarea,
			$this->personaid,
			$this->cursoobjetivosid
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}

	public function toupdate($nombreArchivo, $nuevonombre, $cantidad, $idUsuario, $posicion)
	{
		$this->nombreArchivo = $nombreArchivo;
		$this->nuevonombre = $nuevonombre;
		$this->cantidad = $cantidad;
		$this->idUsuario = $idUsuario;
		$this->posicion = $posicion;
		$sql = "UPDATE banner SET Nombre=?, NombreArchivo=?, Posicion=?
			WHERE IdBaner = $this->idUsuario ";
		$arrData = array(
			$this->nombreArchivo,
			$this->nuevonombre,
			$this->posicion
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updatePosicion($nombreArchivo, $idUsuario, $posicion)
	{
		$this->nombreArchivo = $nombreArchivo;

		$this->idUsuario = $idUsuario;
		$this->posicion = $posicion;
		$sql = "UPDATE banner SET Nombre=?,Posicion=?
			WHERE IdBaner = $this->idUsuario ";
		$arrData = array(
			$this->nombreArchivo,

			$this->posicion
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}
	public function remove(int $IdBaner)
	{
		$this->intIdUsuario = $IdBaner;
		$sql = "UPDATE banner SET Habilitado = ? WHERE IdBaner = $this->intIdUsuario ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
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
