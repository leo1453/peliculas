<html>
<head>
    <title>Notificación de Nueva Película</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Arial, sans-serif; background-color: #111; color: #fff;">
    <table align="center" cellpadding="0" cellspacing="0" width="600" style="margin-top: 40px; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.6); background: linear-gradient(180deg, #1a1a1a 0%, #000 100%);">
        <!-- Header -->
        <tr>
            <td style="background: linear-gradient(90deg, #e50914, #b00610); padding: 25px 0; text-align: center;">
                <h1 style="font-size: 26px; margin: 0; color: #fff;">🎬 ¡Nueva Película Disponible!</h1>
            </td>
        </tr>

        <!-- Body -->
        <tr>
            <td style="padding: 30px; color: #f0f0f0;">
                <p style="font-size: 16px; margin-bottom: 20px; text-align: center;">
                    Una nueva película ha sido agregada a nuestro sistema. Aquí tienes los detalles:
                </p>

                <table cellpadding="10" cellspacing="0" width="100%" style="border-collapse: collapse; margin-top: 10px;">
                    <tr style="background-color: rgba(255,255,255,0.05);">
                        <td style="width: 35%; font-weight: bold; color: #e50914;">🎞️ Nombre:</td>
                        <td style="color: #fff;">{{ $pelicula->nombre }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #e50914;">🎬 Director:</td>
                        <td>{{ $pelicula->director }}</td>
                    </tr>
                    <tr style="background-color: rgba(255,255,255,0.05);">
                        <td style="font-weight: bold; color: #e50914;">⏱️ Duración:</td>
                        <td>{{ $pelicula->duracion }} minutos</td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; color: #e50914;">📽️ Género:</td>
                        <td>{{ $pelicula->genero }}</td>
                    </tr>
                </table>

                <div style="text-align: center; margin-top: 35px;">
                    <a href="{{ url('/') }}" 
                       style="background: linear-gradient(90deg, #e50914, #b00610); 
                              color: #fff; 
                              padding: 14px 28px; 
                              text-decoration: none; 
                              font-weight: bold; 
                              border-radius: 8px; 
                              font-size: 16px; 
                              display: inline-block;
                              box-shadow: 0 4px 15px rgba(229, 9, 20, 0.5);">
                        🎥 Ver en el sistema
                    </a>
                </div>

                <p style="text-align: center; margin-top: 25px; color: #ccc; font-size: 14px;">
                    Gracias por usar nuestro sistema de gestión de películas 🍿  
                </p>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td style="background-color: #1a1a1a; text-align: center; padding: 15px; font-size: 12px; color: #777;">
                © {{ date('Y') }} Sistema de Gestión de Películas. Todos los derechos reservados.
            </td>
        </tr>
    </table>
</body>
</html>
