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
        <nav class="sb-topnav  navbar navbar-expand-lg navbar-light border-top-0 border border-right bg-white">
            <!-- Navbar Brand -->
            <a class="navbar-brand" href="#">
                <img width="60px" src="{{ asset('logo.png') }}" alt="Logo">
                Library System
            </a>
        
            <!-- Sidebar Toggle -->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
                <i class="fas fa-bars"></i>
            </button>
        
            <!-- Navbar Search -->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch">
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
        
            <!-- Navbar -->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Activity Log</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>        
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-white" id="sidenavAccordion">
                    <div class="sb-sidenav-menu border-top-0 border border-right">
                        <div class="nav">
                            
                            <a class="text-dark d-flex" href="#">
                                <div class="sb-text-dark-icon"><i class="fas fa-tachometer-alt"></i></div>
                                វត្តមានសិស្ស
                            </a>  
                            <a class="text-dark d-flex" href="#">
                                <div class="sb-text-dark-icon"><i class="fas fa-tachometer-alt"></i></div>
                                គ្រប់គ្រងសិស្ស
                            </a>  
                            <a class="text-dark d-flex" href="#">
                                <div class="sb-text-dark-icon"><i class="fas fa-tachometer-alt"></i></div>
                                គ្រប់គ្រងសៀវភៅ
                            </a>  
                            <a class="text-dark d-flex" href="#">
                                <div class="sb-text-dark-icon"><i class="fas fa-tachometer-alt"></i></div>
                                គ្រប់គ្រងការខ្ចីសៀវភៅ
                            </a>  
                            <a class="text-dark d-flex" href="#">
                                <div class="sb-text-dark-icon"><i class="fas fa-tachometer-alt"></i></div>
                                របាយការណ៍
                            </a>                           
                        </div>
                    </div>                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Static Navigation</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Static Navigation</li>
                        </ol>
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