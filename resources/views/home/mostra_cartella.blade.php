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
            <h1 class="h2">Ordine {{$data->numero_ordine}}</h1>
          </div>
          <div class="table-responsive small text-center ">
            <table class="table table-striped table-sm table-hover">
              <thead>
                <tr>
                  <th scope="col">Foto</th>
                  <th scope="col">Creata il</th>
                  <th scope="col">Inserita da</th>
                  <th scope="col">elimina</th>
                </tr>
              </thead>
              <tbody>
                  <tr>
                    <td>
                        <a target="_blank" href="immagini/{{$data->foto1}}">
                        <img src="immagini/{{$data->foto1}}"style="width:150px">
                      </a>
                    </td>
                    <td>{{$data->created_at}}</td>
                    <td></td>
                    <td><i class="bi bi-trash" style="color: red;"></i></td>
                  </tr>
                  @isset($data->foto2)
                    <tr>
                      <td>
                          <a target="_blank" href="immagini/{{$data->foto2}}">
                          <img src="immagini/{{$data->foto2}}"style="width:150px">
                        </a>
                      </td>
                      <td>{{$data->created_at}}</td>
                      <td></td>
                      <td><i class="bi bi-trash" style="color: red;"></i></td>
                    </tr>
                  @endisset
                  @isset($data->foto3)
                  <tr>
                    <td>
                        <a target="_blank" href="immagini/{{$data->foto3}}">
                        <img src="immagini/{{$data->foto3}}"style="width:150px">
                      </a>
                    </td>
                    <td>{{$data->created_at}}</td>
                    <td></td>
                    <td><i class="bi bi-trash" style="color: red;"></i></td>
                  </tr>
                  @endisset
                  @isset($data->foto4)
                  <tr>
                    <td>
                        <a target="_blank" href="immagini/{{$data->foto4}}">
                        <img src="immagini/{{$data->foto4}}"style="width:150px">
                      </a>
                    </td>
                    <td>{{$data->created_at}}</td>
                    <td></td>
                    <td><i class="bi bi-trash" style="color: red;"></i></td>
                  </tr>
                  @endisset
                  @isset($data->foto5)
                  <tr>
                    <td>
                        <a target="_blank" href="immagini/{{$data->foto5}}">
                        <img src="immagini/{{$data->foto5}}"style="width:150px">
                      </a>
                    </td>
                    <td>{{$data->created_at}}</td>
                    <td></td>
                    <td><i class="bi bi-trash" style="color: red;"></i></td>
                  </tr>
                  @endisset
                  @isset($data->foto6)
                  <tr>
                    <td>
                        <a target="_blank" href="immagini/{{$data->foto6}}">
                        <img src="immagini/{{$data->foto6}}"style="width:150px">
                      </a>
                    </td>
                    <td>{{$data->created_at}}</td>
                    <td></td>
                    <td><i class="bi bi-trash" style="color: red;"></i></td>
                  </tr>
                  @endisset
                  @isset($data->foto7)
                  <tr>
                    <td>
                        <a target="_blank" href="immagini/{{$data->foto7}}">
                        <img src="immagini/{{$data->foto7}}"style="width:150px">
                      </a>
                    </td>
                    <td>{{$data->created_at}}</td>
                    <td></td>
                    <td><i class="bi bi-trash" style="color: red;"></i></td>
                  </tr>
                  @endisset
                  @isset($data->foto8)
                  <tr>
                    <td>
                        <a target="_blank" href="immagini/{{$data->foto8}}">
                        <img src="immagini/{{$data->foto8}}"style="width:150px">
                      </a>
                    </td>
                    <td>{{$data->created_at}}</td>
                    <td></td>
                    <td><i class="bi bi-trash" style="color: red;"></i></td>
                  </tr>
                  @endisset
                  @isset($data->foto9)
                  <tr>
                    <td>
                        <a target="_blank" href="immagini/{{$data->foto9}}">
                        <img src="immagini/{{$data->foto9}}"style="width:150px">
                      </a>
                    </td>
                    <td>{{$data->created_at}}</td>
                    <td></td>
                    <td><i class="bi bi-trash" style="color: red;"></i></td>
                  </tr>
                  @endisset
                  @isset($data->foto10)
                  <tr>
                    <td>
                        <a target="_blank" href="immagini/{{$data->foto10}}">
                        <img src="immagini/{{$data->foto10}}"style="width:150px">
                      </a>
                    </td>
                    <td>{{$data->created_at}}</td>
                    <td></td>
                    <td><i class="bi bi-trash" style="color: red;"></i></td>
                  </tr>
                  @endisset
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
  </body>
@include('home.footer')
</html>
