@extends('index')

@section('content')
<!--- MODAL 2 usato nel tasto della cartella per inserire un solo file-->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><h2>Support </h2></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('inserisci_file') }}" method="post" enctype="multipart/form-data" id="image-upload12">
          @csrf
              <input type="text" name="folder_id" value="{{$folder->id}}" hidden>
              <input type="file" name="files[]" multiple>
      </form>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
          <button type="submit" class="btn btn-primary" form="image-upload12">Salva</button>
      </div>
    </div>
  </div>
</div>
<!------>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

<main class="file-area">
  <div class="toolbar">
      <button id="gridViewBtn" class="toolbar-button">Visualizzazione a griglia</button>
      <button id="listViewBtn" class="toolbar-button">Visualizzazione a elenco</button>
  </div>
  <h1 class="text-center mb-5">Ordine {{$folder->name}}</h1>
  <div id="fileGrid" class="file-grid">
    @forelse($folder->files as $file)
      <div class="file-grid-item">
        <!---Controllo immagine-->
        @php
            // Estensioni supportate
            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'];
            $isImage = false;
            $isPdf = false;

            // Controlliamo il tipo del file
            foreach ($imageExtensions as $ext) {
                if (str_contains(strtolower($file->name), $ext)) {
                    $isImage = true;
                    break;
                }
            }

            if (str_contains(strtolower($file->name), 'pdf')) {
                $isPdf = true;
            }
        @endphp
        <a href="{{route('mostra_cartella',$folder->id)}}" class="text-decoration-none">
          @if ($isImage)
              <!-- Se è un'immagine, mostriamo l'anteprima -->
              <a href="{{ asset($file->path) }}" target="_blank"><div class="file-icon"><img src="{{ asset($file->path) }}" target="_blank" alt="" style="width: 200px; height:200px;"></a></div>
          @else
              <!-- Se non è un'immagine, mostriamo un'icona o testo -->
                  <div class="file-icon">
                    <a href="{{ asset($file->path) }}" target="_blank"><img src="https://cdn3d.iconscout.com/3d/premium/thumb/new-file-3d-icon-download-in-png-blend-fbx-gltf-formats--logo-document-add-create-and-folder-pack-files-folders-icons-6648116.png" target="_blank" alt="" style="width: 200px; height:200px;"></a>
                  </div>
          @endif
          <!---Controllo immagine-->
        </a>
        <div><h6 class="mt-2 text-truncate">{{$file->name}}</h6></div> <!-- Text troncate, aggiunge i puntini ad un testo che non entra nel div-->
        <div class="d-flex justify-content-evenly mt-3">
          <a href="{{ asset($file->path) }}" download><i class="bi bi-download" style="color:green"></i></a>
          <a href="{{route('elimina_immagine',$file->id)}}" style="color:red"><i class="bi bi-trash3-fill" style="color:red"></i></a>
        </div>
      </div>
      @endforeach
  </div>
  @if($files->isEmpty())
  <p>Nessun risultato trovato per "{{ request('query') }}"</p>
@else

  <div id="fileList" class="file-list">
      <div class="file-list-header">
          <div class="file-list-header-item">Foto</div>
          <div class="file-list-header-item">Ultima modifica</div>
          <div class="file-list-header-item">Dimensione</div>
          <div class="file-list-header-item text-center">Elimina</div>
      </div>
      @forelse ($folder->files as $file)
      <a href="{{route('mostra_cartella',$folder->id)}}" class="text-decoration-none">
        <div class="file-list-item">

        @php
            // Estensioni delle immagini supportate
            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'];
            $isImage = false;

            // Controlliamo se il nome del file contiene una delle estensioni
            foreach ($imageExtensions as $ext) {
                if (str_contains(strtolower($file->name), $ext)) {
                    $isImage = true;
                    break; // Se trova una corrispondenza, esce dal ciclo
                }
            }
        @endphp
          @if ($isImage)
              <!-- Se è un'immagine, mostriamo l'anteprima -->
              <div class="file-item">
                <a href="{{ asset($file->path) }}" target="_blank">
                  📷
                </a>
              </div>
          @else
              <!-- Se non è un'immagine, mostriamo un'icona o testo -->
              <div class="file-item">
                <a href="{{ asset($file->path) }}" target="_blank">
                      <span>📄</span>
                </a>
            </div>
          @endif
            <div class="file-item">{{$folder->created_at}}</div>
            <div class="file-item ">n/a</div>
            <div class="file-item text-center"><a href="{{route('elimina_immagine',$file->id)}}" style="color:red"><i class="bi bi-trash3-fill"></i></a></div>
        </div>
      </a>
      @endforeach
      @endif
  </div>
</main>

@endsection