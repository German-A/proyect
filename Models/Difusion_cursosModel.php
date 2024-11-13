<?php

class Difusion_cursosModel extends Mysql
{
	private $created_by;
	private $created_at;

	private $updated_by;
	private $updated_at;

	private $id_difusion_cursos;
	private $nombre_curso;
	private $tipo_curso;
	private $url;
	private $id_empresa_cursos;


	private $intborrar = 0;

	public function __construct()
	{
		parent::__construct();
	}



	public function getList()
	{
		try {
			$response = null;
			$sql = "SELECT * 
				FROM difusion_cursos
				WHERE status >0";
			$response = $this->select_all($sql);
			return $response;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	}

	#region cursos
	public function newRegister($id_empresa_cursos, $nombre_curso, $tipo_curso, $url, $created_by, $created_at)
	{

		$this->id_empresa_cursos = $id_empresa_cursos;
		$this->nombre_curso = $nombre_curso;
		$this->tipo_curso = $tipo_curso;
		$this->url = $url;
		$this->created_by = $created_by;
		$this->created_at = $created_at;

		$return = 0;
		$query_insert  = "INSERT INTO difusion_cursos(id_empresa_cursos,nombre_curso,tipo_curso,url,created_by,created_at)
		VALUES(?,?,?,?,?,?)";
		$arrData = array(
			$this->id_empresa_cursos,
			$this->nombre_curso,
			$this->tipo_curso,
			$this->url,
			$this->created_by,
			$this->created_at
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}

	#endregion cursos










	#region registro_difusion_oferta


	#endregion registro_difusion_oferta

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

		$return = 0;
		$query_insert  = "INSERT INTO difusion_ofertas(nombre_puesto, id_empresa_feria, modalidad_laboral,condicion_laboral, fecha_termino, link, created_by, created_at)
								  VALUES(?,?,?,?,?, ?,?,?)";
		$arrData = array(
			$this->nombre_puesto,
			$this->nombre_empresa,
			$this->modalidad_laboral,
			$this->condicion_laboral,
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
			$this->request_in = $this->insert($query_insert, $arrData);
		}
		$return = $this->request_in;

		return $return;
	}





	#region registro_difusion_oferta


	public function listaCarreras($idempresa)
	{
		$sql = "SELECT nombreEscuela
				FROM escuela
				where status = 1 and idEscuela = $idempresa";
		$request = $this->select($sql);
		return $request;
	}





	#endregion registro_difusion_oferta




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
