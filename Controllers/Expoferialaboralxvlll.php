<?php

class expoferialaboralxvlll extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function Expoferialaboralxvlll()
	{

		$data['page_tag'] = "Expoferialaboralxvlll";
		$data['page_title'] = "Expoferialaboralxvlll";
		$data['page_name'] = "Expoferialaboralxvlll";

		require_once("Models/ExpoferialaboralxvllladminModel.php");
		$obj = new ExpoferialaboralxvllladminModel();
		
		$arrData  =  array();
		$arrData = $obj->listGaleria();

		

		$data['lista_galeria'] = $arrData;
	

		$this->views->getView($this, "expoferialaboralxvlll", $data);
	}

	public function nosotros()
	{

		$data['page_tag'] = "Expoferialaboralxvlll";
		$data['page_title'] = "Expoferialaboralxvlll";
		$data['page_name'] = "Expoferialaboralxvlll";
		$this->views->getView($this, "nosotros", $data);
	}

	public function ponencias()
	{
		$data['page_tag'] = "Expoferialaboralxvlll";
		$data['page_title'] = "Expoferialaboralxvlll";
		$data['page_name'] = "Expoferialaboralxvlll";

		require_once("Models/ExpoferialaboralxvllladminModel.php");
		$obj = new ExpoferialaboralxvllladminModel();
		$obj2 = new ExpoferialaboralxvllladminModel();

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
		$data['page_tag'] = "Expoferialaboralxvlll";
		$data['page_title'] = "Expoferialaboralxvlll";
		$data['page_name'] = "Expoferialaboralxvlll";

		require_once("Models/ExpoferialaboralxvllladminModel.php");
		$obj = new ExpoferialaboralxvllladminModel();

		$arrData  =  array();
		$arrData = $obj->listGaleriaweb();
		$data['lista'] = $arrData;

		$this->views->getView($this, "galeria", $data);
	}


	

	public function galeria()
	{
		$data['page_tag'] = "Expoferialaboralxvlll";
		$data['page_title'] = "Expoferialaboralxvlll";
		$data['page_name'] = "Expoferialaboralxvlll";

		require_once("Models/ExpoferialaboralxvllladminModel.php");
		$obj = new ExpoferialaboralxvllladminModel();

		$arrData  =  array();
		$arrData = $obj->listGaleriaweb();

		$data['lista'] = $arrData;
		$this->views->getView($this, "galeria", $data);
	}

	public function empresas()
	{

		$data['page_tag'] = "Expoferialaboralxvlll";
		$data['page_title'] = "Expoferialaboralxvlll";
		$data['page_name'] = "Expoferialaboralxvlll";
		$this->views->getView($this, "empresas", $data);
	}
}
