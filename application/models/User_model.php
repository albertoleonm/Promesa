<?php
defined('BASEPATH') OR exit("You can't here");

class User_model extends CI_Model{
	private $_idUsuario;
	private $_usuario;
	private $_contrasena;
	private $_clave;
	private $_estatus;

	function __construct(){
			parent::__construct();
	}

	public function get_idUsuario(){
		return $this->_idUsuario;
	}

	public function set_idUsuario($_idUsuario){
		$this->_idUsuario = $_idUsuario;
	}

	public function get_usuario(){
		return $this->_usuario;
	}

	public function set_usuario($_usuario){
		$this->_usuario = $_usuario;
	}

	public function get_contrasena(){
		return $this->_contrasena;
	}

	public function set_contrasena($_contrasena){
		$this->_contrasena = $_contrasena;
	}

	public function get_clave(){
		return $this->_clave;
	}

	public function set_clave($_clave){
		$this->_clave = $_clave;
	}

	public function get_estatus(){
		return $this->_estatus;
	}

	public function set_estatus($_estatus){
		$this->_estatus = $_estatus;
	}

  	public function login(){
		$this->db->where('clave', $this->_clave);
		$this->db->where('contrasena', $this->_contrasena);
		$this->db->select('*');
		$this->db->from('usuario');
		$log = $this->db->get();
		return $log->result();
	}

	public function listar_Usuarios(){
		$this->db->select('*');
		$this->db->from('usuario');
		$user = $this->db->get();
		return $user->result();

	}

	public function listarPorUsuario(){
		$this->db->where('idUsuario', $this->_idUsuario);
		$this->db->select('*');
		$this->db->from('usuario');
		$modifyUser = $this->db->get();
		return $modifyUser->result();
	}

	public function agregar_Usuarios(){
		try{
			$this->db->trans_begin();
					$this->db->query("CALL p_AddUsuario('$this->_usuario', '$this->_contrasena',
					'$this->_clave','$this->_estatus')");
			if ($this->db->trans_status() === FALSE){
					$this->db->trans_rollback();
			}else{
					$this->db->trans_commit();
			}
		}catch(PDOException $e){
			die($e);
		}
	}

	public function modificar_Usuarios(){
		try{
			$this->db->trans_begin();
					$this->db->query("CALL p_ModUsuario('$this->_idUsuario', '$this->_usuario',
					'$this->_contrasena', '$this->_clave')");
			if ($this->db->trans_status() === FALSE){
					$this->db->trans_rollback();
			}else{
					$this->db->trans_commit();
			}
		}catch(PDOException $e){
			die($e);
		}
	}

	public function eliminar_Usuarios(){
		try{
			$this->db->trans_begin();
					$this->db->query("CALL p_eliminarUsuario('$this->_idUsuario')");
			if ($this->db->trans_status() === FALSE){
					$this->db->trans_rollback();
			}else{
					$this->db->trans_commit();
			}
		}catch(PDOException $e){
			die($e);
		}
	}
}// Fin user_modelo
