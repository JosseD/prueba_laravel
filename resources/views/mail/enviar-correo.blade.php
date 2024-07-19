<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Correo de Laravel</title>
</head>
<body>
    <h1>Hola, {{ $data['name'] }}</h1>
    <p>Este es un correo de prueba enviado desde Laravel.</p>
    <p>Mensaje: {{ $data['message'] }}</p>
</body>
</html>