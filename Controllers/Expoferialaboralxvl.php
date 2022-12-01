<?php

class expoferialaboralxvl extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function expoferialaboralxvl()
	{

		$data['page_tag'] = "expoferialaboralxvl";
		$data['page_title'] = "expoferialaboralxvl";
		$data['page_name'] = "expoferialaboralxvl";
		$this->views->getView($this, "expoferialaboralxvl", $data);
	}

	public function nosotros()
	{

		$data['page_tag'] = "expoferialaboralxv";
		$data['page_title'] = "expoferialaboralxv";
		$data['page_name'] = "expoferialaboralxv";
		$this->views->getView($this, "nosotros", $data);
	}

	public function ponencias()
	{

		$data['page_tag'] = "expoferialaboralxv";
		$data['page_title'] = "expoferialaboralxv";
		$data['page_name'] = "expoferialaboralxv";
		$this->views->getView($this, "ponencias", $data);
	}

	public function galeria()
	{

		$data['page_tag'] = "expoferialaboralxv";
		$data['page_title'] = "expoferialaboralxv";
		$data['page_name'] = "expoferialaboralxv";
		$this->views->getView($this, "galeria", $data);
	}

	public function empresas()
	{

		$data['page_tag'] = "expoferialaboralxv";
		$data['page_title'] = "expoferialaboralxv";
		$data['page_name'] = "expoferialaboralxv";
		$this->views->getView($this, "empresas", $data);
	}
}
