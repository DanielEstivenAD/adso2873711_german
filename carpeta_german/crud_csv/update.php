<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener el índice de registro
    $index = $_POST['index'];

    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    // Abrir el archivo CSV en modo lectura y escritura
    $file = fopen('data.csv', 'r+');

    // Leer los datos del archivo CSV y almacenarlos en un arreglo
    $data = array();
    while (($line = fgetcsv($file)) !== FALSE) {
        $data[] = $line;
    }

    // Escribir los datos actualizados en el archivo CSV
    $data[$index] = array($nombre, $apellido, $edad, $email, $telefono);
    rewind($file);
    foreach ($data as $line) {
        fputcsv($file, $line);
    }

    // Cerrar el archivo CSV
    fclose($file);

    // Redireccionar a la página principal
    header('Location: index.php');
    exit();
}
?>