<?php

/**
* 
*/
class Users_log_model extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
	}
	public function agregar($user,$ip,$url = null,$accion = '')
	{

		$data = array(
		'ip' => $ip,
		'fecha' => date("Y-m-d H:i:s"),
		'url' =>$url,
		'accion' => $accion,
		'userId' => $user,
		);

		$this->db->insert('users_log',$data);
	}





public function lista($data = null)
	{


		$this->db->select('users.nombreCompleto as nombre, users_log.ip, users_log.fecha, users_log.url ,users_log.Accion as accion, users_log.userId ');
		$this->db->from('users_log');


		if (isset($data['busqueda']) && $data['busqueda'] != null)
		{
				$this->db->like('url', $data['busqueda']);
				$this->db->or_like('Accion', $data['busqueda']);
				$this->db->or_like('ip', $data['busqueda']);
				$this->db->or_like('fecha', $data['busqueda']);
				 $this->db->or_like('users.nombreCompleto', $data['busqueda']);
		}
		if (isset($data['ip_register']))
		{
			$this->db->where('accion', 'Registro de cliente');
			$this->db->where('ip', $data['ip_register']);
		}
		$this->db->join('users','users.id = users_log.userId');
		$this->db->order_by("fecha", "desc");
		$this->db->limit(100);
		$query = $this->db->get();  

return $query;
	}




}

?>
