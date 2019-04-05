<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preguntas extends CI_Controller {

    function __construct(){
        parent::__construct();
		$this->load->model('Pregunta_model');
    }

    public function index(){
        $data['title'] = 'Preguntas Frecuentes | Promesa';
        $dataC['preguntasPublicadas'] = $this->Pregunta_model->verPreguntasPublicadas();
        $this->load->view('complements/header', $data);
        $this->load->view('preguntas/index', $dataC);
        $this->load->view('complements/footer');
    }
    
    public function addPregunta(){
        $this->Pregunta_model->set_pregunta_idUsuario($this->input->post("pregunta_idUsuario"));
        $this->Pregunta_model->set_nombrePregunta($this->input->post("nombrePregunta"));
        $this->Pregunta_model->set_respuesta($this->input->post("respuesta"));
        $this->Pregunta_model->add_Pregunta();
        redirect('preguntas');
    }
    
}
