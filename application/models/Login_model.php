<?php

/**
* 
*/
class Login_model extends CI_Model
{
	public $module = 'users';// Tabla USERS

	public function __construct()
	{
		parent::__construct();
	}
	// Inicio de Sesión
	public function login()
	{
		$this->db->select('u.*, uf.id as fiscalId');
		$this->db->from($this->module.' u');
		$this->db->join('users_fiscaldata uf', 'uf.userId = u.id', 'left');
		$where = array(
			'username' => strip_tags($this->input->post('username', true)),

			);

		$this->db->where($where);
		$this->db->or_where('email', strip_tags($this->input->post('username', true)));
		$this->db->limit(1);
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
	// Identificacion de usuario mediante el email registrado para recuperar el password
	public function recovery_password()
	{
		$this->db->select('*');
		$this->db->from($this->module);
		$this->db->where('email', strip_tags($this->input->post('email', true)));
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
	// Registramos el codigo de seguridad para establecer nuevo password
	public function add_recovery_code($codigo, $userId)
	{
		$fecha_inicio = date("Y-m-d H:i:s");
		$fecha_fin = date("Y-m-d H:i:s", strtotime($fecha_inicio.' + 1 hour'));
		$data = array(
			'codigo' => $codigo,
			'fecha_inicio' => $fecha_inicio,
			'fecha_fin' => $fecha_fin,
			'userId' => $userId,
		);
		$this->db->insert('users_recovery', $data);
	}
	public function very_code($codigo)
	{
		$this->db->select('ur.*, u.accountActivated, u.email, u.nombreCompleto, u.tipo');
		$this->db->from('users_recovery ur');
		$this->db->join('users u', 'ur.userId = u.id');
		$this->db->where('ur.codigo', $codigo);
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
	public function activateAccount($userId)
	{
		$this->db->set('accountActivated', 1);
		$this->db->where('id', $userId);
		$this->db->update('users');
	}

	public function loginWP($data = null)
	{
		

		$this->db->select('ur.*, u.accountActivated, u.email, u.nombreCompleto, u.tipo');
		$this->db->from($this->module.' u');
		$this->db->where('password', $data["pass"]);
		$this->db->where('username', $data["user"]);
		$this->db->where('password', $data["pass"]);
			$query = $this->db->get();
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return true;
		}
	}


}

?>