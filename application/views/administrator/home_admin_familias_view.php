

 <div class="container-fluid">





 <table style=""  class="custom-table" id="tablaFamilias">

 <thead>

    <tr>
      <th style="width: 20px;"><button  class="custom-button"   id="btnNuevaFamilia">Nueva Familia</button></th>
        <th style=" width: 650px;">Familia</th>
        <th style=" width: 650px;">Desc</th>
        <th style=" width: 80px;">Mostrar Desc</th>
        <th style=" width: 80px;">Orden</th>
        <th style=" width: 80px;">Activo</th>
        <th style=" width: 80px;">Imagen</th>
        <th style=" width: 80px;">Con Imagen</th>
    </tr>

      </thead>

      <tbody>

    <?php foreach ($familias as $familia): ?>
   
   
      
   
      <tr id="<?=$familia['IDFamilia']; ?>">
      
        <td><button class="btnBorrar" data-id="<?=$familia['IDFamilia']; ?>" >Borrar</button></td>
      
      <td><input type="text" name="nombre" value="<?php echo $familia['Familia']; ?>"></td>
      
      <td><input type="text" name="desc" value="<?php echo $familia['descripcion']; ?>"></td>
    

      <td>
            <select name="desc_cat">


<?php
   if($familia["desc_cat"] == 1){?>

<option value="1" selected>Sí</option>
                <option value="0">No</option>
    <?php   }else{?>
    
      <option value="1" >Sí</option>
                <option value="0" selected>No</option>
    
      <?php    }?>
    


               
            </select>
        </td>


        <td><input type="text" name="orden" value="<?=  $familia["Orden"] ?>"></td>
      

        <td>
            <select name="activo">


<?php
   if($familia["Activo"] == 1){?>

<option value="1" selected>Sí</option>
                <option value="0">No</option>
    <?php   }else{?>
    
      <option value="1" >Sí</option>
                <option value="0" selected>No</option>
    
      <?php    }?>
    


               
            </select>
        </td>



        <?php if($familia["imagen"] != ""){ ?>



            <td id="contendorImagen<?=$familia['IDFamilia']?>">
            <input type="file" id="fileInput_<?=$familia['IDFamilia']; ?>" style="display: none;" />
            <img id="img_<?=$familia['IDFamilia']; ?>" data-id="<?=$familia['IDFamilia']; ?>" src="<?= $familia["imagen"] ?>" style="width: 60px; cursor: pointer;">


            </td>


           <?php }else{ ?> 


            <td id="contendorImagen<?=$familia['IDFamilia']?>"> 
            
            <input type="file" id="fileInput_<?=$familia['IDFamilia']; ?>" style="display: none;" />
            <img id="img_<?=$familia['IDFamilia']; ?>" data-id="<?=$familia['IDFamilia']; ?>"  src=" <?= base_url()."/assets/img/food1.png"?>" style="width: 60px; cursor: pointer;">

 
        
        
        </td>



            <?php } ?> 


            <td>
            <select name="conImagen">
            <?php
   if($familia["ConImagen"] == 1){?>

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
    // Asegúrate de que todos los elementos select dentro de #tablaArticulos estén inicializados si usas Materialize
    $('#tablaFamilias select').material_select();

    // Escuchar el evento 'change' en los select dentro de #tablaArticulos
    $('#tablaFamilias').on('change', 'select', function() {
        // Encontrar la fila (tr) más cercana a este select
    
        var fila = $(this).closest('tr');


        guardarFila(fila);    


    });
});



$(document).on('click', 'img[data-id]', function() {
    // Obtener el ID de la fila desde el atributo data-id de la imagen
    var idFila = $(this).data('id');
    
    // Desencadenar el clic en el input de archivo correspondiente
    $('#fileInput_' + idFila).click();
});


$('#tablaFamilias').on('change', 'input, select', function() {
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
    datos.append('familia', fila.find('input[name="nombre"]').val());
    datos.append('desc', fila.find('input[name="desc"]').val());
    datos.append('desc_cat', fila.find('select[name="desc_cat"]').val());
    datos.append('orden', fila.find('input[name="orden"]').val());
    datos.append('activo', fila.find('select[name="activo"]').val());
    datos.append('conImagen', fila.find('select[name="conImagen"]').val());

    // Verificar si el cambio fue debido a la selección de un archivo
    if (file != null) {
        console.log("cambio por archivo")
        datos.append('imagen', file);
    }

        // Enviar petición AJAX
        $.ajax({
            url: base_url+'actualizarFamilia', // Reemplaza 'tu_url_aqui' con la URL a la que deseas enviar la petición
           type: 'POST', // Puedes cambiarlo a 'GET' si es necesario
            data: datos, 
            processData: false,  // Necesario para FormData
        contentType: false,  // Necesario para FormData
            success: function(response) {
                // Aquí puedes manejar la respuesta de tu petición

                console.log('Respuesta:', response);

                datos  =   JSON.parse(response)

                
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



    $('#btnNuevaFamilia').on('click', function() {
        // Realizar la llamada AJAX para crear el nuevo plato


        var datos = {
            code: 123 // Suponiendo que el id de la fila es importante para la petición
            
        };


        $.ajax({
            url: base_url+'crearFamilia', // Reemplaza esto con la URL adecuada
            type: 'POST', // Puedes cambiarlo a 'GET' si es necesario
            data: datos,
            success: function(response) {
             
          datos  =   JSON.parse(response)



                $('#tablaFamilias tbody').prepend('<tr id='+datos["insert_id"]+'>' +
                    '<td><button < class="btnBorrar" data-id="'+datos["insert_id"]+'">Borrar</button></td>' +
                    '<td><input type="text" name="nombre" value=""></td>' +
                    '<td><input type="text" name="orden" value=""></td>' +
                    '<td><select name="activo"><option value="1">Sí</option><option value="0">No</option></select></td>' +



                    
                    '<td><input type="file" id="fileInput_'+datos["insert_id"]+'" style="display: none;"><img id="img_'+datos["insert_id"]+'" data-id="'+datos["insert_id"]+'" src=" http://localhost/LaTartana//assets/img/food1.png" style="width: 60px; cursor: pointer;"></td>' +
                    '<td><select name="conImagen"><option selected value="0">No</option><option value="1">Sí</option></select></td>' +



                    '</tr>');

                    $('select').material_select();
            },
            error: function(xhr, status, error) {
                // Maneja errores aquís
                console.error('Error al crear el plato:', error);
            }
        });
    });





    $('#tablaFamilias').on('click', '.btnBorrar', function() {




      Swal.fire({
  title: "Estas seguro de borrar la categoria?",
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
            url: base_url+'borrarCategoria', // Asegúrate de reemplazar esto con tu URL
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