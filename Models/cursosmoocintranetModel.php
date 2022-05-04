<?php 

	class CursosmoocintranetModel extends Mysql
	{
		private $intIdUsuario;
		
		private $strNombre;
		private $strApellido;


		public function __construct()
		{
			parent::__construct();
		}


		public function selectcursosmooc()
		{
			$sql = "SELECT * from cursosmooc
            where Habilitado=1
			";
			$request = $this->select_all($sql);			
			return $request;
		}

        public function cantBanner()
		{
			$sql = "SELECT count(IdBaner) cant FROM banner where Habilitado = 1 order by FechaRegistro desc
			";
			$request = $this->select_all($sql);			
			return $request;
		}

        		
		private $nombreArchivo;
		private $nuevonombre;
        private $cantidad;


        public function insertBanner($nombreArchivo,$nuevonombre,$cantidad){

			
			$this->nombreArchivo = $nombreArchivo;
			$this->nuevonombre = $nuevonombre;
			$this->cantidad = $cantidad;

			$return = 0;

			$query_insert  = "INSERT INTO banner(Nombre,NombreArchivo,Posicion)
								  VALUES(?,?,?)";
	        	$arrData = array(
        						$this->nombreArchivo,
        						$this->nuevonombre,
        						$this->cantidad);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
	        return $return;
		}


	
	

	
	}
 ?>