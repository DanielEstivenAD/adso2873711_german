<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('config/head.php'); ?>
</head>

<body class="bg-gray-100 p-8">
    <header class="bg-gray-700 text-white p-6 rounded-lg shadow-lg mb-8 text-center">
        <h1 class="text-4xl font-bold">Crear nueva categoría</h1>
        <p class="mt-4 text-lg"></p>
    </header>

    <div class="flex">

        <div class="bg-gray-500 text-white p-4 rounded-lg w-1/4 mr-4">
            <?php include('config/sidebar.php'); ?>
        </div>
        <div class="max-w-6xl mx-auto">
            <!-- Formulario para agregar categoría -->
            <form action="categorias/op_categorias_crear.php" method="POST" class="bg-white p-6 rounded shadow">
                <div class="mb-4">
                    <label for="categoria" class="block text-gray-700">Categoría:</label>
                    <input type="text" name="categoria" required class="border p-2 w-full" />
                </div>
                <div class="mb-4">
                    <label for="titulo" class="block text-gray-700">Título:</label>
                    <input type="text" name="titulo" required class="border p-2 w-full" />
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" required class="border p-2 w-full"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Agregar Categoría</button>
            </form>
        </div>
    </div>
    <?php include('config/footer.php'); ?>
</body>

</html>