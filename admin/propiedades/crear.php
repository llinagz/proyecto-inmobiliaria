<?php
  //Base de datos
  require '../../includes/config/database.php';
  $db = conectarDB();

  //Consultar para obtener los vendedores
  $consulta = "SELECT * FROM vendedores";
  $resultado = mysqli_query($db, $consulta);

  //Arreglo con mensajes de errores
  $errores = [];

  $titulo = '';
  $precio = '';
  $descripcion = '';
  $habitaciones = '';
  $wc = '';
  $estacionamiento = '';
  $vendedores_id = '';

  //Ejecuta el codigo después de que el usuario envie el formulario
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";

    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamientos']);
    $vendedores_id = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    //Asignar files a una variables
    $imagen = $_FILES['imagen'];

    if(!$titulo ){
      $errores[] = "Debes añadir un título";
    }

    if(!$precio ){
      $errores[] = "El precio es obligatorio";
    }

    if(strlen($descripcion) < 50 ){
      $errores[] = "Debes añadir una descripcion y debe tener al menos 50 caracteres";
    }

    if(!$habitaciones){
      $errores[] = "El numero de habitaciones es obligatorio";
    }

    if(!$wc){
      $errores[] = "El numero de baños es obligatorio";
    }

    if(!$estacionamiento){
      $errores[] = "El numero de lugares de estacionamiento es obligatorio";
    }

    if(!$vendedores_id){
      $errores[] = "Elige un vendedor";
    }

    if(!$imagen['name']){
      $errores[] = "La imagen es obligatoria";
    }

    //Validar por tamaño (1mb maximo)
    $medida = 1000 * 1000;

    if($imagen['size'] > $medida){
      $errores[] = "La imagen es muy grande";
    }

    //Revisar que el arreglo de errores esté vacío
    if(empty($errores)){

      //Subida de archivos
      //Crear una carpeta
      $carpetaImagenes = '../../imagenes/';

      if(!is_dir($carpetaImagenes)){
        mkdir($carpetaImagenes);
      }

      //Generar un nombre único
      $nombreImagen = md5(uniqid(rand(), true));
      var_dump($nombreImagen);

      //Subir la imagen
      move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen . ".jpg");

      //Insertar en la BBDD
      $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ( '$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedores_id' ) ";

      //Mostrar la consulta
      echo $query;

      //Almacenarlo en la BBDD
      $resultado = mysqli_query($db, $query);

      if($resultado){
        //Redireccionar al usuario
        header('Location: /admin?resultado=1');
      }

    }
  }

  require '../../includes/funciones.php';
  incluirTemplate('header');
?>

    <main class="contenedor seccion">
      <h1>Crear</h1>

      <a href="/admin" class="boton boton-verde">Volver</a>

      <?php foreach($errores as $error): ?>
        <div class="alerta error">
          <?php echo $error ?>
        </div>
      <?php endforeach; ?>

      <form class="formulario" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Información general</legend>
            <label for="titulo">Titulo</label>
            <input type="text" id="titulo" name="titulo" placeholder="Titulo de la propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" placeholder="Precio de la propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <label for="descripcion">Descripcion</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la propiedad</legend>

            <label for="habitaciones">Habitaciones de la propiedad:</label>
            <input type="number" id="habitaciones" name="habitaciones" placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo $habitaciones; ?>">

            <label for="wc">Baños de la propiedad:</label>
            <input type="number" id="wc" name="wc" placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo $wc; ?>">

            <label for="estacionamientos">Estacionamientos:</label>
            <input type="number" id="estacionamiento" name="estacionamientos" placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="">
                <option value="">Seleccione un vendedor: </option>
                <?php while($vendedor = mysqli_fetch_assoc($resultado)): ?>
                  <option <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear propiedad" class="boton boton-verde">
      </form>
    </main>

<?php
  incluirTemplate('footer');
?>