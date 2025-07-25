	

	<!-- footer -->
	<footer style="background: <?=  $opciones["colorfondoCabecera"]  ?>;border-color: <?=  $opciones["colorfondoCabecera"]  ?>;">
		<div class="container">


			<?php  if($opciones["redes"] == 1) { ?>

			<ul class="icon-social">



			<?php  if($opciones["face"] != "") { ?>

			<li class="facebook"><a href="<?=$opciones["face"] ?>"><i class="fa fa-facebook"></i></a></li>

			<?php } ?>



			<?php  if($opciones["twitter"] != "") { ?>

			<li class="twitter"><a href="<?=$opciones["twitter"] ?>"><i class="fa fa-twitter"></i></a></li>

			<?php } ?>



			<?php  if($opciones["insta"] != "") { ?>

			<li class="instagram"><a href="<?=$opciones["insta"] ?>"><i class="fa fa-instagram"></i></a></li>

			<?php } ?>


				

				

				
			</ul>
			<?php } ?>





<?php  if($opciones["contacto"] == 1) { ?>

			<div class="tel-fax-mail">
				<ul>

				<?php  if($opciones["tel"] != "") { ?>
				<li><span style="font-family: <?= $opciones["fuenteContacto"] ?>;font-size: <?= $opciones["pxFuenteContacto"] ?>px;color: <?= $opciones["colorContacto"] ?>;">Teléfono:<?= $opciones["tel"] ?></span> </li>
				<?php } ?>

				<?php  if($opciones["movil"] != "") { ?>
					<li><span style="font-family: <?= $opciones["fuenteContacto"] ?>;font-size: <?= $opciones["pxFuenteContacto"] ?>px;color: <?= $opciones["colorContacto"] ?>;">Movil:<?= $opciones["movil"] ?></span> </li>
				<?php } ?>
				<?php  if($opciones["mail"] != "") { ?>
					<li><span style="font-family: <?= $opciones["fuenteContacto"] ?>;font-size: <?= $opciones["pxFuenteContacto"] ?>px;color: <?= $opciones["colorContacto"] ?>;">E-Mail:<?= $opciones["mail"] ?></span> </li>
				<?php } ?>
				



				</ul>
			</div>

			<?php } ?>


			<div class="ft-bottom" style="background: <?=  $opciones["colorfondoCabecera"]  ?>;border-color: <?=  $opciones["colorfondoCabecera"]  ?>;">
				<span>Copyright © 2016 All Rights Reserved </span>
			</div>
		</div>
	</footer>
	<!-- end footer -->
	
	<!-- script -->
	<script src="<?= base_url()."/assets" ?>/js/jquery.min.js"></script>
	<script src="<?= base_url()."/assets" ?>/js/materialize.min.js"></script>
	<script src="<?= base_url()."/assets" ?>/js/slick.min.js"></script>
	<script src="<?= base_url()."/assets" ?>/js/owl.carousel.min.js"></script>
	<script src="<?= base_url()."/assets" ?>/js/custom.js"></script>
	<script>

window.onload = function() {
    // Acceder al elemento de la pantalla de carga
    var pantallaCarga = document.getElementById('pantallaCarga');
    // Ocultar la pantalla de carga
    pantallaCarga.style.display = 'none';
};

	</script>

</body>
</html>