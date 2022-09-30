<?php

class expoferialaboralxv extends Controllers
{
	public function __construct()
	{
		parent::__construct();
	}

	public function expoferialaboralxv()
	{

		$data['page_tag'] = "expoferialaboralxv";
		$data['page_title'] = "expoferialaboralxv";
		$data['page_name'] = "expoferialaboralxv";
		$this->views->getView($this, "expoferialaboralxv", $data);
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
}
