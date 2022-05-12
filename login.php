<?php 

// CONEXIÓN A BASE DE DATOS

require 'includes/config/database.php';
$db = conectarDB();

$errores = [];
// Autenticar el usuario 

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'],FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email){
    $errores[] = "El email es obligatorio o no es válido";
    }

    if(!$password){
        $errores[] = "El password es obligatorio o no es válido";
    }

    if(empty($errores)){
        // REVISAR SI EL USUARIO EXISTE 

        $query = "SELECT * FROM usuarios WHERE email = '${email}'";
        $resultado = mysqli_query($db, $query);
        


        echo"<pre>";
        var_dump($resultado);
        echo"</pre>";
            

        if ($resultado -> num_rows) {
            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);  
            // verificar si el password es correcto  o no 

            $auth = password_verify($password, $usuario['password']);

            if($auth){
                // El usuario esta autenticado
                session_start();

                // LLnear el arreglo de la sesión
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;


                header('Location: /admin');
                
            } else {
                $errores[] = 'El password es incorrecto';
            }
        }
        else{
            $errores[] = "El usuario no existe";
        }
    }
}


// incluye el header 
require 'includes/funciones.php';
incluirTemplate('header');
?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error) : ?>
            <div class="error alerta">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?> 
        <form method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password </legend>

            <label for="email">E-Mail</label>
            <input type="email" name="email" placeholder="Tú E-mail" required id="email">  

            <label for="password">Password</label>
            <input type="password" name = "password" placeholder="Tú Password" id="password" required> 
            

          </fieldset>


        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
        </form>
    </main>

<?php 
incluirTemplate('footer'); 
?>
