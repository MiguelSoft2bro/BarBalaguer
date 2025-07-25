

<div class="menu-list app-pages app-section" style="padding: 0px;margin-top: 0px;">
		<div class="container">
        <div class="arrow left-arrow">&#9664;</div>
        <ul class="tabs" style="font-family: <?= $opciones["fuenteCategorias"] ?>;" >
                    <?php
                    foreach($familias as $familia){  ?>


<li class="tab"><a style="font-size: <?= $opciones["pxFuenteCategorias"] ?>px;" data-id="<?= $familia['IDFamilia'] ?>" onclick="loadItems(<?= $familia['IDFamilia'] ?>)" ><?= $familia["Familia"] ?></a></li>



                    <?php }?>
           

                    
				</ul>
                <div class="arrow right-arrow">&#9654;</div>
                <div id="contenedorCarga">

    <div id="pantallaCargaModificada">
    <img src="<?= $opciones["logopreloader"] ?>" alt="Logo" id="logoCarga">
    </div>

</div>
			 


<div id="description" class="col s12" style="margin-top:5px; margin-bottom:5px;">
						<p id="txtDescCat" style="font-family: <?= $opciones["fuenteDescCat"] ?>;font-size: <?= $opciones["pxFuenteDescCat"] ?>px;color: <?= $opciones["colorDescCat"] ?>;"  ></p>
					</div>


              


        <div id="contenedorLista" style=" margin-top:10px">


				
					
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
           

            console.log(familia);
           
            $("#contenedorLista").empty();

            for (let i = 0; i < datos.length; i++) {
    let articulo = datos[i];
    let imageContainer = ''; // Variable para almacenar los alérgenos

    if (opciones["mostrarAlergenos"] == 1) {
        $.ajax({
            url: base_url + '/getAlergenos/' + articulo["IDArticulo"], // URL para obtener los alérgenos del artículo
            type: 'GET',
            async: false, // Esperar a que se complete la llamada antes de continuar
            success: function(response) {
                // Manejar la respuesta y agregar los alérgenos al contenedor
                let alergenos = JSON.parse(response)["alergenos"];
                console.log(alergenos);
                for (let alergeno of alergenos) {
                    imageContainer += `<img src="${base_url}/assets/img/alergenos/${alergeno["imagen"]}.png" style="width: 9%; height: auto;">`;
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    let htmlContent = `<div class="entry">
				<img src=`+base_url+"assets/img/sushi1.png"+` alt="">
				<div class="content">
                <h6  class="txtNombre" ><a>${articulo["Articulo"]} aaaaa</a></h6>
			
					<div class="price">
                    <h5 class="txtPrecio">${parseFloat(articulo["PVP"]).toFixed(2)}€</h5>
					</div>
					
				</div>
                <div class="image-container" style="margin-top:10px">${imageContainer}</div>

			</div>
		`;







    $("#contenedorLista").append(htmlContent);
}




if(familia["desc_cat"] == 1){

$("#txtDescCat").text(familia["descripcion"]);
$("#description").show();


}else{

$("#txtDescCat").text();
$("#description").hide();

}



var pantallaCarga = document.getElementById('pantallaCargaModificada');
    // Ocultar la pantalla de carga
    pantallaCarga.style.display = 'none';


    var contenedorLista = document.getElementById('contenedorLista');
    // Ocultar la pantalla de carga
   contenedorLista.style.display = 'initial';


        }
    });
}




    </script>