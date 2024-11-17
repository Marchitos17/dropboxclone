<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @include('home.css')
</head>
<body >
    @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
    @endsession
    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5 text-center" style="background-image: url(https://w0.peakpx.com/wallpaper/486/892/HD-wallpaper-3d-abstract-colorful-shapes-minimalist-3d-abstract-shapes-minimalism-minimalist-colorful.jpg); 
    background-repeat: no-repeat; background-position: center center; background-size: cover; width: 100%;
    height: 100%;"tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-4 shadow">
              <div class="flex items-center justify-end mt-4">
                <a href="{{url('/')}}"><img src="https://img.freepik.com/premium-photo/vibrant-3d-illustration-folder-icon-representing-organization-data-storage-digital-information_1142-214080.jpg" class="" style="width: 220px; border-radius:50%; " alt="logo"></a>
              </div>
            <h1 class="fw-bold mb-0 fs-2 text-black text-center">Accedi</h1>
      
            <div class="modal-body p-5 pt-0">
        @if ($errors->any())
              <ul class="list-disc list-inside text-sm text-red">
                  @foreach ($errors->all() as $error)
                      <li class="text-red-800 text-center">Dati errati</li>
                  @endforeach
              </ul>
        @endif
        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form action="{{route('login')}}"class="" method="POST">
            @csrf
            <div class="form-floating mb-3">
              <input type="email" class="form-control rounded-3" id="floatingInput" name="email" placeholder="name@example.com">
              <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control rounded-3" id="floatingPassword" name="password" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Accedi</button>
            <small class="text-body-secondary">Cliccando su Accedi, accetti i termini di utilizzo.</small>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Hai dimenticato la password?') }}
                    </a>
                @endif
            <hr class="my-4">
            <h2 class="fs-5 fw-bold mb-3">Oppure accedi con terza parte</h2>
            <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                <i class="bi bi-twitter"></i>                  
                Sign up con Twitter
            </button>
            <button class="w-100 py-2 mb-2 btn btn-outline-primary rounded-3" type="submit">
                <i class="bi bi-facebook"></i>
              Sign up con Facebook
            </button>
            <button class="w-100 py-2 mb-2 btn btn-outline-secondary rounded-3" type="submit">
                <i class="bi bi-github"></i>
              Sign up con GitHub
            </button>
          </form>
        </div>
    </div>
  </div>
</div>
</body>
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
