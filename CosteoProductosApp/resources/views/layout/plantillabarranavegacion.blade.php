<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Gestion de Pedidos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Pedidos</a></li>
                        <li><a class="dropdown-item" href="#">Lotes de Fabricacion</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Servicios y Equipos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Equipos y enseres</a></li>
                        <li><a class="dropdown-item" href="#">Servicios</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Insumos y Mercancias
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route('ver_producto')}}">Productos</a></li>
                        <li><a class="dropdown-item" href="{{route('ver_materia_prima')}}">Materia prima</a></li>
                        <li><a class="dropdown-item" href="{{route('ver_unidad_medida')}}">Unidad de medida</a></li>
                        <li><a class="dropdown-item" href="{{route('ver_conversion')}}">Factor de conversion</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Proveedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('ver_operario')}}">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Calculo de Costos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Reportes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Opcion de Reporte 1</a></li>
                        <li><a class="dropdown-item" href="#">Opcion de Reporte 2</a></li>
                        <li><a class="dropdown-item" href="#">Opcion de Reporte 3</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>