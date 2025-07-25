<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Linkcontentpro_email
{
	function __construct()
	{
		$this->CI =& get_instance();
	}
	// Plantilla de correo electronico
	public function template($data = null)
	{
		// Cargamos la libreria email
		$this->CI->load->library('email');
		$config['mailtype'] = 'html';
		$config['priority'] = 1;
		$config['protocol'] = 'mail';
		// $config['protocol'] = 'smtp';
		// $config['smtp_host'] = 'appyweb.es';
		// $config['smtp_user'] = 'desarrollo@appyweb.es';
		// $config['smtp_pass'] = 'kalesi-2018';
		// $config['smtp_port'] = 587;
		$this->CI->email->initialize($config);
		$this->CI->email->from($data['from'], $data['fromName']);
		$this->CI->email->to($data['to']);
		$this->CI->email->subject($data['subject']);
		if (isset($data['file']))
		{
			$this->CI->email->attach($data['file']);
		}
		// Logotipo
		$logo = 'assets/images/logo.png';
		$this->CI->email->attach($logo);
		$cid = $this->CI->email->attachment_cid($logo);
		// ICONOS DE REDES SOCIALES
		// Facebook
		/*$icono_facebook = 'assets/images/social_icons/facebook.png';
		$this->CI->email->attach($icono_facebook);
		$facebook = $this->CI->email->attachment_cid($icono_facebook);*/
		// Twitter
		$icono_twitter = 'assets/images/social_icons/twitter.png';
		$this->CI->email->attach($icono_twitter);
		$twitter = $this->CI->email->attachment_cid($icono_twitter);
		// Google Plus
		$icono_google_plus = 'assets/images/social_icons/google_plus.png';
		$this->CI->email->attach($icono_google_plus);
		$google_plus = $this->CI->email->attachment_cid($icono_google_plus);
		// Instagram
		$icono_instagram = 'assets/images/social_icons/instagram.png';
		$this->CI->email->attach($icono_instagram);
		$instagram = $this->CI->email->attachment_cid($icono_instagram);
		// Whatsapp
		$icono_whatsapp = 'assets/images/social_icons/whatsapp.png';
		$this->CI->email->attach($icono_whatsapp);
		$whatsapp = $this->CI->email->attachment_cid($icono_whatsapp);
		// Cabecera
		$msg = '
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
			<title>LinkContentPro</title>
			<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="https:'.base_url("assets/css/font-awesome.min.css").'">
			<style>
				*{
					margin: auto;
					padding: 0;
					max-width: 960px;
				}
				body
				{
					color: #444444;
  					font-family: "Montserrat", "Helvetica Neue", Helvetica, Arial, sans-serif;
				}
				.text-center
				{
					text-align: center;
				}
				table{
					width: 100%;
				}
				table.center
				{
					width: auto;
					margin: auto;
				}
				table td
				{
					padding: 3% 20px;
				}
				.header{
					background-color: rgb(51, 51, 51);
					/*border-bottom: 2px solid #30a5ff;*/
					padding: 2%;
				}
				.content{
					font-size: 120%;
					text-align: justify;
				}
				.button{
					background-color: #30a5ff;
					border-radius: 5px;
					color: #FFF;
					padding: 10px 16px;
					text-decoration: none;
				}
				.button:hover{
					opacity: 0.8;
				}
				.bank_accounts{
					margin: auto;
				}
				.footer{
					border-top: 2px solid #30a5ff;
					font-size: 100%;
				}
				.social-icon
				{
					/*margin-top: 10px;*/
					padding: 0 2px;
					text-decoration: none;
				}
				.social-icon img
				{
					width: 32px;
				}
				@media screen and (max-width: 1023px)
				{
					.bank_accounts td
					{
						float: left;
						width: 70%;
					}
					.content{
						font-size: 90%;
					}
				}
			</style>
		</head>
		<body>
			
		<table cellpadding="10" class="header">
			<tr>
				<th>
					<img src="cid:'.$cid.'" alt="LinkContentPro" align="center">
				</th>
			</tr>
		</table>

		';
		// Contenido
		$msg .= isset($data['content']) ? $data['content'] : '';
		// Pie de Página
		$msg .= '

		<table cellpadding="10" class="footer">
			<tr>
				<td style="text-align: center;">
					<p>'.date("Y").' | &copy; LINKCONTENTPRO | <a href="https://linkcontentpro.com/preguntas-frecuentes/">FAQs</a> | <a href="https://panel.linkcontentpro.com/tools/politics/aviso_legal">Aviso legal</a> | <a href="https:'.base_url('suscripcion/').'">Desuscribirse de los correos de la plataforma</a>   
					<a href="https://twitter.com/linkcontentpro" class="social-icon twitter"><img src="cid:'.$twitter.'" alt="twitter"></a> 
					<a href="https://plus.google.com/u/2/107192603785511144302" class="social-icon google-plus"><img src="cid:'.$google_plus.'" alt="google plus"></a> 
					<a href="https://www.instagram.com/linkcontentpro/" class="social-icon instagram"><img src="cid:'.$instagram.'" alt="instagram"></a> 
					<a href="https://api.whatsapp.com/send?phone=34659078640" class="social-icon whatsapp"><img src="cid:'.$whatsapp.'" alt="whatsapp"></a></p>
				</td>
			</tr>
		</table>

		</body>
		</html>

		';
		// enviamos el mensaje
		$this->CI->email->message($msg);
		// Verificamos que se envie el correo
		 if ($this->CI->email->send())
		{
			return true;
		}
		else
		{
			return false;
		}
		/*Retorno de la plantilla
		return $msg;*/
	}
}

?>