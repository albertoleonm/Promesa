<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Producto_model');
    }

    public function index(){
        $data['title'] = 'Productos | Promesa';
        $dataP['productosPublicados'] = $this->Producto_model->productosPublicados();
        $dataP['lanzamientos'] = $this->Producto_model->productosLanzamientos();
        $this->load->view('complements/header', $data);
        $this->load->view('productos/index', $dataP);
        $this->load->view('complements/footer');
    }

    public function detalleProducto($idProducto){
        $this->Producto_model->set_idProducto($idProducto);
        $data['title'] = 'Detalle Producto | Promesa';
        $dataProducto['setProduct'] = $this->Producto_model->listarPorProducto();
        $this->load->view('complements/header', $data);
        $this->load->view('productos/detalleProducto', $dataProducto);
        $this->load->view('complements/footer');
    }
    
}
