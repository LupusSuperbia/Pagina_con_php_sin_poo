<?php


require '../../includes/funciones.php';

$auth = estaAutenticado();

if(!$auth) {
    header('Location: /');
}

//---------------------------------------------------------------------------------------------------------------- //
// -------------------------------------------------- VALIDAR ID ------------------------------------------------- //
// ----------------------------------------------------------------------------------------------------------------//
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if(!$id){
    header('Location: /admin');
}

// ---------------------------------------------------------------------------------------------------------------- //
// ------------------------------------------------- BASE DE DATOS ------------------------------------------------ //
// ---------------------------------------------------------------------------------------------------------------- //
require '../../includes/config/database.php';
$db = conectarDB();


// Obtener datos de la propiedad

$propiedades = "SELECT * FROM propiedades WHERE id = ${id}";
$resultadoPropiedades = mysqli_query($db, $propiedades);
// Uso solamente 1 solo porque traigo un solo objeto cuando son mas se utiliza while
$propiedad = mysqli_fetch_assoc($resultadoPropiedades);

// Consultar para obtener los vendedores 
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);
///// ARREGLO CON MENSAJES DE ERRORES ////// 
$errores = [];


// Tienen que tener por defecto el contenido que tiene su ID ya que estamos actualizando
$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedorId'];
$imagenPropiedad = $propiedad['imagen'];


////// Ejecutar el código después de que el usuario envia el formulario ////////////
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
 
    //--------------------- SANITIZAR ------------------------------------------------------------------------------------ //
    // $resultado = filter_var($numero, FILTER_SANITIZE_NUMBER_INT);
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

    //---------------------------- VALIDAR INPUTS ---------------------------- // 
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

    //----------------------------- IMAGEN ------------------------------------------------ //

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

        // Crear carpeta para guardar las imagenes
        $carpetaImagenes = '../../imagenes';
        if(!is_dir($carpetaImagenes)){
            // mkdir funciona para crear una carpeta en el sistema
            mkdir($carpetaImagenes);
        }

        $nombreImagen = '';
        /** SUBIDA DE ARCHIVOS */
        if($imagen){
            // Eliminar la imagen previa
            // Funcion que elimina el archivo
            unlink($carpetaImagenes . $propiedad['imagen']);

            // // GENERAR UN NOMBRE ÚNICO 
        $nombreImagen = md5(uniqid( rand(), true )) . ".jpg";
        // // SUBIR LA IMAGEN Crear achivos
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . "/" . $nombreImagen);
        } else {
            $nombreImagen = $propiedad['imagen'];
        }


        
        // // Crear directorio



        //-------------------------------------------------------- -------------------------------------------------------- //
        //-------------------------------------------------------- ACTUALIZAR EN LA BASE DE DATOS ---------------------------- //
        // ----------------------------------------------------------------------------------------------------------------//
        $query = "UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', habitaciones = ${habitaciones},wc = ${wc}, estacionamiento =  ${estacionamiento} , vendedorId = ${vendedorId} WHERE id = ${id} " ;

        // echo $query; siempre hay que ver nuestro query 
        $res = mysqli_query($db, $query);
        if ($res) {
            // Redireccionar al usuario
            header('Location: /admin?resultado=2');
        }
    }


    
}


require '../../includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Actualizar Propiedad</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>


    <!--------------------- -->
    <!-- Acá usamos un foreach para iterar sobre el arrays de los errores y ponerlos en html  -->
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

        
    <form  method="POST" class="formulario" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo ?>">

            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" placeholder="Precio Propiedad" value="<?php echo $precio ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

            <img src="/imagenes/<?php echo $imagenPropiedad;?>" class="imagen-small" alt="">

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

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde" name="" id="">
    </form>
</main>



<?php incluirTemplate('footer'); ?>