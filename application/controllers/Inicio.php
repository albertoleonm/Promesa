<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

        public function index(){
                $data['title'] = 'Inicio | Promesa';
                $this->load->view('complements/header', $data);
                $this->load->view('inicio/index');
                $this->load->view('complements/footer');
        }
        
}