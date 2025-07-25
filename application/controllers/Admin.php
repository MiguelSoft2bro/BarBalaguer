<?php

/**
* 
*/
class Admin extends CI_Controller
{
	public $module = 'home';

	public function __construct()
	{

		parent::__construct();
		  $this->load->library('session');


      
          
	}














	public function activarAlergenos($idArticulo,$idAlergeno)
	{


        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

        $data = array(
            'idArticulo' => $idArticulo,
            'idAlergeno' => $idAlergeno 
    );
    
    $this->db->insert('articulos_alergenos', $data);
    }






	public function quitarAlergenos($idArticulo,$idAlergeno)
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
        $this->db->where('idArticulo', $idArticulo);
        $this->db->where('idAlergeno', $idAlergeno);
        $this->db->delete('articulos_alergenos');
    }





	public function actualizarlogoqr()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
          // Cargar la librería de subida y configurar las preferencias
          $this->load->library('upload');
          $config['upload_path'] = './assets/img/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size'] = 2048;
          $config['encrypt_name'] = TRUE;
          $this->upload->initialize($config);
  
          // Intentar subir el archivo
          if (!$this->upload->do_upload('imagen')) {
              // Manejo de errores en la subida
              $error = array('error' => $this->upload->display_errors());
            
          } else {
              // Subida exitosa, $data tiene información sobre el archivo subido
              $data = array('upload_data' => $this->upload->data());
             
  
              $urlArchivoSubido = base_url() . 'assets/img/' . $data['upload_data']['file_name'];
  
  
              $data = array(
              'logoqr' => $urlArchivoSubido,
              );
      
              $this->db->where('id',1);
              $this->db->update('opciones', $data);
  
              
              $resp["img"] = $urlArchivoSubido;
          }
  




    }


	public function actualizarlogopreloader()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
          // Cargar la librería de subida y configurar las preferencias
          $this->load->library('upload');
          $config['upload_path'] = './assets/img/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size'] = 2048;
          $config['encrypt_name'] = TRUE;
          $this->upload->initialize($config);
  
          // Intentar subir el archivo
          if (!$this->upload->do_upload('imagen')) {
              // Manejo de errores en la subida
              $error = array('error' => $this->upload->display_errors());
            
          } else {
              // Subida exitosa, $data tiene información sobre el archivo subido
              $data = array('upload_data' => $this->upload->data());
             
  
              $urlArchivoSubido = base_url() . 'assets/img/' . $data['upload_data']['file_name'];
  
  
              $data = array(
              'logopreloader' => $urlArchivoSubido,
              );
      
              $this->db->where('id',1);
              $this->db->update('opciones', $data);
  
              
              $resp["img"] = $urlArchivoSubido;
          }
  




    }
	public function actualizarLogo()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
          // Cargar la librería de subida y configurar las preferencias
          $this->load->library('upload');
          $config['upload_path'] = './assets/img/';
          $config['allowed_types'] = 'gif|jpg|png';
          $config['max_size'] = 2048;
          $config['encrypt_name'] = TRUE;
          $this->upload->initialize($config);
  
          // Intentar subir el archivo
          if (!$this->upload->do_upload('imagen')) {
              // Manejo de errores en la subida
              $error = array('error' => $this->upload->display_errors());
            
          } else {
              // Subida exitosa, $data tiene información sobre el archivo subido
              $data = array('upload_data' => $this->upload->data());
             
  
              $urlArchivoSubido = base_url() . 'assets/img/' . $data['upload_data']['file_name'];
  
  
              $data = array(
              'logo' => $urlArchivoSubido,
              );
      
              $this->db->where('id',1);
              $this->db->update('opciones', $data);
  
              
              $resp["img"] = $urlArchivoSubido;
          }
  




    }


    public function actualizarpxLogo()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'pxLogo' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

 }
    public function actualizarpxFuenteDescCat()
	{

        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["valor"])){

    $data = array(
        'pxFuenteDescCat' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

 }

    public function actualizarcolorDescCat()
	{

        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["valor"])){

    $data = array(
        'colorDescCat' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

 }

    
	public function actualizarfuenteDescCat()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'fuenteDescCat' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

 }

    
	public function actualizarNombreLogo()
	{

        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["valor"])){

    $data = array(
        'nombre_logo' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

    }





	public function actualizarpxFuenteContacto()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'pxFuenteContacto' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}




	public function actualizarcolor1qr()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["color"])){

    $data = array(
        'color1qr' => $_POST["color"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   


    echo 1;

}else{
    echo 0;
}

}


	public function actualizarcolor2qr()
	{

        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["color"])){

    $data = array(
        'color2qr' => $_POST["color"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   


    echo 1;

}else{
    echo 0;
}

}


	public function actualizarcolorCategoriasAcento()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["color"])){

    $data = array(
        'color_categoria_acento' => $_POST["color"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   


    echo 1;

}else{
    echo 0;
}

}

	public function actualizarcolorContacto()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'colorContacto' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}






	public function actualizarpxFuenteAlergenos()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'pxFuenteAlergenos' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}





	public function actualizarcolorAlergenos()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'colorAlergenos' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}




	public function actualizarpxFuentePrecio()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'pxFuentePrecio' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}




	public function actualizarpxFuentePlato()
	{

        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["valor"])){

    $data = array(
        'pxFuentePlato' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}



	public function actualizarcolorPlato()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["valor"])){

    $data = array(
        'colorPlato' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}


	public function actualizarpxFuenteCategorias()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'pxFuenteCategorias' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}





	public function actualizarcolorfondoCabecera()
	{

        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["valor"])){

    $data = array(
        'colorfondoCabecera' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}


	public function actualizarpxFuenteCabecera()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'pxFuenteCabecera' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}


	public function actualizarfuenteContacto()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'fuenteContacto' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}


	public function actualizarfuenteAlergenos()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'fuenteAlergenos' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}

	public function actualizarfuentePlato()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'fuentePlato' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}




	public function actualizarfuentePrecio()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["valor"])){

    $data = array(
        'fuentePrecio' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}


	public function actualizarfuenteCategorias()
	{

        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["valor"])){

    $data = array(
        'fuenteCategorias' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}





	public function actualizarfuenteCabecera()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'fuenteCabecera' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}


	public function actualizarcontacto()
	{

        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["valor"])){

    $data = array(
        'contacto' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}




	public function actualizarredes()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'redes' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}




	public function actualizareAlergenos()
	{

        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["valor"])){

    $data = array(
        'mostrarAlergenos' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

}



	public function actualizarestiloCarta()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["valor"])){

    $data = array(
        'estiloCarta' => $_POST["valor"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

    }

	public function actualizarColorCategorias()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["color"])){

    $data = array(
        'color_categoria' => $_POST["color"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

    }



	public function actualizarColorPrecio()
	{

        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["color"])){

    $data = array(
        'color_precio' => $_POST["color"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

    }


	public function actualizarColorAcentuado()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["color"])){

    $data = array(
        'color_acento' => $_POST["color"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

    }





    
	public function actualizarTel()
	{

        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["url"])){

    $data = array(
        'tel' => $_POST["url"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

    }



    
	public function actualizarMovil()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["url"])){

    $data = array(
        'movil' => $_POST["url"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

    }



    
	public function actualizarMail()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["url"])){

    $data = array(
        'mail' => $_POST["url"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

    }




    
	public function actualizarInsta()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["url"])){

    $data = array(
        'insta' => $_POST["url"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

    }




	public function actualizartwitter()
	{

        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["url"])){

    $data = array(
        'twitter' => $_POST["url"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

    }
	public function actualizarFace()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["url"])){

    $data = array(
        'face' => $_POST["url"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

    }

    
	public function actualizarNombre()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
if(isset($_POST["nombre"])){

    $data = array(
        'nombre' => $_POST["nombre"]
);

$this->db->where('id', 1);
$this->db->update('opciones', $data);
   

    echo 1;

}else{
    echo 0;
}

    }






	public function borrarCategoria()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["id"])){


    $this->db->where('IDFamilia', $_POST["id"]);
    $this->db->delete('familias');

    echo 1;

}else{
    echo 0;
}

    }


	public function borrarPlato()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

if(isset($_POST["id"])){


    $this->db->where('IDArticulo', $_POST["id"]);
    $this->db->delete('articulos');

    echo 1;

}else{
    echo 0;
}

    }


	public function crearFamilia()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

        if(isset($_POST["code"])){


            
            $data = array(
                'Orden' =>0,
                'Familia' => "",
                'Activo' => 0
        );
        
        $this->db->set($data);
        $this->db->insert('familias');

        $datos["insert_id"] = $this->db->insert_id();

    

echo json_encode($datos);
        }else{
           echo 0;
        }


    }


	public function crearPlato()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

        if(isset($_POST["code"])){


            
            $data = array(
                'Orden' =>0,
                'Articulo' => "",
                'IDFamilia' => 0,
                'PVP' => "0,00",
                'Activo' => 0
        );
        
        $this->db->set($data);
        $this->db->insert('articulos');

        $datos["insert_id"] = $this->db->insert_id();

        
        $query = $this->db->get('familias');

        $datos["familias"] = $query->result_array();



echo json_encode($datos);
        }else{
           echo 0;
        }


    }




	public function actualizarFamilia()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
      
        $resp = array();

        if(isset($_POST["id"])){
            $data = array(
                'Orden' => $_POST["orden"],
                'Familia' => $_POST["familia"],
                'descripcion' => $_POST["desc"],
                'desc_cat' => $_POST["desc_cat"],
                'Activo' => $_POST["activo"],
                'conImagen' => $_POST["conImagen"],
            );
    
            $this->db->where('IDFamilia', $_POST["id"]);
            $this->db->update('familias', $data);
    
            // Cargar la librería de subida y configurar las preferencias
        $this->load->library('upload');
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);

        // Intentar subir el archivo
        if (!$this->upload->do_upload('imagen')) {
            // Manejo de errores en la subida
            $error = array('error' => $this->upload->display_errors());
            
        } else {
            // Subida exitosa, $data tiene información sobre el archivo subido
            $data = array('upload_data' => $this->upload->data());
           

            $urlArchivoSubido = base_url() . 'assets/img/' . $data['upload_data']['file_name'];


            $data = array(
            'imagen' => $urlArchivoSubido,
            );
    
            $this->db->where('IDFamilia', $_POST["id"]);
            $this->db->update('familias', $data);

            
            $resp["img"] = $urlArchivoSubido;
        }


            $resp["estado"] = 1;
    
            echo json_encode($resp);  // Indica éxito
            
        } else {
            
            $resp["estado"] = 0;
            echo json_encode($resp); 
        }

    }


	public function actualizarPlato()
	{

    
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }

        if(isset($_POST["id"])){


            
            $data = array(
                'Orden' =>$_POST["orden"],
                'Articulo' => $_POST["articulo"],
                'IDFamilia' => $_POST["familia"],
                'PVP' => $_POST["pvp"],
                'Activo' => $_POST["activo"],
                'conImagen' => $_POST["conImagen"],
        );
        
        $this->db->where('IDArticulo', $_POST["id"]);
        $this->db->update('articulos', $data);

  // Cargar la librería de subida y configurar las preferencias
  $this->load->library('upload');
  $config['upload_path'] = './assets/img/';
  $config['allowed_types'] = 'gif|jpg|png';
  $config['max_size'] = 2048;
  $config['encrypt_name'] = TRUE;
  $this->upload->initialize($config);

  // Intentar subir el archivo
  if (!$this->upload->do_upload('imagen')) {
      // Manejo de errores en la subida
      $error = array('error' => $this->upload->display_errors());
    
  } else {
      // Subida exitosa, $data tiene información sobre el archivo subido
      $data = array('upload_data' => $this->upload->data());
     

      $urlArchivoSubido = base_url() . 'assets/img/' . $data['upload_data']['file_name'];


      $data = array(
      'imagen' => $urlArchivoSubido,
      );

      
      $this->db->where('IDArticulo', $_POST["id"]);
      $this->db->update('articulos', $data);

      
      $resp["img"] = $urlArchivoSubido;
  }


      $resp["estado"] = 1;

      echo json_encode($resp);  // Indica éxito
      
  } else {
      
      $resp["estado"] = 0;
      echo json_encode($resp); 
  }

    }

	public function importar()
	{
        if (!isset($this->session->userdata()['admin'])) {
            redirect("administracion");
 
           }
        if (($handle = fopen("C:\Users\MIGUEL\Desktop/articulos.csv", "r")) !== FALSE) {
            // Lee los nombres de las columnas en la primera fila (y los ignora)
            fgetcsv($handle, 1000, ";");

            $columnas = fgetcsv($handle, 1000, ",");

  // Encuentra los índices de las columnas deseadas
  $indexIDArticulo = array_search('IDArticulo', $columnas);
  $indexOrden = array_search('Orden', $columnas);
  $indexArticulos = array_search('Articulos', $columnas);
  $indexIDFamilia = array_search('IDFamilia', $columnas);
  $indexPVP = array_search('PVP1', $columnas); // Asume que la columna PVP en el CSV se llama PVP1
  $indexActivo = array_search('Activo', $columnas);


            // Recorre las filas del archivo
            while (($fila = fgetcsv($handle, 1000, ";")) !== FALSE) {
                // Aplica utf8_encode a cada valor de la fila si es necesario
                $fila = array_map('utf8_encode', $fila);
    
                $data = array(
                    'IDArticulo' => $fila[0],
                    'Orden' => $fila[2],
                    'Articulo' => $fila[3],
                    'IDFamilia' => $fila[4],
                    'PVP' => $fila[18],
                    'Activo' => 0
                );
    
    
                // $this->db->insert('articulos', $data);

              

            }
    
            // Cierra el archivo
            fclose($handle);
    
            echo "Importación de artículos completada con éxito.";
        } else {
            echo "Error al abrir el archivo de artículos.";
        }


    }


	public function administracion()
	{

        $query = $this->db->get('opciones');

            $data["opciones"] = $query->row_array();



        $query = $this->db->get('alergenos');

            $data["alergenos"] = $query->result_array();


		if (!isset($this->session->userdata()['admin'])) {
			
$this->load->view('templates/header_vacio_admin',$data);
$this->load->view('administrator/login_view',$data);
$this->load->view('templates/footer_admin',$data);

		}else{



            $query = $this->db->get('familias');

            $data["familias"] = $query->result_array();


            $this->db->select('*'); // Especifica las columnas que deseas obtener
            $this->db->from('articulos');
            
            $this->db->order_by('Activo', 'DESC'); // Ordena los resultados
            $query = $this->db->get();
            
            $data["articulos"] = $query->result_array();

$this->load->view('templates/header_admin',$data);

$this->load->view('administrator/home_admin_platos_view',$data);

$this->load->view('templates/footer_admin',$data);









}


}	






public function opciones()
{
    $query = $this->db->get('opciones');

    $data["opciones"] = $query->row_array();


    if (!isset($this->session->userdata()['admin'])) {
        
$this->load->view('templates/header_vacio_admin',$data);
$this->load->view('administrator/login_view',$data);
$this->load->view('templates/footer_admin',$data);

    }else{

        $fuentesSeguras = ["Arial", "Georgia", "Times New Roman", "Verdana", "Courier New"];
        $fuentesPersonalizadas = scandir('./assets/fonts/');

        $fuentesPersonalizadas = array_filter($fuentesPersonalizadas, function($nombre) {
            return strpos($nombre, '.woff') || strpos($nombre, '.ttf');
        });

// Opcional: Formatea los nombres de las fuentes personalizadas para que sean más legibles
$fuentesPersonalizadas = array_map(function($nombre) {
    return preg_replace('/\.(woff|ttf)$/', '', $nombre); // Elimina la extensión del archivo
}, $fuentesPersonalizadas);

// Combina las fuentes seguras con las personalizadas
$fuentes = array_merge($fuentesSeguras, $fuentesPersonalizadas);

$data["fuentes"] = $fuentes;



        $query = $this->db->get('opciones');

        $data["opciones"] = $query->row_array();


$this->load->view('templates/header_admin',$data);
$this->load->view('administrator/home_admin_opciones_view',$data);
$this->load->view('templates/footer_admin',$data);









}


}	

public function familias()
{

    $query = $this->db->get('opciones');

    $data["opciones"] = $query->row_array();

    if (!isset($this->session->userdata()['admin'])) {
        
$this->load->view('templates/header_vacio_admin',$data);
$this->load->view('administrator/login_view',$data);
$this->load->view('templates/footer_admin',$data);

    }else{



        $query = $this->db->get('familias');

        $data["familias"] = $query->result_array();


$this->load->view('templates/header_admin',$data);
$this->load->view('administrator/home_admin_familias_view',$data);
$this->load->view('templates/footer_admin',$data);









}


}	




public function qr()
{

    $query = $this->db->get('opciones');

    $data["opciones"] = $query->row_array();

    if (!isset($this->session->userdata()['admin'])) {
        
$this->load->view('templates/header_vacio_admin',$data);
$this->load->view('administrator/login_view',$data);
$this->load->view('templates/footer_admin',$data);

    }else{



        $query = $this->db->get('familias');

        $data["familias"] = $query->result_array();


$this->load->view('templates/header_admin',$data);
$this->load->view('administrator/home_admin_qr_view',$data);
$this->load->view('templates/footer_admin',$data);









}


}	














public function getOptions()
	{


        $query = $this->db->get('opciones');

        $data["opciones"] = $query->row_array();

        echo json_encode($data);
    }



public function loginAdmin()
	{

	
$user = $_POST['loginEmail'];
$pass = md5($_POST['loginPassword']);

if($user == "admin" && $pass="Alicante69"){


    $this->session->set_userdata('admin',true);
    $this->session->set_userdata('user',$user);

    echo 1;


}else{

    echo 0;
}




	}








}

?>