<?php

class libroreclamacionesadminModel extends Mysql
{
	private $intIdUsuario;
	private $nombreArchivo;
	private $nuevonombre;
	private $cantidad;
	private $intborrar = 0;

	public function __construct()
	{
		parent::__construct();
	}

	public function lista()
	{
		$sql = "SELECT * FROM libroreclamaciones where status=1";
		$request = $this->select_all($sql);
		return $request;
	}


}
