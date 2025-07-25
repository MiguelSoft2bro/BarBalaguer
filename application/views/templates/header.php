<!DOCTYPE html>
<html lang="es">
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

   
</head>
<body>
<div id="pantallaCarga">
    <img src="<?= $opciones["logopreloader"] ?>" alt="Logo" id="logoCarga">
    
</div>

<style>
      :root {
            --color-acento: <?= $opciones["color_acento"]; ?>; /* Color de acento desde PHP */
            --color-categoria_acento: <?= $opciones["color_categoria_acento"]; ?>; /* Color de acento desde PHP */
            --color-categoria: <?= $opciones["color_categoria"]; ?>; /* Color de acento desde PHP */
            --color-precio: <?= $opciones["color_precio"]; ?>; /* Color de acento desde PHP */
            --font-precio: <?= $opciones["pxFuentePrecio"]; ?>px; /* Color de acento desde PHP */
            --font-fuenteprecio: <?= $opciones["fuentePrecio"]; ?>; /* Color de acento desde PHP */
            --color-nombre: <?= $opciones["colorPlato"]; ?>; /* Color de acento desde PHP */
            --font-nombre: <?= $opciones["pxFuentePlato"]; ?>px; /* Color de acento desde PHP */
            --font-fuentePlato: <?= $opciones["fuentePlato"]; ?>; /* Color de acento desde PHP */
      
        }


        #contenedorCarga {
    position: relative; /* O 'absolute' si necesitas que sea relativo a un contenedor padre */
    top: 0;
    left: 0;
    width: 100%;
    height: 150%; /* Aumentado a 150% de la altura */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9998;
}

#pantallaCargaModificada {
    width: auto; /* Ajusta según necesidad */
    height: 200px; /* Ajusta según necesidad */
    background-color: #fff; /* Ajusta el color de fondo según necesidad */
    margin-top: 40%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

#logoAnimado {
    width: 100px; /* Ajusta este valor según el tamaño de tu logo */
    height: auto;
    animation: pulsar 1.5s ease-in-out infinite;
}

@keyframes pulsar {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1); /* Aumenta el tamaño en un 10% */
    }
    100% {
        transform: scale(1);
    }
}



#pantallaCarga {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

#logoCarga {
    width: 100px; /* Ajusta este valor según el tamaño de tu logo */
    height: auto;
    animation: pulsar 1.5s ease-in-out infinite;
}

@keyframes pulsar {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.1); /* Aumenta el tamaño en un 10% */
    }
    100% {
        transform: scale(1);
    }
}



        label{color:black}
        h5{

color:white;

        }





.txtNombre{

font-size: var(--font-nombre);
color: var(--color-nombre);
font-family: var(--font-fuentePlato);


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
                background-color: var(--color-acento); /* Color de acento desde PHP */
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

.tabs .indicator{
    background-color: transparent;
}


.tabs .tab a {
  color: var(--color-categoria);
  display: block;
  width: 100%;
  height: 100%;
  padding: 0 24px;
  font-size: 14px;
  text-overflow: ellipsis;
  overflow: hidden;
  transition: color .28s ease;
}

.tabs .tab a:hover, .tabs .tab a.active {
  background-color: transparent;
  color:  var(--color-categoria_acento);
}



    </style>

      <script>

const base_url = "<?= base_url() ?>"

</script>
    <!-- navbar -->
    <div class="navbar" style="background: <?=  $opciones["colorfondoCabecera"]  ?>;border-color: <?=  $opciones["colorfondoCabecera"]  ?>;">
    <div class="container" style="max-width: 100% !important;">
        <div class="panel-control-left site-title" style="float:left">
    
        </div>
        <div class="site-title">
        <?php if($opciones["nombre_logo"] == 0) { ?>

<h1 id="txtLogo" style="font-family: <?= $opciones["fuenteCabecera"] ?>;font-size: <?= $opciones["pxFuenteCabecera"] ?>px;color: <?= $opciones["color_acento"] ?>;"><?= $opciones["nombre"] ?></h1>

<?php }else{ ?>


<img id="imgLogoCabecera" style="width: <?=  $opciones["pxFuenteCabecera"]  ?>px" src="<?= $opciones["logo"]  ?>">

<?php } ?>
        </div>
        <div class="panel-control-right" style="">
        <a href="#" data-activates="slide-out-right" class="sidenav-control-right"><i class="fa fa-info-circle"></i></a>
        </div>
    </div>
</div>

	<!-- end navbar -->


	<!-- panel control right -->
	<div class="panel-control-right">
		<div id="slide-out-right" class="side-nav">

				<?php
				
				foreach($alergenos as $alergeno){ ?>
		<div class="entry" style="background: white; box-shadow: none; display: flex; align-items: center;">
  <div class="image-container" style="flex: 0 0 auto; margin-right: 10px;">
    <img src="<?= base_url()."assets/img/alergenos/".$alergeno["imagen"].".png" ?>" alt="" style="max-width: 50px;"> <!-- Ajuste en max-width -->
  </div>
  <div class="desc-container">
  <h6 style=" margin:0px; font-family: <?= $opciones["fuenteAlergenos"] ?>;font-size: <?= $opciones["pxFuenteAlergenos"] ?>px;color: <?= $opciones["colorAlergenos"] ?>;"><?= $alergeno["nombre"]?></h6>
  </div>
</div>


				
			<?php } ?>
			
			



		</div>
	</div>
	<!-- end panel control right -->
  