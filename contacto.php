<?php 
require 'includes/funciones.php';
incluirTemplate('header');
 ?>
    <main class="contenedor seccion">
        <h1>Contactos</h1>

        <picture>
          <source srcset="build/img/destacada3.webp" type="image/webp">
          <source srcset="build/img/destacada3.jpg" type="image/jpeg">
          <img loading="lazy"src="build/img/destacada3.jpg" alt="imagen destacada">
        </picture>

        <h2>Llene el formulario de Contacto</h2>

        <form action="" class="formulario">
          <fieldset>
            <legend>Informacion Personal</legend>


            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tú Nombre" id="nombre"> 
            <label for="email">E-Mail</label>
            <input type="email" placeholder="Tú E-mail" id="email">  
            <label for="telefono">Telefono</label>
            <input type="tel" placeholder="Tú Teléfono" id="telefono"> 
            <label for="mensaje">Mensaje : </label>
            <textarea name="" id="mensaje"></textarea>

          </fieldset>

          <fieldset>
            <legend>Información sobre la Propiedad</legend>

            <label for="opciones">Vende O Compra : </label>
            <select name="" id="opciones">
              <option value="" disabled selected>-- Seleccione --</option>
              <option value="Compra">Compra</option>
              <option value="Vende">Vende</option>
            </select>
            
            <label for="presupuesto">Precio O Presupuesto</label>
            <input type="number" placeholder="Tú Precio o Presupuesto" id="presupuesto"> 
            
          </fieldset>

          <fieldset>
            <legend>Contacto</legend>

            <p>Como desea ser contactado</p>
            
            <div class="forma-contacto">
              <label for="contactar-telefono">Telefono</label>
              <input name="contacto" type="radio" value="telefono" id="contactar-telefono"> 
              <label for="contactar-correo">Email</label>
              <input name="contacto" type="radio" value="correo" id="contactar-correo">
            </div>

            <p>Si eligió teléfono, elija la fecha y la hora para ser contactado</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha"> 

            <label for="hora">Telefono</label>
            <input type="time" id="hora" min="09:00" max="18:00"> 
          </fieldset>

          <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

    <?php incluirTemplate('footer'); ?>
