<?php 

	class ConferenciaempresaadminModel extends Mysql
	{
		private $intIdUsuario;
		private $nombreArchivo;

		private $cantidad;
		private $intborrar=0;

		public function __construct()
		{
			parent::__construct();
		}

		public function listadoConferencia($i)
		{
			$sql = "SELECT e.nombreEmpresa,c.idConferencia,c.idEmpresa,c.nombreConferencia,CONCAT(DATE(fechaConferencia),'T', HOUR(fechaConferencia),':', MINUTE(fechaConferencia)) AS fechaConferencia ,c.nombreExpositor,c.fotoExpositor,c.cargoExpositor,c.linkConferencia
			from conferencia c
			inner join empresa e on c.idEmpresa=e.idempresa
			where c.habilitado>0 and c.idEmpresa=$i";
			$request = $this->select_all($sql);			
			return $request;
		}

		public function cantidadBanner()
		{
			$sql = "SELECT count(IdBaner) cant FROM banner where Habilitado = 1 order by FechaRegistro desc";
			$request = $this->select($sql);
			return $request;
		}

		private $nombreConferencia;
		private $fechaConferencia;
		private $nombreExpositor;
		private $cargoExpositor;
		private $linkConferencia;
		private $nuevonombre;
		private $idEmpresa;
		private $idConferencia;


		public function insertBanner($nombreConferencia, $fechaConferencia, $nombreExpositor, $cargoExpositor,$linkConferencia,$nuevonombre,$idEmpresa){	

			$this->fechaConferencia = $fechaConferencia;
			$this->nombreConferencia = $nombreConferencia;
			$this->nombreExpositor = $nombreExpositor;
			$this->cargoExpositor = $cargoExpositor;
			$this->linkConferencia = $linkConferencia;
			$this->nuevonombre = $nuevonombre;
			$this->idEmpresa = $idEmpresa;
			$return = 0;
			$query_insert  = "INSERT INTO conferencia(nombreConferencia,fechaConferencia,nombreExpositor,cargoExpositor,linkConferencia,fotoExpositor,idEmpresa)
								  VALUES(?,?,?,?,?,?,?)";
	        	$arrData = array(
        						$this->nombreConferencia,
        						$this->fechaConferencia,
        						$this->nombreExpositor,
								$this->cargoExpositor,
        						$this->linkConferencia,
        						$this->nuevonombre,
								$this->idEmpresa);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
	        return $return;
		}

		public function updateBanner($nombreConferencia, $fechaConferencia, $nombreExpositor, $cargoExpositor, $linkConferencia, $nuevonombre,$idEmpresa,$idConferencia){
			$this->fechaConferencia = $fechaConferencia;
			$this->nombreConferencia = $nombreConferencia;
			$this->nombreExpositor = $nombreExpositor;
			$this->cargoExpositor = $cargoExpositor;
			$this->linkConferencia = $linkConferencia;
			$this->nuevonombre = $nuevonombre;
			$this->idEmpresa = $idEmpresa;
			$this->idConferencia = $idConferencia;
			$sql = "UPDATE conferencia SET  nombreConferencia=?,fechaConferencia=?,nombreExpositor=?,cargoExpositor=?,linkConferencia=?,fotoExpositor=?,idEmpresa=?
			WHERE idConferencia = $this->idConferencia ";
					$arrData = array(
						$this->nombreConferencia,
						$this->fechaConferencia,
						$this->nombreExpositor,
						$this->cargoExpositor,
						$this->linkConferencia,
						$this->nuevonombre,
						$this->idEmpresa);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}


		public function updateConferencia($nombreConferencia, $fechaConferencia, $nombreExpositor, $cargoExpositor, $linkConferencia,$idEmpresa,$idConferencia){
			$this->fechaConferencia = $fechaConferencia;
			$this->nombreConferencia = $nombreConferencia;
			$this->nombreExpositor = $nombreExpositor;
			$this->cargoExpositor = $cargoExpositor;
			$this->linkConferencia = $linkConferencia;	
			$this->idEmpresa = $idEmpresa;
			$this->idConferencia = $idConferencia;
			$sql = "UPDATE conferencia SET  nombreConferencia=?,fechaConferencia=?,nombreExpositor=?,cargoExpositor=?,linkConferencia=?,idEmpresa=?
			WHERE idConferencia = $this->idConferencia ";
					$arrData = array(
						$this->nombreConferencia,
						$this->fechaConferencia,
						$this->nombreExpositor,
						$this->cargoExpositor,
						$this->linkConferencia,					
						$this->idEmpresa);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}


		public function deleteBanner(int $IdBaner)
		{
			$this->intIdUsuario = $IdBaner;
			$sql = "UPDATE conferencia SET habilitado = ? WHERE idConferencia = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);
			return $request;
		}
		public function getunBanner($idusuario)
		{
			$sql = "SELECT e.nombreEmpresa,c.idConferencia,c.idEmpresa,c.nombreConferencia,CONCAT(DATE(fechaConferencia),'T',DATE_FORMAT(fechaConferencia,'%H:%i')) AS fechaConferencia ,c.nombreExpositor,c.fotoExpositor,c.cargoExpositor,c.linkConferencia
			from conferencia c
			inner join empresa e on c.idEmpresa=e.idempresa
			where c.habilitado>0 and c.idConferencia=$idusuario";
			$request = $this->select($sql);			
			return $request;
		}
	}
 ?>