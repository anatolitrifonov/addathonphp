<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class ModelDerby extends CI_Model {

	public function __construct() {
   		parent::__construct();
	}

	public function get_derbies() {
		$strsql = sprintf("SELECT * FROM sturgeonderbies");
		return $this->db->query($strsql)->result();
	}

	public function get_derbie($__derbie_id) {
		$strsql = sprintf("SELECT * FROM sturgeonderbies WHERE id='$__derbie_id'");
		$result = $this->db->query($strsql)->result();
		if(count($result) > 0) return $result[0];
		return false;
	}

	public function get_derbie_teams($__derbie_id) {
		$strsql = sprintf("select t.id, t.name, t.secret_string, t.derby_id,d.name derby_name, SUM(score) score_sum from sturgeonteams t inner join sturgeonderbies d on d.id = t.derby_id left join sturgeonscores s on t.id = s.team_id where t.derby_id = '$__derbie_id' group by t.id, t.name, t.secret_string, d.name order by score_sum desc, t.derby_id");
		return $this->db->query($strsql)->result();
	}

	public function get_team($__team_id) {
		$strsql = sprintf("SELECT * FROM sturgeonteams WHERE id='$__team_id'");
		$result = $this->db->query($strsql)->result();
		if(count($result) > 0) return $result[0];
		return false;		
	}

	public function get_team_scores($__team_id) {
		$strsql = sprintf("SELECT * FROM sturgeonscores WHERE team_id='$__team_id'");
		$result = $this->db->query($strsql)->result();
		return $result;
	}

	public function updateTeamScore($__team_id, $secret, $score) {
		$team_info = $this->get_team($__team_id);
		if($team_info){
			if($team_info->secret_string == $secret){
				$strsql = sprintf("delete from sturgeonscores where team_id='$__team_id'");
				$this->db->query($strsql);
				$__arr_score = explode(",", $score);
				for($i=0; $i<count($__arr_score); $i++){
					if(($__arr_score[$i] > 0) && ($i<50)){
						$strsql = sprintf("insert into sturgeonscores (team_id, slot, score) values('$__team_id', '%d', '%d')", $i+1, $__arr_score[$i]);
						$this->db->query($strsql);
					}
				}
				return "";
			}
			return "Team password is incorrect!";
		}
		return "Team info not found!";
	}

	public function update_team($__derby_id, $__team_id, $team_name, $secret) {
		$team_name = str_replace("'", "&#039;", $team_name);
		if($__team_id == 0)
			$strsql = "insert into sturgeonteams (name, secret_string, derby_id) values('".$team_name."', '".$secret."', '".$__derby_id."')";
		else
			$strsql = "UPDATE sturgeonteams SET name='".$team_name."', secret_string='".$secret."' WHERE id='".$__team_id."'";
		$this->db->query($strsql);
	}

	public function remove_team($__derby_id, $__team_id) {
		$strsql = "delete from sturgeonteams WHERE id='".$__team_id."'";
		$this->db->query($strsql);	
	} 
}
