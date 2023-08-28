<?php

class RegistroegresadoModel extends Mysql
{

	private $ApellidoP;
	private $ApellidoM;
	private $Nombres;
	private $Dni;
	private $Celular;
	private $Clave;
	private $Correo;
	private $IdRol;
	private $idUsuario;

	private $numeroMatricula;
	private $direccion;
	private $telefonoFijo;
	private $email;
	private $sexo;
	private $idEscuela;
	private $idSede;
	private $img;
	private $nombres;
	private $apellidop;
	private $apellidom;
	private $email_user;
	private $password;
	private $imagen;
	private $telefono;
	private $rolid = 3;
	private $intborrar = 0;

	private $dni;

	public function __construct()
	{
		parent::__construct();
	}

	public function validardni($dni)
	{
		$sql = "SELECT u.dni FROM usuario u where u.dni = '$dni' and u.status > 0";
		$request = $this->select($sql);
		return $request;
	}

	public function insertUsuarioEgresado(string $valorB, string $valorC, string  $valorD,string  $valorE, string $valorH, string  $valorI)
	{
		$this->ApellidoP = $valorB;
		$this->ApellidoM = $valorC;
		$this->Nombres = $valorD;
		$this->Dni = $valorE;
		$this->Celular = $valorH;
		$this->Clave = $valorE;
		$this->Correo = $valorI;
		$this->IdRol = 3;

		$return = 0;


		$query_insert  = "INSERT INTO usuario(apellidop,apellidom,nombres,dni,telefono,password,email_user,rolid,fecha_nacimiento) 
								  VALUES(?,?,?,?,?,?,?,?)";
		$arrData = array(
			$this->ApellidoP,
			$this->ApellidoM,
			$this->Nombres,
			$this->Dni,
			$this->Celular,
			$this->Clave,
			$this->Correo,
			$this->IdRol
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;



		return $return;
	}

	public function insertEgresado($valorA, $valorF, $valorG, 	$valorI, $valorJ, $valorK, $valorL, $ultimoregistro,$valorM)
	{
		$this->numeroMatricula = $valorA;
		$this->direccion = $valorF;
		$this->fechanaciomiento = $valorG;
		$this->email = $valorI;
		$this->sexo = $valorJ;
		$this->idEscuela = $valorK;
		$this->idSede = $valorL;
		$this->ultimoregistro = $ultimoregistro;
		$this->añoegreso = $valorM;

		$return = 0;


		$query_insert  = "INSERT INTO egresado(numeroMatricula,direccion,fechanaciomiento,sexo,idescuela,idsede,personaid,añoegreso) 
								  VALUES(?,?,?,?,?,?,?,?)";
		$arrData = array(
			$this->numeroMatricula,
			$this->direccion,
			$this->fechanaciomiento,
			$this->sexo,
			$this->idEscuela,
			$this->idSede,
			$this->ultimoregistro,
			$this->añoegreso
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;

		return $return;
	}

	public function list()
	{
		$sql = "SELECT u.idpersona,CONCAT(u.nombres, ' ',u.apellidop, ' ',u.apellidom) AS nombres ,
		u.email_user ,u.imagen ,u.dni ,u.status ,u.telefono ,r.descripcion,u.rolid
		FROM usuario u
		inner join rol r on u.rolid=r.idrol
		inner join egresado e on u.idpersona=e.personaid
		WHERE r.idrol=3  and u.status >0";
		$request = $this->select_all($sql);
		return $request;
	}




	public function agregarusuario($nombres, $apellidop, $apellidom, $email_user, $password, $imagen, $dni, $telefono)
	{
		$this->nombres = $nombres;
		$this->apellidop = $apellidop;
		$this->apellidom = $apellidom;
		$this->email_user = $email_user;
		$this->password = $password;
		$this->imagen = $imagen;
		$this->dni = $dni;
		$this->telefono = $telefono;


		$query_insert  = "INSERT INTO usuario(nombres,apellidop,apellidom,email_user,password,imagen,dni,telefono,rolid) 
								  VALUES(?,?,?,?,?,?,?,?,?)";
		$arrData = array(
			$this->nombres,
			$this->apellidop,
			$this->apellidom,
			$this->email_user,
			$this->password,
			$this->imagen,
			$this->dni,
			$this->telefono,
			$this->rolid
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;

		return $return;
	}
	private $iduser;

	public function agregaregresado($numeroMatricula, $direccion, $fechanaciomiento, $sexo, $idescuela, $idsede, $iduser,$añoegreso)
	{
		$this->numeroMatricula = $numeroMatricula;
		$this->direccion = $direccion;
		$this->fechanaciomiento = $fechanaciomiento;
		$this->sexo = $sexo;
		$this->idescuela = $idescuela;
		$this->idsede = $idsede;
		$this->iduser = $iduser;
		$this->añoegreso = $añoegreso;


		$query_insert  = "INSERT INTO egresado(numeroMatricula,direccion,fechanaciomiento,sexo,idescuela,idsede,personaid,añoegreso) 
		VALUES(?,?,?,?,?,?,?,?)";

		$arrData = array(
			$this->numeroMatricula,
			$this->direccion,
			$this->fechanaciomiento,
			$this->sexo,
			$this->idescuela,
			$this->idsede,
			$this->iduser,
			$this->añoegreso
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;

		return $return;
	}

	public function getOne($idusuario)
	{
		$sql = "SELECT  u.idpersona,u.nombres,u.apellidop,u.apellidom,u.email_user,u.password,u.imagen,u.dni ,u.telefono ,
		e.numeroMatricula,e.direccion,e.fechanaciomiento,e.sexo,e.idescuela,e.idsede,f.idFacultad,f.nombreFacultad,es.nombreEscuela,s.idSede,s.nombreSede
		FROM usuario u
		inner join egresado e on u.idpersona=e.personaid
		inner join escuela es on e.idescuela=es.idEscuela
		inner join facultad f on f.idFacultad=es.idFacultad
		inner join sede s on e.idsede=s.idSede
		
		WHERE u.idpersona =$idusuario
		";
		$request = $this->select($sql);
		return $request;
	}

	public function updateusuario($nombres, $apellidop, $apellidom, $email_user, $password, $dni, $telefono, $idUsuario)
	{
		$this->nombres = $nombres;
		$this->apellidop = $apellidop;
		$this->apellidom = $apellidom;
		$this->email_user = $email_user;
		$this->password = $password;
		$this->dni = $dni;
		$this->telefono = $telefono;
		$this->idUsuario = $idUsuario;

		$sql = "UPDATE usuario SET nombres=?, apellidop=?, apellidom=?, email_user=?, password=?, dni=?, telefono=?
		WHERE idpersona = $this->idUsuario";
		$arrData = array(
			$this->nombres,
			$this->apellidop,
			$this->apellidom,
			$this->email_user,
			$this->password,
			$this->dni,
			$this->telefono
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateegresado($numeroMatricula, $direccion, $telefonoFijo, $sexo, $idescuela, $idsede, $idUsuario)
	{
		$this->numeroMatricula = $numeroMatricula;
		$this->direccion = $direccion;
		$this->telefonoFijo = $telefonoFijo;
		$this->sexo = $sexo;
		$this->idescuela = $idescuela;
		$this->idsede = $idsede;
		$this->idUsuario = $idUsuario;

		$sql = "UPDATE egresado SET numeroMatricula=?, direccion=?, telefonoFijo=?, sexo=?, idescuela=?, idsede=?
		WHERE personaid = $this->idUsuario";
		$arrData = array(
			$this->numeroMatricula,
			$this->direccion,
			$this->telefonoFijo,

			$this->sexo,
			$this->idescuela,
			$this->idsede
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateusuarioimg($nombres, $apellidop, $apellidom, $email_user, $password, $dni, $telefono, $idUsuario, $img)
	{
		$this->nombres = $nombres;
		$this->apellidop = $apellidop;
		$this->apellidom = $apellidom;
		$this->email_user = $email_user;
		$this->img = $img;
		$this->password = $password;
		$this->dni = $dni;
		$this->telefono = $telefono;
		$this->idUsuario = $idUsuario;

		$sql = "UPDATE usuario SET nombres=?, apellidop=?, apellidom=?, email_user=?, password=?, imagen=?, dni=?, telefono=?
		WHERE idpersona = $this->idUsuario";
		$arrData = array(
			$this->nombres,
			$this->apellidop,
			$this->apellidom,
			$this->email_user,
			$this->password,
			$this->img,
			$this->dni,
			$this->telefono
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function updateegresadoimg($numeroMatricula, $direccion, $fechanaciomiento, $sexo, $idescuela, $idsede, $idUsuario)
	{
		$this->numeroMatricula = $numeroMatricula;
		$this->direccion = $direccion;
		$this->telefonfechanaciomientooFijo = $fechanaciomiento;
		$this->sexo = $sexo;
		$this->idescuela = $idescuela;
		$this->idsede = $idsede;
		$this->idUsuario = $idUsuario;

		$sql = "UPDATE egresado SET numeroMatricula=?, direccion=?, fechanaciomiento=?,  sexo=?, idescuela=?, idsede=?
		WHERE personaid = $this->idUsuario";
		$arrData = array(
			$this->numeroMatricula,
			$this->direccion,
			$this->telefonoFijo,

			$this->sexo,
			$this->idescuela,
			$this->idsede
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function deleteBanner(int $idpersona)
	{
		$this->intIdUsuario = $idpersona;
		$sql = "UPDATE usuario SET status = ? WHERE idpersona = $this->intIdUsuario ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
		return $request;
	}
	public function getFacultades()
	{
		$sql = "SELECT * from facultad where status!=0";
		$request = $this->select_all($sql);
		return $request;
	}


	public function selectIdiomas()
	{
		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idIdiomas,Idiomas from idiomas where status!=0";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idIdiomas'],
				"text" => $user['Idiomas']
			);
		}

		return $response;
	}
	public function selectIdiomass($search)
	{
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT idIdiomas,Idiomas from idiomas where status!=0 and Idiomas LIKE '%$search%' ORDER BY Idiomas";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idIdiomas'],
				"text" => $user['Idiomas']
			);
		}
		return $response;
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

	public function selectEsc($idpersona)
	{
		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		//$sql = "SELECT idFacultad,nombreFacultad from facultad where status!=0";
		$sql = "SELECT idEscuela,nombreEscuela FROM escuela where status=1 and idFacultad=$idpersona";
		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idEscuela'],
				"text" => $user['nombreEscuela']
			);
		}

		return $response;
	}

	public function selectEscue($search)
	{
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		//$sql = "SELECT idFacultad,nombreFacultad from facultad where status!=0 and nombreFacultad LIKE '%$search%' ORDER BY idFacultad";

		$sql = "SELECT idEscuela,nombreEscuela FROM escuela
		where status=1 and nombreEscuela LIKE '%$search%' ORDER BY idEscuela";

		$request = $this->select_all($sql);

		foreach ($request as $user) {
			$response[] = array(
				"id" => $user['idEscuela'],
				"text" => $user['nombreEscuela']
			);
		}
		return $response;
	}
}
