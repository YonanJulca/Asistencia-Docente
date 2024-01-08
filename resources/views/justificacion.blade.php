<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Justificaciones</title>

  <!-- Conexión con archivos CSS -->
  <link rel="stylesheet" href="{{ asset('css/justificacion.css') }}">
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 
  <!-- conexion con google fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>

<body>

  <!-- Contenido del cuerpo de la página -->
  <div class="body-container" id="body-container">
    <!-- Título de la página -->
    <div class="title">
      <h1>Redactar Justificación</h1>
      <hr>
    </div>
    
    <!-- Contenedor principal del formulario -->
    <div class="container mt-4">
      <!-- Muestra mensajes de éxito o error -->
      @if(session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
      @endif

      @if($errors->any())
      <div class="alert alert-danger" role="alert">
        Por favor, corrige los siguientes errores:
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <!-- Formulario para enviar una justificación -->
      <form action="{{ route('enviar.justificacion') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Campo para el nombre -->
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre:</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
        </div>

        <!-- Campo para el motivo de la justificación -->
        <div class="mb-3">
          <label for="motivo" class="form-label">Motivo de la justificación:</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-comment"></i></span>
            <textarea class="form-control" id="motivo" name="motivo" rows="4" required></textarea>
          </div>
        </div>

        <!-- Campo para cargar evidencia en formato PDF -->
        <div class="mb-3">
          <label for="evidencia" class="form-label">Cargar evidencia (.pdf):</label>
          <div class="input-group">
            <span class="input-group-text"><i class="fas fa-file-pdf"></i></span>
            <input type="file" class="form-control" id="evidencia" name="evidencia" accept=".pdf" required>
          </div>
        </div>

        <!-- Botones para enviar la justificación o cancelar -->
        <div class="mb-3 text-center">
          <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Enviar Justificación</button>
          <button type="button" class="btn btn-danger"><i class="fas fa-times"></i> Cancelar</button>
        </div>
      </form>
    </div>
  </div>
  <script src="https://kit.fontawesome.com/0057a56781.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
