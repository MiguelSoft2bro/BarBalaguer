<style>
html {
  height: 58%;
}
body {
  min-height: 58%;
  display: grid;
  grid-template-rows: 1fr auto;
}
.footer {
  grid-row-start: 2;
  grid-row-end: 3;
}


.login {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 80vh; /* Esto hace que el contenedor .login ocupe al menos toda la altura de la ventana */
  padding: 20px; /* Añade algo de espacio alrededor para evitar que el contenido toque los bordes */
}

.containerLogin {
  width: 100%;
  max-width: 400px; /* Ajusta esto para cambiar el ancho máximo del formulario */
  background: #f3f3f3; /* Color de fondo ligero para el contenedor del formulario, cambia según tu diseño */
  padding: 20px;
  border-radius: 10px; /* Bordes redondeados para el contenedor del formulario */
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra suave para darle un poco de profundidad */
}

input[type=email], input[type=password] {
  width: 100%; /* Hace que los campos de entrada ocupen todo el ancho del contenedor .container */
  padding: 10px; /* Añade algo de espacio dentro de los campos de entrada */
  margin: 10px 0; /* Añade algo de margen entre los campos de entrada y otros elementos */
  border: 1px solid #ccc; /* Borde sutil para los campos de entrada */
  border-radius: 5px; /* Bordes redondeados para los campos de entrada */
}

.button {
  width: 100%; /* Hace que el botón ocupe todo el ancho del contenedor .container */
  padding: 10px; /* Añade algo de espacio dentro del botón */
  background-color:var(--color-acento); /* Color de fondo para el botón, usa tu color principal */
  color: white; /* Texto blanco para el botón */
  border: none; /* Elimina el borde del botón */
  border-radius: 5px; /* Bordes redondeados para el botón */
  cursor: pointer; /* Cambia el cursor a una mano cuando se pasa por encima del botón */
}


</style>


<div class="login app-pages app-section">
		<div class="container containerLogin">
			<div class="pages-title">
				<h3>Login</h3>
			</div>
			<form id="login-form" action="#">
			
        <div class="mb-3">
            <label for="loginEmail" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="loginEmail" name="loginEmail" required>
          </div>
          <div class="mb-3">
            <label for="loginPassword" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
          </div>

				<button class="button">Login</button>
	
			</form>
	
		</div>
	</div>









  <script>



$('#login-form').submit(function(event) {
  event.preventDefault(); // Detener el envío del formulario

  var form = $(this); // Obtener el formulario


 
  // Si el formulario es válido, enviar una solicitud HTTP POST a la URL de registro
  $.ajax({
    type: 'POST',
    url: 'loginAdmin', // Cambia esto por la URL de registro
    data: form.serialize(),
    success: function(data) {
console.log(data)
if (data == 1) {
 window.location.href = 'administracion';
}else{


   alert('No existe ningun usuario con ese email y contraseña.');


}
    },
    error: function(xhr, textStatus, error) {
      // Manejar el error aquí
      alert('Hubo un error al intentar registrarse.');
    }
  });
});


  </script>