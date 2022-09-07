<?php

class UsuariosModel extends Mysql
{
	private $intIdUsuario;

	private $strNombre;
	private $strApellido;
	private $strTelefono;
	private $strEmail;
	private $strPassword;
	private $strToken;
	private $intTipoId;
	private $intStatus;
	private $intborrar = 0;

	private $strNomFiscal;
	private $strDirFiscal;


	private $strEmpresa;
	private $strDireccion;
	private $strRuc;
	private $strrequest_user;





	public function __construct()
	{
		parent::__construct();
	}

	public function insertUsuario(string $nombre, string $apellido, string $telefono, string $email, string $password, int $tipoid, int $status)
	{


		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->strTelefono = $telefono;
		$this->strEmail = $email;
		$this->strPassword = $password;
		$this->intTipoId = $tipoid;
		$this->intStatus = $status;
		$return = 0;

		$sql = "SELECT * FROM usuario WHERE 
					email_user = '{$this->strEmail}'  ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO usuario(nombres,apellidop,telefono,email_user,password,rolid,status) 
								  VALUES(?,?,?,?,?,?,?)";
			$arrData = array(
				$this->strNombre,
				$this->strApellido,
				$this->strTelefono,
				$this->strEmail,
				$this->strPassword,
				$this->intTipoId,
				$this->intStatus
			);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function insertUsuarioEmpresa($txtEmpresa, $txtDireccion, $txtRuc, $request_user)
	{

		$this->strEmpresa = $txtEmpresa;
		$this->strDireccion = $txtDireccion;
		$this->strRuc = $txtRuc;
		$this->strrequest_user = $request_user;

		$return = 0;
		$query_insert  = "INSERT INTO empresa(nombreEmpresa,ruc,Direccion,personaid) 
								  VALUES(?,?,?,?)";
		$arrData = array(
			$this->strEmpresa,
			$this->strDireccion,
			$this->strRuc,
			$this->strrequest_user
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;

		return $return;
	}


	public function obte()
	{
		$request = "ho";
		return $request;
	}




	public function selectUsuarios()
	{
		$whereAdmin = "";
		if ($_SESSION['idUser'] != 1) {
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


	public function selectUsuario(int $idpersona)
	{


		$this->intIdUsuario = $idpersona;
		$sql = "SELECT p.idpersona,p.nombres,p.apellidop,p.apellidom,p.telefono,p.email_user,r.idrol,r.nombrerol,p.status, DATE_FORMAT(p.datecreated, '%d-%m-%Y') as fechaRegistro 
					FROM usuario p
					INNER JOIN rol r
					ON p.rolid = r.idrol
					WHERE p.idpersona = $this->intIdUsuario";
		$request = $this->select($sql);

		if ($request['idrol'] == 4) {

			$sql = "SELECT p.idpersona,p.nombres,p.apellidop,p.apellidom,p.telefono,p.email_user,r.idrol,r.nombrerol,
				p.status, DATE_FORMAT(p.datecreated, '%d-%m-%Y') as fechaRegistro,
				e.idEmpresa,e.nombreEmpresa,e.ruc,e.Direccion
				FROM usuario p
				INNER JOIN rol r
				ON p.rolid = r.idrol
				INNER JOIN empresa e
				ON p.idpersona = e.personaid
				WHERE p.idpersona= $this->intIdUsuario";
			$request = $this->select($sql);
		}


		return $request;
	}

	public function obtenerRol(int $idpersona)
	{
		$this->intIdUsuario = $idpersona;
		$sql = "SELECT r.idrol
					FROM usuario p
					INNER JOIN rol r
					ON p.rolid = r.idrol
					WHERE p.idpersona = $this->intIdUsuario";
		$request = $this->select($sql);
		return $request;
	}

	public function updateUsuario(int $idUsuario,  string $nombre, string $apellido, string $telefono, string $email, string $password, int $tipoid, int $status)
	{

		$this->intIdUsuario = $idUsuario;

		$this->strNombre = $nombre;
		$this->strApellido = $apellido;
		$this->strTelefono = $telefono;
		$this->strEmail = $email;
		$this->strPassword = $password;
		$this->intTipoId = $tipoid;
		$this->intStatus = $status;

		$sql = "SELECT * FROM usuario WHERE (email_user = '{$this->strEmail}' AND idpersona != $this->intIdUsuario)";
		$request = $this->select_all($sql);

		if (empty($request)) {
			if ($this->strPassword  != "") {
				$sql = "UPDATE usuario SET  nombres=?, apellidop=?, telefono=?, email_user=?, password=?, rolid=?, status=? 
							WHERE idpersona = $this->intIdUsuario ";
				$arrData = array(
					$this->strNombre,
					$this->strApellido,
					$this->strTelefono,
					$this->strEmail,
					$this->strPassword,
					$this->intTipoId,
					$this->intStatus
				);
			} else {
				$sql = "UPDATE usuario SET nombres=?, apellidop=?, telefono=?, email_user=?, rolid=?, status=? 
							WHERE idpersona = $this->intIdUsuario ";
				$arrData = array(
					$this->strNombre,
					$this->strApellido,
					$this->strTelefono,
					$this->strEmail,
					$this->intTipoId,
					$this->intStatus
				);
			}
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}
	public function deleteUsuario(int $intIdpersona)
	{
		$this->intIdUsuario = $intIdpersona;
		$sql = "UPDATE usuario SET status = ? WHERE idpersona = $this->intIdUsuario ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
		return $request;
	}

	/*Actualizar Datos del Egresado*/
	public function updatePerfil(int $idUsuario,  string $nombre, string $strApellidop, string $strApellidom, string $telefono, string $strPassword)
	{
		$this->intIdUsuario = $idUsuario;
		$this->strNombre = $nombre;
		$this->strApellidop = $strApellidop;
		$this->strApellidom = $strApellidom;
		$this->strTelefono = $telefono;
		$this->strPassword = $strPassword;


		if ($this->strPassword != "") {
			$sql = "UPDATE usuario SET  nombres=?, apellidop=?, apellidom=?, telefono=?, password=? 
						WHERE idpersona = $this->intIdUsuario ";
			$arrData = array(
				$this->strNombre,
				$this->strApellidop,
				$this->strApellidom,
				$this->strTelefono,
				$this->strPassword
			);
		} else {
			$sql = "UPDATE usuario SET nombres=?, apellidop=?,  apellidom=?,telefono=? 
						WHERE idpersona = $this->intIdUsuario ";
			$arrData = array(
				$this->strNombre,
				$this->strApellidop,
				$this->strApellidom,
				$this->strTelefono
			);
		}
		$request = $this->update($sql, $arrData);
		return $request;
	}


}
