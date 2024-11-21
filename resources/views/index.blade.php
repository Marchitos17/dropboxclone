<!DOCTYPE html>
<html lang="it">
@include('home.css')
<body>
    <!-- Intestazione -->
    @include('home.header')

    <!--Messaggi-->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <!---->

    <div class="container1">
        <!-- Barra laterale -->
        @include('home.sidebar')
        <div id="loader">
          <div id="progress-bar"></div>
      </div>
        <!-- Area file -->
        @yield('content')
    </div>
    <!-- Se non ci sono risultati -->
</body>
  @include('home.footer')
</html>

