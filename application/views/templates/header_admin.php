<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <title><?= $opciones["nombre"] ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1  maximum-scale=1 user-scalable=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="HandheldFriendly" content="True">
	
	<link rel="shortcut icon" href="<?= base_url()."/assets" ?>/img/favicon.png">
	<link rel="stylesheet" href="<?= base_url()."/assets" ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url()."/assets" ?>/css/materialize.min.css">
	<link rel="stylesheet" href="<?= base_url()."/assets" ?>/css/slick.css">
	<link rel="stylesheet" href="<?= base_url()."/assets" ?>/css/slick-theme.css">
	<link rel="stylesheet" href="<?= base_url()."/assets" ?>/css/owl.carousel.css">
	<link rel="stylesheet" href="<?= base_url()."/assets" ?>/css/owl.theme.css">
	<link rel="stylesheet" href="<?= base_url()."/assets" ?>/css/owl.transitions.css">
	<link rel="stylesheet" href="<?= base_url()."/assets" ?>/css/style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- CSS de Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Scripts de jQuery y Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="<?= base_url()."assets/fonts/" ?>fuentes.php" type="text/css">
<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

   
</head>
<body>

<style>
      :root {
            --color-acento: <?= $opciones["color_acento"]; ?>; /* Color de acento desde PHP */
            --color-categoria: <?= $opciones["color_categoria"]; ?>; /* Color de acento desde PHP */
            --color-precio: <?= $opciones["color_precio"]; ?>; /* Color de acento desde PHP */
      
        }

        label{color:black}
        h5{

color:white;

        }



        .custom-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            
            .custom-table, .custom-table th, .custom-table td {
                border: 1px solid #ddd;
            }
            
            .custom-table th, .custom-table td {
                padding: 10px;
                text-align: left;
                font-size: 16px; /* Ajustar según el diseño */
            }
            
            .custom-table th {
                background-color: #686565; /* Color de acento desde PHP */
                color: white;
            }
            
            .custom-table tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            
            .custom-table tr:hover {
                background-color: #ddd;
            }
            
            .custom-button {
              background-color: #20b528; /* Color oscuro para el botón */
                                                        color: #fff; /* Texto blanco */
                                                        border: none; /* Sin borde */
                                                        padding: 5px 10px; /* Padding generoso para un botón más grande */
                                                        font-size: 12px; /* Tamaño de fuente más grande */
                                                  
                                                        transition: all 0.3s ease-in-out; /* Transición suave para los efectos de hover */
                                                        cursor: pointer; /* Cursor en forma de mano al pasar el mouse */
                                                        text-transform: uppercase; /* Texto en mayúsculas */
                                                        font-weight: bold; /* Texto en negrita */
                                                        letter-spacing: 1px; /* Espaciado de letras para un aspecto más refinado */
                                                        outline: none;
            }


            .custom-button:hover {
        background-color: #555; /* Oscurecer el botón al pasar el mouse */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); /* Sombra más pronunciada para el efecto de elevación */
    }
    .custom-button:active {
        transform: translateY(2px); /* Efecto de presión al hacer clic */
    }

    .btnBorrar {
  background-color: #ff4757; /* Color de fondo */
  color: white; /* Color del texto */
  border: none; /* Eliminar el borde */
  padding: 10px 20px; /* Espaciado interno */
  text-align: center; /* Alineación del texto */
  text-decoration: none; /* Sin subrayado en el texto */
  display: inline-block; /* Tipo de display */
  font-size: 16px; /* Tamaño del texto */
  margin: 4px 2px; /* Margen externo */
  transition-duration: 0.4s; /* Duración de la transición */
  cursor: pointer; /* Forma del cursor */

  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Sombra sutil */
}

.btnBorrar:hover {
  background-color: #ff6b81; /* Color de fondo al pasar el ratón */
  color: white; /* Color del texto al pasar el ratón */
}

    </style>

      <script>
const base_url = "<?= base_url() ?>"

</script>
    <!-- navbar -->
    <div class="navbar" style="background: <?=  $opciones["colorfondoCabecera"]  ?>;border-color: <?=  $opciones["colorfondoCabecera"]  ?>;">
    <div class="container" style="max-width: 100% !important;">
        <div class="panel-control-left site-title" style="float:left">
        <?php if($opciones["nombre_logo"] == 0) { ?>

          <h1 id="txtLogo" style="font-family: <?= $opciones["fuenteCabecera"] ?>;font-size: <?= $opciones["pxFuenteCabecera"] ?>px;color: <?= $opciones["color_acento"] ?>;"><?= $opciones["nombre"] ?></h1>

<?php }else{ ?>


<img id="imgLogoCabecera" style="width: <?=  $opciones["pxFuenteCabecera"]  ?>px" src="<?= $opciones["logo"]  ?>">

<?php } ?>
        </div>
        <div class="site-title">
 

        </div>
        <div class="panel-control-right" style="margin-top: 10px;">
            <ul style="list-style-type: none; margin: 0; padding: 0; display: flex; justify-content: flex-end;">
                <li style="margin: 0 10px;"><a href="<?= base_url()."administracion" ?>"  style="color: white !important; text-decoration: none;"><h5>PLATOS</h5></a></li>
                <li style="margin: 0 10px;"><a href="<?= base_url()."familias" ?>"  style="color: white; text-decoration: none;"><h5>CATEGORIAS</h5></a></li>
          
                <li style="margin: 0 10px;"><a href="<?= base_url()."opciones" ?>" style="color: white; text-decoration: none;"><h5>OPCIONES</h5></a></li>
                <li style="margin: 0 10px;"><a href="<?= base_url()."qr" ?>" style="color: white; text-decoration: none;"><h5>CODIGO QR</h5></a></li>
            </ul>
        </div>
    </div>
</div>

	<!-- end navbar -->