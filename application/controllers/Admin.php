<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Contacto_model');
        $this->load->model('Pregunta_model');
        $this->load->model('Producto_model');
    }

    public function index(){
        $data['title'] = 'Inicia sesión | Promesa';
        $this->load->view('admin/complements/header-admin', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/complements/footer-admin');
    }

    public function dashboard(){
        if($this->session->userdata('login') == true){
            $data['title'] = 'Ver usuarios | Promesa';
            $dataUser['user'] = $this->User_model->listar_Usuarios();
            $this->load->view('admin/complements/header-admin', $data);
            $this->load->view('admin/dashboard', $dataUser);
            $this->load->view('admin/complements/footer-admin');
        }else{
            redirect('admin');
        }
    }

    public function productos(){
        if($this->session->userdata('login') == true){
            $data['title'] = 'Ver productos | Promesa';
            $datax['modificar'] = $this->Producto_model->listarProducto();
            $this->load->view('admin/complements/header-admin', $data);
            $this->load->view('admin/productos', $datax);
            $this->load->view('admin/complements/footer-admin');
        }else{
            redirect('admin');
        }
    }

    public function preguntas(){
        if($this->session->userdata('login') == true){
            $data['title'] = 'Ver preguntas | Promesa';
            $dataC['pregunta'] = $this->Pregunta_model->verPreguntas();
            $this->load->view('admin/complements/header-admin', $data);
            $this->load->view('admin/preguntas', $dataC);
            $this->load->view('admin/complements/footer-admin');
        }else{
            redirect('admin');
        }
    }

    public function comentarios(){
        if($this->session->userdata('login') == true){
            $data['title'] = 'Ver comentarios | Promesa';
            $dataC['comentarios'] = $this->Contacto_model->verComentarios();
            $dataC['comentariosLeidos'] = $this->Contacto_model->verComentariosLeidos();
            $this->load->view('admin/complements/header-admin', $data);
            $this->load->view('admin/comentarios', $dataC);
            $this->load->view('admin/complements/footer-admin');
        }else{
            redirect('admin');
        }
    }

    public function login(){
        $this->User_model->set_clave($this->input->post("user"));
        $this->User_model->set_contrasena($this->input->post("pass"));
        $dataLog = $this->User_model->login();

        if($dataLog != null){
            foreach($dataLog as $datos){
                $dataLogin = array(
                    'idUsuario' => $datos->idUsuario,
                    'estatus' => $datos->estatus,
                    'login' => true
                );
            }
            $this->session->set_userdata($dataLogin);
            redirect('admin/dashboard');
        }else{
            echo "error";
            redirect('admin');
        }

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('admin');
    }

    // INICIA FUNCIONES COMENTARIO
    public function leido(){
        $this->Contacto_model->set_idComentario($this->input->post("idComentario"));
        $this->Contacto_model->set_idUsuario($this->input->post("idUsuario"));
        $this->Contacto_model->set_leido(1);
        $this->Contacto_model->leido();

        redirect('admin/comentarios');
    }

    public function deleteComentario($idComentario){
        $this->Contacto_model->set_idComentario($idComentario);
        $this->Contacto_model->deleteComentario();

        redirect('admin/comentarios');
    }
    // TERMINA FUNCIONES COMENTARIOS

    // INICIA FUNCIONES USUARIOS
    public function agregarUsuarios(){
        if($this->session->userdata('login') == true){
            if($this->session->userdata('estatus') == 1){
                $data['title'] = 'Agregar | Promesa';
                $this->load->view('admin/complements/header-admin', $data);
                $this->load->view('admin/usuarios/agregarUsuarios');
                $this->load->view('admin/complements/footer-admin');
            }else{
                redirect('admin/dashboard');
            }
        }else{
            redirect('admin');
        }

    }

    public function modificarUsuarios($idUsuario){
        if($this->session->userdata('login') == true){
            if($this->session->userdata('estatus') == 1){
                $this->User_model->set_idUsuario($idUsuario);
                $data['title'] = "Modificar usuario | Promesa";
                $dataModify['modifyUser'] = $this->User_model->listarPorUsuario();
                $this->load->view('admin/complements/header-admin', $data);
                $this->load->view('admin/usuarios/modificarUsuarios', $dataModify);
                $this->load->view('admin/complements/footer-admin');
            }else{
                redirect('admin/dashboard');
            }
        }else{
            redirect('admin');
        }
    }

    public function agregar_Usuarios(){
        if($this->session->userdata('login') == true){
            $this->User_model->set_usuario($this->input->post("usuario"));
            $this->User_model->set_contrasena($this->input->post("contrasena"));
            $this->User_model->set_clave($this->input->post("clave"));
            $this->User_model->set_estatus(0);
            $this->User_model->agregar_Usuarios();
            redirect('admin/dashboard');
        }else{
            redirect('admin');
        }
    }

    public function modificar_Usuarios(){
        if($this->session->userdata('login') == true){
            $this->User_model->set_idUsuario($this->input->post("idUsuario"));
            $this->User_model->set_usuario($this->input->post("usuario"));
            $this->User_model->set_contrasena($this->input->post("contrasena"));
            $this->User_model->set_clave($this->input->post("clave"));
            $this->User_model->modificar_Usuarios();

            redirect('admin/dashboard');
        }else{
            redirect('admin');
        }

    }

    public function eliminar_Usuarios($idUsuario){
        $this->User_model->set_idUsuario($idUsuario);
        $this->User_model->eliminar_Usuarios();

        redirect('admin/dashboard');
    }
    // TERMINA FUNCIONES DE USUARIOS

    // INICIA FUNCIONES DE PREGUNTAS
    public function agregarPreguntas(){
        if($this->session->userdata('login') == true){
            $data['title'] = 'Agregar preguntas | Promesa';
            $this->load->view('admin/complements/header-admin', $data);
            $this->load->view('admin/preguntas/agregarPreguntas');
            $this->load->view('admin/complements/footer-admin');
        }else{
            redirect('admin');
        }
    }

    public function modificarPregunta($idPregunta){
        if($this->session->userdata('login') == true){
            $this->Pregunta_model->set_idPregunta($idPregunta);
            $data['title'] = "Modificar preguntas | Promesa";
            $dataModify['verPregunta'] = $this->Pregunta_model->listarPorPregunta();
            $this->load->view('admin/complements/header-admin', $data);
            $this->load->view('admin/preguntas/modificarPreguntas', $dataModify);
            $this->load->view('admin/complements/footer-admin');
        }else{
            redirect('admin');
        }
    }

    public function add_Preguntas(){
            $this->Pregunta_model->set_nombrePregunta($this->input->post("pregunta"));
            $this->Pregunta_model->set_respuesta($this->input->post("respuesta"));
            $this->Pregunta_model->set_pregunta_idUsuario($this->input->post("idUsuario"));
            $this->Pregunta_model->set_publicado(1);
            $this->Pregunta_model->add_Preguntas();

            redirect('admin/preguntas');
    }

    public function modify_Preguntas(){
            $this->Pregunta_model->set_pregunta_idUsuario($this->input->post("idUsuario"));
            $this->Pregunta_model->set_nombrePregunta($this->input->post("pregunta"));
            $this->Pregunta_model->set_respuesta($this->input->post("respuesta"));
            $this->Pregunta_model->set_idPregunta($this->input->post("idPregunta"));
            $this->Pregunta_model->modify_Pregunta();

            redirect('admin/preguntas');
    }

    public function publicar($idPregunta){
        $this->Pregunta_model->set_idPregunta($idPregunta);
        $this->Pregunta_model->set_publicado(1);
        $this->Pregunta_model->publicar_Pregunta();

        redirect('admin/preguntas');
    }

    public function despublicar($idPregunta){
        $this->Pregunta_model->set_idPregunta($idPregunta);
        $this->Pregunta_model->set_publicado(0);
        $this->Pregunta_model->publicar_Pregunta();

        redirect('admin/preguntas');
    }
    // TERMINA FUNCIONES DE PREGUNTAS

    // INICIA FUNCION DE PRODUCTOS

    public function modificarProducto($idProducto){
        if($this->session->userdata('login') == true){
            $this->Producto_model->set_idProducto($idProducto);
            $data['title'] = "Modificar producto | Promesa";
            $dataModify['verProducto'] = $this->Producto_model->listarPorProducto();
            $this->load->view('admin/complements/header-admin', $data);
            $this->load->view('admin/productos/modificarProducto', $dataModify);
            $this->load->view('admin/complements/footer-admin');
        }else{
            redirect('admin');
        }
    }

    public function modifyProducto(){
        $configuration = [
            "upload_path" => "./images/images_upload",
            "allowed_types" => "jpg|jpeg|png"
        ];
        $this->load->library('upload', $configuration);
        if($this->upload->do_upload('imagen_1')){
            $this->Producto_model->set_idProducto($this->input->post('idProducto'));
            $this->Producto_model->set_idImagen($this->input->post('idImagen'));
            $this->Producto_model->set_nombreProducto($this->input->post('nombreProducto'));
            $this->Producto_model->set_descripcion($this->input->post('descripcion'));
            $this->Producto_model->set_pProducto($this->input->post('precioProducto'));
            $this->Producto_model->set_pVenta($this->input->post('ventaProducto'));
            $this->Producto_model->set_stock($this->input->post('stock'));
            $this->Producto_model->set_lanzamiento($this->input->post('lanzamiento'));
            $this->Producto_model->set_producto_idUsuario($this->input->post('idUsuario'));

            $infoFile = $this->upload->data();

            $this->Producto_model->set_imagen_1($infoFile['file_name']);

            if($this->upload->do_upload('imagen_2')){
                $infoFile = $this->upload->data();
                $this->Producto_model->set_imagen_2($infoFile['file_name']);
                if($this->upload->do_upload('imagen_3')){
                    $infoFile = $this->upload->data();
                    $this->Producto_model->set_imagen_3($infoFile['file_name']);
                }
            }
        }else{
            echo $this->upload->display_errors();
        }
        $this->Producto_model->p_updateProducto();
        redirect('admin/productos');
    }

    public function addProducto(){
        $configuration = [
            "upload_path" => "./images/images_upload",
            "allowed_types" => "jpg|jpeg|png"
        ];
        $this->load->library('upload', $configuration);
        if($this->upload->do_upload('imagen_1')){
            $this->Producto_model->set_nombreProducto($this->input->post('nombreProducto'));
            $this->Producto_model->set_descripcion($this->input->post('descripcion'));
            $this->Producto_model->set_pProducto($this->input->post('precioProducto'));
            $this->Producto_model->set_pVenta($this->input->post('ventaProducto'));
            $this->Producto_model->set_stock($this->input->post('stock'));
            $this->Producto_model->set_lanzamiento($this->input->post('lanzamiento'));
            $this->Producto_model->set_producto_idUsuario($this->input->post('idUsuario'));

            $infoFile = $this->upload->data();

            $this->Producto_model->set_imagen_1($infoFile['file_name']);

            if($this->upload->do_upload('imagen_2')){
                $infoFile = $this->upload->data();
                $this->Producto_model->set_imagen_2($infoFile['file_name']);
                if($this->upload->do_upload('imagen_3')){
                    $infoFile = $this->upload->data();
                    $this->Producto_model->set_imagen_3($infoFile['file_name']);
                }
            }
        }else{
            echo $this->upload->display_errors();
        }
        $this->Producto_model->p_AddProduc();
        redirect('admin/productos');
    }

    public function agregarProductos(){
        if($this->session->userdata('login') == true){
            $data['title'] = 'Agregar productos | Promesa';
            $this->load->view('admin/complements/header-admin', $data);
            $this->load->view('admin/productos/agregarProductos');
            $this->load->view('admin/complements/footer-admin');
        }else{
            redirect('admin');
        }
    }

    public function publicarPregunta($_idProducto){
        $this->Producto_model->set_idProducto($_idProducto);
        $this->Producto_model->set_producto_idUsuario(1);
        $this->Producto_model->set_baja_logica(1);
        $this->Producto_model->bajaProducto();
        redirect('admin/productos');

    }
    public function despublicarPregunta($_idProducto){
        $this->Producto_model->set_idProducto($_idProducto);
        $this->Producto_model->set_producto_idUsuario(1);
        $this->Producto_model->set_baja_logica(0);
        $this->Producto_model->bajaProducto();
        redirect('admin/productos');

    }
    // TERMINA FUNCIONES DE PRODUCTOS

}// fin clase
