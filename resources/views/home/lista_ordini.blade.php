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
          <div>Ordine: {{ $folder->name }}</div>
        </a>
      </div>
    @endforeach
      <!--<div class="file-grid-item">
          <div class="file-icon">📄</div>
          <div>Appunti.txt</div>
      </div>-->
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
            <div class="file-item">—</div>
            <div class="file-item "><a href="{{route('cancella_cartella',$folder->id)}}" style="color:red"><i class="bi bi-trash3-fill "></i></a></div>
        </div>
      @endforeach
  </div>
</main>

@endsection