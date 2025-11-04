<html>
    <head>
        <title>Reporte de Películas y Salas</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
            }
            h1 {
                text-align: center;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            th, td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
        </style>
    </head>
    <body>
        <h1>Reporte de Películas y Salas</h1>
        <table>
            <thead>
                <tr>
                    <th>Película</th>
                    <th>Horario</th>
                    <th>Costo</th>
                </tr>
            </thead>
            <tbody>
                @forelse($funciones as $funcion)
                    <tr>
                        @foreach($peliculas as $pelicula)
                            @if($pelicula->id == $funcion->pelicula_id)
                                <td>{{ $pelicula->nombre }}</td>
                            @endif
                        @endforeach
                        <td>{{ $funcion->fecha }}</td>
                        <td>{{ $funcion->costo }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align:center;">No hay funciones registradas para esta sala</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </body>
</html>
