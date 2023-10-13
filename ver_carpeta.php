<!DOCTYPE html>
<html>
<head>
    <title>Ver Carpeta</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
<div id="index-banner" class="parallax-container" >
    <div class="section no-pad-bot" id="inicio">
      <div class="container">
        <br><br><br><br><br><br>
        <h3 class="white-text center">Visualización</h3>
        <div class="row center">
          <h5 class="header col s12 light4"></h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="https://img.freepik.com/fotos-premium/fondo-neon-negro-diseno-oscuro-moderno_744040-1286.jpg?w=2000"></div>
  </div>
    <?php
        if (isset($_GET['carpeta'])) {
            $carpeta_seleccionada = $_GET['carpeta'];
            $ruta_carpeta = "carpetas/$carpeta_seleccionada";
            
           
            if (isset($_POST['nuevo_nombre_carpeta'])) {
                $nuevo_nombre_carpeta = $_POST['nuevo_nombre_carpeta'];
                $ruta_carpeta_nueva = "carpetas/$nuevo_nombre_carpeta";
                
                if (file_exists($ruta_carpeta)) {
                    if (!file_exists($ruta_carpeta_nueva)) {
                        rename($ruta_carpeta, $ruta_carpeta_nueva);
                        $carpeta_seleccionada = $nuevo_nombre_carpeta;
                    } else {
                        echo "El nombre de carpeta ya existe.";
                    }
                }
            }
            ?>
            <div>
                <nav id="bloc" class="nav-wrapper #880e4f pink darken-4">
                    <div class="container">
                        <a class="brand-logo center">Contenido de la carpeta <?php echo "$carpeta_seleccionada" ?></a>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                        </ul>
                    </div>
                </nav>
            </div>
            
            <div class="container">
            <?php
            echo "<form method='POST' action='ver_carpeta.php?carpeta=$carpeta_seleccionada'>"; ?>
            <div class="input-field">
                <input type='text' name='nuevo_nombre_carpeta'>
                <label for='nuevo_nombre_carpeta'>Nuevo nombre:</label>
            </div>
            <center>
                <button class="btn waves-effect #880e4f pink darken-4 white-text" type="submit" name="renombrar_carpeta">Renombrar</button>

            </center>
            <?php
            echo "</form>";

            if (isset($_GET['eliminar'])) {
                $archivo_a_eliminar = $_GET['eliminar'];
                $ruta_archivo_a_eliminar = "$ruta_carpeta/$archivo_a_eliminar";

                if (file_exists($ruta_archivo_a_eliminar)) {
                    if (unlink($ruta_archivo_a_eliminar)) {
                        
                    } else {
                        echo "No se pudo eliminar el archivo '$archivo_a_eliminar'.";
                    }
                } else {
                    echo "El archivo '$archivo_a_eliminar' no existe.";
                }
            }
            ?>
            <br>
            <?php
            $archivos = glob("$ruta_carpeta/*.txt");
            if (count($archivos) > 0) {
                echo "<table class='striped'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Nombre</th>";
                echo "<th>Tipo de archivo</th>";
                
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                foreach ($archivos as $archivo) {
                    $nombre_archivo = basename($archivo);

                    echo "<tr>";
                    echo "<td><a href='abrir.php?archivo_existente=$carpeta_seleccionada/$nombre_archivo'>$nombre_archivo</a></td>";
                    echo "<td>Archivo</td>";
                    echo "<td><a href='ver_carpeta.php?carpeta=$carpeta_seleccionada&eliminar=$nombre_archivo' class='btn #880e4f pink darken-4'>Eliminar</a></td>";
                    echo "</tr>";
                }
                
                echo "</tbody>";
                echo "</table>";
            } else {
                echo "La carpeta está vacía.";
                header('Location: seleccionar.php');
            }
        } else {
            echo "La carpeta no existe.";
        }
        ?>
    </div>
    <br> <br>
    <center>

        <a href="seleccionar.php" class="waves-effect #880e4f pink darken-4 btn">Regresar</a>
    </center><br><br><br>
<div class="nav-wrapper #880e4f pink darken-4 container">
    <div class="container">
        <nav id="bloc" class="nav-wrapper #880e4f pink darken-4 container">
            <div class="container">
                <a class="brand-logo center"></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php"><i class="material-icons left "></i>Regresar al Inicio</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<br><br><br><br><br>
    <footer class="page-footer #880e4f pink darken-4">
    <div class="footer-copyright">
        <div class="container center">
            <br><br>
        Todos los derechos son reservados <br>
            Alidsabeth Jimenez <br>
            Copyright ©2023 
            <br><br><br>
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
