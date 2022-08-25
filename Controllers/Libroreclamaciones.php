<?php

class libroreclamaciones extends Controllers
{

	public function __construct()
	{
		parent::__construct();
	}
	
	public function libroreclamaciones()
	{


		$data['page_id'] = 1;
		$data['page_tag'] = "libroreclamaciones";
		$data['page_title'] = "Página principal";
		$data['page_name'] = "libroreclamaciones";
		$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
		$this->views->getView($this, "libroreclamaciones", $data);
	}

}
