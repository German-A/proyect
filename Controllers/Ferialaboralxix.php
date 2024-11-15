<?php

class ferialaboralxix extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function ferialaboralxix()
	{
		$data['page_tag'] = "ferialaboral -UNIVERSIDAD NACIONAL DE TRUJILLO";
		$data['page_title'] = "ferialaboral -UNIVERSIDAD NACIONAL DE TRUJILLO";
		$data['page_name'] = "ferialaboral -UNIVERSIDAD NACIONAL DE TRUJILLO";
		$this->views->getView($this, "ferialaboralxix", $data);
	}

	public function nosotros()
	{

		$data['page_tag'] = "ferialaboralxix";
		$data['page_title'] = "ferialaboralxix";
		$data['page_name'] = "ferialaboralxix";
		$this->views->getView($this, "nosotros", $data);
	}

	public function ponencias()
	{
		$data['page_tag'] = "ferialaboralxix";
		$data['page_title'] = "ferialaboralxix";
		$data['page_name'] = "ferialaboralxix";

		// require_once("Models/ferialaboralxixadminModel.php");
		// $obj = new ferialaboralxixadminModel();
		// $obj2 = new ferialaboralxixadminModel();

		// $arrData  =  array();
		// $arrData = $obj->listPonenciasdia7();

		// $arrDatadia8  =  array();
		// $arrDatadia8 = $obj2->listPonenciasdia8();

		// $data['listaponencias'] = $arrData;

		// $data['listaponenciasdia8'] = $arrDatadia8;

		$this->views->getView($this, "ponencias", $data);
	}

	public function galeriavii()
	{
		$data['page_tag'] = "ferialaboralxix";
		$data['page_title'] = "ferialaboralxix";
		$data['page_name'] = "ferialaboralxix";

		require_once("Models/FerialaboralxixadminModel.php");
		$obj = new FerialaboralxixadminModel();

		$arrData  =  array();
		$arrData = $obj->listGaleriaweb();
		$data['lista'] = $arrData;

		$this->views->getView($this, "galeria", $data);
	}




	public function galeria()
	{
		$data['page_tag'] = "ferialaboralxix";
		$data['page_title'] = "ferialaboralxix";
		$data['page_name'] = "ferialaboralxix";

		require_once("Models/FerialaboralxixadminModel.php");
		$obj = new FerialaboralxixadminModel();

		$arrData  =  array();
		$arrData = $obj->listGaleriaweb();

		$data['lista'] = $arrData;
		$this->views->getView($this, "galeria", $data);
	}

	public function empresas()
	{

		$data['page_tag'] = "ferialaboralxix";
		$data['page_title'] = "ferialaboralxix";
		$data['page_name'] = "ferialaboralxix";
		$this->views->getView($this, "empresas", $data);
	}
}
