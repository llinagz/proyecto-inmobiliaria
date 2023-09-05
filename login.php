<?php

require 'includes/app.php';
    $db = conectarDB();

    //Autenticar al usuario

    $errores = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']) ;

        if(!$email){
            $errores[] = "El email es obligatorio o no es valido";
        }

        if(!$password){
            $errores[] = "El password es obligatorio o no es valido";
        }

        if(empty($errores)){
            //Revisar si existe el usuario
            $query = "SELECT * FROM usuarios WHERE email = '{$email}';";
            $resultado = mysqli_query($db, $query);

            if($resultado -> num_rows){
                //Revisar si el password es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                //Verificar si el password es correcto o no
                $auth = password_verify($password, $usuario['password']);

                if($auth){
                    //El usuario está autenticado
                    session_start();

                    //Llenar el arreglo de la sesion
                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');

                }else{
                    $errores[] = "El password es incorrecto";
                }
                
            }else{
                $errores[] = "El usuario no existe";
            }
        }
    }

  incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
      <h1>Iniciar sesión</h1>

      <?php
        foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
      <?php endforeach; ?>

      <form method="POST" class="formulario">
        <fieldset>
          <legend>Email y password</legend>
            <label for="email">E-mail</label>
            <input
              name="email"
              type="email"
              placeholder="Tu email"
              id="email"
            />

            <label for="password">Password</label>
            <input
              name="password"
              type="password"
              placeholder="Tu password"
              id="password"
            />
        </fieldset>
        <input type="submit" value="Iniciar sesion" class="boton boton-verde">
      </form>
    </main>

<?php
  incluirTemplate('footer');
?>
