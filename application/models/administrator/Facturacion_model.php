<?php

/**
* 
*/
class Facturacion_model extends CI_Model
{
	public $module = 'users_facturas uf';
	public $key = 'uf.id';

	public function __construct()
	{
		parent::__construct();
	}
	private function factura_load()
	{
		$this->db->select('uf.*, uf.paypal as paypal_comision, u.nombreCompleto, c.nombreCompleto as nombreClienteAppyweb, u.cif, u.tipo, u.email, u.direccion as direccionUsuario, u.pais as paisUsuario, u.ciudad as ciudadUsuario, u.codigoPostal as codigoPostalUsuario, u.phone, u.costoPorPalabra, ufd.razonSocial, ufd.idFiscal, ufd.direccion as direccion, ufd.ciudad, ufd.pais, ufd.codigoPostal, ufd.tlf, ufd.paypal, ufd.nroCuenta, ufd.id as fiscalId, uwf.walletMovId');
		$this->db->from($this->module);
		$this->db->join('users_wallet_facturas uwf', 'uwf.facturaId = uf.id', 'left');
		$this->db->join('users u', 'uf.userId = u.id', 'left');
		$this->db->join('clientes_appyweb c', 'uf.clienteAppywebId = c.id', 'left');
		$this->db->join('users_fiscaldata ufd', 'ufd.userId = u.id', 'left');
	}
	public function lista($data = null)
	{
		$this->factura_load();
		if (isset($data['busqueda']) && $data['busqueda'] != null)
		{
			$this->db->where($this->key, $data['busqueda']);
		}
		if (isset($data['fecha1']))
		{
			$this->db->where('fecha BETWEEN "'. date('Y-m-d', strtotime($data['fecha1'])). '" and "'. date('Y-m-d', strtotime($data['fecha2'])).'"');

		}
		if (isset($data['userId']))
		{
			$this->db->where('u.id', $data['userId']);
		}
		if (isset($data['userIdAppyweb']))
		{
			$this->db->where('c.id', $data['userIdAppyweb']);
		}
		if (isset($data['visto']))
		{
			$this->db->where('uf.visto', $data['visto']);
		}
		if (isset($data['tipo']) && $data['tipo'] != null)
		{

			if ($data['tipo']== 2 ) {
				$this->db->where('u.tipo', $data['tipo']);
				$this->db->or_where('u.tipo', 3);
				$this->db->or_where('u.tipo', 5);
				$this->db->or_where('u.tipo', 6);
				$this->db->or_where('u.tipo', 9);
				$this->db->or_where('u.tipo', 4);
			}else{
				
$this->db->where('u.tipo', $data['tipo']);
				
			}

			
		}
		if (isset($data['per_page']))
		{
			$this->db->limit($data['per_page'], $this->uri->segment(3));
		}
		elseif (isset($data['limite']))
		{
			$this->db->limit($data['limite']);
		}
	



		if (isset($data['OrdenarFecha']))
		{
				$this->db->order_by('uf.fecha', 'asc');
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
	public function agregar_factura($data)
	{
		$this->db->insert('users_facturas', $data);
	}






		public function editar_factura($data,$dataUser)
	{
		


			$datos = array(
			'instrucciones' => $data['instrucciones'],
			'descripcion' => $data['descripcion'],
			'subtotal' => $data['subtotal'],
			'irpf' => $data['irpf'],
			'iva' => $data['iva'],
			'total' => $data['total'],
			'items' => $data['items'],
			);

			 if (isset($data['paypal']))
                {
                    $datos['paypal'] = $data['paypal'];
                    $datos['porcentaje_paypal'] = 3.4;
                }
                if (isset($data['descuento']))
                {
                	$datos['descuento'] = $data['descuento'];
                    $datos['porcentaje_descuento'] = $data['porcentaje_descuento'];
                }



			$this->db->where('id', $data['id']);
			$this->db->update('users_facturas', $datos);


			//user update


			$datosUser = array(
			'nombreCompleto' => $dataUser['nombreCompleto'],
			'direccion' => $dataUser['direccion'],
			'ciudad' => $dataUser['ciudad'],
			'codigoPostal' => $dataUser['codigoPostal'],
			'phone' => $dataUser['phone'],
			'email' => $dataUser['email'],
			'cif' => $dataUser['cif'],
			);

		


			$this->db->where('id', $dataUser['id']);
			$this->db->update('users', $datosUser);






	}




public function checkFiscalData($userId)

{


$sql = "SELECT * FROM `users_fiscaldata` WHERE userId  = ".$userId;
 return  $this->db->query($sql);

}


	public function listaTrimestre($data)
	{	


if ($data['tipo'] == 1) {
	


		if ($data['empresa']== 0) {
			
		$sql = "SELECT fac.nro, fac.fecha,fac.total,fac.iva,fac.irpf,fac.paypal,u.pais, u.tipo,u.id as userId , u.empresa, u.nombreCompleto,u.cif ,u.ciudad FROM `users_facturas` AS fac INNER JOIN users AS u ON fac.userId = u.id  WHERE fac.fecha >= '".$data['fecha1']."' and fac.fecha <= '".$data['fecha2']."' and  u.tipo = 1";

		}else{

		$sql = "SELECT fac.nro, fac.fecha,fac.total,fac.iva,fac.irpf,fac.paypal,u.id as userId, u.empresa, u.nombreCompleto,u.cif  ,u.ciudad FROM `users_facturas` AS fac INNER JOIN clientes_appyweb AS u ON fac.clienteAppywebId = u.id WHERE fac.fecha >= '".$data['fecha1']."%' and fac.fecha <= '".$data['fecha2']."%'   ORDER BY `fac`.`fecha` ASC";

		}


}elseif ($data['tipo']==2) {
	// GASTOS
	$sql = "SELECT fac.nro, fac.fecha,fac.total,fac.iva,fac.irpf,fac.paypal,u.pais, u.tipo,u.id as userId ,u.nombreCompleto,u.cif ,u.ciudad FROM `users_facturas` AS fac INNER JOIN users AS u ON fac.userId = u.id WHERE fac.fecha >= '2018-10-01%' and fac.fecha <= '2018-12-31%' and (u.tipo = 2 or u.tipo = 3 or u.tipo = 5 or u.tipo = 6 or u.tipo = 9) ORDER BY `fac`.`fecha` ASC ";
}




	  return  $this->db->query($sql);

	}
	public function detalles($id)
	{
		$this->factura_load();
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
	public function detalles_appyweb($id)
	{
		$this->db->select('uf.*, uf.paypal as paypal_comision, u.nombreCompleto, u.email, u.direccion as direccionUsuario, u.ciudad as ciudadUsuario, u.codigoPostal as codigoPostalUsuario, u.phone, u.cif');
		$this->db->from($this->module);
		$this->db->join('clientes_appyweb u', 'uf.clienteAppywebId = u.id', 'left');
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
	public function facturas_redactores($data)
	{
		$this->db->select('nro as nroFactura');
		$this->db->from($this->module);
		$this->db->where('uf.redactor', 1);
		$this->db->where('uf.userId', $data['userId']);
		$this->db->where('uf.year', $data['year']);
		$this->db->order_by('uf.id', 'desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row()->nroFactura;
		}
		else
		{
			return 0;
		}
	}
	public function facturas_clientes($data)
	{
		$this->db->select('nro as nroFactura');
		$this->db->from($this->module);
		$this->db->where('uf.redactor', 0);
		$this->db->where('uf.year', $data['year']);
		$this->db->order_by('uf.id', 'desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row()->nroFactura;
		}
		else
		{
			return 0;
		}
	}
	public function eliminar($id)
	{
		$this->db->delete('users_facturas', array('id' => $id));
	}


	public function trabajadoresSpain()
	{
		$this->db->select('*');
		$this->db->from('trabajadores_spain');
		$query = $this->db->get();

			return $query->result();
		
	}


	public function saldoUser($id)
	{

		$this->db->select('*');
		$this->db->from('users_wallet');
		$this->db->where('userId', $id);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function SaldoTotalPlataforma()
	{
		

        return  $this->db->query("SELECT users_wallet.id,users_wallet.saldo,users_wallet.bloqueo_cantidad as promocion,users.nombreCompleto, users.email FROM `users_wallet` INNER JOIN users ON users_wallet.userId = users.id WHERE users.id != 20 and users.id != 38 and users.id != 68 and users.id != 66 and users.id != 214 and users.id != 20 and users.id != 241 and users.id != 290 and users.id != 469 and users.id != 24 and users.tipo = 1 order by saldo desc ");


		
	}

}

?>