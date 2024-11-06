<html>
    <head>
        <title>PlateAI</title>
        @vite(['resources/css/app.css', 'resourcces/js/app.js'])
    </head>
    <body class='h-screen w-screen'>
        {{ $slot }}
    </body>
</html>