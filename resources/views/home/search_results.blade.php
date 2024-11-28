@extends('index')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

<main class="file-area">
  <div class="toolbar">
      <button id="gridViewBtn" class="toolbar-button">Visualizzazione a griglia</button>
      <button id="listViewBtn" class="toolbar-button">Visualizzazione a elenco</button>
  </div>
  <div id="fileGrid" class="file-grid">
    @foreach ($results as $result)
      <div class="file-grid-item">
        <!---Controllo immagine-->
        @php
            $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg'];
            $isImage = false;
            // Controlliamo se il file è un'immagine
            foreach ($imageExtensions as $ext) {
                if (str_contains(strtolower($result->name), $ext)) {
                    $isImage = true;
                    break;
                }
            }
        @endphp

            @if ($result instanceof App\Models\File)
                    @if ($isImage)
                        <!-- Se è un'immagine, mostriamo l'anteprima -->
                        <a href="{{ asset($result->path) }}" target="_blank"><div class="file-icon"><img src="{{ asset($result->path) }}" target="_blank" alt="" style="width: 200px; height:200px;"></a></div>
                    @else
                        <!-- Se non è un'immagine, mostriamo un'icona o testo -->
                            <div class="file-icon">
                                <a href="{{ asset($result->path) }}" target="_blank"><img src="https://cdn3d.iconscout.com/3d/premium/thumb/new-file-3d-icon-download-in-png-blend-fbx-gltf-formats--logo-document-add-create-and-folder-pack-files-folders-icons-6648116.png" target="_blank" alt="" style="width: 200px; height:200px;"></a>
                            </div>
                    @endif
                <!---Controllo immagine-->
                
                <div><h6 class="mt-2 text-truncate">{{$result->name}}</h6></div> <!-- Text troncate, aggiunge i puntini ad un testo che non entra nel div-->
                <div class="d-flex justify-content-evenly mt-3">
                <a href="{{ asset($result->path) }}" download><i class="bi bi-download" style="color:green"></i></a>
                <a href="{{route('elimina_immagine',$result->id)}}" style="color:red"><i class="bi bi-trash3-fill" style="color:red"></i></a>
                </div>
            @endif
            @if ($result instanceof App\Models\Folder)
                    <div class="file-grid-item">
                        <a href="{{route('mostra_cartella',$result->id)}}" class="text-decoration-none">
                          <div class="file-icon"><img src="https://img.freepik.com/premium-psd/3d-file-folder-check-verify-icon-illustration_148391-981.jpg" alt=""></div>
                          <div class="mt-2">Ordine: {{ $result->name }}</div>
                        </a>
                        <div class="file-item" data-title="Rinomina">
                          <form action="{{ route('update.folder.name') }}" method="POST" class="rename-form">
                              @csrf
                              <input type="hidden" name="folder_id" value="{{ $result->id }}">
                              <input type="text" name="new_name" value="{{ $result->name }}" required>
                              <button type="submit">✏️ Rinomina</button>
                          </form>
                        </div>
                    </div>
            @endif
    </div>
    @endforeach
</main>

@endsection