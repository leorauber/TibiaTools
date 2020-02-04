<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Party extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('party_model');
    }
    public function index()
    {
        $this->load->view('party_view');
    }

    public function callAPIWorlds(){
		$jsonurl = "http://api.tibiadata.com/v2/worlds.json";
		$json = file_get_contents($jsonurl);
		echo $json;
    }
    public function callAPIPlayersWorld(){

		$world = filter_input_array(INPUT_POST)['world'];
		$jsonurl = "http://api.tibiadata.com/v2/world/".$world.".json";
		$json = file_get_contents($jsonurl);
		echo $json;
    }

    public function callAPIInfoPlayer(){
		$name = filter_input_array(INPUT_POST)['name'];
		$jsonurl = "http://api.tibiadata.com/v2/characters/".$name.".json";
		$json = file_get_contents($jsonurl);
		echo $json;
    }
    
}
