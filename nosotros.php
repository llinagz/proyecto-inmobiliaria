<?php
  require 'includes/app.php';

  incluirTemplate('header');
?>

    <main class="contenedor seccion">
      <h1>Sobre nosotros</h1>
      <div class="contenido-nosotros">
        <div class="imagen">
          <picture>
            <source srcset="./build/img/nosotros.webp" type="image/webp" />
            <source srcset="./build/img/nosotros.jpg" type="image/jpg" />
            <img
              src="build/img/nosotros.jpg"
              alt="Sobre nosotros"
              loading="lazy"
            />
          </picture>
        </div>
        <div class="texto-nosotros">
          <blockquote>25 años de experiencia</blockquote>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat
            repudiandae, ex minus enim ab necessitatibus quia expedita, atque
            doloribus perferendis harum quidem aspernatur molestiae culpa ipsa.
            Autem dolorum repellat fugit?
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus
            tempore cum libero quo voluptates neque debitis adipisci nesciunt
            accusamus magnam ratione numquam, perspiciatis ipsam, nostrum
            voluptatum dolores distinctio! Fuga, mollitia.
          </p>
        </div>
      </div>
    </main>

    <section class="contenedor seccion">
      <h1>Más sobre nosotros</h1>
      <div class="iconos-nosotros">
        <div class="icono">
          <img
            src="build/img/icono1.svg"
            alt="Icono de seguridad"
            loading="lazy"
          />
          <h3>Seguridad</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint
            obcaecati eum beatae corporis, nulla quaerat deserunt pariatur
            facilis sunt dolor, ut nihil accusamus ab porro asperiores.
            Doloribus fugit iusto libero?
          </p>
        </div>
        <div class="icono">
          <img
            src="build/img/icono2.svg"
            alt="Icono de seguridad"
            loading="lazy"
          />
          <h3>Precio</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint
            obcaecati eum beatae corporis, nulla quaerat deserunt pariatur
            facilis sunt dolor, ut nihil accusamus ab porro asperiores.
            Doloribus fugit iusto libero?
          </p>
        </div>
        <div class="icono">
          <img
            src="build/img/icono3.svg"
            alt="Icono de seguridad"
            loading="lazy"
          />
          <h3>Tiempo</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint
            obcaecati eum beatae corporis, nulla quaerat deserunt pariatur
            facilis sunt dolor, ut nihil accusamus ab porro asperiores.
            Doloribus fugit iusto libero?
          </p>
        </div>
      </div>
    </section>

    <?php
  incluirTemplate('footer');
?>
