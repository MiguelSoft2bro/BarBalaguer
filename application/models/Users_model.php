<?php

/**
* 
*/
class Users_model extends CI_Model
{
	public $module = 'users';// Tabla USERS
	public $key = 'users.id';// Llave primaria

	public function __construct()
	{
		parent::__construct();
	}
	// Seleccion por defecto
	private function user_load()
	{
		$this->db->select('*');
		$this->db->from($this->module);
	}
	// Datos a insertar/editar en la tabla users
	private function user_data()
	{
		$data = array(
			'nombreCompleto' => $this->input->post('nombreCompleto', true),
			'email' => $this->input->post('email', true),
		);
		if ($this->input->post('username'))
		{
			$data += array('username' => $this->input->post('username', true));
		}
		if ($this->input->post('tipo'))
		{
			$data += array('tipo' => $this->input->post('tipo', true));
		}
		if ($this->input->post('password'))
		{
			// Insertamos el password encriptado con el metodo password_hash
			$data += array('password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT));
		}
		return $data;
	}
	// Obtener la lista de usuarios
	public function lista($data= null)
	{
		$this->user_load();
		// Verificamos si ingresamos paginacion
		if (isset($data['per_page']))
		{
			$this->db->limit($data['per_page'], $this->uri->segment(3));
		}
		$query = $this->db->get();
		return $query;
	}
	// Verificar existencia mediante un campo
	public function validar($field, $data)
	{
		$this->user_load();
		$this->db->where($field, $data);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	// Agregar Usuario
	public function agregar()
	{
		$this->db->insert($this->module, $this->user_data());
	}
	// Cargar detalles de un usuario mediante la ID
	public function detalles($id)
	{
		$this->user_load();
		$this->db->where($this->key, $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
			return false;
		}
	}
	// Editar datos del usuario
	public function editar($id, $data = null)
	{
		$set = $data == null ? $this->user_data() : $data;
		$condition = array($this->key => $id);
		$this->db->update($this->module, $set, $condition);
	}
	// Eliminar un usuario
	public function eliminar($id)
	{
		$this->db->delete($this->module, array($this->key => $id));
	}
}

?>