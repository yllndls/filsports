<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../user/img/fsp.png" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('user/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/transactions.css') }}">
    <link rel="shortcut icon" type="image" href="./img/png-tr2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="../js/app.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Filsports Printing Studio</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class=" " id="sidebar-wrapper">   
            <div class="sidebar-heading text-left py-3 primary-text fs-5 fw-bold text-light border-bottom"><a><img src="../user/img/fsp.png" style="width:40px;height:40px; margin-left: -15px; margin-right: 15px; margin-top: 0px">FILSPORTS</a>
                <h4 class="mb-0 text-center fs-6" style="font-family:'Times New Roman', sans-serif; color: white; margin-left: 10px; margin-top: -15px">Printing Studio</h4></div>
         <div class="list-group list-group-flush my-3">


                <a href="/user/order" class="list-group-item list-group-item-action bg-transparent text-primary fw-bold">
                    <i class="fas fa-shopping-cart me-2"></i>My Orders</a>
                <a href="/user/myAccount" class="list-group-item list-group-item-action bg-transparent text-primary fw-bold">
                    <i class="fas fa-user-cog me-2"></i>My Account</a>
                <a href="{{ route('user.transactions') }}" class="nav-link fw-bold">
                    <i class="fas fa-history me-2"></i> Transaction History</a>    
                <a href="/home" class="list-group-item list-group-item-action bg-transparent text-light fw-bold border-top" style="margin-top: 56vh">
                    <i class="fas fa-arrow-left me-2 mt-2"></i>Back to Filsports</a>

            
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light py-3 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left text-gray fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 text-lightgray" style="font-family: 'Times New Roman', sans-serif">@yield('title')</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-lg-0">
                        <li class="nav-item dropdown d-flex align-items-center">
                            <span class="text-gray fw-bold me-2">{{ Auth::user()->name }}</span>
                            <a class="nav-link dropdown-toggle text-gray fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="/logout" id="LogoutForm" method="POST">@csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
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

    

    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuItems = document.querySelectorAll('[data-menu-item]');
            const currentPath = window.location.pathname;

            menuItems.forEach(item => {
                if (currentPath.includes(item.getAttribute('data-menu-item'))) {
                    item.classList.add('active');
                }

                item.addEventListener('click', function() {
                    menuItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>
</body>
</html>