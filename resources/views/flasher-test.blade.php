<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba Flasher</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>🔍 Test de Flasher en producción</h1>


    {{-- Verifica si Laravel tiene datos de flasher en la sesión --}}
    @if(session()->has('flasher'))
        <pre style="color: red; background: #f5f5f5; padding: 1rem;">
            {{ var_export(session('flasher'), true) }}
        </pre>
    @else
        <p style="color: red">⚠️ No hay mensajes Flasher en la sesión.</p>
    @endif

</body>
</html>
