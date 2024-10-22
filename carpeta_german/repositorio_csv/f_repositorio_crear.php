<?php
include 'php/funciones.php'; // Incluir archivo de funciones
// Leer categorías para llenar el select
$categories = readCategories('bd/categoria.csv'); // Asegúrate de que esta función esté definida
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('config/head.php'); ?>
</head>

<body class="bg-gray-100 p-8">
    <header class="bg-gray-700 text-white p-6 rounded-lg shadow-lg mb-8 text-center">
        <h1 class="text-4xl font-bold">Crear nuevo ejemplo</h1>
        <p class="mt-4 text-lg"></p>
    </header>

    <div class="flex">

        <div class="bg-gray-500 text-white p-4 rounded-lg w-1/4 mr-4">
            <?php include('config/sidebar.php'); ?>
        </div>
        <div class="max-w-6xl mx-auto">
            <form action="repositorio/op_repositorio_crear.php" method="POST" class="bg-white p-6 rounded shadow">
                <label for="title" class="block text-gray-700 font-bold mb-2">Título:</label>
                <input type="text" id="title" name="title" class="w-full border p-2 mb-4" required>

                <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                <textarea id="description" name="description" class="w-full border p-2 mb-4" rows="3"
                    required></textarea>

                <label for="code" class="block text-gray-700 font-bold mb-2">Código:</label>
                <textarea id="code" name="code" class="w-full border p-2 mb-4" rows="5"></textarea>

                <label for="category" class="block text-gray-700 font-bold mb-2">Categoría:</label>
                <select id="category" name="category" class="w-full border p-2 mb-4" required>
                    <option value="-1">Seleccione una categoría</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo escapeHtml($category[0]); ?>"><?php echo escapeHtml($category[1]); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Agregar Ejemplo</button>
            </form>
        </div>
    </div>
    <?php include('config/footer.php'); ?>
</body>

</html>