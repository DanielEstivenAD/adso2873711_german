<div class="flex items-center justify-between">
    <div class="md:hidden">
        <button id="menu-toggle" aria-expanded="false" class="text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <ul id="nav-menu" class="hidden md:flex justify-center space-x-8 text-white">
        <li><a href="index.html" class="hover:text-blue-300 transition duration-200">Inicio</a></li>
        <li><a href="instalacion.html" class="hover:text-blue-300 transition duration-200">Instalación</a></li>
        <li><a href="interfaz.html" class="hover:text-blue-300 transition duration-200">Interfaz</a></li>
        <li><a href="componentes.html" class="hover:text-blue-300 transition duration-200">Componentes</a></li>
        <li><a href="colores.html" class="hover:text-blue-300 transition duration-200">Colores</a></li>
        <li><a href="dimensiones.html" class="hover:text-blue-300 transition duration-200">Dimensiones</a></li>
        <li><a href="propiedades.html" class="hover:text-blue-300 transition duration-200">Propiedades</a></li>
        <li><a href="ejemplos.html" class="hover:text-blue-300 transition duration-200">Ejemplos</a></li>
    </ul>
</div>

<ul id="nav-menu-small" class="nav-menu-small hidden text-white mt-4">
    <li><a href="index.html" class="hover:text-blue-300 transition duration-200">Inicio</a></li>
    <li><a href="instalacion.html" class="hover:text-blue-300 transition duration-200">Instalación</a></li>
    <li><a href="interfaz.html" class="hover:text-blue-300 transition duration-200">Interfaz</a></li>
    <li><a href="componentes.html" class="hover:text-blue-300 transition duration-200">Componentes</a></li>
    <li><a href="colores.html" class="hover:text-blue-300 transition duration-200">Colores</a></li>
    <li><a href="dimensiones.html" class="hover:text-blue-300 transition duration-200">Dimensiones</a></li>
    <li><a href="propiedades.html" class="hover:text-blue-300 transition duration-200">Propiedades</a></li>
    <li><a href="ejemplos.html" class="hover:text-blue-300 transition duration-200">Ejemplos</a></li>
</ul>
<script>
    // Script para manejar el menú hamburguesa
    const menuToggle = document.getElementById('menu-toggle');
    const navMenuSmall = document.getElementById('nav-menu-small');

    menuToggle.addEventListener('click', () => {
        const isHidden = navMenuSmall.classList.toggle('hidden');
        menuToggle.setAttribute('aria-expanded', !isHidden);
    });
</script>