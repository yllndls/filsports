<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="../admin-css/img/fsp.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('admin-css/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/transactions.css') }}">
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class=" " id="sidebar-wrapper">   
            <div class="sidebar-heading text-left py-3 primary-text fs-4 fw-bold text-light border-bottom"><img src="../rider/img/fsp.png" style="width:40px;height:40px; margin-left: -15px; margin-right: 15px; margin-top: 0px"><a>ADMIN</a>
                   <h5 class="mb-0 text-center fs-6">FILSPORTS PRINTING STUDIO</h5></div>
            <div class="list-group list-group-flush my-3">

                <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action text-primary fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="{{ route('admin.order') }}" class="list-group-item list-group-item-action text-primary fw-bold">
                    <i class="fa fa-shopping-cart me-2"></i>Orders</a>
                <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action text-primary fw-bold">
                    <i class="fa fa-list me-2"></i>Categories</a>
                <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action text-primary fw-bold">
                    <i class="fa fa-box me-2"></i>Products</a>
                <a href="{{ route('admin.transactions') }}" class="list-group-item list-group-item-action text-primary fw-bold">
                    <i class="fa fa-history me-2"></i>Transaction History</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light py-4 px-4" style="background-image: url('/admin-css/img/bg3.png');">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left text-light fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 text-light">@yield('title')</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Admin
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><h3 class="email-sa-admin"></h3></li>
                                <li>
                                    <form action="/logout" id="adminLogoutForm" method="POST">@csrf
                                        <a class="dropdown-item" href="{{ url('/admin/login')}}">Logout</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>

    @stack('scripts')
</body>
</html>

