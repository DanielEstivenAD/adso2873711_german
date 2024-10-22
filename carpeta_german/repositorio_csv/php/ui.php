<!DOCTYPE html>
<html lang="es">

<head>
    <?php include('config/head.php'); ?>
</head>

<body class="bg-gray-100 p-8">
    <header class="bg-blue-700 text-white p-6 rounded-lg shadow-lg mb-8 text-center">
        <h1 class="text-4xl font-bold">Guía Completa de Tailwind CSS</h1>
        <p class="mt-4 text-lg">Explora los fundamentos y avanzados del framework de diseño Tailwind CSS.</p>
    </header>

    <nav class="bg-gray-800 p-4 rounded-lg mb-8 relative">
        <?php include('config/nav.php'); ?>
    </nav>

    <div class="flex">
        <div class="bg-blue-500 text-white p-4 rounded-lg w-1/4 mr-4">
            <?php include('config/sidebar.php'); ?>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md w-3/4">
            <h3 class="font-bold">Alternativa Contenido</h3>
            <p>Aquí se puede ver otra disposición de los elementos de la interfaz.</p>
        </div>
    </div>

    <?php include('config/footer.php'); ?>
</body>

</html>