<nav>
    <nav class="navbar navbar-expand-lg navbar-ligth" id="navegacion">
        <div class="container-fluid">
            <div>
                <h3>Sistema de costos</h3>
            </div>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('recetas.index')}}">
                            <span class="navegacion">Receta</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('proveedores.index')}}">
                            <span class="navegacion">Proveedores</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="navegacion">Produccion</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('operarios.index')}}">Operarios</a></li>
                            <li><a class="dropdown-item" href="{{route('asignaciones.index')}}">Asignacion</a></li>
                            <li><a class="dropdown-item" href="{{route('finalizaciones.index')}}">Finalizacion de asignaciones</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="navegacion">Costos</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('equipos.index')}}">Equipos</a></li>
                            <li><a class="dropdown-item" href="{{route('depreciaciones.index')}}">Depreciaciones</a></li>
                            <li><a class="dropdown-item" href="{{route('gastosoperaciones.index')}}">Costos de operacion</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="navegacion">Reportes</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('reportescompras.index')}}">Reporte de compras</a></li>
                            <li><a class="dropdown-item" href="{{route('reportesventas.index')}}">Reporte de ventas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item" style="display: inline-flex;">
                        <img src="/images/perfil.png" alt="" width="40px">
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</nav>