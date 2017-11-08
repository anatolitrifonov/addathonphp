<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class derby extends CI_Controller {

	public function index()
	{
		$this->load->model("ModelDerby");
		$params = array();
		$params["derbies"] = $this->ModelDerby->get_derbies();

		$this->load->view('derby/header', array("page_title" => "Index"));
		$this->load->view('derby/index', $params);
		$this->load->view('derby/footer');
	}

	function sturgeon($__derby_id = 0){
		$this->load->model("ModelDerby");
		$params = array();
		$params['derbie'] = $this->ModelDerby->get_derbie($__derby_id);
		$params['teams'] = $this->ModelDerby->get_derbie_teams($__derby_id);

		$this->load->view('derby/header', array("page_title" => "Addathon Ironman Sturgeon Derby Teams Standings"));
		$this->load->view('derby/sturgeon_index', $params);
		$this->load->view('derby/footer');
	}

	function team($__team_id = 0) {
		$this->load->model("ModelDerby");
		$params = array();
		$params['team'] = $this->ModelDerby->get_team($__team_id);
		$params['scores'] = $this->ModelDerby->get_team_scores($__team_id);

		$this->load->view('derby/header', array("page_title" => "Team Page"));
		$this->load->view('derby/team_index', $params);
		$this->load->view('derby/footer');		
	}

	function save_score($__team_id = 0) {
		$this->load->model("ModelDerby");

		$score = "";
		if(isset($_POST["score"])) $score = $_POST["score"];
		$secret = "";
		if(isset($_POST["secret"])) $secret = $_POST["secret"];

		$result = $this->ModelDerby->updateTeamScore($__team_id, $secret, $score);
		echo $result;
	}
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */