<?php
  require 'includes/funciones.php';

  $inicio = true;
  incluirTemplate('header', $inicio);
?>

    <main class="contenedor seccion">
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
    </main>

    <section class="seccion contenedor">
      <h2>Casas y departamentos en venta</h2>

      <?php 
        $limite = 1;
        include 'includes/templates/anuncios.php';
      ?>

      <div class="alinear-derecha">
        <a class="boton-verde" href="anuncios.php">Ver todas</a>
      </div>
    </section>

    <section class="imagen-contacto">
      <h2>Encuentra la casa de tus sueños</h2>
      <p>
        Llena el formulario de contacto y un asesor se pondrá en contacto
        contigo
      </p>
      <a href="contacto.html" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
      <section class="blog">
        <h3>Nuestro blog</h3>
        <article class="entrada-blog">
          <div class="imagen">
            <picture>
              <source srcset="build/img/blog1.webp" type="image/webp" />
              <source srcset="build/img/blog1.jpg" type="image/jpg" />
              <img
                loading="lazy"
                src="build/img/blog1.jpg"
                alt="Texto entrada blog"
              />
            </picture>
          </div>
          <div class="texto-entrada">
            <a href="entrada.html">
              <h4>Terraza en el techo de tu casa</h4>
              <p class="informacion-meta">
                Escrito el: <span>20/10/2023</span> por: <span>Admin</span>
              </p>
              <p>
                Consejos para contruir una terraza en tu casa con los mejores
                materiales ahorrando dinero.
              </p>
            </a>
          </div>
        </article>

        <article class="entrada-blog">
          <div class="imagen">
            <picture>
              <source srcset="build/img/blog2.webp" type="image/webp" />
              <source srcset="build/img/blog2.jpg" type="image/jpg" />
              <img
                loading="lazy"
                src="build/img/blog2.jpg"
                alt="Texto entrada blog"
              />
            </picture>
          </div>
          <div class="texto-entrada">
            <a href="entrada.html">
              <h4>Guia para la decoracion de tu hogar</h4>
              <p class="informacion-meta">
                Escrito el: <span>20/10/2023</span> por: <span>Admin</span>
              </p>
              <p>
                Consejos para contruir una terraza en tu casa con los mejores
                materiales ahorrando dinero.
              </p>
            </a>
          </div>
        </article>
      </section>

      <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
          <blockquote>El personal se comportó de excelente forma.</blockquote>
          <p>Javier Llinares</p>
        </div>
      </section>
    </div>

<?php
  incluirTemplate('footer');
?>
