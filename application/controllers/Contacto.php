<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto extends CI_Controller {

    function __construct(){
        parent::__construct();
		$this->load->model('Contacto_model');
    }

    public function index(){
        $data['title'] = 'Contáctanos | Promesa';
        $this->load->view('complements/header', $data);
        $this->load->view('contacto/index');
        $this->load->view('complements/footer');
    }

    public function saveComentario(){
        $this->Contacto_model->set_nombre($this->input->post("nombre"));
        $this->Contacto_model->set_email($this->input->post("mail"));
        $this->Contacto_model->set_mensaje($this->input->post("mensaje"));
        $this->Contacto_model->save_Comentario();
        redirect('contacto');
        
    }
}
