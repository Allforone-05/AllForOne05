

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo de Contacto</title>
</head>
<body>
    <h2>Mensaje de Contacto</h2>
    <p>Has recibido un nuevo mensaje de contacto:</p>
    <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $data['email'] }}</p>
    <p><strong>Mensaje:</strong></p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
