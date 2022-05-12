<?php 
require 'includes/funciones.php';
incluirTemplate('header', $inicio = true);
 ?>


    <main class="contenedor seccion">
<h1>Más Sobre Nosotros </h1>
        
        <div class="iconos-nosotros">
            <div class="icono">
                <img class="" src="build/img/icono1.svg" alt="Icono seguirdad" loading = "lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto ex blanditiis sint perspiciatis quo tempora, sed officiis ducimus at doloribus aliquam quibusdam vitae! Perferendis, obcaecati. Minus nemo magnam ducimus aut.</p>
            </div> 
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading = "lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto ex blanditiis sint perspiciatis quo tempora, sed officiis ducimus at doloribus aliquam quibusdam vitae! Perferendis, obcaecati. Minus nemo magnam ducimus aut.</p>
            </div> 
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading = "lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto ex blanditiis sint perspiciatis quo tempora, sed officiis ducimus at doloribus aliquam quibusdam vitae! Perferendis, obcaecati. Minus nemo magnam ducimus aut.</p>
            </div>

        </div>
    </main>

    <section class="seccion contenedor">
        <h2>Casas y depas en venta</h2>
        
        <?php 
        $limite = 3;
        include 'includes/templates/anuncios.php';
        
        ?>

        <div class="alinear-derecha ">
          <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
      <h2>Encuentra la casa de tus sueños</h2>

      <p>Llena el formulario de conctacto y un asesor se pondría en contacto contigo </p>
      <a href="contacto.php" class = "boton-amarillo">Contactanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
      <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
          <div class="imagen">
            <picture>
              <source srcset="build/img/blog1.webp" type = "image/webp">
              <source srcset="build/img/blog1.jpg" type = "image/jpg">
              <img src="build/img/blog1.jpg" alt="texto entrante" loading = "lazy">
            </picture>
          </div>
          <div class="texto-entrada">

            <a href="entrada.php">
              <h4>Terraza en el techo de tu casa</h4>
              <p  class="informacion-meta" >Escritorio el <span>20/10/2021</span> por: <span>Admin</span></p>
              
              <p>consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
            </a> 
          </div>
         </article>
         
         <article class="entrada-blog">
          <div class="imagen">
              <picture>
                  <source srcset="build/img/blog2.webp" type="image/webp">
                  <source srcset="build/img/blog2.jpg" type="image/jpeg">
                  <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
              </picture>
          </div>

          <div class="texto-entrada">
              <a href="entrada.php">
                  <h4>Guía para la decoración de tu hogar</h4>
                  <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span> </p>

                  <p>
                      Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                  </p>
              </a>
          </div>
      </article>


        
      </section>

      <section class="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
          <blockquote>
            El Personal se comporto de una excelente manera con una muy buena atencion y la casa que me ofrecieron cumple con todas mis expectativas 
            <p>- Agus Samperi</p>
          </blockquote>
        </div>
      </section>
    </div>

    <?php incluirTemplate('footer'); ?>
