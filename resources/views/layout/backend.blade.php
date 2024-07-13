<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Static Navigation - SB Admin</title>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />    
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="my-navbar">
             <!-- Sidebar Toggle -->
             <div>
             <button class=" btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 ms-1" id="sidebarToggle" href="#!">
                <i class="menu-toggle fas fa-bars"></i>
            </button>

            <!-- Navbar Brand -->
            <a class="navbar-brand" href="#">
                <img width="60px" src="{{ asset('logo.png') }}" alt="Logo">
                Library System
            </a>
        </div>

            <!-- Navbar -->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end my-dropdown-menu" aria-labelledby="navbarDropdown">                                                
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-white" id="sidenavAccordion">
                    <div class=" sb-sidenav-menu border-top-0 border border-right">
                        <div class=" my-sidenav">
                            
                            <a class="text-dark d-flex" href="attendent">
                                <div class="sb-text-dark-icon"><i class="fa-solid fa-calendar-check"></i></div>
                                វត្តមានសិស្ស
                            </a>  
                            <a class="text-dark d-flex" href="student" >
                                <div class="sb-text-dark-icon"><i class="fa-solid fa-user-graduate"></i></div>
                                គ្រប់គ្រងសិស្ស
                            </a>  
                            <a class="text-dark d-flex" href="book">
                                <div class="sb-text-dark-icon"><i class="fa-solid fa-book"></i></div>
                                គ្រប់គ្រងសៀវភៅ
                            </a>  
                            <a class="text-dark d-flex" href="borrow">
                                <div class="sb-text-dark-icon"><i class="fa-solid fa-right-left"></i></div>
                                គ្រប់គ្រងការខ្ចីសៀវភៅ
                            </a>  
                            <a class="text-dark d-flex" href="#">
                                <div class="sb-text-dark-icon"><i class="fa-solid fa-file-lines"></i></div>
                                របាយការណ៍
                            </a>                           
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 py-4">                        
                        <div class="card mb-4">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                                               
                    </div>
                </main>                
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
    </body>
</html>