<?php 

	class DifusionModel extends Mysql
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

		public function getDifusion()
		{
			$sql = "SELECT * FROM disusion where status=1";
			$request = $this->select_all($sql);			
			return $request;
		}

		public function buscarArchivoDifusion($filename)
		{
			$sql = "SELECT NombreArchivo FROM banner where NombreArchivo = '$filename'";
			$request = $this->select_all($sql);
			return $request;
		}

		public function getOneDifusion($idexpoxvgaleria)
		{
			$sql = "SELECT * 
				FROM banner
				where Habilitado > 0 and IdDifusion = $idexpoxvgaleria
				";
			$request = $this->select($sql);
			return $request;
		}

		
		public function cantidadDifusion()
		{
			$sql = "SELECT count(IdDifusion) cant FROM banner where Habilitado = 1 order by FechaRegistro desc";
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

		public function updateGaleriaDifusion($txtNombre, $txtPosicion, $IdDifusion , $filename){
			$this->Nombre = $txtNombre;
			$this->Posicion = $txtPosicion;
			$this->IdDifusion = $IdDifusion;
			$this->NombreArchivo = $filename;
			$sql = "UPDATE banner SET Nombre=?, NombreArchivo=?, Posicion=?
			WHERE IdDifusion = $this->IdDifusion ";
					$arrData = array(
					$this->Nombre,
					$this->NombreArchivo,
					$this->Posicion);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}

		public function updateDifusion($txtNombre,$txtPosicion,$IdDifusion){
			$this->Nombre = $txtNombre;
			$this->Posicion = $txtPosicion;
			$this->IdDifusion = $IdDifusion;
			$sql = "UPDATE banner SET Nombre=?,Posicion=?
			WHERE IdDifusion = $this->IdDifusion ";
					$arrData = array(
					$this->Nombre,				
					$this->Posicion);	
				$request = $this->update($sql,$arrData);
	        return $request;
		}

		public function removeDifusion(int $IdDifusion)
		{
			$this->intIdUsuario = $IdDifusion;
			$sql = "UPDATE banner SET Habilitado = ? WHERE IdDifusion = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);
			return $request;
		}

	}
 ?>