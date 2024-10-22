<?php
include 'php/funciones.php'; // Incluir archivo de funciones

// Verificar si el parámetro 'id' está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Obtener el ID del ejemplo a editar
    $examples = readExamples('bd/ejemplos.csv'); // Asegúrate de que esta función esté definida

    // Variable para almacenar el ejemplo a editar
    $example_to_edit = null;

    // Buscar manualmente el ejemplo con el ID en la primera columna
    foreach ($examples as $example) {
        if ($example[0] == $id) {
            $example_to_edit = $example;
            break;
        }
    }

    // Verificar si se encontró el ejemplo
    if ($example_to_edit === null) {
        // Manejar el error si el ejemplo con ese ID no existe
        echo "El ejemplo con el ID especificado no existe.";
        exit;
    }
} else {
    // Manejar el error si no se proporciona un ID en la URL
    echo "No se ha proporcionado un ID válido.";
    exit;
}

// Leer categorías para llenar el select
$categories = readCategories('bd/categoria.csv');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('config/head.php'); ?>
</head>

<body class="bg-gray-100 p-8">
    <header class="bg-gray-700 text-white p-6 rounded-lg shadow-lg mb-8 text-center">
        <h1 class="text-4xl font-bold">Editar o actualizar ejemplo</h1>
        <p class="mt-4 text-lg"></p>
    </header>

    <div class="flex">

        <div class="bg-gray-500 text-white p-4 rounded-lg w-1/4 mr-4">
            <?php include('config/sidebar.php'); ?>
        </div>
        <div class="container mx-auto mt-12">
            <form action="repositorio/op_repositorio_actualizar.php?id=<?php echo $id; ?>" method="POST"
                class="bg-white p-6 rounded-lg shadow-md">
                <label for="title" class="block text-gray-700 font-bold mb-2">Título:</label>
                <input type="text" id="title" name="title" class="w-full border p-2 mb-4"
                    value="<?php echo escapeHtml($example_to_edit[1]); ?>" required>

                <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                <textarea id="description" name="description" class="w-full border p-2 mb-4" rows="3"
                    required><?php echo escapeHtml($example_to_edit[2]); ?></textarea>

                <label for="category" class="block text-gray-700 font-bold mb-2">Categoría:</label>
                <select id="category" name="category" class="w-full border p-2 mb-4" required>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo escapeHtml($category[0]); ?>" <?php echo ($category[0] === $example_to_edit[5]) ? 'selected' : ''; ?>>
                            <?php echo escapeHtml($category[1]); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label for="code" class="block text-gray-700 font-bold mb-2">Código:</label>
                <textarea id="code" name="code" class="w-full border p-2 mb-4" rows="6"
                    required><?php echo htmlspecialchars_decode($example_to_edit[4]); ?></textarea>

                <label for="ejemplo" class="block text-gray-700 font-bold mb-2">Ejemplo:</label>
                <div id="ejemplo" class="bg-white p-6 mb-4">
                    <?php echo htmlspecialchars_decode($example[3]); // Muestra el HTML correctamente ?>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar Ejemplo</button>
            </form>
        </div>
    </div>
    <?php include('config/footer.php'); ?>
</body>

</html>