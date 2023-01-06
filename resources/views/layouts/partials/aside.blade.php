<aside class="main-sidebar sidebar-dark-lightblue elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        {{-- <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text ">INFOS_&_STUTY</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNGZDlgqu5WAs9WAV_HS8wqpmneintd0grew&usqp=CAU"
                    class=" rounded-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div> --}}
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Request::routeIs('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li
                    class="nav-item {{ Request::routeIs('formation.index')||Request::routeIs('formation.create')||Request::routeIs('formation.edit')||Request::routeIs('formation.store')||Request::routeIs('formation.update') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::routeIs('formation.index')||Request::routeIs('formation.create')||Request::routeIs('formation.edit')||Request::routeIs('formation.store')||Request::routeIs('formation.update') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Formations
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('formation.index') }}"
                                class="nav-link {{ Request::routeIs('formation.index')||Request::routeIs('formation.create')||Request::routeIs('formation.edit')||Request::routeIs('formation.store')||Request::routeIs('formation.update') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listes de formations</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ Request::routeIs('sections.create')||Request::routeIs('sections.index')||Request::routeIs('sections.edit')||Request::routeIs('sections.store')||Request::routeIs('sections.update') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::routeIs('sections.create')||Request::routeIs('sections.index')||Request::routeIs('sections.edit')||Request::routeIs('sections.store')||Request::routeIs('sections.update') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Sections
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('sections.index') }}"
                                class="nav-link {{ Request::routeIs('sections.index')||Request::routeIs('sections.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listes de sections</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ Request::routeIs('mentions.index')||Request::routeIs('mentions.create')||Request::routeIs('mentions.edit')||Request::routeIs('mentions.store')||Request::routeIs('mentions.update') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::routeIs('mentions.index')||Request::routeIs('mentions.create')||Request::routeIs('mentions.edit')||Request::routeIs('mentions.store')||Request::routeIs('mentions.update') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Mentions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('mentions.index') }}"
                                class="nav-link {{ Request::routeIs('mentions.index')||Request::routeIs('mentions.create')||Request::routeIs('mentions.edit')||Request::routeIs('mentions.store')||Request::routeIs('mentions.update') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listes de Mentions</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li
                    class="nav-item {{ Request::routeIs('etudiants.index')||Request::routeIs('etudiants.create')||Request::routeIs('etudiants.edit')||Request::routeIs('etudiants.store')||Request::routeIs('etudiants.update') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Request::routeIs('etudiants.index')||Request::routeIs('etudiants.create')||Request::routeIs('etudiants.edit')||Request::routeIs('etudiants.store')||Request::routeIs('etudiants.update') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder"></i>
                        <p>
                            Etudiants
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('etudiants.index') }}"
                                class="nav-link {{ Request::routeIs('etudiants.index')||Request::routeIs('etudiants.create')||Request::routeIs('etudiants.edit')||Request::routeIs('etudiants.store')||Request::routeIs('etudiants.update') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listes de Etudiants</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Logout
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Utilisations
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link " href="#" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="nav-icon fa fa-power-off"></i>
                                {{-- {{ Auth::user()->name }} --}}Deconnection
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item text-danger font-weight-bold" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('se deconnecter') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>