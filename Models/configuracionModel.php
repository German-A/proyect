<?php

class ConfiguracionModel extends Mysql
{


	public function __construct()
	{
		parent::__construct();
	}

	public function getoneEgresado($idusuario)
	{
		$sql = "SELECT * 
			FROM egresado e inner join
			usuario u on e.personaid=u.idpersona
			where u.idpersona = $idusuario
			";
		$request = $this->select($sql);
		return $request;
	}

	public function sessionLogin(int $iduser)
	{
		$this->intIdUsuario = $iduser;
		//BUSCAR ROLE 
		$sql = "SELECT  p.idpersona,
						p.nombres,
						p.apellidop,
						p.apellidom,
						p.email_user,
						p.imagen,
						p.dni,						
						p.telefono,					
						p.datecreated,
						p.status,			
						r.idrol,
						r.nombrerol						
				FROM usuario p
				INNER JOIN rol r
				ON p.rolid = r.idrol
				WHERE p.idpersona = $this->intIdUsuario 
				and p.status > 0
				and r.status > 0
				";
		$request = $this->select($sql);
		//$_SESSION['userData'] = $request;
		return $request;
	}




	/*Actualizar Datos del Egresado Foto*/
	public function updateFoto(int $idUsuario,  string $nuevonombre)
	{
		$this->intIdUsuario = $idUsuario;
		$this->strNombre = $nuevonombre;
		$sql = "UPDATE usuario SET  imagen=?
		WHERE idpersona = $this->intIdUsuario ";
		$arrData = array(
			$this->strNombre
		);

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

	public function setregistrarPostgradp($txtTitulo, $txtInstitucion, $txtTipo, $txtCursando, $txtDesde, $txtHasta, $egresadoid)
	{
		$this->txtTitulo = $txtTitulo;
		$this->txtInstitucion = $txtInstitucion;
		$this->txtTipo = $txtTipo;
		$this->txtCursando = $txtCursando;
		$this->txtDesde = $txtDesde;
		$this->txtHasta = $txtHasta;
		$this->egresadoid = $egresadoid;
		$return = 0;
		$query_insert  = "INSERT INTO postgradoegresado(titulo,institucion,tipo,estadopostgrado,desde,hasta,egresadoid)
							VALUES(?,?,?,?,?,?,?)";
		$arrData = array(
			$this->txtTitulo,
			$this->txtInstitucion,
			$this->txtTipo,
			$this->txtCursando,
			$this->txtDesde,
			$this->txtHasta,
			$this->egresadoid
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}

	public function updateregistrarPostgradp($idpostgradoegresado, $txtTitulo, $txtInstitucion, $txtTipo, $txtCursando, $txtDesde, $txtHasta, $egresadoid)
	{
		$this->idpostgradoegresado = $idpostgradoegresado;
		$this->txtTitulo = $txtTitulo;
		$this->txtInstitucion = $txtInstitucion;
		$this->txtTipo = $txtTipo;
		$this->txtCursando = $txtCursando;
		$this->txtDesde = $txtDesde;
		$this->txtHasta = $txtHasta;
		$this->egresadoid = $egresadoid;

		$sql = "UPDATE postgradoegresado SET titulo=?, institucion=?, tipo=?, estadopostgrado=?, desde=?, hasta=?, egresadoid=?
		WHERE idpostgradoegresado = $this->idpostgradoegresado ";
		$arrData = array(
			$this->txtTitulo,
			$this->txtInstitucion,
			$this->txtTipo,
			$this->txtCursando,
			$this->txtDesde,
			$this->txtHasta,
			$this->egresadoid
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}


	public function getPostgrado($egresadoid)
	{
		$sql = "SELECT * FROM postgradoegresado where egresadoid = $egresadoid";
		$request = $this->select_all($sql);
		return $request;
	}

	public function getOnePostgrado($idpostgradoegresado)
	{
		$sql = "SELECT * 
		FROM postgradoegresado WHERE idpostgradoegresado=$idpostgradoegresado";

		$request = $this->select($sql);
		return $request;
	}

	public function deletePostgrado(int $idpostgradoegresado)
	{
		$this->idpostgradoegresado = $idpostgradoegresado;
		$sql = "DELETE FROM postgradoegresado WHERE idpostgradoegresado=$this->idpostgradoegresado ";
		$arrData = array($this->idpostgradoegresado);
		$request = $this->delete($sql, $arrData);
		return $request;
	}













	public function lista()
	{
		$sql = "SELECT * FROM banner where Habilitado=1";
		$request = $this->select_all($sql);
		return $request;
	}

	public function cantidadBanner()
	{
		$sql = "SELECT count(IdBaner) cant FROM banner where Habilitado = 1 order by FechaRegistro desc";
		$request = $this->select($sql);
		return $request;
	}

	public function register($nombreArchivo, $nuevonombre, $cantidad, $posicion)
	{
		$this->nombreArchivo = $nombreArchivo;
		$this->nuevonombre = $nuevonombre;
		$this->cantidad = $cantidad;
		$this->posicion = $posicion;
		$return = 0;
		$query_insert  = "INSERT INTO banner(Nombre,NombreArchivo,Posicion)
								  VALUES(?,?,?)";
		$arrData = array(
			$this->nombreArchivo,
			$this->nuevonombre,
			$this->posicion
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}

	public function toupdate($nombreArchivo, $nuevonombre, $cantidad, $idUsuario, $posicion)
	{
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
			$this->posicion
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updatePosicion($nombreArchivo, $idUsuario, $posicion)
	{
		$this->nombreArchivo = $nombreArchivo;

		$this->idUsuario = $idUsuario;
		$this->posicion = $posicion;
		$sql = "UPDATE banner SET Nombre=?,Posicion=?
			WHERE IdBaner = $this->idUsuario ";
		$arrData = array(
			$this->nombreArchivo,

			$this->posicion
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}
}
