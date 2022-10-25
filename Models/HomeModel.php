<?php

class HomeModel extends Mysql
{
	public function __construct()
	{
		parent::__construct();
	}

	public function selectBanner()
	{

		$sql = "SELECT NombreArchivo ,Posicion from banner WHERE Habilitado>0 order by Posicion desc";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectBannervidaysaluda2022()
	{

		$sql = "SELECT NombreArchivo ,Posicion from bannervida2022 WHERE Habilitado>0 order by Posicion asc";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectGaleriavidaysaluda2022()
	{

		$sql = "SELECT NombreArchivo ,Posicion from galeriavida2022 WHERE Habilitado>0 order by Posicion asc";
		$request = $this->select_all($sql);
		return $request;
	}



	public function selectManual()
	{

		$sql = "SELECT Nombre,NombreArchivo from manuales  WHERE Habilitado>0 order by Posicion asc";

		$request = $this->select_all($sql);
		return $request;
	}

	public function selectprimerManual()
	{

		$sql = "SELECT NombreArchivo FROM manuales WHERE Habilitado ='1' ORDER BY IdManuales ASC LIMIT 1";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectprimeraBase()
	{

		$sql = "SELECT NombreArchivo FROM basenacional WHERE Habilitado ='1' ORDER BY IdNacional ASC LIMIT 1";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectprimeraBaseInstitucional()
	{

		$sql = "SELECT NombreArchivo FROM baseintitucional WHERE Habilitado ='1' ORDER BY IdInstitucional ASC LIMIT 1";
		$request = $this->select_all($sql);
		return $request;
	}


	public function selectLegal()
	{

		$sql = "SELECT Nombre,NombreArchivo,tipo	from basenacional WHERE Habilitado = '1' order by Posicion asc";
		$request = $this->select_all($sql);
		return $request;
	}
	public function selectLegalInicio()
	{

		$sql = "SELECT Nombre,NombreArchivo	from basenacional WHERE Habilitado = '1' order by Posicion asc";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectinstitucional()
	{

		$sql = "SELECT Nombre,NombreArchivo,tipo
			from baseintitucional WHERE Habilitado = '1' order by Posicion asc";
		$request = $this->select_all($sql);
		return $request;
	}
	public function selectprimerNacional()
	{

		$sql = "SELECT NombreArchivo FROM basenacional WHERE Habilitado ='1' ORDER BY IdNacional ASC LIMIT 1";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectCursosMOOC()
	{

		$sql = "SELECT  Nombre,UrlVideo from cursosmooc WHERE Habilitado = '1' and TipoCursoMooc ='MOOC'  order by Posicion asc";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectCursosTUTORIALES()
	{

		$sql = "SELECT  Nombre,UrlVideo from cursosmooc WHERE Habilitado = '1' and TipoCursoMooc ='TUTORIALES' order by Posicion asc";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectCursosCAPACITACIONES()
	{

		$sql = "SELECT  Nombre,UrlVideo from cursosmooc WHERE Habilitado = '1' and TipoCursoMooc ='CAPACITACIONES' order by Posicion asc";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectCursosPRINCIPAL()
	{

		$sql = " SELECT UrlVideo FROM cursosmooc WHERE Habilitado ='1' ORDER BY idcursosmooc ASC LIMIT 1";
		$request = $this->select_all($sql);
		return $request;
	}


	public function empleosAll()
	{

		$sql = "SELECT em.idEmpleos,em.status,emp.nombreEmpresa,u.imagen,
			em.NombrePuesto,em.DescripcionPuesto,em.InformacionAdicional,em.LugarTrabajo,em.TrabajoRemoto,em.NumeroVacantes,em.Experiencias,
			em.TipoContrato,em.JornadaLaboral,em.HorasSemanales,em.HorarioTrabajo,em.RemuneracionBruta,em.Contacto,em.FechaInico,em.FechaFin
			from empleos em
			inner join empresa emp on em.empresaid = emp.idempresa
			inner join usuario u on u.idpersona =emp.personaid";
		$request = $this->select_all($sql);
		return $request;
	}

	public function empleo($id)
	{

		$sql = "SELECT * from empleos em
			inner join empresa emp on em.empresaid = emp.idempresa
			inner join usuario u on u.idpersona=emp.personaid
			where em.idEmpleos=$id";
		$request = $this->select_all($sql);
		return $request;
	}

	public function conferenciasAll()
	{

		$sql = "SELECT c.idConferencia idConferencia ,c.nombreConferencia nombreConferencia,day(c.fechaConferencia) as diafechaConferencia,
			MONTH(c.fechaConferencia) as mesfechaConferencia,year(c.fechaConferencia) as añofechaConferencia,c.fechaConferencia fechaConferencia,
			c.nombreExpositor nombreExpositor,c.fotoExpositor fotoExpositor,c.cargoExpositor cargoExpositor,c.linkConferencia linkConferencia,
			c.idEmpresa idEmpresa,e.idEmpresa as idEmpresa,e.nombreEmpresa nombreEmpresa,e.ruc ruc,e.Direccion Direccion,
			u.Nombres Nombres,u.ApellidoP ApellidoP,u.ApellidoM ApellidoM,u.Imagen Imagen,u.Dni Dni,u.telefono telefono,u.email_user email_user,u.rolid rolid
			,HOUR(c.fechaConferencia) as hora,MINUTE(c.fechaConferencia) as minuto
			FROM empresa e
			inner join conferencia c on c.idEmpresa=e.idempresa
			inner join usuario u on e.personaid=u.idpersona
			where c.habilitado=1";
		$request = $this->select_all($sql);
		return $request;
	}

	//modulo estadistica
	public function selectañoEspecialidades()
	{
		$sql = "SELECT año,status FROM especialidades  where status>0  order by año asc ";
		$request = $this->select_all($sql);
		return $request;
	}

	//modulo estadistica
	public function selectañoEspecialidadesporaño($año)
	{
		$sql = "SELECT año , sum(bachiller) bachiller ,sum(titulo) titulo ,sum(segundaespecialidad) segundaespecialidad 
			FROM especialidades  
			where status>0 and año = $año 
			group by año";
		$request = $this->select_all($sql);
		return $request;
	}



	public function getCantidades($año)
	{
		$sql = "SELECT  año, sum(bachiller) bachiller ,sum(titulo) titulo ,sum(segundaespecialidad) segundaespecialidad 
			FROM especialidades  
			where status>0 and año = $año 
			group by año ";
		$request = $this->select_all($sql);
		return $request;
	}

	/*ESPECIALIDADES*/

	public function SegundasEspecialidades()
	{
		$sql = "SELECT descripcion
			FROM segundaespecialidades 
			where status>0";
		$request = $this->select_all($sql);
		return $request;
	}

	public function doctorados()
	{
		$sql = "SELECT descripcion
			FROM doctorado 
			where status>0";
		$request = $this->select_all($sql);
		return $request;
	}

	/*lista de Factultades */
	public function listaFacultadpostgrado()
	{
		$sql = "SELECT m.Facultadid,f.nombreFacultad,fi.descripcion
			from maestria m
			inner join facultad f on m.Facultadid=f.idFacultad
			inner join facultadiconos fi on fi.Facultadid=f.idFacultad
			where m.status!=0
			group by m.Facultadid";
		$request = $this->select_all($sql);
		return $request;
	}

	/*detalle de maestria*/
	public function listaFacultadpostgradodetalle($id)
	{
		$sql = "SELECT tipopostgrado
			from maestria m
			inner join facultad f on m.Facultadid=f.idFacultad
			where m.status!=0 and m.Facultadid=$id";
		$request = $this->select_all($sql);
		return $request;
	}


	/*detalle de maestria*/
	public function listaPerfilesAcademicos()
	{
		$sql = "SELECT f.idFacultad,f.nombreFacultad,fi.descripcion
		from perfilesacademicos pa
		inner join escuela e on pa.escuelaid=e.idEscuela
		inner join facultad f on f.idFacultad=e.idFacultad
		inner join facultadiconos fi on fi.Facultadid=f.idFacultad
		where pa.status!=0
		group by f.nombreFacultad";
		$request = $this->select_all($sql);
		return $request;
	}

	/*Escuelas que tienen perfil Academico*/
	public function listaEscuelasPerfilesAcademicos($id)
	{
		$sql = "SELECT e.idEscuela,e.nombreEscuela
		from perfilesacademicos pa
		inner join escuela e on pa.escuelaid=e.idEscuela
		inner join facultad f on f.idFacultad=e.idFacultad
		inner join facultadiconos fi on fi.Facultadid=f.idFacultad
		where pa.status!=0 and f.idFacultad =$id
		group by e.nombreEscuela";
		$request = $this->select_all($sql);
		return $request;
	}

	/*Escuelas que tienen perfil Academico*/
	public function listaEscuelasPerfilesAcademicosAnios($id)
	{
		$sql = "SELECT e.idEscuela,e.nombreEscuela,YEAR(pa.año) as año,pa.archivo
			from perfilesacademicos pa
			inner join escuela e on pa.escuelaid=e.idEscuela
			inner join facultad f on f.idFacultad=e.idFacultad
			inner join facultadiconos fi on fi.Facultadid=f.idFacultad
			where pa.status!=0 and e.idEscuela=$id
			";
		$request = $this->select_all($sql);
		return $request;
	}

	/*año*/
	public function cantidadvisitas()
	{
		$sql = "SELECT idanios,cantidad 
			FROM anios";
		$request = $this->select($sql);
		return $request;
	}


	public function updatevisitas($idanios, $visitas)
	{
		$this->idanios = $idanios;
		$this->visitas = $visitas;

		$sql = "UPDATE anios SET cantidad=?
			WHERE idanios = $this->idanios ";
		$arrData = array(
			$this->visitas
		);

		$request = $this->update($sql, $arrData);
		return $request;
	}


	/*detalle de maestria*/
	public function listaObjetivosEducacionales()
	{
		$sql = "SELECT f.idFacultad,f.nombreFacultad,fi.descripcion
		from objetivoseducacionales pa
		inner join escuela e on pa.escuelaid=e.idEscuela
		inner join facultad f on f.idFacultad=e.idFacultad
		inner join facultadiconos fi on fi.Facultadid=f.idFacultad
		where pa.status!=0
		group by f.nombreFacultad";
		$request = $this->select_all($sql);
		return $request;
	}

	/*Escuelas que tienen perfil Academico*/
	public function listaEscuelasObjetivosEducacionales($id)
	{
		$sql = "SELECT e.idEscuela,e.nombreEscuela
		from objetivoseducacionales pa
		inner join escuela e on pa.escuelaid=e.idEscuela
		inner join facultad f on f.idFacultad=e.idFacultad
		inner join facultadiconos fi on fi.Facultadid=f.idFacultad
		where pa.status!=0 and f.idFacultad =$id
		group by e.nombreEscuela";
		$request = $this->select_all($sql);
		return $request;
	}

	/*Escuelas que tienen perfil Academico*/
	public function listaEscuelasObjetivosEducacionalesAnios($id)
	{
		$sql = "SELECT e.idEscuela,e.nombreEscuela,YEAR(pa.año) as año,pa.archivo
			from objetivoseducacionales pa
			inner join escuela e on pa.escuelaid=e.idEscuela
			inner join facultad f on f.idFacultad=e.idFacultad
			inner join facultadiconos fi on fi.Facultadid=f.idFacultad
			where pa.status!=0 and e.idEscuela=$id
			";
		$request = $this->select_all($sql);
		return $request;
	}


	/*--------------------------------------------------------------------------------------------------/*
	/*detalle de maestria*/
	/*--------------------------------------------------------------------------------------------------*/
	public function listaPreguntasObjetivosEducacionales()
	{
		$sql = "SELECT f.idFacultad,f.nombreFacultad,fi.descripcion
		from preguntasObjetivoseducacionales pa
		inner join escuela e on pa.escuelaid=e.idEscuela
		inner join facultad f on f.idFacultad=e.idFacultad
		inner join facultadiconos fi on fi.Facultadid=f.idFacultad
		where pa.status!=0
		group by f.nombreFacultad";
		$request = $this->select_all($sql);
		return $request;
	}

	/*Escuelas que tienen perfil Academico*/
	public function listaPreguntasEscuelasObjetivosEducacionales($id)
	{
		$sql = "SELECT e.idEscuela,e.nombreEscuela
		from preguntasObjetivoseducacionales pa
		inner join escuela e on pa.escuelaid=e.idEscuela
		inner join facultad f on f.idFacultad=e.idFacultad
		inner join facultadiconos fi on fi.Facultadid=f.idFacultad
		where pa.status!=0 and f.idFacultad =$id
		group by e.nombreEscuela";
		$request = $this->select_all($sql);
		return $request;
	}

	/*Escuelas que tienen perfil Academico*/
	public function listaPreguntasEscuelasObjetivosEducacionalesAnios($id)
	{
		$sql = "SELECT e.idEscuela,e.nombreEscuela,YEAR(pa.año) as año,pa.archivo
			from preguntasObjetivoseducacionales pa
			inner join escuela e on pa.escuelaid=e.idEscuela
			inner join facultad f on f.idFacultad=e.idFacultad
			inner join facultadiconos fi on fi.Facultadid=f.idFacultad
			where pa.status!=0 and e.idEscuela=$id
			";
		$request = $this->select_all($sql);
		return $request;
	}

	/***************************************************************************************
		LIBRO DE RECLAMACIONES
	 ****************************************************************************************/

	public function cantidadlibroreclamaciones()
	{
		$sql = "SELECT count(idlibroreclamaciones) cant FROM libroreclamaciones where status = 1 order by fecharegistro desc";
		$request = $this->select($sql);
		return $request;
	}

	public function registerlibroreclamaciones($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $p11)
	{
		$this->p1 = $p1;
		$this->p2 = $p2;
		$this->p3 = $p3;
		$this->p4 = $p4;
		$this->p5 = $p5;
		$this->p6 = $p6;
		$this->p7 = $p7;
		$this->p8 = $p8;
		$this->p9 = $p9;
		$this->p10 = $p10;
		$this->p11 = $p11;

		$return = 0;
		$query_insert  = "INSERT INTO libroreclamaciones(p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11)
								  VALUES(?,?,?,?,?,?,?,?,?,?,?)";
		$arrData = array(
			$this->p1,
			$this->p2,
			$this->p3,
			$this->p4,
			$this->p5,
			$this->p6,
			$this->p7,
			$this->p8,
			$this->p9,
			$this->p10,
			$this->p11
		);
		$request_insert = $this->insert($query_insert, $arrData);
		$return = $request_insert;
		return $return;
	}

	/*EXPOFERIA LABORAL*/

	/*EXPOFERIA LABORAL PONENCIAS */
	public function listaExpoferiaxv()
	{
		$sql = "SELECT e.archivo
		from expoxvponencias e
		where e.status>0 order by e.posicion asc";
		$request = $this->select_all($sql);
		return $request;
	}

	/*EXPOFERIA LABORAL GALERIA */
	public function listaExpoferiaxvGaleria()
	{
		$sql = "SELECT e.archivo
			from expoxvgaleria e
			where e.status>0 order by e.posicion asc";
		$request = $this->select_all($sql);
		return $request;
	}

	public function listaExpoferiaxvEmpresas()
	{
		$sql = "SELECT e.archivo, e.nombre,e.url
			from expoxvempresas e
			where e.status>0 order by e.posicion asc";
		$request = $this->select_all($sql);
		return $request;
	}

	public function listaGalerias()
	{
		$sql = "SELECT nombre, archivo as archivo
		from expoxvgaleria 
		where status > 0
		UNION
		SELECT Nombre, NombreArchivo as archivo
		from banner 
		where Habilitado > 0
		";
		$request = $this->select_all($sql);
		return $request;
	}
}
