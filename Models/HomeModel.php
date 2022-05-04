<?php 

	class HomeModel extends Mysql
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function selectBanner()
		{
		
			$sql = "SELECT NombreArchivo ,Posicion from banner WHERE Habilitado>0 order by Posicion asc";
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
		
		public function selectLegal()
		{
		
			$sql = "SELECT Nombre,NombreArchivo	from basenacional WHERE Habilitado = '1' order by Posicion asc";
			$request = $this->select_all($sql);
			return $request;
		}

		public function selectinstitucional()
		{
		
			$sql = "SELECT Nombre,NombreArchivo
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


		public function empleosAll(){

			$sql = "SELECT em.idEmpleos,em.status,emp.nombreEmpresa,u.imagen,
			em.NombrePuesto,em.DescripcionPuesto,em.InformacionAdicional,em.LugarTrabajo,em.TrabajoRemoto,em.NumeroVacantes,em.Experiencias,
			em.TipoContrato,em.JornadaLaboral,em.HorasSemanales,em.HorarioTrabajo,em.RemuneracionBruta,em.Contacto,em.FechaInico,em.FechaFin
			from empleos em
			inner join empresa emp on em.empresaid = emp.idempresa
			inner join usuario u on u.idpersona =emp.personaid";
			$request = $this->select_all($sql);
			return $request;

		}

		public function empleo($id){

			$sql = "SELECT * from empleos em
			inner join empresa emp on em.empresaid = emp.idempresa
			inner join usuario u on u.idpersona=emp.personaid
			where em.idEmpleos=$id";
			$request = $this->select_all($sql);
			return $request;

		}

		public function conferenciasAll(){

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

	}
 ?>