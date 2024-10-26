<!doctype html>
<html lang="en" data-bs-theme="auto">
  <base href="/public"> 
  @include('home.css')
  <body>
    @include('home.header')
    <div class="container-fluid">
      @include('home.sidebar')
      

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ordine {{$folder->name}}</h1>
          </div>
          <div class="table-responsive small text-center ">
            <table class="table table-striped table-sm table-hover">
              <thead>
                <tr>
                  <th scope="col">Foto</th>
                  <th scope="col">Inserita il</th>
                  <th scope="col">elimina</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <td>
                      @forelse ($folder->files as $file)
                      <li>
                        <a href="{{ asset($file->path) }}" target="_blank"><img src="{{ asset($file->path) }}" target="_blank" alt="" style="width: 200px; height:200px;"></a>
                      </li>
                      @empty
                          <li>Nessun file</li>
                      @endforelse
                      </a>
                    </td>
                    <td>{{$folder->created_at}}</td>
                    <td>
                      <a href=""><i class="bi bi-trash" style="color: red;"></i></a></td>
                  </tr>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>


  </body>
@include('home.footer')
</html>
