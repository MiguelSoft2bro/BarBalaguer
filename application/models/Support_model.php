<?php

/**
* 
*/
class Support_model extends CI_Model
{
	public $module = 'users_mensajes';
	public $key = 'users_mensajes.id';

	function __construct()
	{
		parent::__construct();
	}
	private function support_data($userId = null)
	{
		$data = array(
			'titulo' => strip_tags($this->input->post('titulo', true)),
			'tipo' => strip_tags($this->input->post('tipo', true)),
			//'mensaje' => $this->input->post('mensaje', true),
			'fecha' => date("Y-m-d H:i:s"),
			'fechaMod' => date("Y-m-d H:i:s"),
			'userId' => $userId != null ? $userId : $this->session->userdata('userId'),
		);
		return $data;
	}
	private function support_load()
	{
		$this->db->select('um.*, u.nombreCompleto, u.username, u.email');
		$this->db->from($this->module.' um');
		$this->db->join('users u', 'um.userId = u.id');
	}
	public function agregar($data_support = null, $userId = null)
	{
		$data = $data_support == null ? $this->support_data($userId) : $data_support;
		$this->db->insert($this->module, $data);
	}
	public function lista($data = null)
	{
		$this->support_load();
		if ($this->session->tipo != 0 && 'tipo' == 9)
		{
			$this->db->where('um.soloAdmin', 0);
		}
		if ($this->session->userdata('tipo')== 9) {
			$this->db->where('u.tipo !=', 1);
		}
		if (isset($data['userId']))
		{
			$this->db->where('um.userId', $data['userId']);
		}
		if (isset($data['tipo']) && $data['tipo'] != null)
		{
			$this->db->where('um.tipo', $data['tipo']);
		}
		if (isset($data['per_page']))
		{
			$this->db->limit($data['per_page'], $this->uri->segment(3));
		}
		elseif (isset($data['limite']))
		{
			$this->db->limit($data['limite']);
		}
		if (isset($data['order_by']))
		{
			foreach ($data['order_by'] as $key => $value)
			{
				$this->db->order_by($key, $value);
			}
		}
		$query = $this->db->get();
		return $query;
	}
	public function respuestas($data = null)
	{
		$this->db->select('um.id as id_mensaje, ur.respuesta, ur.fecha, ur.estado, u.nombreCompleto, u.id as userId');
		$this->db->from('users_mensajes_respuestas ur');
		$this->db->join('users_mensajes um', 'ur.mensajeId = um.id');
		$this->db->join('users u', 'ur.userId = u.id');
		if (isset($data['mensajeId']))
		{
			$this->db->where('ur.mensajeId', $data['mensajeId']);
		}
		if (isset($data['userId']))
		{
			$this->db->where('um.userId', $data['userId']);
		}
		if (isset($data['tipo']) && $data['tipo'] != null)
		{
			$this->db->where('um.tipo', $data['tipo']);
		}
		if (isset($data['inbox']))
		{
			$this->db->where('ur.userId !=', $this->session->userdata('userId'));
		}
		if (isset($data['per_page']))
		{
			$this->db->limit($data['per_page'], $this->uri->segment(3));
		}
		elseif (isset($data['limite']))
		{
			$this->db->limit($data['limite']);
		}
		if (isset($data['order_by']))
		{
			foreach ($data['order_by'] as $key => $value)
			{
				$this->db->order_by($key, $value);
			}
		}
		$query = $this->db->get();
		return $query;
	}
	public function responder($mensajeId, $respuesta = null)
	{


		
		$data = array(
			'respuesta' => $respuesta == null ? strip_tags($this->input->post('respuesta', true)) : strip_tags($respuesta),
			'fecha' => date("Y-m-d H:i:s"),
			'userId' => $this->session->userdata('userId'),
			'mensajeId' => $mensajeId,
		);
		$this->db->insert('users_mensajes_respuestas', $data);
	}
	public function act_fecha_mod($mensajeId)
	{
		$this->db->set('fechaMod', date("Y-m-d H:i:s"));
		$this->db->where($this->key, $mensajeId);
		$this->db->update($this->module);
	}
	public function detalles($id)
	{
		$this->support_load();
		$this->db->where('um.id', $id);
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
	public function num_answers($data = null)
	{
		$this->db->select('COUNT(ur.id) as cantidad');
		$this->db->from('users_mensajes_respuestas ur');
		if (isset($data['mensajeId']))
		{
			$this->db->where('ur.mensajeId', $data['mensajeId']);
		}
		if (isset($data['estado']))
		{
			$this->db->where('ur.estado', $data['estado']);
		}
		$this->db->where('ur.userId !=', $this->session->userdata('userId'));
		if ($this->session->userdata('tipo') != 0)
		{
			$this->db->join('users_mensajes um', 'ur.mensajeId = um.id');
			$this->db->where('um.userId', $this->session->userdata('userId'));
		}
		$query = $this->db->get();
		if ($query->num_rows())
		{
			return $query->row()->cantidad;
		}
		else
		{
			return 0;
		}
	}
	public function marcar_leidos($mensajeId)
	{
		$this->db->set('estado', 1);
		$this->db->where('mensajeId', $mensajeId);
		$this->db->where('userId !=', $this->session->userdata('userId'));
		$this->db->update('users_mensajes_respuestas');
	}
	public function cerrar($mensajeId)
	{
		$this->db->set('estado', 1);
		$this->db->where($this->key, $mensajeId);
		$this->db->update($this->module);
	}
}

?>