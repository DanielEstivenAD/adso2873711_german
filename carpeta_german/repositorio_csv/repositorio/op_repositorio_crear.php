<?php
include '../php/funciones.php'; // Incluir archivo de funciones

// Leer categorías para llenar el select
$categories = readCategories('../bd/categoria.csv'); // Asegúrate de que esta función esté definida

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $code = $_POST['code'];
    $category = $_POST['category'];

    // Imprimir para depuración
    echo "<pre>";
    print_r($_POST); // Muestra todos los datos recibidos
    echo "</pre>";

    // Procesar el código para escapar caracteres especiales
    $escaped_code = escapeHtml($code);
    
    // Asignar un ID único al nuevo ejemplo
    $id = uniqid();

    // Generar el contenido visual a partir del código
    $output_display = htmlspecialchars_decode($code);

    // Guardar el nuevo ejemplo en el archivo CSV
    $file = fopen('../bd/ejemplos.csv', 'a');
    if ($file) {
        fputcsv($file, [$id, $title, $description, $output_display, $escaped_code, $category]);
        fclose($file);
        // Redireccionar a la página principal
        header('Location: ../repositorio.php');
        exit();
    } else {
        echo "Error al abrir el archivo para escribir."; // Manejo de errores
    }
}
?>