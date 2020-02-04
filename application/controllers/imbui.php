<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Imbui extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('imbui_model');
    }
    public function index()
    {
        $this->load->view('imbui_view');
    }
    
}
