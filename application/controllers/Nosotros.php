<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nosotros extends CI_Controller {

    public function index(){
        $data['title'] = 'Acerca de nosotros | Promesa';
        $this->load->view('complements/header', $data);
        $this->load->view('nosotros/index');
        $this->load->view('complements/footer');
	}
}