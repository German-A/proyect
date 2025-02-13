<?php

class DifusionModel extends Mysql
{
	private $created_by;
	private $created_at;

	private $updated_by;
	private $updated_at;

	private $id_difusion_ofertas;
	private $nombre_puesto;
	private $nombre_empresa;
	private $modalidad_laboral;
	private $condicion_laboral;
	private $fecha_termino;
	private $escuelaid;

	private $id_escuela;


	private $id_empresa_feria;
	private $filename;
	private $empresa_feria;

	private $id_disusion;
	private $descripcion;
	private $link;

	private $intborrar = 0;

	public function __construct()
	{
		parent::__construct();
	}

	public function findFile($filename)
	{
		$this->filename = $filename;
		$sql = "SELECT filename
				from empresa_feria
				where filename = '$this->filename'";
		$request = $this->select($sql);
		return $request;
	}

	#region select_empreas_carreras

	public function getSelectEmpresa()
	{
		$response = null;
		$sql = "SELECT * 
				FROM empresa_feria ";
		$request = $this->select_all($sql);

		foreach ($request as $line) {
			$response[] = array(
				"id" => $line['id_empresa_feria'],
				"text" => $line['descripcion']
			);
		}
		return $response;
	}

	public function getSelectEmpresaW($search)
	{
		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT * 
			FROM empresa_feria
			WHERE descripcion LIKE '%$search%' ORDER BY descripcion";

		$request = $this->select_all($sql);
		foreach ($request as $line) {
			$response[] = array(
				"id" => $line['id_empresa_feria'],
				"text" => $line['descripcion']
			);
		}
		return $response;
	}
	#endregion select_empreas_carreras

	#region registro_empresa
	public function newRegisterEmpresa($empresa_feria, $filename, $created_by, $created_at)
	{

		try {

			$this->empresa_feria = $empresa_feria;
			$this->filename = $filename;
			$this->created_by = $created_by;
			$this->created_at = $created_at;

			$return = 0;
			$query_insert  = "INSERT INTO empresa_feria(descripcion,filename,created_by,created_at)
									  VALUES(?,?,?,?)";
			$arrData = array(
				$this->empresa_feria,
				$this->filename,
				$this->created_by,
				$this->created_at
			);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $return;
	}
	#endregion registro_empresa


	#region registro_difusion_oferta

	public function getDifusion()
	{
		$sql = "SELECT * FROM difusion_ofertas where status=1";
		$request = $this->select_all($sql);
		return $request;
	}

	public function getSelectCarrera()
	{
		$response = null;
		$sql = "SELECT * FROM escuela";
		$request = $this->select_all($sql);

		foreach ($request as $line) {
			$response[] = array(
				"id" => $line['idEscuela'],
				"text" => $line['nombreEscuela']
			);
		}
		return $response;
	}

	public function getSelectCarreras($search)
	{
		$response = null;
		//$sql = "SELECT idTitulaciones,nombreTitulaciones from titulaciones where status!=0";
		$sql = "SELECT * FROM escuela WHERE nombreEscuela LIKE '%$search%' ORDER BY nombreEscuela";
		$request = $this->select_all($sql);
		foreach ($request as $line) {
			$response[] = array(
				"id" => $line['idEscuela'],
				"text" => $line['nombreEscuela']
			);
		}
		return $response;
	}

	public function newRegisterDifusion($nombre_puesto, $nombre_empresa, $modalidad_laboral, $condicion_laboral, $fecha_termino, $lista_programa_estudio, $link, $created_by, $created_at)
	{
		$this->nombre_puesto = $nombre_puesto;
		$this->nombre_empresa = $nombre_empresa;
		$this->modalidad_laboral = $modalidad_laboral;
		$this->condicion_laboral = $condicion_laboral;
		$this->fecha_termino = $fecha_termino;
		$this->link = $link;

		$this->created_by = $created_by;
		$this->created_at = $created_at;

		try {
			$return = 0;
			$query_insert  = "INSERT INTO difusion_ofertas(nombre_puesto, id_empresa_feria, modalidad_laboral,condicion_laboral,fecha_publicacion, fecha_termino, link, created_by, created_at)
			VALUES(?,?,?,?,?, ?,?,?,?)";
			$arrData = array(
				$this->nombre_puesto,
				$this->nombre_empresa,
				$this->modalidad_laboral,
				$this->condicion_laboral,
				$this->fecha_termino,
				$this->fecha_termino,
				$this->link,
				$this->created_by,
				$this->created_at
			);
			$request_insert = $this->insert($query_insert, $arrData);
			$this->id_difusion_ofertas = $request_insert;

			foreach ($lista_programa_estudio as $val) {
				$this->id_escuela = $val['programa_estudio'];
				$query_insert  = "INSERT INTO disusion_ofertas_carreras(id_escuela,id_difusion_ofertas)
			VALUES(?,?)";
				$arrData = array(
					$this->id_escuela,
					$this->id_difusion_ofertas
				);
				$this->insert($query_insert, $arrData);
			}
		} catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}

		$return = $request_insert;
		return $return;
	}
	#endregion registro_difusion_oferta

	#region registro_difusion_oferta



	#endregion registro_difusion_oferta


	public function newRegister($descripcion, $link)
	{
		$this->descripcion = $descripcion;
		$this->link = $link;
		$return = 0;
		$query_insert  = "INSERT INTO disusion(descripcion,link)
								  VALUES(?,?)";
		$arrData = array(
			$this->descripcion,
			$this->link
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}

	public function newUpdate($id_disusion, $descripcion, $link)
	{
		$this->id_disusion = $id_disusion;
		$this->descripcion = $descripcion;
		$this->link = $link;
		$sql = "UPDATE disusion SET descripcion=?, link=?
			WHERE id_disusion = $this->id_disusion ";
		$arrData = array(
			$this->descripcion,
			$this->link
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}

	public function removeDifusion(int $IdDifusion)
	{
		$this->intIdUsuario = $IdDifusion;
		$sql = "UPDATE banner SET Habilitado = ? WHERE IdDifusion = $this->intIdUsuario ";
		$arrData = array($this->intborrar);
		$request = $this->update($sql, $arrData);
		return $request;
	}
}
