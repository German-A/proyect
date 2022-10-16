<?php 

	class sendcorreoModel extends Mysql
	{
	

		public function __construct()
		{
			parent::__construct();
		}

		public function lista()
		{
			$sql = "SELECT email_user FROM usuario where rolid=3";
			$request = $this->select_all($sql);			
			return $request;
		}

		public function listaEscuelas()
		{
			$sql = "SELECT idEscuela,nombreEscuela from escuela";
			$request = $this->select_all($sql);			
			return $request;
		}




		public function listaCorreos($carreras)
		{
			$where = "e.status != 0 and ";

			foreach ($carreras as $carrera)
			{			
				$where = $where . 'e.idescuela = ' . $carrera['escuelas'].' or ';
			}
			
			$where = substr($where, 0,-4);

			$sql = "SELECT u.email_user
			FROM egresado e
			inner join usuario u on e.personaid=u.idpersona
			WHERE  $where";
			$request = $this->select_all($sql);			
			return $request;
		}

		
	public function selectUsuarios()
	{
		$whereAdmin = "";
		if ($_SESSION["idUser"] != 1) {
			$whereAdmin = " and p.idpersona != 1 ";
		}
		$sql = "SELECT p.idpersona,p.nombres,p.apellidop,p.apellidom,p.telefono,p.email_user,p.status,r.idrol,r.nombrerol 
					FROM usuario p 
					INNER JOIN rol r
					ON p.rolid = r.idrol
					WHERE p.status != 0 " . $whereAdmin;
		$request = $this->select_all($sql);
		return $request;
	}















		

	}
 ?>