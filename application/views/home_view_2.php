

	<style>
.tabs-container {
  position: relative;
  width: 100%;

}


.tabs::-webkit-scrollbar {
  display: none;
}

.arrow {
  position: absolute;
  top: 0;
  bottom: 0;
  display: flex;
  align-items: center;
  background-color: none;
  color: #333;
  border: none;
  font-size: 15px;
  padding: 0 0px;
  cursor: pointer;
  z-index: 10;
}

.left-arrow {
  left: 0;
}

.right-arrow {
  right: 0;
}


    </style>


	<div class="menu app-section" style="padding: 0px;">
		<div class="container">
			<div class="app-title" style="">
				
			</div>
			<div class="content">
            <div class="tabs-container">

            <div class="arrow left-arrow">&#9664;</div>
            <ul class="tabs" style="font-family: <?= $opciones["fuenteCategorias"] ?>;" >
                    <?php
                    foreach($familias as $familia){  ?>


<li class="tab"><a style="font-size: <?= $opciones["pxFuenteCategorias"] ?>px;" data-id="<?= $familia['IDFamilia'] ?>" onclick="loadItems(<?= $familia['IDFamilia'] ?>)" ><?= $familia["Familia"] ?></a></li>



                    <?php }?>
           

                    
				<div class="indicator" style="right: 639.375px; left: 547.391px;"></div><div class="indicator" style="right: 639.375px; left: 547.391px;"></div>
            </ul>


            <div class="arrow right-arrow">&#9654;</div>
            </div>
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

    $('.left-arrow').on('click', function() {
        scrollTabs('left');
    });

    $('.right-arrow').on('click', function() {
        scrollTabs('right');
    });

    $('.list-menu li a').on('click', function(e) {
        e.preventDefault();

        $('.list-menu li a').removeClass('active');
        $(this).addClass('active');
       
    });

});

function updateArrowVisibility() {
    var container = $('.tabs');
    var leftArrow = $('.left-arrow');
    var rightArrow = $('.right-arrow');

    // Mostrar/ocultar flecha izquierda
    if (container.scrollLeft() <= 0) {
        leftArrow.hide();
    } else {
        leftArrow.show();
    }

    // Mostrar/ocultar flecha derecha
    if (container.scrollLeft() + container.width() >= container[0].scrollWidth) {
        rightArrow.hide();
    } else {
        rightArrow.show();
    }
}
// Función para desplazar los tabs
function scrollTabs(direction) {
    var container = $('.tabs');
    var scrollAmount = container.width() / 2; // Desplazamiento de la mitad del ancho visible

    if (direction === 'left') {
        container.animate({ scrollLeft: '-=' + scrollAmount + 'px' }, 300);
    } else if (direction === 'right') {
        container.animate({ scrollLeft: '+=' + scrollAmount + 'px' }, 300);
    }

    // Actualizar visibilidad de las flechas después del desplazamiento
    setTimeout(updateArrowVisibility, 300);
}


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

         
          
        
                for (let j = 0; j < datos.length; j++) {
                    let htmlContent = '<div class="row">';
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
                                imageContainer += `<img src="`+base_url+`/assets/img/alergenos/${alergeno["imagen"]}.png" style="width: 10%; margin:0px 5px 0px 5px; height: auto;" >`;
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });

                }


                    
                 nombreArticulo = articulo["Articulo"];
 descripcion = "";

if (nombreArticulo.includes("||")) {
    const partes = nombreArticulo.split("||");
    nombreArticulo = partes[0].trim();
    descripcion = partes[1].trim();
}

// Descripción separada por comas
 descripcionHtml = '';
if (descripcion) {
    const descripciones = descripcion.split(",");
    descripcionHtml = '<div class="descripcion" style="font-size:1.05em; color:#555; margin-bottom:5px;">';
    descripciones.forEach(linea => {
        descripcionHtml += `<div>${linea.trim()}</div>`;
    });
    descripcionHtml += '</div>';
}

htmlContent += `
    <div class="col s6">
        <div class="entry">
            ${articulo["ConImagen"] == 1 ? `<img style="height:auto;" src="${articulo["imagen"]}" alt="${nombreArticulo}">` : ""}
            <h6 class="txtNombre"><a>${nombreArticulo}</a></h6>
            ${descripcionHtml}
            <div class="price">
                <h5 class="txtPrecio">${parseFloat(articulo["PVP"]).toFixed(2)}€</h5>
            </div>
            <div class="image-container" style="margin-top:10px">${imageContainer}</div>
        </div>
    </div>
`;

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