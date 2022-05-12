<?php 
require 'includes/funciones.php';
incluirTemplate('header');
 ?>

<main class="contenedor seccion">
  <h1>Conoce Sobre Nosotros</h1>

  <div class="contenido-nosotros">
    <div class="imagen">
      <picture>
        <source srcset="build/img/nosotros.webp" type="image/webp">
        <source srcset="build/img/nosotros.jpg" type="image/jpg">
        <img src="build/img/nosotros.jpg" alt="sobrenosotros" loading="lazy">
      </picture>
    </div>
    <div class="texto-nosotros">
      <blockquote>
        25 Años de experiencia
      </blockquote>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae accusamus deserunt aperiam? Perferendis suscipit voluptatum magnam quibusdam odio iure numquam esse nam voluptatibus, quo a necessitatibus eligendi iusto nostrum error.
        Vitae doloremque nam assumenda? Totam harum quos, molestias quidem qui laboriosam, quia eos itaque officiis laborum quae inventore consequuntur. Dolorum inventore assumenda perferendis quo! Officiis enim accusantium voluptate? Nihil, hic?
        Cupiditate, magni quae dolor corporis atque sapiente totam! Hic quia eius dicta recusandae amet? Aut minus accusamus odit cumque explicabo fuga vitae excepturi placeat repellat pariatur. Commodi obcaecati repudiandae sunt?
        Aliquid veniam quo reprehenderit obcaecati, ex aspernatur nostrum odio repellat a unde quos doloribus. Et magni rerum, perspiciatis iusto ut accusantium quam magnam similique quos ratione debitis ullam sapiente tempora?
        Ipsum tempore aperiam eum ab laudantium architecto inventore totam harum incidunt corporis. Modi fugiat deserunt nostrum dolorum quibusdam eligendi? Veritatis neque quos, aut maiores beatae odio ducimus sit consequuntur commodi!</p>
    </div>

  </div>
</main>

<section class="contenedor seccion">
  <h1>Más Sobre Nosotros </h1>

  <div class="iconos-nosotros">
    <div class="icono">
      <img src="build/img/icono1.svg" alt="Icono seguirdad" loading="lazy">
      <h3>Seguridad</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto ex blanditiis sint perspiciatis quo tempora, sed officiis ducimus at doloribus aliquam quibusdam vitae! Perferendis, obcaecati. Minus nemo magnam ducimus aut.</p>
    </div>
    <div class="icono">
      <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
      <h3>Precio</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto ex blanditiis sint perspiciatis quo tempora, sed officiis ducimus at doloribus aliquam quibusdam vitae! Perferendis, obcaecati. Minus nemo magnam ducimus aut.</p>
    </div>
    <div class="icono">
      <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
      <h3>A Tiempo</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto ex blanditiis sint perspiciatis quo tempora, sed officiis ducimus at doloribus aliquam quibusdam vitae! Perferendis, obcaecati. Minus nemo magnam ducimus aut.</p>
    </div>

  </div>
</section>


<?php incluirTemplate('footer'); ?>
