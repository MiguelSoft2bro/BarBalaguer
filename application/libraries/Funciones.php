<?php


class Funciones
{
	

public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->database();
		$this->CI->load->library('PHPMailer');
		$this->CI->load->library('SMTP');
		$this->CI->load->library('Exception');
		$this->CI->load->helper('file');
	}




 public function send_mail_pre_caducar($sub){

 $user = $this->CI->db->query("SELECT * FROM users where id = ".$sub["idusuario"] )->row_array();


$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->Host = 'smtp1.s.ipzmarketing.com';
    $mail->Username = 'ejrmpolwdpkg';
    $mail->Password = '93IkB_nxWGHMOw'; // Set your SMTP password here

    $mail->setFrom('info@senoriodeguadalest.com');
    $mail->addAddress($user['email']);

	// $contenido = read_file(base_url().'/assets/plantillas_correo/plantilla1.txt');

    $mail->isHTML(true);
    $mail->Subject = 'Suscripcion apunto de caducar';
    $mail->Body    = 'La suscripcion con numero de orden: '.$sub['order_reference'].' caduca en 7 dias, la renovacion se hara de forma automatica el dia '.$sub['end_date'];

    $mail->send();


    return 1;
} catch (Exception $e) {
   return 0;
}







 }














 public function validarApp($datos){



    if ($datos == null  ) {
      return false;
    }else{

        if (!isset($datos["code"]) || !isset($datos["name"])   || $datos["code"] == null || $datos["name"] == null ) {
            return false;
        }else{


          $codeCron = $this->CI->db->query("SELECT * FROM apcodes where nombre = '".$datos['name']."' " )->row_array();


          if ($codeCron !== null) {
          
        

            if (password_verify($datos["code"], $codeCron['code'])) {
               return true;
            } else {
                return false;
            }
             
 		 }else{
 		 	return false;
 		 }



        }



   }





 }





	
}











 ?>