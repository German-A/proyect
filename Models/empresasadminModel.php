<?php 

	class EmpresasadminModel extends Mysql
	{
		
		private $intIdUsuario;	
		private $nombres;
		private $apellidop;
		private $apellidom;
		private $email_user;
		private $dni;
		private $telefono;
		private $password;
		private $nombreEmpresa;
		private $ruc;
		private $Direccion;
		private $nombreimagen;
		private $personaid;
		private $rolid=4;
		private $intborrar=0;

		public function __construct()
		{
			parent::__construct();
		}

		public function listadoEmpresas()
		{
			$sql = "SELECT e.idempresa,e.nombreEmpresa,e.ruc,e.Direccion,u.idpersona,CONCAT(u.nombres, ' ',u.apellidop) AS nombres,u.email_user,u.imagen,u.status
			FROM usuario u
			inner join empresa e  on e.personaid = u.idpersona
			where u.status =1 and e.status=1";
			$request = $this->select_all($sql);			
			return $request;
		}
		public function cantidadBanner()
		{
			$sql = "SELECT count(IdBaner) cant FROM banner where Habilitado = 1 order by FechaRegistro desc";
			$request = $this->select($sql);
			return $request;
		}

		public function register($nombres, $apellidop, $apellidom, $email_user,$dni, $telefono,$password,$imagen){			
			$this->nombres = $nombres;
			$this->apellidop = $apellidop;
			$this->apellidom = $apellidom;
			$this->email_user = $email_user;
			$this->dni = $dni;
			//$this->rolid = 3;
			$this->telefono = $telefono;
			$this->password = $password;
			$this->imagen = $imagen;
			$return = 0;
			$query_insert  = "INSERT INTO usuario(nombres,apellidop, apellidom, email_user,dni,rolid, telefono,password,imagen)
								  VALUES(?,?,?,?,?,?,?,?,?)";
	        	$arrData = array(
        						$this->nombres,
        						$this->apellidop,
								$this->apellidom,
        						$this->email_user,
								$this->dni,
								$this->rolid,
        						$this->telefono,
								$this->password,
        						$this->imagen);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
	        return $return;
		}

		public function registerEmpresa($nombreEmpresa, $ruc, $Direccion,$personaid){			
			$this->nombreEmpresa = $nombreEmpresa;
			$this->ruc = $ruc;
			$this->Direccion = $Direccion;
			$this->personaid = $personaid;
			$return = 0;
			$query_insert  = "INSERT INTO empresa(nombreEmpresa,ruc, Direccion,personaid)
								  VALUES(?,?,?,?)";
	        	$arrData = array(
        						$this->nombreEmpresa,
        						$this->ruc,
        						$this->Direccion,
								$this->personaid);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
	        return $return;
		}


		public function toupdate($nombres, $apellidop, $apellidom, $email_user,$dni, $telefono,$idUsuario){
			$this->nombres = $nombres;
			$this->apellidop = $apellidop;
			$this->apellidom = $apellidom;
			$this->email_user = $email_user;
			$this->dni = $dni;
			$this->telefono = $telefono;
			$this->idUsuario = $idUsuario;
			$sql = "UPDATE usuario SET nombres=?, apellidop=?, apellidom=?, email_user=?,dni=?,  telefono=?
			WHERE idpersona = $this->idUsuario ";
					$arrData = array(
					$this->nombres,
					$this->apellidop,
					$this->apellidom,
					$this->email_user,
					$this->dni,
					$this->telefono);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}

		public function toupdateimg($nombres, $apellidop, $apellidom, $email_user,$dni, $telefono,$idUsuario,$imagen){
			$this->nombres = $nombres;
			$this->apellidop = $apellidop;
			$this->apellidom = $apellidom;
			$this->email_user = $email_user;
			$this->dni = $dni;
			$this->telefono = $telefono;
			$this->idUsuario = $idUsuario;
			$this->imagen = $imagen;
			$sql = "UPDATE usuario SET nombres=?, apellidop=?, apellidom=?, email_user=?,dni=?,  telefono=?,imagen=?
			WHERE idpersona = $this->idUsuario ";
					$arrData = array(
					$this->nombres,
					$this->apellidop,
					$this->apellidom,
					$this->email_user,
					$this->dni,
					$this->telefono,
					$this->imagen);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}

		public function toupdateEmpresa($nombreEmpresa, $ruc, $Direccion,$idUsuario){
			$this->nombreEmpresa = $nombreEmpresa;
			$this->ruc = $ruc;
			$this->Direccion = $Direccion;
			$this->personaid = $idUsuario;
			$sql = "UPDATE empresa SET nombreEmpresa=?, ruc=?, Direccion=?
			WHERE personaid = $this->personaid ";
					$arrData = array(
					$this->nombreEmpresa,
					$this->ruc,
					$this->Direccion);
	
				$request = $this->update($sql,$arrData);
	        return $request;
		}

	
		public function remove(int $IdBaner)
		{
			//eliminar empresa
			$this->intIdUsuario = $IdBaner;
			$sql = "UPDATE usuario SET status = ? WHERE idpersona = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);
			
			//eliminar usuario
			$sql = "UPDATE empresa SET habilitado = ? WHERE personaid = $this->intIdUsuario ";
			$arrData = array($this->intborrar);
			$request = $this->update($sql,$arrData);
			return $request;
		}
		public function getOne($idusuario)
		{
			$sql = "SELECT e.idempresa,u.idpersona,e.nombreEmpresa,e.ruc,e.Direccion,u.nombres,u.apellidop,u.email_user,u.imagen,u.dni,u.telefono,u.status,u.apellidop,u.apellidom
			FROM usuario u
			inner join empresa e  on e.personaid = u.idpersona
			where u.status =1 and u.idpersona=$idusuario";
			$request = $this->select($sql);			
			return $request;
		}
	}
 ?>