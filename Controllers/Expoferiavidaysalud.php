<?php 

	class expoferiavidaysalud extends Controllers{
		public function __construct()
		{
			parent::__construct();
		}

		public function expoferiavidaysalud()
		{
			$data['page_id'] = 4;
			$data['page_tag'] = "Base";
			$data['page_title'] = "Página principal";
			$data['page_name'] = "home";
			$data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, quis. Perspiciatis repellat perferendis accusamus, ea natus id omnis, ratione alias quo dolore tempore dicta cum aliquid corrupti enim deserunt voluptas.";
			$this->views->getView($this,"expoferiavidaysalud",$data);
		}

	}
 ?>