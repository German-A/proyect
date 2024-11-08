<?php

class RepositorioModel extends Mysql
{
	private $created_by;
	private $created_at;

	private $updated_by;
	private $updated_at;

	private $nombre;
	private $filename;
	private $posicion;
	private $idrepositorio;

	private $status_delete = 0;

	public function __construct()
	{
		parent::__construct();
	}

	public function getList()
	{
		$sql = "SELECT *
			FROM repositorio
			WHERE status > 0
			ORDER BY posicion DESC";
		$request = $this->select_all($sql);
		return $request;
	}

	#region buscar_archivos
	public function findFile($filename)
	{
		$this->filename = $filename;
		$sql = "SELECT filename
				from repositorio
				where filename = '$this->filename'";
		$request = $this->select($sql);
		return $request;
	}

	public function findFileId($idrepositorio)
	{
		$this->idrepositorio = $idrepositorio;
		$sql = "SELECT filename
			from repositorio
			where idrepositorio =  $this->idrepositorio";

		$request = $this->select($sql);
		return $request;
	}
	#endregion buscar_archivos

	public function newRegister($nombre, $filename, $posicion, $created_by, $created_at)
	{
		$this->nombre = $nombre;
		$this->filename = $filename;
		$this->posicion = $posicion;
		$this->created_by = $created_by;
		$this->created_at = $created_at;
		$return = 0;
		$query_insert  = "INSERT INTO repositorio(nombre,filename,posicion,created_by,created_at)
								  VALUES(?,?,?,?,?)";
		$arrData = array(
			$this->nombre,
			$this->filename,
			$this->posicion,
			$this->created_by,
			$this->created_at
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}

	public function getOne($idrepositorio)
	{
		$sql = "SELECT * 
				FROM repositorio
				where status > 0 and idrepositorio = $idrepositorio
				";
		$request = $this->select($sql);
		return $request;
	}

	public function newUpdate($idrepositorio, $nombre, $posicion, $updated_by, $updated_at)
	{
		$this->idrepositorio = $idrepositorio;
		$this->nombre = $nombre;
		$this->posicion = $posicion;
		$this->updated_by = $updated_by;
		$this->updated_at = $updated_at;
		$sql = "UPDATE repositorio SET nombre=?,posicion=?,updated_by=?,updated_at=?
			WHERE idrepositorio = $this->idrepositorio ";
		$arrData = array(
			$this->nombre,
			$this->posicion,
			$this->updated_by,
			$this->updated_at
		);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function newUpdateFile($idrepositorio, $nombre, $posicion, $filename, $updated_by, $updated_at)
	{
		$this->idrepositorio = $idrepositorio;
		$this->nombre = $nombre;
		$this->posicion = $posicion;
		$this->updated_by = $updated_by;
		$this->updated_at = $updated_at;
		$this->filename = $filename;
		$sql = "UPDATE repositorio SET nombre=?,posicion=?,updated_by=?,updated_at=?,filename=?
			WHERE idrepositorio = $this->idrepositorio ";
		$arrData = array(
			$this->nombre,
			$this->posicion,
			$this->updated_by,
			$this->updated_at,
			$this->filename
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	#region borrar_registro
	public function delete_registro(int $idrepositorio)
	{
		$this->idrepositorio = $idrepositorio;
		$sql = "UPDATE repositorio 
			SET status = ? 
			WHERE idrepositorio = $this->idrepositorio ";
		$arrData = array($this->status_delete);
		$request = $this->update($sql, $arrData);
		return $request;
	}
	#endregion borrar_registro

}
