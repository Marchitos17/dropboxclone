<!DOCTYPE html>
<html lang="it">
@include('home.css')
<body>
    <!-- Intestazione -->
    @include('home.header')

    <div class="container1">
        <!-- Barra laterale -->
        @include('home.sidebar')

        <!-- Area file -->
        @yield('content')
    </div>
</body>
  @include('home.footer')
</html>

