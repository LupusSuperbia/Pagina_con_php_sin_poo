<?php 
require 'includes/funciones.php';
incluirTemplate('header');
 ?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Guia para la decoracion de tu hogar</h1>

        <p class="informacion-meta">Escrito el : <span>20/10/2021</span> por: <span>admin</span></p>
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp" />
            <source srcset="build/img/destacada2.jpeg" type="image/jpg" />
            <img src="build/img/destacada2.jpg" alt="anuncio" loading="lazy" />
          </picture>

          <div class="resumen-propiedad">
              <p class="precio">$3.000.000</p>
              <ul class="iconos-caracteristicas">
                <li>
                  <img loading="lazy" src="build/img/icono_wc.svg" alt="icono" />
                  <p>3</p>
                </li>
                <li>
                  <img
                    loading="lazy"
                    src="build/img/icono_estacionamiento.svg"
                    alt="icono"
                  />
                  <p>3</p>
                </li>
                <li>
                  <img
                    loading="lazy"
                    src="build/img/icono_dormitorio.svg"
                    alt="icono"
                  />
                  <p>4</p>
                </li>
              </ul>
              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Omnis tempora cum perspiciatis ad voluptatum necessitatibus pariatur, eveniet consequatur totam id possimus ducimus rerum similique adipisci quae. Consequatur dicta praesentium iste.
              Sunt eligendi quidem eveniet! Cupiditate rerum ad magni quam repudiandae pariatur ratione voluptatibus! Voluptatem necessitatibus doloribus provident possimus consequatur vero, eaque quis cupiditate suscipit fugit labore, ullam quae, consectetur iusto!
              Quisquam, deserunt, quis magnam molestiae laborum voluptates enim corrupti impedit soluta reiciendis maiores sapiente dolorum ullam quidem, fugit minus natus nobis provident blanditiis! Dignissimos sapiente ducimus ullam dolorem impedit aliquam?
              Iure ipsum alias aut quae consequuntur pariatur vitae quidem voluptate provident quod in sunt ratione, tenetur accusantium itaque, temporibus eveniet? Eos repudiandae maiores, odit architecto doloremque aspernatur iure minus nulla.
              Iste soluta repellendus ab aperiam repellat eos. Aut, natus, eum tenetur culpa enim laudantium in officia nostrum deleniti vel et officiis iure eligendi beatae omnis quos sit. Ab, velit ullam?</p>
          </div>
    </main>

    <?php incluirTemplate('footer'); ?>
