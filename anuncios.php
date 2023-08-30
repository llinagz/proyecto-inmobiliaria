<?php
  require 'includes/funciones.php';

  incluirTemplate('header');
?>

    <main class="contenedor seccion">
      <h2>Casas y departamentos en venta</h2>
      <div class="contenedor-anuncios">
        <div class="anuncio">
          <picture>
            <source srcset="build/img/anuncio1.webp" type="image/webp" />
            <source srcset="build/img/anuncio1.jpg" type="image/jpg" />
            <img src="build/img/anuncio1.jpg" alt="Anuncio" />
          </picture>
          <div class="contenido-anuncio">
            <h3>Casa de lujo en el lago</h3>
            <p>
              Casa en el lago con excelente vista, acabados de lujo a un
              excelente precio
            </p>
            <p class="precio">3.000.000€</p>
            <ul class="iconos-caracteristicas">
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_wc.svg"
                  alt="icono wc"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_estacionamiento.svg"
                  alt="icono wc"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_dormitorio.svg"
                  alt="icono wc"
                />
                <p>4</p>
              </li>
            </ul>

            <a class="boton-amarillo-block" href="anuncio.html"
              >Ver propiedad</a
            >
          </div>
        </div>

        <div class="anuncio">
          <picture>
            <source srcset="build/img/anuncio2.webp" type="image/webp" />
            <source srcset="build/img/anuncio2.jpg" type="image/jpg" />
            <img src="build/img/anuncio2.jpg" alt="Anuncio" />
          </picture>
          <div class="contenido-anuncio">
            <h3>Casas terminadas de lujo</h3>
            <p>Casas listas para vivir en entornos privilegiados.</p>
            <p class="precio">3.000.000€</p>
            <ul class="iconos-caracteristicas">
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_wc.svg"
                  alt="icono wc"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_estacionamiento.svg"
                  alt="icono wc"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_dormitorio.svg"
                  alt="icono wc"
                />
                <p>4</p>
              </li>
            </ul>

            <a class="boton-amarillo-block" href="anuncio.html"
              >Ver propiedad</a
            >
          </div>
        </div>

        <div class="anuncio">
          <picture>
            <source srcset="build/img/anuncio3.webp" type="image/webp" />
            <source srcset="build/img/anuncio3.jpg" type="image/jpg" />
            <img src="build/img/anuncio3.jpg" alt="Anuncio" />
          </picture>
          <div class="contenido-anuncio">
            <h3>Casa con alberca</h3>
            <p>
              Siéntete en la orilla del mar con nuestras exclusivas casas con
              alberca.
            </p>
            <p class="precio">3.000.000€</p>
            <ul class="iconos-caracteristicas">
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_wc.svg"
                  alt="icono wc"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_estacionamiento.svg"
                  alt="icono wc"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_dormitorio.svg"
                  alt="icono wc"
                />
                <p>4</p>
              </li>
            </ul>

            <a class="boton-amarillo-block" href="anuncio.html"
              >Ver propiedad</a
            >
          </div>
        </div>
        <div class="anuncio">
          <picture>
            <source srcset="build/img/anuncio4.webp" type="image/webp" />
            <source srcset="build/img/anuncio4.jpg" type="image/jpg" />
            <img src="build/img/anuncio4.jpg" alt="Anuncio" />
          </picture>
          <div class="contenido-anuncio">
            <h3>Casas particulares</h3>
            <p>
              Casas estupendas en barrios residenciales con todos los servicios
            </p>
            <p class="precio">1.000.000€</p>
            <ul class="iconos-caracteristicas">
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_wc.svg"
                  alt="icono wc"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_estacionamiento.svg"
                  alt="icono wc"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_dormitorio.svg"
                  alt="icono wc"
                />
                <p>4</p>
              </li>
            </ul>

            <a class="boton-amarillo-block" href="anuncio.html"
              >Ver propiedad</a
            >
          </div>
        </div>

        <div class="anuncio">
          <picture>
            <source srcset="build/img/anuncio5.webp" type="image/webp" />
            <source srcset="build/img/anuncio5.jpg" type="image/jpg" />
            <img src="build/img/anuncio5.jpg" alt="Anuncio" />
          </picture>
          <div class="contenido-anuncio">
            <h3>Apartamentos adosados</h3>
            <p>
              Zonas verdes y gran vecindario. Todos los servicios al alcance de
              la mano
            </p>
            <p class="precio">1.500.000€</p>
            <ul class="iconos-caracteristicas">
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_wc.svg"
                  alt="icono wc"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_estacionamiento.svg"
                  alt="icono wc"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_dormitorio.svg"
                  alt="icono wc"
                />
                <p>4</p>
              </li>
            </ul>

            <a class="boton-amarillo-block" href="anuncio.html"
              >Ver propiedad</a
            >
          </div>
        </div>

        <div class="anuncio">
          <picture>
            <source srcset="build/img/anuncio6.webp" type="image/webp" />
            <source srcset="build/img/anuncio6.jpg" type="image/jpg" />
            <img src="build/img/anuncio6.jpg" alt="Anuncio" />
          </picture>
          <div class="contenido-anuncio">
            <h3>Casa premium</h3>
            <p>Nuestra mejor selección de hogares para los más exigentes</p>
            <p class="precio">5.000.000€</p>
            <ul class="iconos-caracteristicas">
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_wc.svg"
                  alt="icono wc"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_estacionamiento.svg"
                  alt="icono wc"
                />
                <p>3</p>
              </li>
              <li>
                <img
                  class="icono"
                  loading="lazy"
                  src="build/img/icono_dormitorio.svg"
                  alt="icono wc"
                />
                <p>4</p>
              </li>
            </ul>

            <a class="boton-amarillo-block" href="anuncio.html"
              >Ver propiedad</a
            >
          </div>
        </div>
      </div>
    </main>

    <?php
  incluirTemplate('footer');
?>
