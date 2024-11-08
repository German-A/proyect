<?php

class ferialaboralchambita extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function ferialaboralchambita()
	{

		$data['page_tag'] = "ferialaboralchambita";
		$data['page_title'] = "ferialaboralchambita";
		$data['page_name'] = "ferialaboralchambita";

		require_once("Models/FerialaboralchambitaadminModel.php");
		$obj = new FerialaboralchambitaadminModel();
		
		$arrData  =  array();
		$arrData = $obj->listGaleria();

		

		$data['lista_galeria'] = $arrData;
	

		$this->views->getView($this, "ferialaboralchambita", $data);
	}

	public function nosotros()
	{

		$data['page_tag'] = "ferialaboralchambita";
		$data['page_title'] = "ferialaboralchambita";
		$data['page_name'] = "ferialaboralchambita";
		$this->views->getView($this, "nosotros", $data);
	}

	public function ponencias()
	{
		$data['page_tag'] = "ferialaboralchambita";
		$data['page_title'] = "ferialaboralchambita";
		$data['page_name'] = "ferialaboralchambita";

		require_once("Models/FerialaboralchambitaadminModel.php");
		$obj = new FerialaboralchambitaadminModel();
		$obj2 = new FerialaboralchambitaadminModel();

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
		$data['page_tag'] = "ferialaboralchambita";
		$data['page_title'] = "ferialaboralchambita";
		$data['page_name'] = "ferialaboralchambita";

		require_once("Models/FerialaboralchambitaadminModel.php");
		$obj = new FerialaboralchambitaadminModel();

		$arrData  =  array();
		$arrData = $obj->listGaleriaweb();
		$data['lista'] = $arrData;

		$this->views->getView($this, "galeria", $data);
	}




	public function galeria()
	{
		$data['page_tag'] = "ferialaboralchambita";
		$data['page_title'] = "ferialaboralchambita";
		$data['page_name'] = "ferialaboralchambita";

		require_once("Models/FerialaboralchambitaadminModel.php");
		$obj = new FerialaboralchambitaadminModel();

		$arrData  =  array();
		$arrData = $obj->listGaleriaweb();

		$data['lista'] = $arrData;
		$this->views->getView($this, "galeria", $data);
	}

	public function empresas()
	{

		$data['page_tag'] = "ferialaboralchambita";
		$data['page_title'] = "ferialaboralchambita";
		$data['page_name'] = "ferialaboralchambita";
		$this->views->getView($this, "empresas", $data);
	}
}
