<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Vue-Lara-App</title>
  
    <link rel="stylesheet" href="/css/app.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" id="app">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>
            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
                </div>
            </div>
            </form>

            
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
            <img src="/images/logo.png" alt="Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Vue-Lara-App</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="/images/profile/{{Auth::user()->photo}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <router-link to="/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt blue"></i>
                            <p>Dashboard</p>
                        </router-link>
                    </li>
                    @can('isAdmin')
                    <li class="nav-item">
                        <router-link to="/developer" class="nav-link">
                            <i class="nav-icon fas fa-cogs yellow"></i>
                            <p>Developer</p>
                        </router-link>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <router-link to="/profile" class="nav-link">
                            <i class="nav-icon fas fa-user orange"></i>
                            <p>Profile</p>
                        </router-link>
                    </li>
                    @can('isAdmin')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog green"></i>
                        <p>
                            Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <router-link to="/user" class="nav-link">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Users</p>
                                </router-link>
                            </li>
                            <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v3</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a href="{{route('logout')}}" class="nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-power-off red"></i>
                            <p>{{ __('Logout') }}</p>
                        </a>
                    </li>

                    <form action="{{route('logout')}}" id="logout-form" method="post" style="display: none">
                        @csrf
                    </form>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    <router-view></router-view>
                    <!-- set progressbar -->
                    <vue-progress-bar></vue-progress-bar>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.0.3
            </div>
        </footer>
    </div>
    @auth
        <script>
            window.user = @json(auth()->user())
        </script>
    @endauth
    <script type="text/javascript" src="/js/app.js"></script>
</body>
</html>

