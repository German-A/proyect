<?php 

	class BanerModel extends Mysql
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
			$sql = "SELECT * FROM banner where Habilitado=1";
			$request = $this->select_all($sql);			
			return $request;
		}

		public function buscarArchivoBaner($filename)
		{
			$sql = "SELECT NombreArchivo FROM banner where NombreArchivo = '$filename'";
			$request = $this->select_all($sql);
			return $request;
		}

		public function getOneBaner($idexpoxvgaleria)
		{
			$sql = "SELECT * 
				FROM banner
				where Habilitado > 0 and IdBaner = $idexpoxvgaleria
				";
			$request = $this->select($sql);
			return $request;
		}

		
		public function cantidadBaner()
		{
			$sql = "SELECT count(IdBaner) cant FROM banner where Habilitado = 1 order by FechaRegistro desc";
			$request = $this->select($sql);
			return $request;
		}

		public function register($txtNombre, $txtPosicion, $filename){			
			$this->Nombre = $txtNombre;
			$this->NombreArchivo = $filename;
			$this->Posicion = $txtPosicion;
			$return = 0;
			$query_insert  = "INSERT INTO banner(Nombre,NombreArchivo,Posicion)
								  VALUES(?,?,?)";
	        	$arrData = array(
        						$this->Nombre,
        						$this->NombreArchivo,
        						$this->Posicion);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
	        return $return;
		}

		public function updateGaleriaBaner($txtNombre, $txtPosicion, $IdBaner , $filename){
			$this->Nombre = $txtNombre;
			$this->Posicion = $txtPosicion;
			$this->IdBaner = $IdBaner;
			$this->NombreArchivo = $filename;
			$sql = "UPDATE banner SET Nombre=?, NombreArchivo=?, Posicion=?
			WHERE IdBaner = $this->IdBaner ";
					$arrData = array(
					$this->Nombre,
					$this->NombreArchivo,
					$this->Posicion);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}

		public function updateBaner($txtNombre,$txtPosicion,$IdBaner){
			$this->Nombre = $txtNombre;
			$this->Posicion = $txtPosicion;
			$this->IdBaner = $IdBaner;
			$sql = "UPDATE banner SET Nombre=?,Posicion=?
			WHERE IdBaner = $this->IdBaner ";
					$arrData = array(
					$this->Nombre,				
					$this->Posicion);	
				$request = $this->update($sql,$arrData);
	        return $request;
		}

		public function removeBaner(int $IdBaner)
		{
			$this->intIdUsuario = $IdBaner;
			$sql = "UPDATE banner SET Habilitado = ? WHERE IdBaner = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);
			return $request;
		}

	}
 ?>