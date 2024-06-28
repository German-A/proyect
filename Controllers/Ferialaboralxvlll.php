<?php

class ferialaboralxvlll extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function ferialaboralxvlll()
	{

		$data['page_tag'] = "ferialaboralxvlll";
		$data['page_title'] = "ferialaboralxvlll";
		$data['page_name'] = "ferialaboralxvlll";

		require_once("Models/FerialaboralxvllladminModel.php");
		$obj = new FerialaboralxvllladminModel();
		
		$arrData  =  array();
		$arrData = $obj->listPonencias();

		$arrDataEmp  =  array();
		$arrDataEmp = $obj->listEmpresa();

		$data['listaponencias'] = $arrData;
		$data['listempresas'] = $arrDataEmp;
		

		$this->views->getView($this, "ferialaboralxvlll", $data);
	}

	public function nosotros()
	{

		$data['page_tag'] = "ferialaboralxvlll";
		$data['page_title'] = "ferialaboralxvlll";
		$data['page_name'] = "ferialaboralxvlll";
		$this->views->getView($this, "nosotros", $data);
	}

	public function ponencias()
	{
		$data['page_tag'] = "ferialaboralxvlll";
		$data['page_title'] = "ferialaboralxvlll";
		$data['page_name'] = "ferialaboralxvlll";

		require_once("Models/FerialaboralxvllladminModel.php");
		$obj = new FerialaboralxvllladminModel();
		$obj2 = new FerialaboralxvllladminModel();

		$arrData  =  array();
		$arrData = $obj->listPonenciasdia7();

		$arrDatadia8  =  array();
		$arrDatadia8 = $obj2->listPonenciasdia8();

		$data['listaponencias'] = $arrData;

		$data['listaponenciasdia8'] = $arrDatadia8;

		$this->views->getView($this, "ponencias", $data);
	}

	public function galeriavii()
	{
		$data['page_tag'] = "ferialaboralxvlll";
		$data['page_title'] = "ferialaboralxvlll";
		$data['page_name'] = "ferialaboralxvlll";

		require_once("Models/FerialaboralxvllladminModel.php");
		$obj = new FerialaboralxvllladminModel();

		$arrData  =  array();
		$arrData = $obj->listGaleriaweb();
		$data['lista'] = $arrData;

		$this->views->getView($this, "galeria", $data);
	}




	public function galeria()
	{
		$data['page_tag'] = "ferialaboralxvlll";
		$data['page_title'] = "ferialaboralxvlll";
		$data['page_name'] = "ferialaboralxvlll";

		require_once("Models/FerialaboralxvllladminModel.php");
		$obj = new FerialaboralxvllladminModel();

		$arrData  =  array();
		$arrData = $obj->listGaleriaweb();

		$data['lista'] = $arrData;
		$this->views->getView($this, "galeria", $data);
	}

	public function empresas()
	{

		$data['page_tag'] = "ferialaboralxvlll";
		$data['page_title'] = "ferialaboralxvlll";
		$data['page_name'] = "ferialaboralxvlll";
		$this->views->getView($this, "empresas", $data);
	}
}
