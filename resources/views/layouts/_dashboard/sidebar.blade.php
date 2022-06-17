<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

            {{-- Dashboard --}}
            <li class="nav-item">
                <a href="{{ route('dashboard.index') }}" class="nav-link {{ set_active('dashboard.index') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>{{ trans('dashboard.link.dashboard') }}</p>
                </a>
            </li>
            {{-- Gheptech --}}
            <li class="nav-header">GHEPTECH</li>
            {{-- Gheptech > home --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Home<i class="fas fa-angle-left right"></i><span class="badge badge-info right">6</span></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>menu 1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>menu 2</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Gheptech > shop --}}
            <li class="nav-item">
                <a href="#" class="nav-link {{ set_active(['categoriesshop.index','categoriesshop.create','categoriesshop.edit','categoriesshop.show']) }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Shops<i class="fas fa-angle-right right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Shops</p>
                        </a>
                    </li>
                    <li class="nav-item">
<<<<<<< HEAD
                        <a href="{{ route('categoriesshop.index') }}" class="nav-link">
=======
                        <a href="{{ route('categoriesshop.index') }}" class="nav-link {{ set_active(['categoriesshop.index','categoriesshop.create','categoriesshop.edit','categoriesshop.show']) }}">
>>>>>>> d355045b5007d837baa09b78c2391e2e3efe2646
                        <i class="far fa-circle nav-icon"></i>
                        <p>Categories</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Gheptech > tutorial --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Tutorial<i class="fas fa-angle-left right"></i><span class="badge badge-info right">6</span></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>menu 1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>menu 2</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Gheptech > layanan --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Layanan<i class="fas fa-angle-left right"></i><span class="badge badge-info right">6</span></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>menu 1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>menu 2</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Gheptech > portfolio --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Portfolio<i class="fas fa-angle-left right"></i><span class="badge badge-info right">6</span></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>menu 1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>menu 2</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- Gheptech > team --}}
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Team<i class="fas fa-angle-left right"></i><span class="badge badge-info right">6</span></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="pages/layout/top-nav.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>menu 1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>menu 2</p>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Blog --}}
            <li class="nav-header">BLOG</li>
            <li class="nav-item">
                <a href="#" class="nav-link {{ set_active(['posts.index','posts.create','posts.edit','posts.show','categories.index','categories.create','categories.edit','categories.show','tags.index','tags.create','tags.edit']) }}">
                    <i class="fas fa-newspaper"></i>
                    <p>Blog<i class="fas fa-angle-right right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    {{-- Blog > posts --}}
                    @can('manage_posts')
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class="nav-link {{ set_active(['posts.index','posts.create','posts.edit','posts.show']) }}">
                                <i class="fas fa-newspaper"></i>
                                <p>{{ trans('dashboard.link.posts') }}</p>
                            </a>
                        </li>
                    @endcan
                    {{-- Blog > categories --}}
                    @can('manage_categories')
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link {{ set_active(['categories.index','categories.create','categories.edit','categories.show']) }}">
                                <i class="fas fa-bookmark"></i>
                                <p>{{ trans('dashboard.link.categories') }}</p>
                            </a>
                        </li>
                    @endcan
                    {{-- Blog > tags --}}
                    @can('manage_tags')
                        <li class="nav-item">
                            <a href="{{ route('tags.index') }}" class="nav-link {{ set_active(['tags.index','tags.create','tags.edit']) }}">
                                <i class="fas fa-tags"></i>
                                <p>{{ trans('dashboard.link.tags') }}</p>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
            {{-- Blog > posts --}}
            {{-- @can('manage_posts')
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link {{ set_active(['posts.index','posts.create','posts.edit','posts.show']) }}">
                        <i class="fas fa-newspaper"></i>
                        <p>{{ trans('dashboard.link.posts') }}</p>
                    </a>
                </li>
            @endcan --}}
            {{-- Blog > categories --}}
            {{-- @can('manage_categories')
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link {{ set_active(['categories.index','categories.create','categories.edit','categories.show']) }}">
                        <i class="fas fa-bookmark"></i>
                        <p>{{ trans('dashboard.link.categories') }}</p>
                    </a>
                </li>
            @endcan --}}
            {{-- Blog > tags --}}
            {{-- @can('manage_tags')
                <li class="nav-item">
                    <a href="{{ route('tags.index') }}" class="nav-link {{ set_active(['tags.index','tags.create','tags.edit']) }}">
                        <i class="fas fa-tags"></i>
                        <p>{{ trans('dashboard.link.tags') }}</p>
                    </a>
                </li>
            @endcan --}}

            {{-- Setting --}}
            <li class="nav-header">{{ trans('dashboard.menu.setting') }}</li>
            {{-- Setting > roles --}}
            @can('manage_roles')
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link {{ set_active(['roles.index','roles.create','roles.edit','roles.show']) }}">
                        <i class="fas fa-user-shield"></i>
                        <p>{{ trans('dashboard.link.roles') }}</p>
                    </a>
                </li>
            @endcan
            {{-- Setting > filemanager --}}
            <li class="nav-item">
                <a href="{{ route('filemanager.index') }}" class="nav-link {{ set_active(['filemanager.index','filemanager.create','filemanager.edit']) }}">
                    <i class="fas fa-photo-video"></i>
                    <p>{{ trans('dashboard.link.file_manager') }}</p>
                </a>
            </li>
            {{-- Setting > users --}}
            @can('manage_users')
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link {{ set_active(['users.index','users.create','users.edit','users.show']) }}">
                        <i class="fas fa-user"></i>
                        <p>{{ trans('dashboard.link.users') }}</p>
                    </a>
                </li>
            @endcan
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>