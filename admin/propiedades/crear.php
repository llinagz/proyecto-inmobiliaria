<?php
  require '../../includes/app.php';

  use App\Propiedad;
  use Intervention\Image\ImageManagerStatic as Image;

  estaAutenticado();

  //Base de datos
  $db = conectarDB();

  //Consultar para obtener los vendedores
  $consulta = "SELECT * FROM vendedores";
  $resultado = mysqli_query($db, $consulta);

  //Arreglo con mensajes de errores
  $errores = Propiedad::getErrores();

  $titulo = '';
  $precio = '';
  $descripcion = '';
  $habitaciones = '';
  $wc = '';
  $estacionamiento = '';
  $vendedores_id = '';

  //Ejecuta el codigo después de que el usuario envie el formulario
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //Crea una nueva instancia
    $propiedad = new Propiedad($_POST);
    
    /*SUBIDA DE ARCHIVOS*/ 
    //Generar un nombre único
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    //Setear la imagen
    //Realiza un resize a la imagen con internention
    if($_FILES['imagen']['tmp_name']){
      $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800,600);
      $propiedad->setImagen($nombreImagen);
    }

    //Validar
    $errores = $propiedad->validar();

    //Revisar que el arreglo de errores esté vacío
    if(empty($errores)){
      //Crear la carpeta para subir imágenes
      if(!is_dir(CARPETA_IMAGENES)){
        mkdir(CARPETA_IMAGENES);
      }

      //Guarda la imagen en el servidor
      $image->save(CARPETA_IMAGENES . $nombreImagen);

      //Guarda en la base de datos
      $resultado = $propiedad -> guardar();

      //Mensaje de exito o error
      if($resultado){
        //Redireccionar al usuario
        header('Location: /admin?resultado=1');
      }
    }
  }
  
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

            <label for="estacionamiento">Estacionamientos:</label>
            <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ejemplo: 3" min="1" max="9" value="<?php echo $estacionamiento; ?>">
        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedores_id" id="">
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