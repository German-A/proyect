<?php 

	class EncuestaempresasModel extends Mysql
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

		public function cantidadBanner()
		{
			$sql = "SELECT count(IdBaner) cant FROM banner where Habilitado = 1 order by FechaRegistro desc";
			$request = $this->select($sql);
			return $request;
		}

		public function register($pregunta1, $pregunta2, $pregunta3,$pregunta4,$pregunta5,$pregunta6,
		$pregunta7,$pregunta8,$pregunta9,$pregunta10,$pregunta11,$pregunta12,$pregunta13,$pregunta14,$pregunta15,$pregunta16,$pregunta17){

			$this->pregunta1 = $pregunta1;
			$this->pregunta2 = $pregunta2;
			$this->pregunta3 = $pregunta3;
			$this->pregunta4 = $pregunta4;
			$this->pregunta5 = $pregunta5;
			$this->pregunta6 = $pregunta6;
			$this->pregunta7 = $pregunta7;
			$this->pregunta8 = $pregunta8;
			$this->pregunta9 = $pregunta9;
			$this->pregunta10 = $pregunta10;
			$this->pregunta11 = $pregunta11;
			$this->pregunta12 = $pregunta12;
			$this->pregunta13 = $pregunta13;
			$this->pregunta14 = $pregunta14;
			$this->pregunta15 = $pregunta15;
			$this->pregunta16 = $pregunta16;
			$this->pregunta17 = $pregunta17;

			$return = 0;
			$query_insert  = "INSERT INTO encuestause(p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17)
								  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
	        	$arrData = array(
        						$this->pregunta1,
        						$this->pregunta2,
								$this->pregunta3,
        						$this->pregunta4,
								$this->pregunta5,
        						$this->pregunta6,
								$this->pregunta7,
        						$this->pregunta8,
								$this->pregunta9,
        						$this->pregunta10,
								$this->pregunta11,
        						$this->pregunta12,
								$this->pregunta13,
        						$this->pregunta14,
								$this->pregunta15,
        						$this->pregunta16,
        						$this->pregunta17);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
	        return $return;
		}

		public function toupdate($nombreArchivo,$nuevonombre,$cantidad,$idUsuario,$posicion){
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
					$this->posicion);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}

		public function updatePosicion($nombreArchivo,$idUsuario,$posicion){
			$this->nombreArchivo = $nombreArchivo;

			$this->idUsuario = $idUsuario;
			$this->posicion = $posicion;
			$sql = "UPDATE banner SET Nombre=?,Posicion=?
			WHERE IdBaner = $this->idUsuario ";
					$arrData = array(
					$this->nombreArchivo,
				
					$this->posicion);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}
		public function remove(int $IdBaner)
		{
			$this->intIdUsuario = $IdBaner;
			$sql = "UPDATE banner SET Habilitado = ? WHERE IdBaner = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);
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
 ?>