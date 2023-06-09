<?php

class expoferialaboralxvll extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function expoferialaboralxvll()
	{

		$data['page_tag'] = "expoferialaboralxvll";
		$data['page_title'] = "expoferialaboralxvll";
		$data['page_name'] = "expoferialaboralxvll";
		$this->views->getView($this, "expoferialaboralxvll", $data);
	}

	public function nosotros()
	{

		$data['page_tag'] = "expoferialaboralxvll";
		$data['page_title'] = "expoferialaboralxvll";
		$data['page_name'] = "expoferialaboralxvll";
		$this->views->getView($this, "nosotros", $data);
	}

	public function ponencias()
	{
		$data['page_tag'] = "expoferialaboralxvll";
		$data['page_title'] = "expoferialaboralxvll";
		$data['page_name'] = "expoferialaboralxvll";

		require_once("Models/ExpoferialaboralxvlladminModel.php");
		$obj = new ExpoferialaboralxvlladminModel();

		$arrData  =  array();
		$arrData = $obj->listPonencias();

		$data['listaponencias'] = $arrData;

		$this->views->getView($this, "ponencias", $data);
	}



	public function galeria()
	{

		$data['page_tag'] = "expoferialaboralxvll";
		$data['page_title'] = "expoferialaboralxvll";
		$data['page_name'] = "expoferialaboralxvll";
		$this->views->getView($this, "galeria", $data);
	}

	public function empresas()
	{

		$data['page_tag'] = "expoferialaboralxvll";
		$data['page_title'] = "expoferialaboralxvll";
		$data['page_name'] = "expoferialaboralxvll";
		$this->views->getView($this, "empresas", $data);
	}
}
