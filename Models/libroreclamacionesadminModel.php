<?php 

	class libroreclamacionesadminModel extends Mysql
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
			$sql = "SELECT * FROM libroreclamaciones where status=1";
			$request = $this->select_all($sql);			
			return $request;
		}

		public function cantidadBanner()
		{
			$sql = "SELECT count(idlibroreclamaciones) cant FROM libroreclamaciones where status = 1 order by fecharegistro desc";
			$request = $this->select($sql);
			return $request;
		}

		public function register($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11){			
			$this->p1 = $p1;
			$this->p2 = $p2;
			$this->p3 = $p3;
			$this->p4 = $p4;
			$this->p5 = $p5;
			$this->p6 = $p6;
			$this->p7 = $p7;
			$this->p8 = $p8;
			$this->p9 = $p9;
			$this->p10 = $p10;
			$this->p11 = $p11;

			$return = 0;
			$query_insert  = "INSERT INTO libroreclamaciones(p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11)
								  VALUES(?,?,?,?,?,?,?,?,?,?,?)";
	        	$arrData = array(
        						$this->p1,
        						$this->p2,
								$this->p3,
        						$this->p4,
								$this->p5,
        						$this->p6,
								$this->p7,
        						$this->p8,
								$this->p9,
        						$this->p10,
								$this->p11
							);
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
