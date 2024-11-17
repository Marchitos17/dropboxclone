@extends('index')

@section('content')
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
        </div>
      @endforeach

      @foreach($files as $file)
      <div class="file-grid-item">
          <div class="file-icon">
            <!---Estensioni supportate-->
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
            <!---->
            <!---Controllo immmagine-->
            @if ($isImage)
              <a href="{{ asset($file->path) }}" target="_blank"><div class="file-icon"><img src="{{ asset($file->path) }}" target="_blank" alt="" style="width: 160px; height:160px;"></a>
            @else
              <a href="{{ asset($file->path) }}" target="_blank"><img src="https://cdn3d.iconscout.com/3d/premium/thumb/new-file-3d-icon-download-in-png-blend-fbx-gltf-formats--logo-document-add-create-and-folder-pack-files-folders-icons-6648116.png" target="_blank" alt="" style="width: 160px; height:160px;"></a>
            @endif
            <!----->
          </div>
          <div><h6 class="mt-2">{{$file->name}}</h6></div>
        </div>
      </div>
      @endforeach



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
              <div class="file-item">—</div>
              <div class="file-item "><a href="{{route('cancella_cartella',$folder->id)}}" style="color:red"><i class="bi bi-trash3-fill "></i></a></div>
          </div>
        @endforeach
    </div>
  </div>
</main>
@endsection
