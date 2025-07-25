<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Linkcontentpro_session
{
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('session');
	}
	// Verifica si un usuario ha iniciado sesion
	public function very_session($url = null)
	{
		if (!$this->CI->session->userdata('userId'))
		{
			$this->CI->session->set_userdata('redireccion_login', current_url());
			redirect(base_url());
		}
	}
	// Verifica si un usuario ha iniciado sesion, para evitar que haga login de nuevo
	public function very_login()
	{
		if ($this->CI->session->userdata('userId'))
		{
			$type_user = $this->CI->session->userdata('tipo');
			switch ($type_user)
			{
				case 0:
					redirect(base_url('homeAdmin'));
					break;
				case 1:
					redirect(base_url('homeClient'));
					break;
				case 2:


				if ($this->CI->session->userdata('examen')!=5) {
							redirect(base_url('PruebaAcceso'));
					}else{
						if ($this->CI->session->userdata('pruebaRedactor')==2) {

							redirect(base_url('HomeRedactor'));
							}else{

								redirect(base_url('/redactor/prueba/pedidos'));

							}
					}

				
					break;
				case 3:



					redirect(base_url('HomeSpin'));
					break;
                case 4:
                    redirect(base_url('Trabajador_Externo'));
                    break;
                case 5:
                	redirect(base_url('homehibrid'));
                	break;
            	 case 6:
	            	redirect(base_url('revisar/text'));
	            	break;
            	case 7:
	            	redirect(base_url('supervisar'));
	            	break;
            	case 8:
	            	redirect(base_url('cuenta_cerrada'));
	            	break;
            	case 9:
	            	redirect(base_url('coordinador/coordinar'));
	            	break;
	            		case 10:
	            	redirect(base_url('fotografo/fotografo'));
	            	break;
				default:
					redirect(base_url('home'));
					break;
			}
		}
	}
	// Verificar si un usuario tiene permisos de administrador
	public function very_admin($url = 'home')
	{
		if ($this->CI->session->userdata('tipo') != 0)
		{
			redirect(base_url($url));
		}
	}


	public function very_coordinator($url = 'home')
	{
		if ($this->CI->session->userdata('tipo') != 0  &&  $this->CI->session->userdata('tipo') != 9 &&  $this->CI->session->userdata('userId') != 392 &&  $this->CI->session->userdata('userId') != 403 &&  $this->CI->session->userdata('userId') != 497 &&  $this->CI->session->userdata('userId') != 497 &&  $this->CI->session->userdata('userId') != 550 &&  $this->CI->session->userdata('userId') != 1445 )
		{
			redirect(base_url($url));
		}
	}

	// Verifica un usuario de acuerdo al tipo
	public function very_type_user($tipo)
	{
		if ($this->CI->session->userdata('tipo') != $tipo)
		{
			redirect(base_url());
		}
	}
	// Verificar si la ID de sesion es igual a la ID insertada
	public function very_user_id($id)
	{
		if ($this->CI->session->userdata('userId') == $id)
		{
			redirect(base_url('users'));
		}
	}
	// Verifica si la ID de sesion es diferente a la ID insertada
	public function very_client($id)
	{
		if ($this->CI->session->userdata('userId') != $id  && $this->CI->session->userdata('tipo') != 0 && $this->CI->session->userdata('tipo') != 7 &&  $this->CI->session->userdata('tipo') != 9 &&  $this->CI->session->userdata('userId') != 392 &&  $this->CI->session->userdata('userId') != 403 &&  $this->CI->session->userdata('userId') != 497 &&  $this->CI->session->userdata('userId') != 497 &&  $this->CI->session->userdata('userId') != 550)
		{
			redirect(base_url());
		}
	}
	public function very_redactor($id)
	{
		if ($this->CI->session->userdata('userId') != $id && $this->CI->session->userdata('tipo') != 0 && $this->CI->session->userdata('tipo') != 9 && $this->CI->session->userdata('tipo') != 6 && $this->CI->session->userdata('tipo') != 10)
		{
			redirect(base_url());
		}
	}
	// Verifica si un usuario es redactor texto, hibrido o admin
	public function very_redactor_text()
	{
		if ($this->CI->session->userdata('tipo') != 2 && $this->CI->session->userdata('tipo') != 10 && $this->CI->session->userdata('tipo') != 5 && $this->CI->session->userdata('tipo') != 0 && $this->CI->session->userdata('tipo') != 9 && $this->CI->session->userdata('tipo') != 6)
		{
			redirect(base_url());
		}
	}
	// Verifica si un usuario es redactor spin, hibrido o admin
	public function very_redactor_spin()
	{
		if ($this->CI->session->userdata('tipo') != 3 && $this->CI->session->userdata('tipo') != 5 && $this->CI->session->userdata('tipo') != 9 && $this->CI->session->userdata('tipo') != 0 && $this->CI->session->userdata('tipo') != 6)
		{
			redirect(base_url());
		}
	}

	public function very_redactorEspecial_palabrasAcumulado($palabrasAcumulado)
	{
		if ($palabrasAcumulado >= 35000 )
		{
			$var = true;
		}else{
			$var = false;
		}

		return $var;
	}
}

?>