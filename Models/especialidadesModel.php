<?php 

	class EspecialidadesModel extends Mysql
	{
		private $intIdUsuario;

		private $bachiller;
		private $titulo;
		private $segundaespecialidad;
		private $escuelaid;
		private $año;
		private $tipopostgrado;
		private $intborrar=0;

		public function __construct()
		{
			parent::__construct();
		}

		public function lista()
		{
			$sql = "SELECT * 
			FROM especialidades es
			inner join escuela e on es.escuelaid= e.idEscuela
			where es.status!=0";
			$request = $this->select_all($sql);			
			return $request;
		}



		public function register($bachiller, $titulo, $segundaespecialidad, $escuelaid,$año){			
			$this->bachiller = $bachiller;
			$this->titulo = $titulo;
			$this->segundaespecialidad = $segundaespecialidad;
			$this->escuelaid = $escuelaid;
			$this->año = $año;
			$return = 0;
			$query_insert  = "INSERT INTO especialidades(bachiller,titulo,segundaespecialidad,escuelaid,año)
								  VALUES(?,?,?,?,?)";
	        	$arrData = array(
        						$this->bachiller,
        						$this->titulo,
								$this->segundaespecialidad,
        						$this->escuelaid,
        						$this->año);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
	        return $return;
		}

		public function selectIdio()
		{
			$response = null;
			//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
			$sql = "SELECT idFacultad,nombreFacultad from facultad where status!=0";
			$request = $this->select_all($sql);
	
			foreach ($request as $user) {
				$response[] = array(
					"id" => $user['idFacultad'],
					"text" => $user['nombreFacultad']
				);
			}
	
			return $response;
		}
		public function selectIdiom($search)
		{
			//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
			$sql = "SELECT idFacultad,nombreFacultad from facultad where status!=0 and nombreFacultad LIKE '%$search%' ORDER BY idFacultad";
			$request = $this->select_all($sql);
	
			foreach ($request as $user) {
				$response[] = array(
					"id" => $user['idFacultad'],
					"text" => $user['nombreFacultad']
				);
			}
			return $response;
		}
	

		public function getCantidades($año)
		{		
			$sql = "SELECT  año, sum(bachiller) bachiller ,sum(titulo) titulo ,sum(segundaespecialidad) segundaespecialidad 
			FROM especialidades  
			where status>0 and año = $año 
			group by año ";
			$request = $this->select_all($sql);
			return $request;
		}

		
	public function selectCarreras()
	{
		$response=null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idEscuela,nombreEscuela from escuela where status!=0";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idEscuela'],
				"text" => $user['nombreEscuela']
			);
		}

		return $response;
	}
	public function selectCarrerass($search)
	{	
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idEscuela,nombreEscuela from escuela where status!=0 and nombreEscuela LIKE '%$search%' ORDER BY nombreEscuela";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idEscuela'],
				"text" => $user['nombreEscuela']
			);
		}
		return $response;
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

		public function registerpostgrado($tipopostgrado,  $escuelaid){			
			$this->tipopostgrado = $tipopostgrado;
			$this->escuelaid = $escuelaid;
			$return = 0;
			$query_insert  = "INSERT INTO maestria(tipopostgrado,Facultadid)
								  VALUES(?,?)";
	        	$arrData = array(
        						$this->tipopostgrado,
        						$this->escuelaid);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
	        return $return;
		}



		public function listapostgrado()
		{
			$sql = "SELECT * 
			from maestria m
			inner join facultad f on f.idFacultad=m.Facultadid
			where m.status!=0";
			$request = $this->select_all($sql);			
			return $request;
		}


		/* perfiles academicos*/
		public function listaperfilesacademicos()
		{
			$sql = "SELECT pa.idperfilesacademicos,pa.archivo,pa.status,e.nombreEscuela
			from perfilesacademicos pa
			inner join escuela e on pa.escuelaid=e.idEscuela
			where pa.status!=0";
			$request = $this->select_all($sql);			
			return $request;
		}

	
		


		
	}
 ?>