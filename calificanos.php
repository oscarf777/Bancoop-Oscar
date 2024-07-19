<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/calificanos.css">
<title>Calificación con Estrellas</title>
</head>
<body>
  <div class="container">
    <h2>Calificación del Software Bancoop</h2>
    <div class="rating" id="rating">
      <span data-value="5"></span>
      <span data-value="4"></span>
      <span data-value="3"></span>
      <span data-value="2"></span>
      <span data-value="1"></span>
    </div>
    <p id="rating-value">Puntaje: <span id="selected-rating">0</span></p>
    <div class="button">
      <button id="submit-btn">Calificar</button>
    </div>
  </div>
    <div class="buttonv">
        <button onclick="window.history.back()">Volver</button>
    </div>

  <!-- Script de jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    // Script para manejar la calificación
    $(document).ready(function(){
      $('.rating > span').on('click', function(){
        var selectedValue = $(this).data('value');
        $('#selected-rating').text(selectedValue);
        // Aquí puedes enviar el valor a tu script de PHP mediante AJAX, por ejemplo
      });

      // Ejemplo de envío de calificación con AJAX
      $('#submit-btn').on('click', function(){
        var ratingValue = $('#selected-rating').text();
        $.ajax({
          method: 'POST',
          url: 'tu_script_php.php',  // Aquí debe ser la ruta correcta de tu script PHP para procesar la calificación
          data: { rating: ratingValue },
          success: function(response) {
            console.log('Calificación enviada con éxito:', response);
            // Puedes agregar aquí acciones adicionales después de enviar la calificación
          },
          error: function(xhr, status, error) {
            console.error('Error al enviar la calificación:', error);
          }
        });
      });
    });
  </script>
</body>
</html>
