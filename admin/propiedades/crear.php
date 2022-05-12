<?php


require '../../includes/funciones.php';

$auth = estaAutenticado();

if(!$auth) {
    header('Location: /');
}

// Base de datos 
require '../../includes/config/database.php';
$db = conectarDB();

// Consultar para obtener los vendedores 
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);
///// ARREGLO CON MENSAJES DE ERRORES ////// 
$errores = [];
$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';



////// Ejecutar el código después de que el usuario envia el formulario ////////////
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    // $numero = '!HOLA';
    // $numero1 = 1;

    // // SANITIZAR
    // $resultado = filter_var($numero, FILTER_SANITIZE_NUMBER_INT);
    
    
    // echo "<pre>";
    // var_dump($_POST);
    // echo"</pre>";
    
    // echo "<pre>";
    // var_dump($_FILES);
    // echo"</pre>";
    $titulo = mysqli_real_escape_string( $db, $_POST['titulo']);
    $precio = mysqli_real_escape_string( $db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string( $db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    // ASIGNAR files hacia una variable

    $imagen = $_FILES['imagen'];

    // VALIDAR INPUTS
    if (!$titulo) {
        $errores[] = 'Debes añadir un titulo';
    }

    if (!$precio) {
        $errores[] = 'El precio es Obligatorio';
    }

    if (strlen($descripcion) < 10) {
        $errores[] = 'La descripcion es Obligatorio';
    }


    if (!$habitaciones) {
        $errores[] = 'El numero de  habitaciones es Obligatorio';
    }

    if (!$wc) {
        $errores[] = 'El numero de baños es Obligatorio';
    }

    if (!$estacionamiento) {
        $errores[] = 'El estacionamiento es Obligatorio';
    }


    if (!$vendedorId) {
        $errores[] = 'Elige un vendedor';
    }

    // IMAGEN


    if (!$imagen['name'] || $imagen['error']){
        $errores[] = "La imagen es obligatoria";
    }
    // validar por tamaño (100KB MÁXIMO)
    $medida = 1000 * 1000;

    if ($imagen['size'] > $medida){
        $errores[]= 'La imagen es muy pesada';
    }
    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";

    //////////////////////// REVISAR QUE LOS ARRAY DE ERRORES ESTAN VACIOS /////////
    if (empty($errores)) {

        /** SUBIDA DE ARCHIVOS */

        // Crear carpeta 
        $carpetaImagenes = '../../imagenes';
        if(!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }
        // GENERAR UN NOMBRE ÚNICO 
        $nombreImagen = md5(uniqid( rand(), true )) . ".jpg";
        // SUBIR LA IMAGEN 
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreImagen);
        // Crear directorio
        // INSERTAR EN LA BASE DE DATOS
        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento,creado, vendedorId ) VALUES ('$titulo','$precio','$nombreImagen','$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado','$vendedorId')";

        // echo $query;
        $res = mysqli_query($db, $query);
        if ($res) {
            // Redireccionar al usuario
            header('Location: /admin?resultado=1');
        }
    }


    
}

incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>


    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>


    <form action="/admin/propiedades/crear.php" method="POST" class="formulario" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion"><?php echo $descripcion ?></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" name="habitaciones" id="habitaciones" placeholder="Ej: 3" min='1' max='9' value="<?php echo $habitaciones ?>">

            <label for="wc">Baños:</label>
            <input type="number" name="wc" id="wc" placeholder="Ej: 3" min='1' max='9' value="<?php echo $wc ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" name="estacionamiento" id="estacionamiento" placeholder="Ej: 3" min='1' max='9' value="<?php echo $estacionamiento ?>">
        </fieldset>


        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor" id="">
                <option value="">-- Seleccione -- </option>
                <?php while($row = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId === $row['id'] ? 'selected' : ''; ?>  value="<?php echo $row['id'];?>"> <?php echo $row['nombre'].' '.$row['apellido'] ?></option>
                <?php endwhile; ?> 
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde" name="" id="">
    </form>
</main>



<?php incluirTemplate('footer'); ?>