<!DOCTYPE html>
<html>
    <head>
        <title>Chatbot UAEM</title>
    </head>
    <body>
        <h1>Consulta desde Chatbot</h1>
        <p><b>Nombre del solicitante: </b> {{ $datos['nombre'] }},</p>
        <p><b>Mensaje del solicitante: </b></p>
        <p>{{ $datos['mensaje'] }}</p>
        <p><b>Correo de contacto del solicitante: </b>{{ $datos['correo'] }}</p>
    </body>
</html>
