@extends('index')

@section('content')
<main class="file-area">
  <div class="toolbar">
      <button id="gridViewBtn" class="toolbar-button">Visualizzazione a griglia</button>
      <button id="listViewBtn" class="toolbar-button">Visualizzazione a elenco</button>
  </div>
  <h1 class="text-center mb-5">Ordine {{$folder->name}}</h1>
  <div id="fileGrid" class="file-grid">
    @forelse($folder->files as $file)
      <div class="file-grid-item">
        <a href="{{route('mostra_cartella',$folder->id)}}" class="text-decoration-none">
          <a href="{{ asset($file->path) }}" target="_blank"><div class="file-icon"><img src="{{ asset($file->path) }}" target="_blank" alt="" style="width: 200px; height:200px;"></a></div>
        </a>
        <div class="d-flex justify-content-evenly mt-3">
          <a href="{{ asset($file->path) }}" download><i class="bi bi-download" style="color:green"></i></a>
          <a href="{{route('elimina_immagine',$file->id)}}" style="color:red"><i class="bi bi-trash3-fill" style="color:red"></i></a>
        </div>
      </div>
      @endforeach
  </div>
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
          <a href="{{ asset($file->path) }}" target="_blank"><div class="file-item"><img src="{{ asset($file->path) }}" target="_blank" alt="" style="width: 100px; height:100px;"></a></div>
            <div class="file-item">{{$folder->created_at}}</div>
            <div class="file-item">—</div>
            <div class="file-item text-center"><a href="{{route('elimina_immagine',$file->id)}}" style="color:red"><i class="bi bi-trash3-fill"></i></a></div>
        </div>
      </a>
      @endforeach
  </div>
</main>

@endsection