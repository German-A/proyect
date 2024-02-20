<?php 

	class VistaModel extends Mysql
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

		public function buscar_carrera($id_carrera)
		{
			$sql = "SELECT nombreEscuela
			FROM escuela
			where status = 1 and idEscuela = $id_carrera";
			$request = $this->select($sql);
			return $request;
		}
	}
 ?>