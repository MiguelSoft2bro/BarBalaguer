<!-- Pseudo-modal -->
<div id="customModal" class="custom-modal" style="display:none;">
  <div class="custom-modal-content">
    <span class="custom-modal-close"  id="cerrarModal">&times;</span>
    <span>Seleciona los alergenos que contiene el plato para añadirlos, Volver a selecionar para quitarlo</span>
    <input id="txtArticulo" style="display:none">
    
    <div class="image-grid">
      <!-- Ejemplo de una fila con imágenes -->


      <?php
        
      foreach($alergenos as $alergeno){ ?>

<div class="image-cell " data-id="<?= $alergeno["id"] ?>" id="cell<?= $alergeno["id"] ?>">
      <img src="<?= base_url()."/assets/img/alergenos/".
      $alergeno["imagen"].".png" ?>" class="alergeno-img">
        <p><?= $alergeno["nombre"] ?></p>
      </div>



<?php  } ?>

      


      <!-- Repetir la estructura de 'image-cell' para cada imagen -->
      <!-- ... -->
    </div>
  </div>
</div>

<script>


$(document).ready(function() {
  $('.image-cell').click(function() {
    var cell = $(this);
    var dataId = cell.data('id'); // Obtener el data-id de la celda
    var idArticulo = $("#txtArticulo").val(); // Obtener el data-id de la celda

    // Verifica si la celda ya tiene la clase 'active'
    if(cell.hasClass('active')) {
      cell.removeClass('active');
      someFunction(dataId, false,idArticulo); // Llamar a la función con el data-id, false indica que se desactivó
    } else {
      // Remover la clase 'active' de todas las celdas y añadir a la celda actual
     
      cell.addClass('active');
      someFunction(dataId, true,idArticulo); // Llamar a la función con el data-id, true indica que se activó
    }
  });
});

// La función a llamar con el data-id de la celda y el estado de activación
function someFunction(dataId, isActive,idArticulo) {
  

    if(isActive){




        $.ajax({
            url: base_url+'activarAlergenos/'+idArticulo+"/"+dataId, // Reemplaza 'tu_url_aqui' con la URL a la que deseas enviar la petición
           type: 'POST', // Puedes cambiarlo a 'GET' si es necesario
          
            success: function(response) {


            },
            error: function(xhr, status, error) {
                // Aquí puedes manejar errores
                console.error('Error:', error);
            }
        });






    }else{


        $.ajax({
            url: base_url+'quitarAlergenos/'+idArticulo+"/"+dataId, // Reemplaza 'tu_url_aqui' con la URL a la que deseas enviar la petición
           type: 'POST', // Puedes cambiarlo a 'GET' si es necesario
          
            success: function(response) {


            },
            error: function(xhr, status, error) {
                // Aquí puedes manejar errores
                console.error('Error:', error);
            }
        });



    }


}


</script>