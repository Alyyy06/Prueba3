<!DOCTYPE html>
<html>
<head>
    <title>Bloc de Notas</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.cs">
</head>
<body>
<div>
  <nav id="bloc" class="nav-wrapper #880e4f pink darken-4">
    <div class="container">
      <a class="brand-logo center">Bloc de Notas</a>
    </div>
  </nav>
</div>

<div id="index-banner" class="parallax-container" >
    <div class="section no-pad-bot" id="inicio">
      <div class="container">
        <br><br><br><br><br><br>
        <h3 class="white-text center">Nueva Carpeta</h3>
        <div class="row center">
          <h5 class="header col s12 light4"></h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="https://img.freepik.com/fotos-premium/fondo-neon-negro-diseno-oscuro-moderno_744040-1286.jpg?w=2000"></div>
  </div>
<div class="container">
    <div class="container">
        <br><br>
        <form method="POST" action="crear_carpeta.php">
        <div class="input-field">
            <input type="text" name="nombre_carpeta">
            <label for="nombre_carpeta">Nombre de la carpeta:</label>
            </div>
            <div class="center">
                <button class="btn waves-effect #880e4f pink darken-4" type="submit" name="crear_carpeta">Crear Carpeta

            </div>
                <i class="material-icons right"></i>
            </button>
        </form>
        <br><br>
<hr>
        <h3 class=" black-text center">Crear Notas</h3>

        <form method="POST" action="guardar.php">
            <div class="input-field">
                <input type="text" name="nombre_archivo" required>
                <label for="nombre_archivo">Nombre del archivo:</label>
            </div>
            <br>
            <textarea class="materialize-textarea" name="contenido" rows="10" cols="50" placeholder="Escriba Texto"></textarea>
            <br>
        
            <label for="ubicacion" >Ubicación:</label>
            <select class="input-field" name="ubicacion" required>
                <?php
                $carpetas = glob('carpetas/*', GLOB_ONLYDIR);
                foreach ($carpetas as $carpeta) {
                    $nombre_carpeta = basename($carpeta);
                    echo "<option value='$nombre_carpeta'>Dentro de '$nombre_carpeta'</option>";
                }
                ?>
            </select>
            <br>
            <div class="center"> 

                <button class="btn waves-effect #880e4f pink darken-4" type="submit" name="guardar">Guardar
                    <i class="material-icons right"></i>
                </button>
            </div>
        </form>
        <br>
    </div>
</div>

<div class="container ">
  <nav id="bloc" class="nav-wrapper black-text container #880e4f pink darken-4">
    <div class="container black-text">
      <a class="center"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down black-text container">
        <li><a href="seleccionar.php"><i class="material-icons left black-text"></i>Abrir Carpetas</a></li>
      </ul>
    </div>
  </nav>
</div>
<br><br>
    <footer class="page-footer #880e4f pink darken-4">
    <div class="footer-copyright">
        <div class="container center">
        Todos los derechos son reservados <br>
            Alidsabeth Jimenez <br>
            Copyright ©2023 
  
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script> document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems);
  });
  
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, );
  });
  
  
  </script>
</body>
</html>
