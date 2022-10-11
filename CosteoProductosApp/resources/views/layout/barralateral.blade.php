<aside class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 225px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="0" height="32"><use xlink:href="#bootstrap"/></svg>
        <img src="/images/logo.jpeg" alt="logo de la empresa" width="175" height="175" style="border-radius: 175px;">
    </a>
    <h2 style="text-align: center;">Alfajores de la mami</h2>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
    <li>
            <a href="#" class="nav-link text-white dropdown-toggle" data-bs-toggle="dropdown" >
                Unidades de Medida
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="{{route('unidadesmedida.index')}}">Ver Unidades</a></li>
                <li><a class="dropdown-item" href="{{route('conversiones.index')}}">Factores de Conversion</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('materiasprimas.index')}}" class="nav-link text-white">Materia prima</a>
        </li>
        <li>
            <a href="{{route('productos.index')}}" class="nav-link text-white" aria-current="page">Productos</a>
        </li>
        <li>
            <a href="{{route('pedidos.index')}}" class="nav-link text-white" aria-current="page">Pedidos</a>
        </li>
        <li>
            <a href="{{route('compras.index')}}" class="nav-link text-white" aria-current="page">Compras</a>
        </li>
        <!--
        <li>
            <a href="#" class="nav-link text-white dropdown-toggle" data-bs-toggle="dropdown" >
                Customers
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                <li><a class="dropdown-item" href="#">Unidades de Medida</a></li>
                <li><a class="dropdown-item" href="#">Factores de Conversion</a></li>
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </li>
        -->
    </ul>
</aside>