<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SBF</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ secure_asset('ui/css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        
    </head>
    
    <body calss="sb-nav-fixed">
    <x-backend.layouts.partials.nav></x-backend.layouts.partials.nav>
    <div id="layoutSidenav">
        <x-backend.layouts.partials.sidebar></x-backend.layouts.partials.sidebar>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-3"> 
                    {{ $breadCrumb }}
                    {{ $slot }} 
                </div>
            </main>
          
        <x-backend.layouts.partials.footer></x-backend.layouts.partials.footer>     
        </div>
    </div>
    
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ secure_asset('ui/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ secure_asset('ui/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ secure_asset('ui/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ secure_asset('ui/js/datatables-simple-demo.js') }}"></script>

        
    </body>
</html>
