<?php
	class Player extends CI_Controller {

		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->model('player_model');
		}

		function index() {
			$data = array();

			$id = (isset($_GET['id']))?$_GET['id']+0:0;

			$data['player'] = $this->player_model->getPlayer($id);

			$data['players'] = $this->player_model->showPlayers();

			$this->load->view('player/principal', $data);
		}

		function save(){
			if($_POST){
				$this->player_model->savePlayer($_POST);
			}
			$this->load->view('player/msj');
		}

		function delete(){
			$id = (isset($_GET['id']))?$_GET['id']+0:0;
			$this->player_model->deletePlayer($id);
			$this->load->view('player/msj');
		}
	}
?>