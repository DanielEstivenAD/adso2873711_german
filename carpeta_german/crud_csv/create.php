<?php
// Verificar si se ha enviado el formulario de creación
if (isset($_POST['submit'])) {
    // Obtener los datos del formulario
    $name = $_POST['name'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Validar los datos
    $errors = array();
    if (empty($name)) {
        $errors[] = 'El nombre es requerido.';
    }
    if (empty($apellido)) {
        $errors[] = 'El apellido es requerido.';
    }
    if (empty($edad)) {
        $errors[] = 'La edad es requerido.';
    }
    if (empty($email)) {
        $errors[] = 'El correo electrónico es requerido.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'El correo electrónico no es válido.';
    }
    if (empty($phone)) {
        $errors[] = 'El número de teléfono es requerido.';
    }

    // Si no hay errores, agregar el registro al archivo CSV
    if (empty($errors)) {
        // Crear un arreglo con los datos del nuevo registro
        $record = array($name, $apellido, $edad, $email, $phone);

        // Abrir el archivo CSV en modo escritura
        $file = fopen('data.csv', 'a');

        // Escribir el registro en el archivo CSV
        fputcsv($file, $record);

        // Cerrar el archivo CSV
        fclose($file);

        // Redirigir al usuario a la página principal
        header('Location: index.php');
        exit();
    }
} else {
    // Establecer valores predeterminados para los campos del formulario
    $name = '';
    $apellido = '';
    $edad = '';
    $email = '';
    $phone = '';

    // Establecer un arreglo vacío para los errores
    $errors = array();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Crear registro</title>
</head>
<body>
    <h1>Crear registro</h1>
    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form method="post">
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>"><br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" value="<?php echo htmlspecialchars($apellido); ?>"><br>
        <label for="edad">Edad:</label>
        <input type="text" name="edad" id="edad" value="<?php echo htmlspecialchars($edad); ?>"><br>
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>"><br>
        <label for="phone">Teléfono:</label>
        <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>"><br>
        <input type="submit" name="submit" value="Crear">
    </form>
</body>
</html>