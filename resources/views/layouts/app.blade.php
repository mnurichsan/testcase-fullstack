<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Majoo.id</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.2.0/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @method('css')

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      .footer {
        bottom: 0;
        width: 100%;
        background-color: #333;
        color:#fff;
       }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
    
<header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="/" class="navbar-brand">
        <strong>Majoo Teknologi Indonesia</strong>
      </a>  
        @auth
            <a href="{{ url('/home') }}" class="text-white">Home</a>
        @else
            <a href="{{ route('login') }}" class="text-white">Log in</a>                    
        @endauth
 
    </div>
  </div>
</header>

<main>

<div class="album py-5 mb-5">
    @yield('content')
    
</div>

</main>

<footer class="footer bg-light text-center text-lg-start">
    <!-- Copyright -->
   
    <div class="text-center p-3 text-dark">
        <hr>
      2019 © 
      <a class="text-dark" href="https://majoo.id/">PT Majoo Teknologi Indonesia</a>
    </div>
    <!-- Copyright -->
  </footer>


  <!-- JavaScript Bundle with Popper -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.2.0/sweetalert2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
  @include('sweetalert::alert')
  @stack('js')

  </body>
</html>
