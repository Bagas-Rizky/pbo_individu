<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('front/sewa-mobil-master/assets/favicon.ico') }}" />
    <!-- Bootstrap icons-->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('front/sewa-mobil-master/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('front/sewa-mobil-master/css/custom.css') }}" />
  </head>
  <body>
    @yield('content')
    <!-- Footer-->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">
          Copyright &copy; Your Website 2022
        </p>
      </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="{{ asset('front/sewa-mobil-master/js/bootstrap.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('front/sewa-mobil-master/js/scripts.js') }}"></script>
  </body>
</html>
