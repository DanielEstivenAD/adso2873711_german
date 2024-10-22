<?php
include '../php/funciones.php'; // Asegúrate de incluir el archivo de funciones

// Leer categorías existentes
$categories = readCategories('../bd/categoria.csv');

// Función para obtener el siguiente ID
function getNextId($categories)
{
    $lastId = 0;
    foreach ($categories as $category) {
        if ((int) $category[0] > $lastId) {
            $lastId = (int) $category[0];
        }
    }
    return $lastId + 1; // Devuelve el siguiente ID
}

// Manejo del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = getNextId($categories); // Genera un ID automático
    $categoria = $_POST['categoria'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    // Agregar la nueva categoría
    $newCategory = [$id, $categoria, $titulo, $descripcion];
    $categories[] = $newCategory;
    writeCategories('../bd/categoria.csv', $categories); // Asegúrate de que esta función esté definida
    header('Location: ../categorias.php'); // Redirigir a la lista de categorías
    exit;
}
?>