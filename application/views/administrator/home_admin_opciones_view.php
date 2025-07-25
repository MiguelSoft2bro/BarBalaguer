<style>
.form-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin-bottom: 20px;
}

.form-group {
    flex: 0 0 calc(33.333% - 10px);
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.form-group input[type="text"]:focus,
.form-group input[type="email"]:focus,
.form-group select:focus,
.form-group input[type="color"]:focus {
    outline: none;
    border-color: #66afe9;
    box-shadow: 0 0 0 2px rgba(102, 175, 233, 0.5);
}

@media (max-width: 768px) {
    .form-group {
        flex: 0 0 calc(50% - 10px);
    }
}

@media (max-width: 480px) {
    .form-group {
        flex: 0 0 100%;
    }
}
</style>

<div class="container-fluid" style="margin-top: 67px; padding: 0px 25px;">
    <div class="form-row">
        <div class="form-group">
            <label for="logo">Logo  (210 x 57) </label>
            <img src="<?= $opciones["logo"] ?>" height="auto" width="100px" />
            <input type="file" id="logo" name="logo" value="<?= $opciones["logo"] ?>" />
        </div>
        <div class="form-group">
            <label for="logo">Logo Preloader </label>
            <img src="<?= $opciones["logopreloader"] ?>" height="auto" width="100px" />
            <input type="file" id="logopreloader" name="logopreloader" value="<?= $opciones["logopreloader"] ?>" />
        </div>

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="<?= $opciones["nombre"] ?>" placeholder="Introduce tu nombre" />
        </div>

        <div class="form-group">
            <label for="logoTextImagen">Mostrar</label>
            <select name="logoTextImagen" id="logoTextImagen" class="initialized">
                <option value="0" <?= ($opciones["nombre_logo"] == 0) ? 'selected' : '' ?>>Texto</option>
                <option value="1" <?= ($opciones["nombre_logo"] == 1) ? 'selected' : '' ?>>Logo</option>
            </select>
        </div>


        <div class="form-group">
          

                <div class="row"> <!-- Sistema de grid para alinear elementos en una fila -->

                <!-- Selector original -->
                <div class="col-lg-7" style="padding-right:5px">
                <label for="logoTextImagen">Fuente Cabecera</label>

            <select style="" name="fuenteCabecera" id="fuenteCabecera" class="initialized">

            
                    <?php
                    foreach ($fuentes as $fuente) {
                        $selected = ($fuente == $opciones["fuenteCabecera"]) ? 'selected' : '';

                        ?>
                   <option value='<?= $fuente ?>' style='font-family:<?= $fuente ?>' <?= $selected ?>><?= $fuente ?></option>
                  <?php  } ?>

            </select>
                    
                </div>
                <div class="col-lg-1" style="padding-left:5px">
                <label for="colorPicker">Color</label>
                <input style="height: 42px;" type="color" id="colorPicker" name="colorPicker" value="<?= $opciones["color_acento"] ?>" />


                </div>
                <div class="col-lg-2">
                <label for="colorPicker">Tamaño</label>
                <input type="number" min="8" id="pxFuenteCabecera" name="pxFuenteCabecera" value="<?= $opciones["pxFuenteCabecera"] ?>" />


                </div>

                <div class="col-lg-1" style="padding-left:5px">
                <label for="colorPicker">Fondo</label>
                <input style="height: 42px;" type="color" id="colorfondoCabecera" name="colorfondoCabecera" value="<?= $opciones["colorfondoCabecera"] ?>" />


                </div>

                </div>
            
        </div>
        <div class="form-group">



        <div class="row"> <!-- Sistema de grid para alinear elementos en una fila -->

            <!-- Selector original -->
            <div class="col-lg-7" style="padding-right:5px">
            <label for="logoTextImagen">Fuente Categorias</label>
            <select name="fuenteCategorias" id="fuenteCategorias" class="initialized">

            
                    <?php
                    foreach ($fuentes as $fuente) {
                        $selected = ($fuente == $opciones["fuenteCategorias"]) ? 'selected' : '';

                        ?>
                   <option value='<?= $fuente ?>' style='font-family:<?= $fuente ?>' <?= $selected ?>><?= $fuente ?></option>
                  <?php  } ?>

            </select>


            </div>
            <div class="col-lg-1" style="padding-left:5px">
            <label for="colorPicker">Color</label>
            <input style="height: 42px;" type="color" id="colorPickerCategorias" name="colorPickerCategorias" value="<?= $opciones["color_categoria"] ?>" />
            

            </div>
            <div class="col-lg-1" style="padding-left:5px; max-width:10.333333%">
            <label for="colorPicker">Color M</label>
            <input style="height: 42px;" type="color" id="colorPickerCategoriasAcento" name="colorPickerCategoriasAcento" value="<?= $opciones["color_categoria_acento"] ?>" />
            

            </div>
            <div class="col-lg-2">
            <label for="colorPicker">Tamaño</label>
            <input type="number" min="8" max="60"  id="pxFuenteCategorias" name="pxFuenteCategorias" value="<?= $opciones["pxFuenteCategorias"] ?>" />


            </div>

          

        </div>


        </div>



        <div class="form-group">



        <div class="row"> <!-- Sistema de grid para alinear elementos en una fila -->

            <!-- Selector original -->
            <div class="col-lg-7" style="padding-right:5px">
            <label for="logoTextImagen">Fuente Descripcion Categorias</label>
            <select name="fuenteDescCat" id="fuenteDescCat" class="initialized">

            
                    <?php
                    foreach ($fuentes as $fuente) {
                        $selected = ($fuente == $opciones["fuenteDescCat"]) ? 'selected' : '';

                        ?>
                   <option value='<?= $fuente ?>' style='font-family:<?= $fuente ?>' <?= $selected ?>><?= $fuente ?></option>
                  <?php  } ?>

            </select>


            </div>
            <div class="col-lg-1" style="padding-left:5px">
            <label for="colorPicker">Color</label>
            <input style="height: 42px;" type="color" id="colorDescCat" name="colorDescCat" value="<?= $opciones["colorDescCat"] ?>" />
            

            </div>
           
            <div class="col-lg-2">
            <label for="colorPicker">Tamaño</label>
            <input type="number" min="8" max="60"  id="pxFuenteDescCat" name="pxFuenteDescCat" value="<?= $opciones["pxFuenteDescCat"] ?>" />


            </div>

          

        </div>


        </div>


        <div class="form-group">

                    <div class="row"> <!-- Sistema de grid para alinear elementos en una fila -->

                    <!-- Selector original -->
                    <div class="col-lg-7" style="padding-right:5px">
                    <label for="logoTextImagen">Fuente Nombre Plato</label>
            <select name="fuentePlato" id="fuentePlato" class="initialized">

            
                    <?php
                    foreach ($fuentes as $fuente) {
                        $selected = ($fuente == $opciones["fuentePlato"]) ? 'selected' : '';

                        ?>
                   <option value='<?= $fuente ?>' style='font-family:<?= $fuente ?>' <?= $selected ?>><?= $fuente ?></option>
                  <?php  } ?>

            </select>

                    </div>
                    <div class="col-lg-1" style="padding-left:5px">
                    <label for="colorPicker">Color</label>
                    <input style="height: 42px;" type="color" id="colorPlato" name="colorPlato" value="<?= $opciones["colorPlato"] ?>" />


                    </div>
                    <div class="col-lg-2">
                    <label for="colorPicker">Tamaño</label>
                    <input type="number" min="8" max="60"  id="pxFuentePlato" name="pxFuentePlato" value="<?= $opciones["pxFuentePlato"] ?>" />


                    </div>



                    </div>




          




        </div>


        <div class="form-group">


        <div class="row"> <!-- Sistema de grid para alinear elementos en una fila -->

<!-- Selector original -->
<div class="col-lg-7" style="padding-right:5px">
<label for="logoTextImagen">Fuente Precio</label>
            <select name="fuentePrecio" id="fuentePrecio" class="initialized">

            
                    <?php
                    foreach ($fuentes as $fuente) {
                        $selected = ($fuente == $opciones["fuentePrecio"]) ? 'selected' : '';

                        ?>
                   <option value='<?= $fuente ?>' style='font-family:<?= $fuente ?>' <?= $selected ?>><?= $fuente ?></option>
                  <?php  } ?>

            </select>

</div>
<div class="col-lg-1" style="padding-left:5px">
<label for="colorPicker">Color</label>
<input style="height: 42px;" type="color" id="colorPickerPrecio" name="colorPickerPrecio" value="<?= $opciones["color_precio"] ?>" />


</div>
<div class="col-lg-2">
<label for="colorPicker">Tamaño</label>
<input type="number" min="8" max="60"  id="pxFuentePrecio" name="pxFuentePrecio" value="<?= $opciones["pxFuentePrecio"] ?>" />


</div>



</div>




         





        </div>

        <div class="form-group">

        <div class="row"> <!-- Sistema de grid para alinear elementos en una fila -->

<!-- Selector original -->
<div class="col-lg-7" style="padding-right:5px">
<label for="logoTextImagen">Fuente Alergenos</label>
            <select name="fuenteAlergenos" id="fuenteAlergenos" class="initialized">

            
                    <?php
                    foreach ($fuentes as $fuente) {
                        $selected = ($fuente == $opciones["fuenteAlergenos"]) ? 'selected' : '';

                        ?>
                   <option value='<?= $fuente ?>' style='font-family:<?= $fuente ?>' <?= $selected ?>><?= $fuente ?></option>
                  <?php  } ?>

            </select>


</div>
<div class="col-lg-1" style="padding-left:5px">
<label for="colorPicker">Color</label>
<input style="height: 42px;" type="color" id="colorAlergenos" name="colorAlergenos" value="<?= $opciones["colorAlergenos"] ?>" />


</div>
<div class="col-lg-2">
<label for="colorPicker">Tamaño</label>
<input type="number" min="8" max="60"  id="pxFuenteAlergenos" name="pxFuenteAlergenos" value="<?= $opciones["pxFuenteAlergenos"] ?>" />


</div>



</div>





        



        </div>


        <div class="form-group">


        <div class="row"> <!-- Sistema de grid para alinear elementos en una fila -->

<!-- Selector original -->
<div class="col-lg-7" style="padding-right:5px">

<label for="logoTextImagen">Fuente Contacto</label>
            <select name="fuenteContacto" id="fuenteContacto" class="initialized">

            
                    <?php
                    foreach ($fuentes as $fuente) {
                        $selected = ($fuente == $opciones["fuenteContacto"]) ? 'selected' : '';

                        ?>
                   <option value='<?= $fuente ?>' style='font-family:<?= $fuente ?>' <?= $selected ?>><?= $fuente ?></option>
                  <?php  } ?>

            </select>



</div>
<div class="col-lg-1" style="padding-left:5px">
<label for="colorPicker">Color</label>
<input style="height: 42px;" type="color" id="colorContacto" name="colorContacto" value="<?= $opciones["colorContacto"] ?>" />


</div>
<div class="col-lg-2">
<label for="colorPicker">Tamaño</label>
<input type="number" min="8" max="60"  id="pxFuenteContacto" name="pxFuenteContacto" value="<?= $opciones["pxFuenteContacto"] ?>" />


</div>



</div>





            
        </div>


        
    


        <div class="form-group">
            <label for="estiloCarta">Estilo de Carta</label>
            <select name="estiloCarta" id="estiloCarta" class="initialized">
                <option value="0" <?= ($opciones["estiloCarta"] == 0) ? 'selected' : '' ?>>2 Columnas</option>
                <option value="1" <?= ($opciones["estiloCarta"] == 1) ? 'selected' : '' ?>>1 Columna</option>
                <option value="2" <?= ($opciones["estiloCarta"] == 2) ? 'selected' : '' ?>>Filas</option>
            </select>
        </div>
        </div>
        <div class="form-row">



        <div class="form-group">
            <label for="alergenos">Mostrar Alergenos</label>
            <select name="alergenos" id="alergenos" class="initialized">
                <option value="0" <?= ($opciones["mostrarAlergenos"] == 0) ? 'selected' : '' ?>>No</option>
                <option value="1" <?= ($opciones["mostrarAlergenos"] == 1) ? 'selected' : '' ?>>Sí</option>
            </select>
        </div>


        <div class="form-group">
            <label for="redes">Mostrar Redes Sociales</label>
            <select name="redes" id="redes" class="initialized">
                <option value="0" <?= ($opciones["redes"] == 0) ? 'selected' : '' ?>>No</option>
                <option value="1" <?= ($opciones["redes"] == 1) ? 'selected' : '' ?>>Sí</option>
            </select>
        </div>
        <div class="form-group">
            <label for="contacto">Mostrar Contacto</label>
            <select name="contacto" id="contacto" class="initialized">
                <option value="0" <?= ($opciones["contacto"] == 0) ? 'selected' : '' ?>>No</option>
                <option value="1" <?= ($opciones["contacto"] == 1) ? 'selected' : '' ?>>Sí</option>
            </select>
        </div>


        <div class="form-group">
            <label for="face">Facebook "dejar vacio para que no aparezca" </label>
            <input type="text" id="face" name="Facebook" value="<?= $opciones["face"] ?>" placeholder="Introduce la url" />
        </div>
        <div class="form-group">
            <label for="insta">Instagram "dejar vacio para que no aparezca"</label>
            <input type="text" id="insta" name="insta" value="<?= $opciones["insta"] ?>" placeholder="Introduce la url" />
        </div>
        <div class="form-group">
            <label for="twitter">Twitter "dejar vacio para que no aparezca"</label>
            <input type="text" id="twitter" name="twitter" value="<?= $opciones["twitter"] ?>" placeholder="Introduce la url" />
        </div>


        <div class="form-group">
            <label for="tel">Teléfono "dejar vacio para que no aparezca"</label>
            <input type="text" id="tel" name="tel" value="<?= $opciones["tel"] ?>" placeholder="Introduce la url" />
        </div>

        <div class="form-group">
            <label for="movil">Movil "dejar vacio para que no aparezca"</label>
            <input type="text" id="movil" name="movil" value="<?= $opciones["movil"] ?>" placeholder="Introduce la url" />
        </div>

        <div class="form-group">
            <label for="mail">Email "dejar vacio para que no aparezca"</label>
            <input type="text" id="mail" name="mail" value="<?= $opciones["mail"] ?>" placeholder="Introduce la url" />
        </div>



   
</div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
$(document).ready(function(){

    $('#fuenteCabecera').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarfuenteCabecera', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){
             


    $("#txtLogo").css("font-family", selectedValue);


                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });


    $('#pxFuenteCabecera').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarpxFuenteCabecera', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){
             

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });



    $('#colorfondoCabecera').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarcolorfondoCabecera', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){
             


                


                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });









    $('#fuenteContacto').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarfuenteContacto', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });



    $('#pxFuenteContacto').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarpxFuenteContacto', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });
    $('#colorContacto').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarcolorContacto', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });




    $('#fuenteAlergenos').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarfuenteAlergenos', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });

    $('#pxFuenteAlergenos').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarpxFuenteAlergenos', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });

    $('#colorAlergenos').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarcolorAlergenos', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });



    $('#fuentePlato').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarfuentePlato', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });

    $('#pxFuentePlato').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarpxFuentePlato', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });


    $('#colorPlato').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarcolorPlato', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });


    $('#fuentePrecio').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarfuentePrecio', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });

    $('#pxFuentePrecio').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarpxFuentePrecio', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });


    $('#fuenteDescCat').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarfuenteDescCat', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });
  

    $('#colorDescCat').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarcolorDescCat', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });
  

    $('#pxFuenteDescCat').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarpxFuenteDescCat', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });
  





    $('#fuenteCategorias').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarfuenteCategorias', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });
  




    $('#pxFuenteCategorias').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarpxFuenteCategorias', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){

                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });



    $('#contacto').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarcontacto', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){
                    console.log(response);
                    // Manejar la respuesta del servidor aquí
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });




    $('#redes').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarredes', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){
                    console.log(response);
                    // Manejar la respuesta del servidor aquí
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });



    $('#alergenos').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizareAlergenos', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){
                    console.log(response);
                    // Manejar la respuesta del servidor aquí
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });

    $('#estiloCarta').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarestiloCarta', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){
                    console.log(response);
                    // Manejar la respuesta del servidor aquí
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });
    $('#logoTextImagen').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarNombreLogo', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){
                    console.log(response);
                    // Manejar la respuesta del servidor aquí
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });


    $('#colorPickerCategorias').change(function(){
                var color = $(this).val();
                console.log('Color seleccionado:', color);
                // Realizar la llamada AJAX aquí
                $.ajax({
                    url:base_url+'actualizarColorCategorias', 
                    method: 'POST',
                    data: { color: color },
                    success: function(response){
                        console.log(response);
                        // Manejar la respuesta del servidor aquí
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                        // Manejar el error aquí
                    }
                });
            });
    $('#colorPickerCategoriasAcento').change(function(){
                var color = $(this).val();
                console.log('Color seleccionado:', color);
                // Realizar la llamada AJAX aquí
                $.ajax({
                    url:base_url+'actualizarcolorCategoriasAcento', 
                    method: 'POST',
                    data: { color: color },
                    success: function(response){
                        console.log(response);
                        // Manejar la respuesta del servidor aquí
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                        // Manejar el error aquí
                    }
                });
            });

    $('#colorPickerPrecio').change(function(){
                var color = $(this).val();
                console.log('Color seleccionado:', color);
                // Realizar la llamada AJAX aquí
                $.ajax({
                    url:base_url+'actualizarColorPrecio', 
                    method: 'POST',
                    data: { color: color },
                    success: function(response){
                        console.log(response);
                        // Manejar la respuesta del servidor aquí
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                        // Manejar el error aquí
                    }
                });
            });




    $('#colorPicker').change(function(){
                var color = $(this).val();
                console.log('Color seleccionado:', color);
                // Realizar la llamada AJAX aquí
                $.ajax({
                    url:base_url+'actualizarColorAcentuado', 
                    method: 'POST',
                    data: { color: color },
                    success: function(response){
                        console.log(response);
                        // Manejar la respuesta del servidor aquí
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                        // Manejar el error aquí
                    }
                });
            });






    $('#logo').on('change', function(e) {
        e.preventDefault();
        
        var formData = new FormData();
        formData.append('imagen', $(this)[0].files[0]); // Agregar la imagen al objeto FormData
        
        $.ajax({
            url: base_url+'actualizarLogo', 
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Manejar la respuesta del servidor aquí
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores aquí
                console.error(xhr.responseText);
            }
        });
    });



    $('#logopreloader').on('change', function(e) {
        e.preventDefault();
        
        var formData = new FormData();
        formData.append('imagen', $(this)[0].files[0]); // Agregar la imagen al objeto FormData
        
        $.ajax({
            url: base_url+'actualizarlogopreloader', 
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Manejar la respuesta del servidor aquí
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores aquí
                console.error(xhr.responseText);
            }
        });
    });









    $('#nombre').on('input', function() {
        var nombre = $(this).val();
        $.ajax({
            url: base_url+'actualizarNombre', 
            type: 'POST',
            data: {nombre: nombre},
            success: function(response) {
               
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores aquí
                console.error(xhr.responseText);
            }
        });
    });






    $('#tel').on('input', function() {
        var nombre = $(this).val();
        $.ajax({
            url: base_url+'actualizarTel', 
            type: 'POST',
            data: {url: nombre},
            success: function(response) {
               
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores aquí
                console.error(xhr.responseText);
            }
        });
    });



    $('#movil').on('input', function() {
        var nombre = $(this).val();
        $.ajax({
            url: base_url+'actualizarMovil', 
            type: 'POST',
            data: {url: nombre},
            success: function(response) {
               
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores aquí
                console.error(xhr.responseText);
            }
        });
    });



    $('#mail').on('input', function() {
        var nombre = $(this).val();
        $.ajax({
            url: base_url+'actualizarMail', 
            type: 'POST',
            data: {url: nombre},
            success: function(response) {
               
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores aquí
                console.error(xhr.responseText);
            }
        });
    });



    $('#face').on('input', function() {
        var nombre = $(this).val();
        $.ajax({
            url: base_url+'actualizarFace', 
            type: 'POST',
            data: {url: nombre},
            success: function(response) {
               
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores aquí
                console.error(xhr.responseText);
            }
        });
    });


    $('#insta').on('input', function() {
        var nombre = $(this).val();
        $.ajax({
            url: base_url+'actualizarInsta', 
            type: 'POST',
            data: {url: nombre},
            success: function(response) {
               
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores aquí
                console.error(xhr.responseText);
            }
        });
    });


    $('#twitter').on('input', function() {
        var nombre = $(this).val();
        $.ajax({
            url: base_url+'actualizartwitter', 
            type: 'POST',
            data: {url: nombre},
            success: function(response) {
               
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores aquí
                console.error(xhr.responseText);
            }
        });
    });



    $('#nombre').on('input', function() {
        var nombre = $(this).val();
        $.ajax({
            url: base_url+'actualizarNombre', 
            type: 'POST',
            data: {nombre: nombre},
            success: function(response) {
               
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores aquí
                console.error(xhr.responseText);
            }
        });
    });



    $('#nombre').on('input', function() {
        var nombre = $(this).val();
        $.ajax({
            url: base_url+'actualizarNombre', 
            type: 'POST',
            data: {nombre: nombre},
            success: function(response) {
               
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Manejar errores aquí
                console.error(xhr.responseText);
            }
        });
    });











});
</script>