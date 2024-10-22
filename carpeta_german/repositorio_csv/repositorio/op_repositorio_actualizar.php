<?php
include '../php/funciones.php'; // Incluir archivo de funciones

// Verificar si el parámetro 'id' está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Obtener el ID del ejemplo a editar
    $examples = readExamples('../bd/ejemplos.csv'); // Asegúrate de que esta función esté definida correctamente

    // Procesar el formulario de edición
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $new_title = $_POST['title'];
        $new_description = $_POST['description'];
        $new_category = $_POST['category'];
        $new_code = $_POST['code'];

        // Escapar el código y preparar el contenido visual
        $escaped_code = escapeHtml($new_code); // Escapar HTML
        $new_example = htmlspecialchars($new_code); // Preparar el contenido visual
        
        // Crear un nuevo array con las categorías actualizadas
        $updated_examples = [];
        foreach ($examples as $example) {
            // Si el ID coincide, actualiza los datos, si no, deja el ejemplo igual
            if ($example[0] === $id) {
                $updated_examples[] = [$id, $new_title, $new_description, $new_example, $escaped_code, $new_category]; // Mantén la ID
            } else {
                $updated_examples[] = $example; // Mantener el ejemplo existente
            }
        }

        // Escribir el nuevo contenido en el archivo CSV
        $file = fopen('../bd/ejemplos.csv', 'w');
        if ($file) {
            foreach ($updated_examples as $updated_example) {
                fputcsv($file, $updated_example);
            }
            fclose($file);

            // Redirigir a la página de ejemplos
            header('Location: ../repositorio.php');
            exit();
        } else {
            echo "Error al abrir el archivo para escribir.";
        }
    }
} else {
    // Manejar el error si no se proporciona un ID en la URL
    echo "No se ha proporcionado un ID válido.";
    exit;
}
?>
