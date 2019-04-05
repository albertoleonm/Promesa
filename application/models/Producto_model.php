<?php
defined('BASEPATH') OR exit("You can't here");

class Producto_model extends CI_Model{
    private $_idProducto;
	private $_nombreProducto;
	private $_descripcion;
    private $_pProducto;
    private $_pVenta;
    private $_ganancia;
    private $_stock;
    private $_baja_logica;
    private $_lanzamiento;
    private $_producto_idUsuario;
    private $_idImagen;
    private $_imagen_1;
    private $_imagen_2;
    private $_imagen_3;

    function __construct(){
        parent::__construct();
    }
	public function get_idProducto(){
		return $this->_idProducto;
	}

	public function set_idProducto($_idProducto){
		$this->_idProducto = $_idProducto;
	}

	public function get_nombreProducto(){
		return $this->_nombreProducto;
	}

	public function set_nombreProducto($_nombreProducto){
		$this->_nombreProducto = $_nombreProducto;
	}
	public function get_descripcion(){
		return $this->_descripcion;
	}

	public function set_descripcion($_descripcion){
		$this->_descripcion = $_descripcion;
	}

	public function get_pProducto(){
		return $this->_pProducto;
	}

	public function set_pProducto($_pProducto){
		$this->_pProducto = $_pProducto;
	}

	public function get_pVenta(){
		return $this->_pVenta;
	}

	public function set_pVenta($_pVenta){
		$this->_pVenta = $_pVenta;
	}

	public function get_ganancia(){
		return $this->_ganancia;
	}

	public function set_ganancia($_ganancia){
		$this->_ganancia = $_ganancia;
	}

	public function get_stock(){
		return $this->_stock;
	}

	public function set_stock($_stock){
		$this->_stock = $_stock;
	}

	public function get_baja_logica(){
		return $this->_baja_logica;
	}

	public function set_baja_logica($_baja_logica){
		$this->_baja_logica = $_baja_logica;
	}

	public function get_lanzamiento(){
		return $this->_lanzamiento;
	}

	public function set_lanzamiento($_lanzamiento){
		$this->_lanzamiento = $_lanzamiento;
	}

	public function get_producto_idUsuario(){
		return $this->_producto_idUsuario;
	}

	public function set_producto_idUsuario($_producto_idUsuario){
		$this->_producto_idUsuario = $_producto_idUsuario;
	}

	public function get_idImagen(){
		return $this->_idImagen;
	}

	public function set_idImagen($_idImagen){
		$this->_idImagen = $_idImagen;
	}

	public function get_imagen_1(){
		return $this->_imagen_1;
	}

	public function set_imagen_1($_imagen_1){
		$this->_imagen_1 = $_imagen_1;
	}

	public function get_imagen_2(){
		return $this->_imagen_2;
	}

	public function set_imagen_2($_imagen_2){
		$this->_imagen_2 = $_imagen_2;
	}

	public function get_imagen_3(){
		return $this->_imagen_3;
	}

	public function set_imagen_3($_imagen_3){
		$this->_imagen_3 = $_imagen_3;
	}

	// Funciones

	public function listarPorProducto(){
		$this->db->where('idProducto', $this->_idProducto);
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->join('imagen', 'imagen.idImagen = producto.producto_idImagen');
		$productoListar = $this->db->get();
		return $productoListar->result();
		
	}

	public function productosPublicados(){
		$this->db->where('baja_logica = 1');
		$this->db->where('lanzamiento = 0');
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->join('imagen', 'imagen.idImagen = producto.producto_idImagen');
		$productosPublic = $this->db->get();
		return $productosPublic->result();
	}

	public function productosLanzamientos(){
		$this->db->where('baja_logica = 1');
		$this->db->where('lanzamiento = 1');
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->join('imagen', 'imagen.idImagen = producto.producto_idImagen');
		$productosPublic = $this->db->get();
		return $productosPublic->result();
	}

    public function p_AddProduc(){
        try{
            $this->db->trans_begin();
				$this->db->query("CALL p_AddProducto('$this->_nombreProducto', '$this->_descripcion',
				'$this->_pProducto', '$this->_pVenta', '$this->_stock', '$this->_lanzamiento',
				'$this->_producto_idUsuario', '$this->_imagen_1', '$this->_imagen_2', '$this->_imagen_3')");
            if ($this->db->trans_status() === FALSE){
                $this->db->trans_rollback();
            }else{
                $this->db->trans_commit();
            }
        }catch(PDOException $e){
            die($e);
        }

    }


        public function p_updateProducto(){
            try{
                $this->db->trans_begin();
					$this->db->query("CALL p_UpdateProducto('$this->_idProducto','$this->_idImagen',
					'$this->_nombreProducto',  '$this->_descripcion', '$this->_pProducto', '$this->_pVenta',
					'$this->_stock', '$this->_producto_idUsuario', '$this->_imagen_1', '$this->_imagen_2',
					'$this->_imagen_3', '$this->_lanzamiento')");
                if ($this->db->trans_status() === FALSE){
                    $this->db->trans_rollback();
                }else{
                    $this->db->trans_commit();
                }
            }catch(PDOException $e){
                die($e);
            }

        }

            public function bajaProducto(){
                try{
                    $this->db->trans_begin();
						$this->db->query("CALL p_deleteProduc('$this->_idProducto', '$this->_producto_idUsuario',
						'$this->_baja_logica')");
                    if ($this->db->trans_status() === FALSE){
                        $this->db->trans_rollback();
                    }else{
                        $this->db->trans_commit();
                    }
                }catch(PDOException $e){
                    die($e);
                }
            }

                public function listarProducto(){
                    $this->db->select('*');
                    $this->db->from('producto');
                    $this->db->join('imagen', 'imagen.idImagen = producto.producto_idImagen');
                    $this->db->join('usuario', 'usuario.idUsuario = producto.producto_idUsuario');
                    $modificar = $this->db->get('');
                    return $modificar->result();
                }
    }

