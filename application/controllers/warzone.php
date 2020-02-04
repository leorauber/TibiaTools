<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warzone extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('warzone_model');
    }
    public function index()
    {
        $this->load->view('warzone_view');
    }


    public function callAPI(){
    	//$data=json_decode(file_get_contents("php://input"));
		//$jsonurl = "http://api.tibiadata.com/v2/characters/".$data->name.".json";

		$name = filter_input_array(INPUT_POST)['name'];

    	//var_dump($name);
    	//var_dump("http://api.tibiadata.com/v2/characters/".$name.".json");
		$jsonurl = "http://api.tibiadata.com/v2/characters/".$name.".json";
		$json = file_get_contents($jsonurl);
		echo $json;
    }
    public function callQuest(){
        $jsonurl = "https://tibiawiki.com.br/wiki/Ferumbras%27_Ascendant_Quest";
        $json = file_get_contents($jsonurl);
        echo $json;
    }
    
}
