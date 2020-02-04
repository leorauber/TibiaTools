<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('General_model');
    }
    public function index()
    {
        $this->load->view('general_view');
    }
    
    public function registraBanco(){
        $vencedor = filter_input_array(INPUT_POST)['Vencedor'];
        $pontos = filter_input_array(INPUT_POST)['Pontos'];
        var_dump($vencedor, $pontos);
        //Conectando ao banco de dados
        $this->General_model->registra_vencedor($vencedor, $pontos);
        
        
        echo "sucess";
    }
}
