<?php
	class Player_model extends CI_Model{

		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function savePlayer($player){
			$id = $player['id'];
			if($id + 0 > 0){
				//update
				$this->db->where('id=', $id);
				unset($player['id']);
				$this->db->update('player', $player);
			}
			else{
				//insert
				$this->db->insert('player', $player);
			}
		}

		function showPlayers(){
			$query = $this->db->get('player');

			return $query->result();
		}

		function getPlayer($id){
			$player = new stdClass();
			$player->id = 0;
			$player->name = ""; 
			$player->type = "";
			$player->gwon = "";

			$query = $this->db->where('id=', $id);
			$query = $this->db->get('player');

			$rs = $query->result();

			if(count($rs)>0){
				$player = $rs[0];
			}

			return $player;
		}

		function deletePlayer($id){
			$this->db->where('id=', $id);
			$this->db->delete('player');
		}
	}
?>