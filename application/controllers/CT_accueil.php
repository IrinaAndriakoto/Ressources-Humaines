<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CT_accueil extends CI_Controller {
    public function index(){
        $this->load->helper('url');
        $this->load->view('accueil');
    }
}