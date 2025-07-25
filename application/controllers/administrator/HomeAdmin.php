<?php

/**
* 
*/
class HomeAdmin extends CI_Controller
{
            public $module = 'users';
	public function __construct()
	{
		parent::__construct();
    // Verificamos que la sesion este iniciada
	
	}



		public function categorias()
	{


if (isset($this->session->userdata['logged_in'])) {

	$menu = $this->db->query("SELECT * FROM menu");

	$categorias = $this->db->query("SELECT * FROM categorias");



$data['Menu'] = $menu;
$data['Categorias'] = $categorias;

			$this->load->view('templates/header_admin');
		  $this->load->view('administrator/categorias_view',$data);
		  $this->load->view('templates/footer_vacio');


} else {
header("location: login");
}

				
	}




public function borrarFoto()
	{




if (isset($this->session->userdata['logged_in'])) {



$this->db->query("DELETE from galeria where id = ".$_GET['id']);



redirect('galeriaAdmin');

} else {
header("location: login");
}



}






public function subirFoto()
	{




if (isset($this->session->userdata['logged_in'])) {





	$nombre_archivo = 'foto_'.$_GET['imagen'];  
	
		$mi_archivo = 'imagen';
        $config['upload_path'] = "assets/images/galeria/";
        $config['file_name'] = $nombre_archivo;
        $config['allowed_types'] ='jpg|jpeg|png';
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

       		 $data['uploadSuccess'] = $this->upload->data();

        	$resultado = $data['uploadSuccess'];

        	print_r($resultado['file_name']);



$this->db->query("INSERT INTO `galeria`(`img`, `inicio`) VALUES ('". $resultado['file_name'] ."',0)");



redirect('galeriaAdmin');

} else {
header("location: login");
}



}






	public function actualizarFoto()
	{




if (isset($this->session->userdata['logged_in'])) {





	$nombre_archivo = 'foto_inicio_'.$_GET['id'];  
	
		$mi_archivo = 'imagen';
        $config['upload_path'] = "assets/images/galeria/";
        $config['file_name'] = $nombre_archivo;
        $config['allowed_types'] ='jpg|jpeg|png';
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        }

       		 $data['uploadSuccess'] = $this->upload->data();

        	$resultado = $data['uploadSuccess'];

        	print_r($resultado['file_name']);



$this->db->query("UPDATE `galeria` SET `img`=  '".$resultado['file_name']."' ,   `inicio`= 1   WHERE id = ".$_GET['id']);



redirect('galeriaAdmin');

} else {
header("location: login");
}



}






	public function prueba()
	{


		$text = '"Arroz A banda"-- "squid and prawn";
"Rice with lean and vegetables"-- "lean and local vegetables";
"Senyoret rice"-- "squid, prawn, mussel, cuttlefish and perch";
"Black Rice"-- "Cuttlefish, prawns and young garlic";
"Arroz de Almendrilla"-- "sepionet, prawns and dried tomato";
"Arroz de Monkfish"-- "know, artichoke, clams and monkfish";
"Arroz de Pollo"-- "Chicken, chickpeas and peppers";
"Rice of Horatilza"-- "Vegetable of season";
"Arroz de Secreto"-- "Iberian secret and mushroom cocktail";
"Arroz Alicantino"-- "Chicken, squid, mussels, prawns, crayfish and clam";
"Caldera de Marisco"-- "squid, prawn, mussels, cuttlefish and Norway lobster";
"Caldera de Bogavante"-- "fresh lobster";
"Fideua Marinera"-- "squid, prawn, mussels, cuttlefish and Norway lobster";
"Rice with anchovies and sea lettuce"-- "anchovies and sea lettuce";
"Microplacton Rice"-- "Cristian Gomis Foundation";
"Capelláns Salad"-- "Raf tomato, olives, chives and chaplain";
"Alicante Salad"-- "Raf tomato, olives, chives and roe";
"Kenzo Salad"-- "Mezclum, cherry, bacon, mushroom, onion, goat cheese";
"Cesar salad"-- "lettuce, cherry, corn, pineapple. Crouton, parmesan, chicken and cesar sauce";
"Mango Salad"-- "Mezclum, goat cheese, nuts, mango and sauce";
"Sailor"--" ";
"Seafood Salad"-- "";
"Russian salad"--"";
"Spicy potatoes"--"";
"Skewer of cuttlefish and prawns"--"";
"Kenzo omelette"--"";
"Cured sheep cheese"--"";
"Gran Reserva Ham"--"";
"Merlucitos"--"";
"Fried anchovy"--"";
"Croquettes of Iberian Ham"--"";
"Cod croquettes"--"";
"Scrambled eggs with Prawns and Tender Garlic"--"";
"Grilled cuttlefish with mushrooms"--"";
"Grilled squid / Andalusian"--"";
"Octopus Kenzo"--"";
"Clams a la marinera"--"";
"Shrimp Scampi"--"";
"Steamed mussels"--"";
"Eggplants with cane honey"--"";
"Fried artichokes with foie"--"";
"Broken eggs with ham"--"";
"Grilled vegetable"--"";
"Beef entrecote 350 Gr"--"";
"Lamb chops sautéed with garlic"--"";
"Kilo beef steak"--"";
"Tuna belly grilled"--"";
"Fresh salmon with citrus"--"";
"Sea bass in salt"--"";
"Cod au gratin with aioli"--"";
"Classic"-- "Mezclum, Tomato, chicken, bacon, cheddar and mayonnaise";
"Chicken"-- "Mezclum, Tomato, chicken, bacon, cheddar and mayonnaise";
"Kenzo"-- "Arugula, Beef, Mozzarella and sauce";
"President"-- "Mezclum, tomato, beef, bacon, goat cheese and sauce";
"Vaquerito"-- "Mezclum, tomato, beef, bacon, mozzarella and sauce";
"Postiguet"-- "breast, cheese, arugula and pesto sauce";
"Sausages"--" ";
"Black and White"--"";
"Josele"-- "marinated loin, mayonnaise and mushrooms";
"Kenzo"-- "Beef and special sauce";
"Luisma"-- "beef, aubergine and butter";
"Mediterranean"-- "tomato, tuna and anchovies";
"Norwegian"-- "Philadelphia cheese and salmon";
"Pintón"-- "beef, onion, bacon, serrano ham and cheese";
"Diablo"-- "marinated tenderloin, red pepper and devil sauce";
"Huertano"-- "aubergine, zucchini, caramelized onion and bree cheese";
"Playero"-- "Squid and mayonnaise";
"Norteño"-- "loin, fresh, green pepper, cheese and mayonnaise";
"Catalan"-- "Serrano ham and tomato";
"Pepito de veal"-- "Veal and butter";';




$platos = explode(";",$text);



for ($i=0; $i < count($platos) ; $i++) { 
	

	$plato = $platos[$i];


$datos = explode("--",$plato);


$id = $i+1;

$sql = "UPDATE menu SET nombreus='". str_replace('"',"",$datos[0])."',descripcionus='".str_replace('"',"",$datos[1])."' WHERE id = ".$id;



$this->db->query($sql);

}











	}




	public function crearPlato()
	{




if (    isset($_POST['nombre']    )  && $_POST['nombre'] != ""    &&   isset($_POST['precio']    )  && $_POST['precio'] != ""        ) {

				

// $nombre_archivo = str_replace(' ', '', $_POST['nombre']);  
// $nombre_archivo = $nombre_archivo;


// 		$mi_archivo = 'imagen';
//         $config['upload_path'] = "assets/images/platos/";
//         $config['file_name'] = $nombre_archivo;
//         $config['allowed_types'] ='jpg|jpeg|png';
//         $config['max_size'] = "50000";
//         $config['max_width'] = "2000";
//         $config['max_height'] = "2000";

//         $this->load->library('upload', $config);
        
//         if ($this->upload->do_upload($mi_archivo)) {
        
//          	 $data['uploadSuccess'] = $this->upload->data();
//         	$resultado = $data['uploadSuccess'];
//         }else{
//         	$resultado['file_name'] = "ejemplo.png";
//         }

       			if (!isset($_POST['nombreus'])) {
        		$_POST['nombreus'] = $_POST['nombre'];
        	}
        	if (!isset($_POST['descripcionus'])) {
        		$_POST['descripcionus'] = $_POST['descripcion'];
        	}


				 $this->db->query("INSERT INTO `menu` (`nombre`, `nombreus`, `descripcion`, `descripcionus`, `precio`, `categoria`, `activo`, `favorito`) 
					VALUES ('".$_POST['nombre']."', '".$_POST['nombreus']."', '".$_POST['descripcion']."','".$_POST['descripcionus']."','".$_POST['precio']."', '".$_POST['categoria']."', '1', '1');");


				 	redirect('crearPlato');

		}

		redirect('cartaAdmin');		
	}





	public function actualizarPlato()
	{











if (  isset($_GET['id'])  &&   isset($_POST['nombre']    )  && $_POST['nombre'] != ""   &&   isset($_POST['descripcion']    )  && $_POST['descripcion'] != ""  &&   isset($_POST['precio']    )  && $_POST['precio'] != "") {

				



// $nombre_archivo = str_replace(' ', '', $_POST['nombre']);  
// $nombre_archivo = $nombre_archivo;


// 		$mi_archivo = 'imagen';
//         $config['upload_path'] = "assets/images/platos/";
//         $config['file_name'] = $nombre_archivo;
//         $config['allowed_types'] ='jpg|jpeg|png';
//         $config['max_size'] = "50000";
//         $config['max_width'] = "2000";
//         $config['max_height'] = "2000";

//         $this->load->library('upload', $config);
        
//         if ($this->upload->do_upload($mi_archivo)) {
//            	 $data['uploadSuccess'] = $this->upload->data();

//         	$resultado = $data['uploadSuccess'];
//         }else{
// $resultado['file_name'] = "ejemplo.png";

        	
//         }

//        		 $data['uploadSuccess'] = $this->upload->data();

//         	$resultado = $data['uploadSuccess'];

       
        
       			if (!isset($_POST['nombreus'])) {
        		$_POST['nombreus'] = $_POST['nombre'];
        	}
        	if (!isset($_POST['descripcionus'])) {
        		$_POST['descripcionus'] = $_POST['descripcion'];
        	}


				 $this->db->query("UPDATE menu SET nombre = '".$_POST['nombre']."' , nombreus ='".$_POST['nombreus']."', descripcion = '".$_POST['descripcion']."' ,  descripcionus ='".$_POST['descripcionus'] ."', precio = '".$_POST['precio']."', categoria = '".$_POST['categoria']."'  WHERE id = ".$_GET['id']. " ");


					redirect('cartaAdmin');

		}

				
	}



	public function crearCategoria()
	{


		if (isset($_POST['nombre']    )     && $_POST['nombre'] != "") {

				

			echo $_POST['nombre'];

			echo ss;



				$this->db->query("INSERT INTO `categorias` ( `nombre`, `activo`) VALUES ('".$_POST['nombre']."', '1');");


					redirect('categorias');

		}


				
	}


	public function eliminarCategoria()
	{



				$this->db->query("DELETE FROM categorias WHERE id = ".$_GET['id']);


					redirect('categorias');

				
	}





	public function addFavoritos()
	{


					
				$this->db->query("UPDATE menu SET favorito = ".$_GET['favorito']."  WHERE id = ".$_GET['id']. " ");



					echo "ok";




	}



	public function activarPlato()
	{


				$this->db->query("UPDATE menu SET activo = ".$_GET['valor']."  WHERE id = ".$_GET['id']. " ");



					echo "ok";




	}

}

?>
