
	<div class="menu app-section" style="padding: 0px;">
		<div class="container">
			<div class="app-title">
				
			</div>
			<div class="content">
            <div class="arrow left-arrow">&#9664;</div>
				<ul class="tabs" style="font-family: <?= $opciones["fuenteCategorias"] ?>;" >
                    <?php
                    foreach($familias as $familia){  ?>


<li class="tab"><a style="font-size: <?= $opciones["pxFuenteCategorias"] ?>px;" data-id="<?= $familia['IDFamilia'] ?>" onclick="loadItems(<?= $familia['IDFamilia'] ?>)" ><?= $familia["Familia"] ?></a></li>



                    <?php }?>
           

                    
				<div class="indicator" style="right: 639.375px; left: 547.391px;"></div><div class="indicator" style="right: 639.375px; left: 547.391px;"></div></ul>
                <div class="arrow right-arrow">&#9654;</div>
                <div id="contenedorCarga">
    <div id="pantallaCargaModificada">
    <img src="<?= $opciones["logopreloader"] ?>" alt="Logo" id="logoCarga">
    </div>
</div>
                


<div id="description" class="col s12" style="margin-top:5px; margin-bottom:5px;">
						<p id="txtDescCat" style="font-family: <?= $opciones["fuenteDescCat"] ?>;font-size: <?= $opciones["pxFuenteDescCat"] ?>px;color: <?= $opciones["colorDescCat"] ?>;"  ></p>
					</div>



				<div id="contenedorLista" style="">


				
					
				</div>
				
			</div>
		</div>
	</div>

	
	<script>



$(window).on("load", function() {
    // Preload
    $("#preload").fadeOut(500);

    $('.tabs li:first-child a').addClass('active');

    var dataId = $('.tabs li:first-child a').attr('data-id');

    loadItems(dataId)



    $('.list-menu li a').on('click', function(e) {
        e.preventDefault();

        $('.list-menu li a').removeClass('active');
        $(this).addClass('active');
       
    });

});

function loadItems(idfamilia) {
    var pantallaCarga = document.getElementById('pantallaCargaModificada');
    // Ocultar la pantalla de carga
    pantallaCarga.style.display = 'initial';

    $("#description").hide();
    var contenedorLista = document.getElementById('contenedorLista');
    // Ocultar la pantalla de carga
    contenedorLista.style.display = 'none';


    $.ajax({
        url: base_url + '/getItemsFamilia/' + idfamilia,
        type: 'POST',
        success: function(data) {
            datos = JSON.parse(data);
          
            opciones = datos["opciones"];
            familia = datos["familia"];
            datos = datos["articulos"];
           
            $("#contenedorLista").empty();

            for (let i = 0; i < datos.length; i += 2) {
                let htmlContent = '<div class="row">';
        
                for (let j = i; j < i + 2 && j < datos.length; j++) {
                    let articulo = datos[j];
                    let imageContainer = ''; // Variable para almacenar los alérgenos
                

                    if(opciones["mostrarAlergenos"] == 1){

                    $.ajax({
                        url: base_url + '/getAlergenos/' + articulo["IDArticulo"], // URL para obtener los alérgenos del artículo
                        type: 'GET',
                        async: false, // Esperar a que se complete la llamada antes de continuar
                        success: function(response) {
                            // Manejar la respuesta y agregar los alérgenos al contenedor
                            alergenos = JSON.parse(response);
                          
                              alergenos = alergenos["alergenos"];
                              console.log(alergenos);
                            for (let alergeno of alergenos) {
                                imageContainer += `<img src="`+base_url+`/assets/img/alergenos/${alergeno["imagen"]}.png" style="width: 13%; margin:0px 5px 0px 5px; height: auto;" >`;
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });

                }


                    
                    htmlContent += `
                        <div class="col s6">
                            <div class="entry">`;
                    if (articulo["ConImagen"] == 1) {
                        htmlContent += `<img style="height:auto; " src="${articulo["imagen"]}" alt="${articulo["Articulo"]}">`;
                    }
                    htmlContent += `<h6  class="txtNombre" ><a>${articulo["Articulo"]} aaaaa</a></h6>
                        <div class="price">
                            <h5 class="txtPrecio">${parseFloat(articulo["PVP"]).toFixed(2)}€</h5>
                        </div>
                        <div class="image-container" style="margin-top:10px">${imageContainer}</div>
                    </div>
                </div>
                `;
                }
                htmlContent += '</div>'; // Cierra el div de la clase "row"
                $("#contenedorLista").append(htmlContent);
            }

            var pantallaCarga = document.getElementById('pantallaCargaModificada');
    // Ocultar la pantalla de carga
    pantallaCarga.style.display = 'none';


    if(familia["desc_cat"] == 1){

$("#txtDescCat").text(familia["descripcion"]);
$("#description").show();


}else{

$("#txtDescCat").text();
$("#description").hide();

}



    var contenedorLista = document.getElementById('contenedorLista');
    // Ocultar la pantalla de carga
   contenedorLista.style.display = 'initial';


        }
    });
}




    </script>