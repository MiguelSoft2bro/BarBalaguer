<?php

/**
* 
*/
class Home extends CI_Controller
{
	public $module = 'home';

	public function __construct()
	{

		parent::__construct();
		  $this->load->library('session');
		  $this->load->language('general_lang', 'spanish');



			


	}


	





	public function getAlergenos($IDArticulo)
	{

		$this->db->select('*,alergenos.imagen');
		$this->db->from('articulos_alergenos');
		$this->db->join('alergenos', 'articulos_alergenos.idAlergeno = alergenos.id', 'inner'); // Realiza un INNER JOIN con la tabla alergenos

		$this->db->where('idArticulo', $IDArticulo); 
		$query = $this->db->get(); 
		$data["alergenos"] = $query->result_array();


		echo json_encode($data);


	}



	public function getItemsFamilia($idfamilia)
	{

		$this->db->select('IDArticulo, Articulo, PVP, imagen, ConImagen');
		$this->db->from('articulos');
		$this->db->where('IDFamilia', $idfamilia); 
		$this->db->where('Activo', 1); 
		$this->db->order_by('Orden', 'ASC');
		$query = $this->db->get(); 
		$data["articulos"] = $query->result_array();




		$this->db->select('*');
		$this->db->from('familias');
		$this->db->where('IDFamilia', $idfamilia); 
		$query = $this->db->get(); 
		$data["familia"] = $query->row_array();



		
		$query = $this->db->get('opciones');

		$data["opciones"] = $query->row_array();



		echo json_encode($data);


	}







	public function index()
	{


		$this->db->select('*');
		$this->db->from('familias'); 
		$this->db->where('Activo', 1); 
		$this->db->order_by('Orden', 'ASC');
		$query = $this->db->get(); 

		$data["familias"] = $query->result_array();


		$query = $this->db->get('opciones');

		$data["opciones"] = $query->row_array();



		$query = $this->db->get('alergenos');

		$data["alergenos"] = $query->result_array();

$this->load->view('templates/header',$data);





if($data["opciones"]["estiloCarta"] == 0){

 $this->load->view('home_view',$data);
}else if($data["opciones"]["estiloCarta"] == 1){

	$this->load->view('home_view_2',$data);

}else{

	$this->load->view('home_view_3',$data);

}



 $this->load->view('templates/footer',$data); 

}
			


			
		}	





?>