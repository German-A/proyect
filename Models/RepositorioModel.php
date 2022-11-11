<?php 

	class RepositorioModel extends Mysql
	{
		private $intIdUsuario;
		private $nombreArchivo;
		private $nuevonombre;
		private $cantidad;
		private $intborrar=0;

		public function __construct()
		{
			parent::__construct();
		}

		public function lista()
		{
			$sql = "SELECT * FROM repositorio where status=1";
			$request = $this->select_all($sql);			
			return $request;
		}

		public function buscarArchivo($filename)
		{
			$sql = "SELECT filename FROM repositorio where filename = '$filename'";
			$request = $this->select_all($sql);
			return $request;
		}

		public function getOne($idexpoxvgaleria)
		{
			$sql = "SELECT * 
				FROM repositorio
				where status > 0 and idrepositorio = $idexpoxvgaleria
				";
			$request = $this->select($sql);
			return $request;
		}

		
		public function cantidadBaner()
		{
			$sql = "SELECT count(idrepositorio) cant FROM repositorio where status = 1 order by FechaRegistro desc";
			$request = $this->select($sql);
			return $request;
		}

		public function register($nombre, $filename, $posicion,$created_by,$created_at){			
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
        						$this->created_at);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
	        return $return;
		}

		public function actualizarArchivo($idrepositorio, $nombre, $filename, $posicion, $updated_by, $updated_at){
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
					$this->filename);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}

		public function actualizar($idrepositorio, $nombre, $posicion, $updated_by, $updated_at){
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
					$this->updated_at);	
				$request = $this->update($sql,$arrData);
	        return $request;
		}

		public function borrar(int $idrepositorio)
		{
			$this->intIdUsuario = $idrepositorio;
			$sql = "UPDATE repositorio SET status = ? WHERE idrepositorio = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);
			return $request;
		}

	}
 ?>