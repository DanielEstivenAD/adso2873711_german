<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Introducción a Tailwind CSS</title>
<script src="js/taildwind-3.4.5.js"></script>
<link href="css/tailwind.min.css" rel="stylesheet">
<style>
    /* Menú hamburguesa */
    @media (min-width: 640px) {
        #nav-menu-small {
            display: none;
        }
    }

    @media (max-width: 640px) {
        #nav-menu {
            display: none;
        }
    }

    .nav-menu-small {
        flex-direction: column;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background-color: #2d3748;
        border-radius: 0 0 0.375rem 0.375rem;
        z-index: 10;
    }

    .nav-menu-small li {
        padding: 1rem;
    }
</style>