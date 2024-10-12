<!doctype html>
<html lang="en" data-bs-theme="auto">
  @include('home.css')
  <body>
    @include('home.header')
    <div class="container-fluid">
      @include('home.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          @include('home.main')
        </main>
      </div>
    </div>
  </body>
@include('home.footer')
</html>
