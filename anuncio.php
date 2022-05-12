
<?php 
/////////////////////// VALIDAR ID ///////////
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if(!$id){
  header('Location: /');
}


var_dump($id);

/////////// Importar la conexión ////////////// 
require __DIR__. '/includes/config/database.php';

$db = conectarDB();
/////////// consultar 
$query = "SELECT * FROM propiedades WHERE id = ${id}";
////////// obtener resultados

$resultado = mysqli_query($db, $query);
$propiedad = mysqli_fetch_assoc($resultado);


// var_dump($resultado['titulo']);

if($resultado->num_rows === 0){
  header('Location: /');
}


include 'includes/templates/header.php'; 

?>


    <main class="contenedor seccion contenido-centrado">
        <h1> <?php echo $propiedad['titulo'] ?>  </h1>

        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp" />
            <source srcset="build/img/destacada.jpeg" type="image/jpg" />
            <img src="build/img/destacada.jpg" alt="anuncio" loading="lazy" />
          </picture>

          <div class="resumen-propiedad">
              <p class="precio">$<?php echo $propiedad['precio'] ?></p>
              <ul class="iconos-caracteristicas">
                <li>
                  <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono" />
                  <p><?php echo $propiedad['wc'] ?></p>
                </li>
                <li>
                  <img class="icono"
                    loading="lazy"
                    src="build/img/icono_estacionamiento.svg"
                    alt="icono"
                  />
                  <p><?php echo $propiedad['estacionamiento'] ?></p>
                </li>
                <li>
                  <img class="icono"
                    loading="lazy"
                    src="build/img/icono_dormitorio.svg"
                    alt="icono"
                  />
                  <p><?php echo $propiedad['habitaciones'] ?></p>
                </li>
              </ul>
              <p><?php echo $propiedad['descripcion'] ?>?</p>
          </div>
    </main>

    <?php include 'includes/templates/footer.php' ?>
