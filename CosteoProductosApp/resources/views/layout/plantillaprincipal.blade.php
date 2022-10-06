<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Costos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <style>
            span.navegacion{ color: aliceblue; font-weight: bold; }
            footer{
                background-color: dimgray;
                text-align: center;
                font-weight: bolder;
                margin: 5px;
                border-radius: 5px;
            }
            footer p{
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
                padding: 20px;
            }
            #navegacion{ background-color: cornflowerblue; color: aliceblue; }
            section{ display: flex; min-height: 700px; }
            section div{ width: 100%; }
            tr{ text-align: center; }
            .titulos{ text-align: center; font-weight: bolder; font-size: x-large;}
        </style>
    </head>

    <body>
        <header>
            @include('layout.barranavegacion')
        </header>
        <section>
            @include('layout.barralateral')
            <div>
                <section>
                    @yield('contenido')
                </section>
                <p>Pie de pagina</p>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    </body>
</html>