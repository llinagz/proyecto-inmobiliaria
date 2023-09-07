<?php
  require '../../includes/app.php';

  use App\Propiedad;
  use Intervention\Image\ImageManagerStatic as Image;

  estaAutenticado();

  //Base de datos
  $db = conectarDB();

  $propiedad = new Propiedad();

  //Consultar para obtener los vendedores
  $consulta = "SELECT * FROM vendedores";
  $resultado = mysqli_query($db, $consulta);

  //Arreglo con mensajes de errores
  $errores = Propiedad::getErrores();

  //Ejecuta el codigo después de que el usuario envie el formulario
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //Crea una nueva instancia
    $propiedad = new Propiedad($_POST['propiedad']);
    
    /*SUBIDA DE ARCHIVOS*/ 
    //Generar un nombre único
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    //Setear la imagen
    //Realiza un resize a la imagen con internention
    if($_FILES['propiedad']['tmp_name']['imagen']){
      $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
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
      if($resultado === true){
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
        <?php include '../../includes/templates/formulario_propiedades.php'?>
        <input type="submit" value="Crear propiedad" class="boton boton-verde">
      </form>
    </main>

<?php
  incluirTemplate('footer');
?>