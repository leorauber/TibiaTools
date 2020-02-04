<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ml extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ml_model');
    }
    public function index()
    {
        $this->load->view('ml_view');
    }
   
}
