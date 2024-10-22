<?php
include 'funciones.php'; // Incluir las funciones necesarias

// Verificar que se haya recibido un ID
if (isset($_GET['id'])) {
    $categoryId = $_GET['id'];

    // Leer el archivo de categorías
    $categories = readCategories('../bd/categoria.csv'); // Asegúrate de que esta función esté definida

    // Buscar la categoría por su ID
    foreach ($categories as $category) {
        if ($category[0] === $categoryId) {
            // Preparar los datos de la categoría en formato JSON
            $categoryDetails = [
                'title' => $category[2],        // Título de la categoría
                'description' => $category[3]   // Descripción de la categoría
            ];

            // Devolver los detalles en formato JSON
            header('Content-Type: application/json');
            echo json_encode($categoryDetails);
            exit; // Terminar la ejecución del script
        }
    }

    // Si no se encontró la categoría, devolver un JSON vacío
    header('Content-Type: application/json');
    echo json_encode(null);
} else {
    // Si no se recibió un ID, devolver un error
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'No se ha proporcionado un ID de categoría.']);
}
?>
