<?php 

	class EncuestaempresasModel extends Mysql
	{
		private $intIdUsuario;
		private $nombreArchivo;
		private $nuevonombre;
		private $cantidad;
		private $intborrar=0;

		private $ruc;
		private $pregunta1;
		private $pregunta2;
		private $pregunta3;
		private $pregunta4;
		private $pregunta5;

		private $pregunta6;
		private $pregunta7;
		private $pregunta8;
		private $pregunta9;
		private $pregunta10;

		public function __construct()
		{
			parent::__construct();
		}

		public function register($pregunta1, $pregunta2, $pregunta3,$pregunta4,$pregunta5,$pregunta6,
		$pregunta7,$pregunta8,$pregunta9,$pregunta10,$ruc){

			$this->ruc = $ruc;
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

			$return = 0;
			$query_insert  = "INSERT INTO encuestause(p1,p2,p3,p4,p5, p6,p7,p8,p9,P10, ruc)
								  VALUES(?,?,?,?,?, ?,?,?,?,?, ?)";
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
									$this->ruc
        						);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
	        return $return;
		}
	}
