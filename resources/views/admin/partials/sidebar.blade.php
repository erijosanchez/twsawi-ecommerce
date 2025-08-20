<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi-grid-large mdi menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Agrupar</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#agrupar" aria-expanded="false"
                aria-controls="agrupar">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Categorias</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="agrupar">
                <ul class="flex-column nav sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.categories.index') }}">Lista de categorias</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.users.create') }}">Crear categoria</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi-tag-multiple mdi menu-icon"></i>
                <span class="menu-title">Colecciones</span>
            </a>
        </li>
        <li class="nav-item nav-category">Usuarios</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Adm. de usuarios</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="flex-column nav sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.users.view') }}">Lista de usuarios</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.users.create') }}">Crear usuarios</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Forms and Datas</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="mdi-card-text-outline menu-icon mdi"></i>
                <span class="menu-title">Form elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="flex-column nav sub-menu">
                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic
                            Elements</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Charts</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="flex-column nav sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="mdi-table menu-icon mdi"></i>
                <span class="menu-title">Tables</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="flex-column nav sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic
                            table</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="mdi-layers-outline menu-icon mdi"></i>
                <span class="menu-title">Icons</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="flex-column nav sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">pages</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi-account-circle-outline menu-icon mdi"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="flex-column nav sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">help</li>
        <li class="nav-item">
            <a class="nav-link" href="http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>
