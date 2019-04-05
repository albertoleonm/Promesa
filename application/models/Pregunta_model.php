<?php
defined('BASEPATH') OR exit("You can't here");

class Pregunta_model extends CI_Model{
    private $_idPregunta;
    private $_pregunta_idUsuario;
    private $_nombrePregunta;
    private $_respuesta;
    private $_publicado;
 
    function __construct(){
        parent::__construct();
    }

    public function get_idPregunta(){
        return $this->_idPregunta;
    }

    public function set_idPregunta($_idPregunta){
        $this->_idPregunta = $_idPregunta;
    }

    public function get_pregunta_idUsuario(){
        return $this->_pregunta_idUsuario;
    }

    public function set_pregunta_idUsuario($_pregunta_idUsuario){
        $this->_pregunta_idUsuario = $_pregunta_idUsuario;
    }

    public function get_nombrePregunta(){
        return $this->_nombrePregunta;
    }

    public function set_nombrePregunta($_nombrePregunta){
        $this->_nombrePregunta = $_nombrePregunta;
    }

    public function get_respuesta(){
        return $this->_respuesta;
    }

    public function set_respuesta($_respuesta){
        $this->_respuesta = $_respuesta;
    }
    
    public function get_publicado(){
        return $this->_publicado;
    }

    public function set_publicado($_publicado){
        $this->_publicado = $_publicado;
    }

    // Funciones 

    public function verPreguntas(){
        $this->db->select('*');
        $this->db->from('pregunta');
        $this->db->join('usuario', 'usuario.idUsuario = pregunta.pregunta_idUsuario');
		$preguntas = $this->db->get();
		return $preguntas->result();
    }

    public function verPreguntasPublicadas(){
        $this->db->where('publicado = 1');
        $this->db->select('*');
        $this->db->from('pregunta');
		$preguntasPublicadas = $this->db->get();
		return $preguntasPublicadas->result();
    }

    public function listarPorPregunta(){
        $this->db->where('idPregunta', $this->_idPregunta);
        $this->db->select('*');
        $this->db->from('pregunta');
		$verPregunta = $this->db->get();
		return $verPregunta->result();
    }

    public function add_Preguntas(){
        try{
            $this->db->trans_begin();
                $this->db->query("CALL p_AddPregunta('$this->_pregunta_idUsuario', 
                '$this->_nombrePregunta', '$this->_respuesta', '$this->_publicado')");
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
            }else{
                $this->db->trans_commit();
            }
        }catch(PDOException $e){
            die($e);
            
        }
    }

    public function modify_Pregunta(){
        try{
            $this->db->trans_begin();
                $this->db->query("CALL p_ModiPregunta('$this->_idPregunta','$this->_pregunta_idUsuario', 
                '$this->_nombrePregunta', '$this->_respuesta')");
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
            }else{
                $this->db->trans_commit();
                }
            }catch(PDOException $e){
                die($e);
            }
    }

    public function publicar_Pregunta(){
        try{
            $this->db->trans_begin();
                $this->db->query("CALL p_publiPregunta('$this->_idPregunta', '$this->_publicado')");
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
