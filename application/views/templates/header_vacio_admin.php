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

</head>
<body>

<style>
        :root {
            --color-acento: <?= $opciones["color_acento"]; ?>; /* Color de acento desde PHP */
            --color-categoria: <?= $opciones["color_categoria"]; ?>; /* Color de acento desde PHP */
            --color-precio: <?= $opciones["color_precio"]; ?>; /* Color de acento desde PHP */
      
        }
    </style>

      <script>

const base_url = "<?= base_url() ?>"

</script>
    <!-- navbar -->
    <div class="navbar">
		<div class="container">
			<div class="panel-control-left">
				
			</div>
			<div class="site-title">

			<?php if($opciones["nombre_logo"] == 0) { ?>

				<a  class="logo"><h1><?= $opciones["nombre"] ?></h1></a>

<?php }else{ ?>


	<a  class="logo"><img src="<?= $opciones["logo"]  ?>"></a>

<?php } ?>

			</div>
			<div class="panel-control-right">
				
			</div>
		</div>
	</div>
	<!-- end navbar -->