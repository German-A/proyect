<?php 

	class LoginModel extends Mysql
	{
		private $intIdUsuario;
		private $strUsuario;
		private $strPassword;
		private $strToken;

		public function __construct()
		{
			parent::__construct();
		}	

		public function loginUser(string $usuario, string $password)
		{
			$this->strUsuario = $usuario;
			$this->strPassword = $password;
			$sql = "SELECT idpersona,status FROM usuario WHERE 
					email_user = '$this->strUsuario' and 
					password = '$this->strPassword' and 
					status != 0 ";
			$request = $this->select($sql);
			return $request;
		}

		public function sessionLogin(int $iduser){
			$this->intIdUsuario = $iduser;
			//BUSCAR ROLE 
			$sql = "SELECT  p.idpersona,
							p.nombres,
							p.apellidop,
							p.apellidom,
							p.email_user,
							p.telefono,
							p.imagen,
							p.dni,					
							r.idrol,
							r.nombrerol,						
							p.datecreated,
							p.status 
					FROM usuario p
					INNER JOIN rol r
					ON p.rolid = r.idrol
					WHERE p.idpersona = $this->intIdUsuario";
			$request = $this->select($sql);
			$_SESSION['userData'] = $request;
			return $request;
		}

		public function sessionEmpresa(int $iduser){
			$this->intIdUsuario = $iduser;
			//BUSCAR ROLE 
			$sql = "SELECT e.idempresa 
			FROM usuario u
			inner join empresa e
			on u.idpersona = e.personaid
			where u.idpersona = $this->intIdUsuario";
			$request = $this->select($sql);
			
			return $request;
		}

		public function sessionEgresado(int $iduser){
			$this->intIdUsuario = $iduser;
			//BUSCAR ROLE 
			$sql = "SELECT e.idegresado 
			FROM usuario u
			inner join egresado e
			on u.idpersona = e.personaid
			where u.idpersona = $this->intIdUsuario";
			$request = $this->select($sql);
			
			return $request;
		}

		public function getUserEmail(string $strEmail){
			$this->strUsuario = $strEmail;
			$sql = "SELECT idpersona,nombres,apellidop,status FROM usuario WHERE 
					email_user = '$this->strUsuario' and  
					status = 1 ";
			$request = $this->select($sql);
			return $request;
		}

		public function setTokenUser(int $idpersona, string $token){
			$this->intIdUsuario = $idpersona;
			$this->strToken = $token;
			$sql = "UPDATE usuario SET token = ? WHERE idpersona = $this->intIdUsuario ";
			$arrData = array($this->strToken);
			$request = $this->update($sql,$arrData);
			return $request;
		}

		public function getUsuario(string $email, string $token){
			$this->strUsuario = $email;
			$this->strToken = $token;
			$sql = "SELECT idpersona FROM usuario WHERE 
					email_user = '$this->strUsuario' and 
					token = '$this->strToken' and 					
					status = 1 ";
			$request = $this->select($sql);
			return $request;
		}

		public function insertPassword(int $idPersona, string $password){
			$this->intIdUsuario = $idPersona;
			$this->strPassword = $password;
			$sql = "UPDATE usuario SET password = ?, token = ? WHERE idpersona = $this->intIdUsuario ";
			$arrData = array($this->strPassword,"");
			$request = $this->update($sql,$arrData);
			return $request;
		}
	}
