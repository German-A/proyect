<?php

class Usuarios_bolsa_trabajoModel extends Mysql
{
	public  $dni;

	public  $nombre;
	public  $escuela;
	public  $celular;
	public  $email;

	public function __construct()
	{
		parent::__construct();
	}


	public function register($dni, $nombre, $escuela, $celular, $email)
	{
		$this->dni = $dni;
		$this->nombre = $nombre;
		$this->escuela = $escuela;
		$this->celular = $celular;
		$this->email = $email;

		$return = 0;
		$query_insert  = "INSERT 
		INTO usuarios_bolsa_trabajo(dni,nombres,escuela,celular,email)
		VALUES(?,?,?,?,?)";
		$arrData = array(
			$this->dni,
			$this->nombre,
			$this->escuela,
			$this->celular,
			$this->email
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}

	public function getOne($dni)
	{
		$sql = "SELECT *
		from usuarios_bolsa_trabajo
		where dni = '$dni'";
		$request = $this->select($sql);
		return $request;
	}

	/*END EMPRESA*/
}
