<style>
        .containerQR {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 20px;
        }

        .form-section {
            flex: 1;
            padding-right: 20px; /* Espacio entre el formulario y el QR */
        }

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

        .qr-section {
            flex: 1;
            text-align: center; /* Centrar el QR y el texto debajo de él */
        }

        canvas {
            max-width: 100%;
            height: auto;
            border: 1px solid #000; /* Solo para visualización */
        }


 
    #descargarQR {
        background-color: #4CAF50; /* Color de fondo */
        color: white; /* Color del texto */
        padding: 10px 24px; /* Espaciado interno */
        border: none; /* Sin bordes */
        border-radius: 5px; /* Bordes redondeados */
        cursor: pointer; /* Cursor en forma de mano al pasar el ratón */
        font-size: 16px; /* Tamaño del texto */
        transition: all 0.3s; /* Transición suave para el efecto de hover */
    }

    #descargarQR:hover {
        background-color: #45a049; /* Color de fondo al pasar el ratón */
    }

    /* Opcional: Estilo para deshabilitar el botón */
    #descargarQR:disabled {
        background-color: #cccccc;
        color: #666666;
        cursor: not-allowed;
    }





    </style>

 <div class="container-fluid">


 <script>
const urllogo = "<?= $opciones["logoqr"] ?>"

</script>

<div class="container containerQR">
    <div class="form-section">
        <h2>Edita tu QR</h2>
    
     



        <div class="form-group">
            <label for="logo">Logo QR </label>
            <img src="<?= $opciones["logoqr"] ?>" height="auto" width="100px" />
            <input type="file" id="logoqr" name="logoqr" value="<?= $opciones["logoqr"] ?>" />
        </div>

        <div class="form-row">

        <div class="form-group">
          
        
        
        <label for="colorPicker">Tamaño Logo</label>
        <input type="number" min="8" id="pxLogo" name="pxLogo" value="<?= $opciones["pxLogo"] ?>" />

        </div>
        <div class="form-group">
          
        
        
        <label for="colorPicker">Color oscuro</label>
        <input style="height: 42px;" type="color" id="color1qr" name="color1qr" value="<?= $opciones["color1qr"] ?>" />

        </div>
        <div class="form-group">
          
        
        
        <label for="colorPicker">Color claro</label>
        <input style="height: 42px;" type="color" id="color2qr" name="color2qr" value="<?= $opciones["color2qr"] ?>" />

        </div>





        </div>

<!-- Botón para descargar el QR -->
<button id="descargarQR">Descargar QR</button>


    </div>

    <div class="qr-section">
        <canvas id="qrcodeCanvas" width="350" height="350"></canvas>
        <p>Escanea el código QR para ver si funciona antes de descargar.</p>
    </div>
</div>



  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcode-generator/1.4.4/qrcode.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
document.addEventListener('DOMContentLoaded', function () {


    loadQr();



    document.getElementById('descargarQR').addEventListener('click', function() {
    var canvas = document.getElementById('qrcodeCanvas'); // Asegúrate de usar el ID correcto de tu canvas
    var url = canvas.toDataURL('image/png'); // Crea una URL para la imagen

    // Crea un enlace temporal para iniciar la descarga
    var link = document.createElement('a');
    link.download = 'codigoQR.png'; // Nombre del archivo para la descarga
    link.href = url;
    document.body.appendChild(link);
    link.click(); // Inicia la descarga
    document.body.removeChild(link); // Elimina el enlace temporal
});

    $('#logoqr').on('change', function(e) {
        e.preventDefault();
        
        var formData = new FormData();
        formData.append('imagen', $(this)[0].files[0]); // Agregar la imagen al objeto FormData
        
        $.ajax({
            url: base_url+'actualizarlogoqr', 
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // Manejar la respuesta del servidor aquí
                loadQr();
            },
            error: function(xhr, status, error) {
                // Manejar errores aquí
                console.error(xhr.responseText);
            }
        });
    });




    $('#pxLogo').change(function(){
            var selectedValue = $(this).val();
            console.log('Valor seleccionado:', selectedValue);
            // Realizar la llamada AJAX aquí
            $.ajax({
                url:base_url+'actualizarpxLogo', 
                method: 'POST',
                data: { valor: selectedValue },
                success: function(response){
                    loadQr();
                },
                error: function(xhr, status, error){
                    console.error(xhr.responseText);
                    // Manejar el error aquí
                }
            });
        });
  



    $('#color2qr').change(function(){
                var color = $(this).val();
                console.log('Color seleccionado:', color);
                // Realizar la llamada AJAX aquí
                $.ajax({
                    url:base_url+'actualizarcolor2qr', 
                    method: 'POST',
                    data: { color: color },
                    success: function(response){
                        loadQr();
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                        // Manejar el error aquí
                    }
                });
            });

    $('#color1qr').change(function(){
                var color = $(this).val();
                console.log('Color seleccionado:', color);
                // Realizar la llamada AJAX aquí
                $.ajax({
                    url:base_url+'actualizarcolor1qr', 
                    method: 'POST',
                    data: { color: color },
                    success: function(response){
                        loadQr();
                        // Manejar la respuesta del servidor aquí
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                        // Manejar el error aquí
                    }
                });
            });











});




function loadQr(){


    const canvas = document.getElementById('qrcodeCanvas');
    const context = canvas.getContext('2d');
    context.clearRect(0, 0, canvas.width, canvas.height);




    $.ajax({
                    url:base_url+'getOptions', 
         success: function(response){
                       
            datos = JSON.parse(response);
            opciones = datos["opciones"]

            console.log(opciones)

    // Genera el QR y lo dibuja en el canvas
    const qrCode = new QRCode(document.createElement('div'), {
        text: base_url,
        width: 350,
        height: 350,
        colorDark: opciones["color1qr"],
        colorLight: opciones["color2qr"],
        correctLevel: QRCode.CorrectLevel.H,
    });

    // Espera a que se genere el QR
    setTimeout(() => {
        const qrCanvas = qrCode._oDrawing._elCanvas; // Obtén el canvas del QR
        context.drawImage(qrCanvas, 0, 0); // Dibuja el QR en el canvas principal

        // Dibuja el logotipo en el centro
        const logoSize =  opciones["pxLogo"];
        const logoPosition = (350 - logoSize) / 2;
        const img = new Image();
        img.onload = function() {
            context.drawImage(img, logoPosition, logoPosition, logoSize, logoSize);
        };
        img.src = urllogo; // Asegúrate de que la ruta del logo sea correcta
    }, 500);



                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                        // Manejar el error aquí
                    }
                });









}


</script>