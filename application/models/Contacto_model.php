<?php
defined('BASEPATH') OR exit("You can't here");

class Contacto_model extends CI_Model{
    private $_idComentario;
    private $_idUsuario;
    private $_nombre;
    private $_email;
    private $_mensaje;
    private $_leido;

    function __construct(){
        parent::__construct();
    }

    public function get_idComentario(){
        return $this->_idComentario;
    }

    public function set_idComentario($_idComentario){
        $this->_idComentario = $_idComentario;
    }

    public function get_idUsuario(){
        return $this->_idUsuario;
    }

    public function set_idUsuario($_idUsuario){
        $this->_idUsuario = $_idUsuario;
    }

    public function get_nombre(){
        return $this->_nombre;
    }

    public function set_nombre($_nombre){
        $this->_nombre = $_nombre;
    }

    public function get_email(){
        return $this->_email;
    }

    public function set_email($_email){
        $this->_email = $_email;
    }

    public function get_mensaje(){
        return $this->_mensaje;
    }

    public function set_mensaje($_mensaje){
        $this->_mensaje = $_mensaje;
    }

    public function get_leido(){
        return $this->_leido;
    }

    public function set_leido($_leido){
        $this->_leido = $_leido;
    }

    // Funciones

    public function verComentarios(){
        $this->db->where('leido = 0');
        $this->db->select('*');
        $this->db->from('comentario');
		$comentarios = $this->db->get();
		return $comentarios->result();
    }

    public function verComentariosLeidos(){
        $this->db->where('leido = 1');
        $this->db->select('*');
        $this->db->from('comentario');
		$comentariosLeidos = $this->db->get();
		return $comentariosLeidos->result();
    }

    public function save_Comentario(){
        try{
            $this->db->trans_begin();
                $this->db->query("CALL save_Comentario('$this->_nombre', '$this->_mensaje', '$this->_email')");
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
            }else{
                $this->db->trans_commit();
            }
        }catch(PDOException $e){
            die($e);
        }
    }

    public function leido(){
        try{
            $this->db->trans_begin();
                $this->db->query("CALL modify_Comentario('$this->_idComentario', '$this->_idUsuario', '$this->_leido')");
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
            }else{
                $this->db->trans_commit();
            }
        }catch(PDOException $e){
            die($e);
        }	
    }

    public function deleteComentario(){
        try{
            $this->db->trans_begin();
                $this->db->query("CALL delete_Comentario('$this->_idComentario')");
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
            }else{
                $this->db->trans_commit();
            }
        }catch(PDOException $e){
            die($e);
        }	
    }
}
