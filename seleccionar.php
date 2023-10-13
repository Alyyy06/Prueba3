<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar Carpeta</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
        <h3 class="white-text center">Seleccionar Carpeta</h3>
        <div class="row center">
          <h5 class="header col s12 light4"></h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="https://img.freepik.com/fotos-premium/fondo-neon-negro-diseno-oscuro-moderno_744040-1286.jpg?w=2000"></div>
  </div>
    <div class="container">
        <h4 class=" Black-text center">Carpetas Disponibles en el directorio</h4>
        <hr>
        <table class="striped">
            <thead>
                <tr>
                    <th></th> 
                    <th>Nombre</th>
                    <th>Última modificación</th>
                    <th>Tipo de archivo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $carpetas = glob('carpetas/*', GLOB_ONLYDIR);
                date_default_timezone_set('America/Caracas');
                foreach ($carpetas as $carpeta) {
                    $nombre_carpeta = basename($carpeta);
                    $ultima_modificacion = date("Y-m-d H:i:s", filemtime($carpeta));
                    echo "<tr>";
                    echo "<td><i class='material-icons'></i></td>"; 
                    echo "<td><a href='ver_carpeta.php?carpeta=$nombre_carpeta'>$nombre_carpeta</a></td>";
                    echo "<td>$ultima_modificacion</td>";
                    echo "<td>Carpeta</td>";
                    echo "<td><a href='eliminar_carpeta.php?carpeta=$nombre_carpeta' class='btn pink'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <br><br><br><br>
    </div>
    <div class="container ">
  <nav id="bloc" class="nav-wrapper black-text container #880e4f pink darken-4">
    <div class="container black-text">
      <a class="center"></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down black-text container">
      <li><a href="index.php"><i class="material-icons left"></i>Regresar al Inicio</a></li>
      </ul>
    </div>
  </nav>

</div>
<br>
    <footer class="page-footer #880e4f pink darken-4">
    <div class="footer-copyright">
        <div class="container center">
        Todos los derechos son reservados <br>
            Alidsabeth Jimenez <br>
            Copyright ©2023 
           
        </div>
    </div>
</footer>
<script> document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.parallax');
    var instances = M.Parallax.init(elems);
  });</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
