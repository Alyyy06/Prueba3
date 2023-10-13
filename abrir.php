<?php
if (isset($_GET['archivo_existente'])) {
    $nombre_archivo_original = urldecode($_GET['archivo_existente']); 
    $ruta_archivo_original = "archivos/$nombre_archivo_original";

    if (strpos($nombre_archivo_original, '/') !== false) {
        $ruta_archivo_original = "carpetas/$nombre_archivo_original";
    }

    if (file_exists($ruta_archivo_original)) {
        $contenido = file_get_contents($ruta_archivo_original);
    } else {
        $contenido = "El archivo no existe.";
    }
} else {
    $nombre_archivo_original = '';
    $contenido = '';
}

if (isset($_POST['guardar_cambios'])) {
    $nombre_archivo_original = $_POST['nombre_archivo_original'];
    $nombre_archivo_nuevo = $_POST['nombre_archivo_nuevo'];
    $ubicacion_destino = $_POST['ubicacion_destino'];

    $ruta_archivo_original = strpos($nombre_archivo_original, '/') !== false ? "carpetas/$nombre_archivo_original" : "archivos/$nombre_archivo_original";

    if (file_exists($ruta_archivo_original)) {
        $nombre_archivo_nuevo_con_ruta = $ubicacion_destino . '/' . $nombre_archivo_nuevo;
        $ruta_archivo_nuevo = "carpetas/$nombre_archivo_nuevo_con_ruta";

        if (file_exists($ruta_archivo_nuevo)) {
            unlink($ruta_archivo_nuevo);
        }

        rename($ruta_archivo_original, $ruta_archivo_nuevo);

        file_put_contents($ruta_archivo_nuevo, $_POST['contenido']);

        header('Location: seleccionar.php');
        exit();
    } else {
        echo "El archivo no existe en la actual ubicación.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bloc de Notas</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>

<body>
    <div>
    <nav id="bloc" class="nav-wrapper #880e4f pink darken-4">
        <div class="container">
        <a class="brand-logo center">Bloc de Notas</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
        </ul>
        </div>
    </nav>
    </div>
    <div id="index-banner" class="parallax-container" >
    <div class="section no-pad-bot" id="inicio">
      <div class="container">
        <br><br><br><br><br><br>
        <h3 class="white-text center">Editar o abrir un archivo</h3>
        <div class="row center">
          <h5 class="header col s12 light4"></h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="https://img.freepik.com/fotos-premium/fondo-neon-negro-diseno-oscuro-moderno_744040-1286.jpg?w=2000"></div>
  </div>
<br>
    <form method="POST" action="abrir.php">
        <input type="hidden" name="nombre_archivo_original" value="<?php echo htmlspecialchars($nombre_archivo_original); ?>">
        <div class="input-field">
            <input type="text" name="nombre_archivo_nuevo" value="<?php echo htmlspecialchars($nombre_archivo_original); ?>">
            <label for="nombre_archivo_nuevo">Nombre del archivo:</label>
        </div>
        <br>
        <label for="contenido">Contenido:</label>
        <textarea class="materialize-textarea" name="contenido" rows="10" cols="50"><?php echo htmlspecialchars($contenido); ?></textarea>
        <br>
        <br>
        <div class="center">

            <button class="btn waves-effect #880e4f pink darken-4" type="submit" name="guardar_cambios">Guardar Cambios
                <i class="material-icons right"></i>
            </button>
        </div>
        <br>
    </form>

    <div class="center-align">
       <a href="seleccionar.php" class="#880e4f pink darken-4 white-text btn">Regresar</a>
    </div>

    <br>
    <div class="nav-wrapper #880e4f pink darken-4 container">
    <nav id="bloc" class="nav-wrapper #880e4f pink darken-4 container">
        <div class="container">
        <a class="brand-logo center"></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down container">
        <li><a href="index.php">Volver al Inicio</a></li>
        </ul>
        </div>
    </nav>
    </div>
<br><br><br><br>
    <footer class="page-footer #880e4f pink darken-4">
    <div class="footer-copyright">
        <div class="container center-align">
            <br>
            Todos los derechos son reservados <br>
            Alidsabeth Jimenez <br>
            Copyright ©2023 
            <br>
            <br>
            <br>
        </div>
    </div>
</footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script> document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems);
  });</script>
</body>
</html>
