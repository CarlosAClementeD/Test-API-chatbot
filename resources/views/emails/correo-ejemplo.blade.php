<!DOCTYPE html>
<html>
    <head>
        <title>Chatbot UAEM</title>
    </head>
    <body>
        <h1>Consulta desde Chatbot</h1>
        <p>Hola {{ $datos['nombre'] }},</p>
        <p>Gracias por ponerte en contacto con nosotros. Hemos recibido tu mensaje:</p>
        <p>{{ $datos['mensaje'] }}</p>
        <p>Te responderemos lo antes posible. a tu correo {{ $datos['correo'] }}</p>
        <p>Saludos cordiales,</p>
        <p></p>
        <p>El equipo servicios escolares</p>
    </body>
</html>
