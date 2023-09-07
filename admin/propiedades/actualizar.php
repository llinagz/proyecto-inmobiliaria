<?php

  use App\Propiedad;
  use Intervention\Image\ImageManagerStatic as Image;
  require '../../includes/app.php';
  estaAutenticado();

  //Validar la URL por ID valido
  $id = $_GET['id'];
  $id = filter_var($id, FILTER_VALIDATE_INT);

  if(!$id){
    header('Location: /admin');
  }

  //Consultar para obtener los datos de la propiedad
  $propiedad = Propiedad::find($id);
  
  //Consultar para obtener los vendedores
  $consulta = "SELECT * FROM vendedores";
  $resultado = mysqli_query($db, $consulta);

  //Arreglo con mensajes de errores
  $errores = Propiedad::getErrores();

  //Ejecuta el codigo después de que el usuario envie el formulario
  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //Asignar los atributos
    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);
  
    //Validacion
    $errores = $propiedad->validar();

    /*SUBIDA DE ARCHIVOS*/
    //Generar un nombre único
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    //Setear la imagen
    //Realiza un resize a la imagen con internention
    if($_FILES['propiedad']['tmp_name']['imagen'] != ""){
      $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
      $propiedad->setImagen($nombreImagen);
    }

    //Revisar que el arreglo de errores esté vacío
    if(empty($errores)){
      //Almacenar la imagen en el disco duro
      if($image != null){
        $image->save(CARPETA_IMAGENES . $nombreImagen);
      }
      $propiedad->guardar();
    }
  }

  incluirTemplate('header');
?>

    <main class="contenedor seccion">
      <h1>Actualizar</h1>

      <a href="/admin" class="boton boton-verde">Volver</a>

      <?php foreach($errores as $error): ?>
        <div class="alerta error">
          <?php echo $error ?>
        </div>
      <?php endforeach; ?>

      <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php' ?>

        <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
      </form>
    </main>

<?php
  incluirTemplate('footer');
?>