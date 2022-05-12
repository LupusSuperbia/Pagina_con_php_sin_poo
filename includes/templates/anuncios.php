<?php
// Importar la conexión 
require __DIR__ . '/../config/database.php';

$limite;

$db = conectarDB();
// consultar 
$query = "SELECT * FROM propiedades LIMIT ${limite} ";
// obtener resultados

$resultado = mysqli_query($db, $query);

// var_dump($resultado) ;



?>


<div class="contenedor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($resultado)) : ?>
        <div class="anuncio">

            <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio" loading="lazy">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo']; ?></h3>
                <p><?php echo $propiedad['descripcion']; ?></p>
                <div class="probar">
                    <p class="precio">$ <?php echo $propiedad['precio']; ?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono">
                            <p><?php echo $propiedad['wc']; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono">
                            <p><?php echo $propiedad['estacionamiento']; ?></p>
                        </li>
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono">
                            <p><?php echo $propiedad['habitaciones']; ?></p>
                        </li>

                    </ul>

                    <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div>
            </div>
            <!--contenido anuncio-->
        </div>
        <!--anuncio-->
    <?php endwhile; ?>
</div>
<!--contenedor-anuncio-->

<?php
mysqli_close($db);
?>