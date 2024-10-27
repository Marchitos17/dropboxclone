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
          <center><a class="btn-primary"data-bs-toggle="modal" href="#exampleModal" ><img src="immagini/img.jpg" alt="" style="width: 100px; height:100px;"></a></center>

          <!--MODAL-->

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel"><h2>Inserisci o trascina un file </h2></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('inserisci_file',$folder->id) }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                    @csrf
                    <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                    <div class="dz-message">Trascina i file qui o clicca per selezionarli.</div>
                    <!-- Aggiunge la cattura della fotocamera e la selezione dei file -->
                    <input type="file" name="files[]" accept="image/*" capture="camera" multiple style="display: none;" id="file-input">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                    <button type="submit" class="btn btn-primary">Salva</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!------>
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
                @forelse ($folder->files as $file)
                  <tr>
                    <td>
                      <li>
                        <a href="{{ asset($file->path) }}" target="_blank"><img src="{{ asset($file->path) }}" target="_blank" alt="" style="width: 200px; height:200px;"></a>
                      </li>
                    </td>
                    <td>{{$folder->created_at}}</td>
                    <td>
                      <a href="{{route('elimina_immagine',$file->id)}}"><i class="bi bi-trash" style="color: red;"></i></a>
                    </td>
                  </tr>
                  @empty
                          <li>Nessun file</li>
                  @endforelse
              </tbody>
            </table>
          </div>
        </main>
    </div>
      </div>
    </div>


  </body>
@include('home.footer')
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>

<script type="text/javascript">
    Dropzone.options.imageUpload = {
        paramName: "files[]",
        maxFilesize: 2,
        acceptedFiles: 'image/*', // Tipi di file accettati
    };
</script>
</html>
