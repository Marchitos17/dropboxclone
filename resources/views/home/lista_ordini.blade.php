@extends('index')

@section('content')
<style>
 /* Stile generali per la tabella */
.file-list {
  width: 100%;
  margin: 20px 0;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  background-color: #fff;
}

.file-list-header {
  background-color: #f5f5f5;
  color: #555;
  padding: 12px;
  font-size: 16px;
  font-weight: bold;
  text-align: left;
  text-transform: uppercase;
}

.file-list-header-item {
  flex: 1;
}

.file-list-item {
  display: flex;
  justify-content: space-between;
  padding: 12px;
  border-bottom: 1px solid #f1f1f1;
  transition: background-color 0.3s ease;
}

.file-list-item:hover {
  background-color: #f9f9f9;
}

.file-item {
  flex: 1;
  font-size: 14px;
  color: #333;
}

.file-item a {
  color: #007bff;
  text-decoration: none;
  font-weight: 500;
}

.file-item a:hover {
  color: #0056b3;
}

.file-item i {
  color: #dc3545;
  transition: color 0.3s ease;
}

.file-item i:hover {
  color: #c82333;
}

/* Design per mobile */
@media (max-width: 767px) {
  .file-list {
    display: block;
  }

  .file-list-header {
    display: none;
  }

  .file-list-item {
    display: block;
    margin-bottom: 12px;
    background-color: #fafafa;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    padding: 10px;
  }

  .file-item {
    display: block;
    margin-bottom: 8px;
    padding-left: 0;
  }

  .file-item::before {
    content: attr(data-title);
    font-weight: bold;
    color: #666;
    margin-bottom: 4px;
  }

  .file-item a {
    font-size: 14px;
    word-wrap: break-word;
  }

  .file-item a:hover {
    color: #0056b3;
  }
}
</style>
<main class="file-area">
  <div class="toolbar">
      <button id="gridViewBtn" class="toolbar-button">Visualizzazione a griglia</button>
      <button id="listViewBtn" class="toolbar-button">Visualizzazione a elenco</button>
  </div>
    <h1 class="text-center mb-5">Cartelle e File</h1>
    <div id="fileGrid" class="file-grid">
      @foreach ($folders as $folder)
        <div class="file-grid-item">
          <a href="{{route('mostra_cartella',$folder->id)}}" class="text-decoration-none">
            <div class="file-icon"><img src="https://img.freepik.com/premium-psd/3d-file-folder-check-verify-icon-illustration_148391-981.jpg" alt=""></div>
            <div class="mt-2">Ordine: {{ $folder->name }}</div>
          </a>
          <div class="file-item" data-title="Rinomina">
            <form action="{{ route('update.folder.name') }}" method="POST" class="rename-form">
                @csrf
                <input type="hidden" name="folder_id" value="{{ $folder->id }}">
                <input type="text" name="new_name" value="{{ $folder->name }}" required>
                <button type="submit">✏️ Rinomina</button>
            </form>
        </div>
        </div>
      @endforeach

      @foreach($files as $file)
      <div class="file-grid-item">
          <div class="file-icon">
              <!-- Estensioni supportate -->
              @php
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
              <!-- Controllo immagine -->
              @if ($isImage)
                  <a href="{{ asset($file->path) }}" target="_blank">
                      <div class="file-icon">
                          <img src="{{ asset($file->path) }}" target="_blank" alt="" style="width: 160px; height:160px;">
                      </div>
                  </a>
              @else
                  <a href="{{ asset($file->path) }}" target="_blank">
                      <img src="https://cdn3d.iconscout.com/3d/premium/thumb/new-file-3d-icon-download-in-png-blend-fbx-gltf-formats--logo-document-add-create-and-folder-pack-files-folders-icons-6648116.png" target="_blank" alt="" style="width: 160px; height:160px;">
                  </a>
              @endif
          </div>
          <div><h6 class="mt-2 text-truncate">{{$file->name}}</h6></div> <!-- Text troncate, aggiunge i puntini ad un testo che non entra nel div-->
      </div> <!-- Chiusura corretta del file-grid-item -->
    @endforeach
  </div>
  



    <div id="fileList" class="file-list">
        <div class="file-list-header">
            <div class="file-list-header-item">Nome</div>
            <div class="file-list-header-item">Ultima modifica</div>
            <div class="file-list-header-item">Dimensione</div>
            <div class="file-list-header-item">Elimina</div>
        </div>
        @foreach ($folders as $folder)
          <div class="file-list-item">
            <div class="file-item"><a href="{{route('mostra_cartella',$folder->id)}}" class="text-decoration-none">📂 {{ $folder->name }}</a></div>
              <div class="file-item ">{{$folder->created_at}}</div>
              <div class="file-item">n/a</div>
              <div class="file-item "><a href="{{route('cancella_cartella',$folder->id)}}" style="color:red"><i class="bi bi-trash3-fill "></i></a></div>
          </div>
        @endforeach

        @foreach($files as $file)
        <div class="file-list-item">
          <div class="file-item">
            <!-- Estensioni supportate -->
            @php
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

            <!-- Controllo immagine -->
              @if ($isImage)
                  <a href="{{ asset($file->path) }}" target="_blank">
                    📷 {{ $file->name }}
                  </a>
                @else
                <a href="{{ asset($file->path) }}" target="_blank">
                  <span>📄 {{ $file->name }}</span>
                </a>   
              @endif     
            <!---->      
          </div>
            <div class="file-item ">{{$file->created_at}}</div>
            <div class="file-item">n/a</div>
            <div class="file-item ">
              <a href="{{route('elimina_immagine',$file->id)}}" style="color:red"><i class="bi bi-trash3-fill "></i></a>
            </div>
        </div>
        @endforeach
    </div>
  </div>
</main>
@endsection
