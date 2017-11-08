<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class superhiddenadmin123 extends CI_Controller {

	public function index()
	{
		$this->load->model("ModelDerby");
		$params = array();
		$params["derbies"] = $this->ModelDerby->get_derbies();

		$this->load->view('derby/header', array("page_title" => "Admin Page"));
		$this->load->view('admin/index', $params);
		$this->load->view('derby/footer');
	}

	public function andyadmin($__derby_id = 0) {
		$this->load->model("ModelDerby");
		$params = array();
		$params['derbie'] = $this->ModelDerby->get_derbie($__derby_id);
		$params['derby_id'] = $__derby_id;
		$params['teams'] = $this->ModelDerby->get_derbie_teams($__derby_id);

		$this->load->view('derby/header', array("page_title" => "Admin page"));
		$this->load->view('admin/andy_admin', $params);
		$this->load->view('derby/footer');
	}

	public function edit($__derby_id = 0, $__team_id = 0) {
		$this->load->model("ModelDerby");
		$params = array();
		$params['team'] = $this->ModelDerby->get_team($__team_id);
		$params['derby_id'] = $__derby_id;
		$params['team_id'] = $__team_id;

		$this->load->view('derby/header', array("page_title" => "Edit Team"));
		$this->load->view('admin/team_index', $params);
		$this->load->view('derby/footer');		
	}

	public function save_team($__derby_id = 0, $__team_id = 0) {

		$team_name = "";
		if(isset($_POST["team_name"])) $team_name = $_POST["team_name"];
		$secret = "";
		if(isset($_POST["secret"])) $secret = $_POST["secret"];

		$this->load->model("ModelDerby");
		$this->ModelDerby->update_team($__derby_id, $__team_id, $team_name, $secret);
	}

	public function remove_team($__derby_id = 0, $__team_id = 0) {

		$this->load->model("ModelDerby");
		$this->ModelDerby->remove_team($__derby_id, $__team_id);
	}
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */