<?php

require '../includes/funciones.php';

$auth = estaAutenticado();

if(!$auth) {
    header('Location: /');
}

// Importar la conexion
/* Connecting to the database and then it is selecting all the properties from the database. */
require '../includes/config/database.php';
$db = conectarDB();

// Escribir el query
$query = "SELECT * FROM propiedades";
// Consultar la BD
$resultadoConsulta = mysqli_query($db, $query);

// Esto sirve para cuando no tenes nada en el get y necesitas un null para decirle que no hay nada
// MUESTRA MENSAJE CONDICIONAL
$resultado = $_GET["resultado"] ?? null;


// Eliminacion de archivos mediante id 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        // eliminar archivo
        $query = "SELECT imagen FROM propiedades WHERE id = ${id}";

        // Con esto le mandamos el query a la base de dato para que nos devuelva unos de los archivos
        $resultado = mysqli_query($db, $query);

        $propiedad = mysqli_fetch_assoc($resultado);
        // Esto elimina un archivo 
        unlink('../imagenes/'.$propiedad['imagen']);

        // eliminar propiedad
        $query = "DELETE FROM propiedades WHERE id =   ${id}";
        $resultado = mysqli_query($db, $query);

        if($resultado){
            header('location: /admin?resultado=3');
        }
    }
}


// Incluye template
incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Adminisitrador De Bienes Raices</h1>
    <?php
    if (intval($resultado) === 1) : ?>

        <p class="alerta exito">Anuncio Creado Correctamente</p>
    <?php elseif( intval($resultado) === 2): ?>
        <p class="alerta exito">Actualizado Correctamente</p>
        <?php elseif( intval($resultado) === 3): ?>
        <p class="alerta exito">Eliminado Correctamente</p>
    <?php endif; ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>

                <th>ID</th>

                <th>Titulo</th>

                <th>Imagen</th>

                <th>Precio</th>
                
                <th>Acciones</th>

            </tr>
        </thead>

        <tbody>
            <tr> <!--Mostrar un resultado -->
            <?php while($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>

                <td><?php echo $propiedad['id']; ?></td>

                <td><?php echo $propiedad['titulo']; ?></td>

                <td> <img src="/imagenes/<?php echo $propiedad['imagen']; ?>" alt="imagen" class="imagen-tabla"></td>

                <td>$ <?php echo $propiedad['precio']; ?></td>

                <td>
                    <form method="POST" class="w-100" action="">
                        <input type="hidden" name="id" value="<?php echo $propiedad['id'];?>">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                    </form>
                    <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad['id'] ?>" class="boton-amarillo-block">Actualizar</a>

                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>



<?php

// Cerrar una conexión Opcional 
mysqli_close($db);

incluirTemplate('footer');

?>