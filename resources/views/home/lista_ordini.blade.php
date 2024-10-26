  <!doctype html>
<html lang="en" data-bs-theme="auto">
  @include('home.css')
  <body>
    @include('home.header')
    <div class="container-fluid">
      @include('home.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <h1>Cartelle e File</h1>

    @foreach ($folders as $folder)
        <h2>Cartella: {{ $folder->name }}</h2>
        <ul>
            @forelse ($folder->files as $file)
                <li>
                  <a href="{{ asset($file->path) }}" target="_blank">Visualizza</a>
                </li>
              @empty
                  <li>Nessun file</li>
              @endforelse
        </ul>
    @endforeach
        </main>
      </div>
    </div>
  </body>
@include('home.footer')
</html>
