<?php
  require 'includes/funciones.php';

  incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
      <h1>Guía para la decoración de tu hogar</h1>
      <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp" />
        <source srcset="build/img/destacada2.jpg" type="image/jpg" />
        <img
          loading="lazy"
          src="build/img/destacada2.jpg"
          alt="imagen de la propiedad"
        />
      </picture>
      <p class="informacion-meta">
        Escrito el: <span>20/10/2022</span> por: <span>Admin</span>
      </p>
      <div class="resumen-propiedad">
        <p class="precio">1.500.000€</p>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione,
          eius expedita quos, accusantium odio consequuntur qui eaque
          repellendus mollitia inventore impedit blanditiis. Doloremque placeat
          blanditiis minus voluptas ullam nulla maxime.
        </p>
      </div>
    </main>

    <?php
  incluirTemplate('footer');
?>
