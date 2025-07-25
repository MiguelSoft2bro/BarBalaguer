<style>

.image-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 10px;
    align-items: center; /* Asegura que las imágenes estén centradas verticalmente */
}

.alergeno-img {
    width:20px;
    height: auto;
}

.images-and-button-wrapper {
    display: flex;
    justify-content: space-between; /* Separa el contenedor de imágenes y el botón */
    align-items: center; /* Alinea verticalmente el contenedor de imágenes y el botón */
}

.btn-alergenos {
    padding: 3px 8px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 10px;
}

.btn-alergenos:hover {
    background-color: #0056b3;
}

input[name="nombre"] {
    margin-bottom: 0; /* Elimina el margen inferior */
}
.custom-modal {
  position: fixed;
  z-index: 1000; /* alto para estar sobre otros elementos */
  left: 0;
  top: 59px;
    padding-top: 70px;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6); /* Más oscuro para mejor contraste */
  display: flex;
  align-items: center;
  justify-content: center;
  overflow-y: auto; /* Permite desplazarse si el contenido es muy largo */
}

.custom-modal-content {
  background-color: #fff;
  margin: auto;
  padding: 20px;
  border: none;
  width: 90%; /* Ancho ligeramente menor para un mejor margen */
  max-height: 80vh;
  overflow-y: auto;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
  border-radius: 8px; /* bordes redondeados */
}

.custom-modal-close {
  color: #000;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.custom-modal-close:hover,
.custom-modal-close:focus {
  color: #444;
  text-decoration: none;
}

.image-grid {
  display: grid;
  grid-template-columns: repeat(6, 1fr); /* Crea 6 columnas de igual tamaño */
  gap: 16px; /* Espacio entre celdas */
  padding: 16px; /* Espacio interno del contenedor de la cuadrícula */
}

.image-cell {
  text-align: -webkit-center;
  border: 1px solid #ddd; /* Borde sutil para las celdas */
  border-radius: 4px; /* Bordes redondeados para las celdas */
  overflow: hidden; /* Esconde el contenido que desborde */
}

.image-cell img {
  width: 50%; /* Hace que la imagen llene la celda */
  height: auto; /* Mantiene la relación de aspecto de la imagen */
  display: block; /* Asegura que no haya espacio extra alrededor de la imagen */
  transition: transform 0.2s ease-in-out; /* Transición suave para efecto zoom */
}

.image-cell:hover {
 background-color: #ddd; /* Efecto zoom al pasar el ratón por encima */
}


.image-cell.active {
  background-color: #84e57df7; /* Fondo verde para la celda activa */
  border-color: #84e57df7; /* Borde más oscuro para resaltar la celda activa */
}


.image-cell p {
  padding: 8px; /* Relleno para el texto */
  background: #f8f8f8; /* Fondo para el área del texto */
  margin: 0; /* Elimina el margen predeterminado */
  font-size: 0.9rem; /* Tamaño de fuente más pequeño */
  color: #333; /* Color de texto oscuro para mejor legibilidad */
}





</style>
 <div class="container-fluid">
<!-- Pseudo-modal -->

<?php $this->load->view('modalAlergenos',$alergenos); ?>


 <table style="" class="custom-table" id="tablaArticulos">

 <thead>

    <tr>
      <th style="width: 50px;"><button class="custom-button"  id="btnNuevoPlato">Nuevo Plato</button></th>
      <th style="display: flex; justify-content: space-between; align-items: center;"> 
    <span>Artículo</span>
    <input id="filtro" style="width: 90%; height:20px; margin: 7px 0px; padding: 5px; border: 1px solid #ccc; border-radius: 4px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); background-color: #fff; color:black" placeholder="buscar...">
</th>

        <th style=" width: 250px;">Familia</th>
        <th style=" width: 80px;">Orden</th>
        <th style=" width: 150px;">PVP</th>
        <th style=" width: 80px;">Activo</th>
        <th style=" width: 80px;">Imagen</th>
        <th style=" width: 80px;">Con Imagen</th>
    </tr>

      </thead>

      <tbody>

    <?php foreach ($articulos as $articulo): ?>
   
   
      <?php 

$this->db->select('*,alergenos.imagen');
		$this->db->from('articulos_alergenos');
		$this->db->join('alergenos', 'articulos_alergenos.idAlergeno = alergenos.id', 'inner'); // Realiza un INNER JOIN con la tabla alergenos

		$this->db->where('idArticulo', $articulo['IDArticulo']); 
		$query = $this->db->get(); 
		$alergenos = $query->result_array();
    
?>

   
      <tr id="<?=$articulo['IDArticulo']; ?>">
      
        <td><button class="btnBorrar" data-id="<?=$articulo['IDArticulo']; ?>" >Borrar</button></td>
      
   
   
        <td>
    <!-- Input existente -->
    <input type="text" name="nombre" value="<?php echo $articulo['Articulo']; ?>">

    <!-- Envoltura para contenedor de imágenes y botón, para alinearlos horizontalmente -->
    <div class="images-and-button-wrapper">
        <!-- Contenedor de imágenes -->
        <div class="image-container" id="contenedorimagenes<?=$articulo['IDArticulo'];?>">




      <?php foreach($alergenos as $alergeno){ ?>

            <img src= "<?= base_url()."/assets/img/alergenos/".$alergeno["imagen"].".png" ?>" class="alergeno-img">
          
         <?php  } ?>
        </div>

        <!-- Botón para abrir modal de alérgenos -->
        <button type="button" class="btn-alergenos"  onclick="toggleCustomModal(<?=$articulo['IDArticulo']; ?>)"> Alérgenos</button>
    </div>
</td>



        <td>

            <select name="familia">
              
          <?php 
          
            foreach($familias as $familia){

              if($articulo["IDFamilia"] == $familia["IDFamilia"]){?>

<option value="<?= $familia["IDFamilia"] ?>" selected><?= $familia["Familia"] ?></option>

<?php   }else{?>

  <option value="<?= $familia["IDFamilia"] ?>"><?= $familia["Familia"] ?></option>


  <?php    } }?>


            </select>
      
          </td>



        <td><input type="text" name="orden" value="<?=  $articulo["Orden"] ?>"></td>
        <td><input type="text" name="pvp" value="<?=  number_format((float)$articulo['PVP'], 2, '.', '');  ?>"></td>




        <td>
            <select name="activo">


<?php
   if($articulo["Activo"] == 1){?>

<option value="1" selected>Sí</option>
                <option value="0">No</option>
    <?php   }else{?>
    
      <option value="1" >Sí</option>
                <option value="0" selected>No</option>
    
      <?php    }?>
    


               
            </select>
        </td>



        
        <?php if($articulo["imagen"] != ""){ ?>



<td id="contendorImagen<?=$articulo['IDArticulo']?>">
<input type="file" id="fileInput_<?=$articulo['IDArticulo']; ?>" style="display: none;" />
<img id="img_<?=$articulo['IDArticulo']; ?>" data-id="<?=$articulo['IDArticulo']; ?>" src="<?= $articulo["imagen"] ?>" style="width: 60px; cursor: pointer;">


</td>


<?php }else{ ?> 


<td id="contendorImagen<?=$articulo['IDArticulo']?>"> 



<input type="file" id="fileInput_<?=$articulo['IDArticulo']; ?>" style="display: none;" />
<img id="img_<?=$articulo['IDArticulo']; ?>" data-id="<?=$articulo['IDArticulo']; ?>" src=" <?= base_url()."/assets/img/food1.png"?>" style="width: 60px; cursor: pointer;">



</td>



<?php } ?> 


<td>
<select name="conImagen">
<?php
if($articulo["ConImagen"] == 1){?>

<option value="1" selected>Sí</option>
    <option value="0">No</option>
<?php   }else{?>

<option value="1" >Sí</option>
    <option value="0" selected>No</option>

<?php    }?>



   
</select>
</td>





    </tr>
    <?php endforeach; ?>
    </tbody>

</table>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function() {



  $("#cerrarModal").click(function() {
    idarticulo = $("#txtArticulo").val();
    $('#customModal').hide(); // O cualquier otra lógica que uses para cerrar el modal
  

    console.log(idarticulo);

    $.ajax({
            url: base_url+'getAlergenos/'+idarticulo, // Reemplaza 'tu_url_aqui' con la URL a la que deseas enviar la petición
           type: 'POST', // Puedes cambiarlo a 'GET' si es necesario
          
            success: function(response) {


              $('#contenedorimagenes'+idarticulo).empty();
              datos  = JSON.parse(response)
          
              alergenos = datos["alergenos"];
              console.log(alergenos);

              var contenedor = $('#contenedorimagenes'+idarticulo);
              $.each(alergenos, function(index, imagen) {
               contenedor.append('<img src="'+base_url+'/assets/img/alergenos/'+imagen["imagen"]+'.png" class="alergeno-img">');
  });


            },
            error: function(xhr, status, error) {
                // Aquí puedes manejar errores
                console.error('Error:', error);
            }
        });




  });









    // Asegúrate de que todos los elementos select dentro de #tablaArticulos estén inicializados si usas Materialize
    $('#tablaArticulos select').material_select();

    // Escuchar el evento 'change' en los select dentro de #tablaArticulos
    $('#tablaArticulos').on('change', 'select', function() {
        // Encontrar la fila (tr) más cercana a este select
    
        var fila = $(this).closest('tr');


        guardarFila(fila);    


    });

 

});

function toggleCustomModal(idArticulo) {
  var modal = document.getElementById("customModal");


  $('.image-cell').removeClass('active');




  $.ajax({
            url: base_url+'getAlergenos/'+idArticulo, // Reemplaza 'tu_url_aqui' con la URL a la que deseas enviar la petición
           type: 'POST', // Puedes cambiarlo a 'GET' si es necesario
          
            success: function(response) {


          
              datos  = JSON.parse(response)
          
              alergenos = datos["alergenos"];

              alergenos.forEach(function(item) {
    var cellId = "cell" + item.id; // Construir el id de la celda
    $("#" + cellId).addClass('active'); // Activar la celda
  });
  $("#txtArticulo").val(idArticulo);

  modal.style.display = modal.style.display === "none" ? "block" : "none";


            },
            error: function(xhr, status, error) {
                // Aquí puedes manejar errores
                console.error('Error:', error);
            }
        });





}




$(document).on('click', 'img[data-id]', function() {
    // Obtener el ID de la fila desde el atributo data-id de la imagen
    var idFila = $(this).data('id');
    
    // Desencadenar el clic en el input de archivo correspondiente
    $('#fileInput_' + idFila).click();

    
});


$("#filtro").on("keyup", function() {
        var valor = $(this).val().toLowerCase(); // Obtener el valor ingresado y convertirlo a minúsculas

        $("#tablaArticulos tbody tr").filter(function() {
            // Buscar dentro de la columna 'Artículo' de cada fila
            // Asumiendo que el input del artículo está siempre en la segunda celda (td) de cada fila
            var textoArticulo = $(this).find("td:eq(1) input[type='text']").val().toLowerCase();
            return textoArticulo.indexOf(valor) > -1; // Verificar si el texto del artículo contiene el valor buscado
        }).toggle(true); // Mostrar las filas que coincidan

        $("#tablaArticulos tbody tr").filter(function() {
            // Realizar la operación inversa para las filas que no coincidan
            var textoArticulo = $(this).find("td:eq(1) input[type='text']").val().toLowerCase();
            return textoArticulo.indexOf(valor) === -1; // Verificar si el texto del artículo no contiene el valor buscado
        }).toggle(false); // Ocultar las filas que no coincidan
    });
   


$('#tablaArticulos').on('change', 'input, select', function() {
        // Obtener la fila (tr) en la que se detectó el cambio
        var fila = $(this).closest('tr');

        if ($(this).attr('type') == 'file' && this.files[0]) {
       
       guardarFila(fila,  this.files[0])
}else{


   guardarFila(fila)

}


    });









    function guardarFila(fila,file = null){



  var datos = new FormData(); // Usar FormData para manejar también archivos
      datos.append('id', fila.attr('id'));
      datos.append('articulo', fila.find('input[name="nombre"]').val());
      datos.append('orden', fila.find('input[name="orden"]').val());
      datos.append('familia', fila.find('select[name="familia"]').val());
      datos.append('activo', fila.find('select[name="activo"]').val());
      datos.append('pvp', fila.find('input[name="pvp"]').val());
      datos.append('conImagen', fila.find('select[name="conImagen"]').val());
    


      if (file != null) {
        console.log("cambio por archivo")
        datos.append('imagen', file);
    }




        // Enviar petición AJAX
        $.ajax({
            url: base_url+'actualizarPlato', // Reemplaza 'tu_url_aqui' con la URL a la que deseas enviar la petición
           type: 'POST', // Puedes cambiarlo a 'GET' si es necesario
            data: datos, 
            processData: false,  // Necesario para FormData
        contentType: false,  // Necesario para FormData
            success: function(response) {
               
              console.log('Respuesta:', response);

              datos  = JSON.parse(response)


              if (typeof datos["img"] !== 'undefined') {
                   



                   var imgElement = fila.find('img');


                   if (imgElement.length > 0) {
                       $("#img_"+fila.attr('id')).attr('src', datos["img"]);

   } else {
     
       $("#contendorImagen"+fila.attr('id')).empty();


   $("#contendorImagen"+fila.attr('id')).append(' <input type="file" id="fileInput_'+fila.attr('id')+'" style="display: none;" />');
   
   $("#contendorImagen"+fila.attr('id')).append('<img id="img_'+fila.attr('id')+'" data-id="'+ fila.attr('id')+'" src="' + datos["img"] + '" style="cursor: pointer;  width: 60px;">');

   }

                





               }else{
                   console.log("sin imagen")
               }




            },
            error: function(xhr, status, error) {
                // Aquí puedes manejar errores
                console.error('Error:', error);
            }
        });


        




}






    $('#btnNuevoPlato').on('click', function() {
        // Realizar la llamada AJAX para crear el nuevo plato


        var datos = {
            code: 123 // Suponiendo que el id de la fila es importante para la petición
            
        };


        $.ajax({
            url: base_url+'crearPlato', // Reemplaza esto con la URL adecuada
            type: 'POST', // Puedes cambiarlo a 'GET' si es necesario
            data: datos,
            success: function(response) {
             
          datos  =   JSON.parse(response)


          familias = datos["familias"]

        
          opcionesFamilias = "";
            for (let index = 0; index < familias.length; index++) {
              const familia = familias[index];
            
              opcionesFamilias += '<option value="' + familia["IDFamilia"] + '">'  + familia["Familia"] + '</option>';

            }

                $('#tablaArticulos tbody').prepend('<tr id='+datos["insert_id"]+'>' +
                    '<td><button < class="btnBorrar" data-id="'+datos["insert_id"]+'">Borrar</button></td>' +
                    '<td><input type="text" name="nombre" value=""></td>' +
                   
                    '<td><select name="familia" class="initialized">'+opcionesFamilias+'</select></td>' +

                    '<td><input type="text" name="orden" value=""></td>' +
                    '<td><input type="text" name="pvp" value=""></td>' +

                  
                    '<td><select name="activo"><option value="1">Sí</option><option selected value="0">No</option></select></td>' +


                  
                    '<td><input type="file" id="fileInput_'+datos["insert_id"]+'" style="display: none;"><img id="img_'+datos["insert_id"]+'" data-id="'+datos["insert_id"]+'" src=" http://localhost/LaTartana//assets/img/food1.png" style="width: 60px; cursor: pointer;"></td>' +
                    '<td><select name="conImagen"><option selected value="0">No</option><option value="1">Sí</option></select></td>' +


                    '</tr>');
                    $('select').material_select();

            },
            error: function(xhr, status, error) {
                // Maneja errores aquí
                console.error('Error al crear el plato:', error);
            }
        });
    });





    $('#tablaArticulos').on('click', '.btnBorrar', function() {




      Swal.fire({
  title: "Estas seguro de borrar el plato?",
  showDenyButton: true,
  showCancelButton: false,
  confirmButtonText: "Si"
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {

    var fila = $(this).closest('tr'); // Encuentra la fila
        var id = fila.attr('id'); // Asume que el id de la fila es 'fila-X'
      console.log(id);
        // Llamada AJAX para borrar el elemento
        $.ajax({
            url: base_url+'borrarPlato', // Asegúrate de reemplazar esto con tu URL
            type: 'POST',
            data: { id: id }, // Envía la ID como parte de los datos
            success: function(response) {
              console.log(response);
                if(response == 1) {
                    // Si la respuesta es 1, borra la fila
                    fila.remove();
                } else {
                    // Maneja el caso en que la respuesta no sea 1
                    alert('No se pudo borrar el elemento.');
                }
            },
            error: function(xhr, status, error) {
                // Maneja posibles errores
                console.error('Error al borrar el elemento:', error);
            }
        });




  } else if (result.isDenied) {
  }
});






        





    });







</script>