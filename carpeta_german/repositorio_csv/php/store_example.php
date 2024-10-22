<?php
include 'functions.php'; // Incluir archivo de funciones

// Verificar si se recibió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $code = $_POST['code']; // No usar htmlspecialchars aquí

    // Leer ejemplos existentes para determinar un nuevo ID
    $examples = readExamples('ejemplos.csv');
    $newId = count($examples) + 1; // Asignar un nuevo ID

    // Crear una nueva línea para el CSV
    $line = implode(',', [$newId, $title, $description, $code, '', $category]);

    // Guardar en el archivo CSV
    file_put_contents('ejemplos.csv', $line . PHP_EOL, FILE_APPEND);

    // Redirigir a la página de ejemplos
    header("Location: examples.php");
    exit();
}
?>
