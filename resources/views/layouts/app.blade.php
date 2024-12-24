<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Service Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="/template/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3">Service Motor</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        {{-- <div class="sb-sidenav-menu-heading" >Home</div> --}}
                        <a class="nav-link" href="/home">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Home
                        </a>
                        <a class="nav-link" href="{{ route('pelanggan.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Data Pelanggan
                        </a>
                        <a class="nav-link" href="{{ route('kendaraan.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                            Data Kendaraan
                        </a>
                        <a class="nav-link" href="{{ route('daftar-service.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Daftar Service
                        </a>
                        <a class="nav-link" href="{{ route('service.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                            Data Service
                        </a>
                        <a class="nav-link" href="{{ route('pembayaran.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                            Pembayaran Service
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">
                        {{-- <p>© 2024 Minyeuk Pret. Powered by Minyeuk Pret.</p> --}}
                    </div>
                    <p>© 2024 Service Motor. By Service Motor Germany.</p>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="/template/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/template/assets/demo/chart-area-demo.js"></script>
    <script src="/template/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="/template/js/datatables-simple-demo.js"></script>
</body>

</html>
