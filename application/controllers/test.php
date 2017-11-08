<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class test extends CI_Controller {

	public function index()
	{
		$this->load->model("ModelDerby");
		$params = array();

		$params["derbies"] = $this->ModelDerby->get_derbies();		
		
		$this->load->view('derby/header', array("page_title" => "Admin Page"));

		$this->load->view('derby/index', $params);
		$this->load->view('derby/footer');

	}

	function sturgeon($__derby_id = 0)
	{
		$this->load->model("ModelDerby");
		$params = array();
		$params['derbie'] = $this->ModelDerby->get_derbie($__derby_id);
		$params['teams'] = $this->ModelDerby->get_derbie_teams($__derby_id);

		$this->load->view('derby/header', array("page_title" => "Addathon Ironman Sturgeon Derby Teams Standings"));
		$this->load->view('derby/sturgeon_index', $params);
		$this->load->view('derby/footer');
	}
	
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */