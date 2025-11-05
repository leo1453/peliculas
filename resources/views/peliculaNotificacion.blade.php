<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Película Disponible</title>
</head>
<body style="margin:0; padding:0; background-color:#0d0d0f; font-family: Arial, Helvetica, sans-serif;">

    <!-- Contenedor principal -->
    <table width="100%" cellpadding="0" cellspacing="0" style="margin:0; padding:40px 0; background-color:#0d0d0f;">
        <tr>
            <td align="center">
                <table width="620" cellpadding="0" cellspacing="0" style="background-color:#1b1b1f; border-radius:10px; overflow:hidden; box-shadow:0px 0px 25px rgba(0,0,0,0.4);">

                    <!-- Encabezado -->
                    <tr>
                        <td style="background: linear-gradient(90deg, #d6114d, #e63946); padding:25px; text-align:center;">
                            <h1 style="margin:0; color:#ffffff; font-size:26px; font-weight:bold; letter-spacing:1px;">
                                🎬 ¡Nueva Película en Cartelera!
                            </h1>
                        </td>
                    </tr>

                    <!-- Contenido -->
                    <tr>
                        <td style="padding:30px; color:#f1f1f1;">
                            <p style="font-size:18px; margin-bottom:10px;">
                                🎉 <strong>{{ $pelicula->nombre }}</strong> ya está disponible en nuestra plataforma.
                            </p>
                            <p style="font-size:15px; color:#bbbbbb; line-height:1.6;">
                                Te invitamos a ser uno de los primeros en disfrutar esta nueva historia en la gran pantalla.
                                La preventa de boletos ya está abierta. No dejes pasar la oportunidad.
                            </p>

                            <!-- Imagen opcional del póster -->
                            @if(isset($pelicula->poster))
                            <div style="text-align:center; margin:25px 0;">
                                <img src="{{ asset('storage/' . $pelicula->poster) }}" alt="Póster de la película" width="300" style="border-radius:10px; box-shadow:0 0 10px rgba(255,255,255,0.2);">
                            </div>
                            @endif

                            <!-- Botón -->
                            <div style="text-align:center; margin:30px 0;">
                                <a href="{{ url('/peliculas/' . $pelicula->id . '/comprar') }}"
                                    style="background-color:#e63946; color:#ffffff; padding:14px 32px; text-decoration:none; font-size:16px; font-weight:bold; border-radius:30px; display:inline-block; box-shadow:0px 4px 10px rgba(230,57,70,0.4); transition:0.3s;">
                                    🎟 Comprar Entradas
                                </a>
                            </div>

                            <p style="font-size:14px; color:#8b8b8b; text-align:center;">
                                🍿 Prepárate para vivir una experiencia inolvidable en el cine.
                            </p>
                        </td>
                    </tr>

                    <!-- Pie de página -->
                    <tr>
                        <td style="background-color:#111113; padding:15px; text-align:center; color:#666; font-size:12px;">
                            © {{ date('Y') }} CineApp | Este es un mensaje automático, no respondas a este correo.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>
