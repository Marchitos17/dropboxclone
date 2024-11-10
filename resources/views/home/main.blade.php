@extends('index')

@section('content')
<main class="file-area">
  <div class="toolbar">
      <button id="gridViewBtn" class="toolbar-button">Visualizzazione a griglia</button>
      <button id="listViewBtn" class="toolbar-button">Visualizzazione a elenco</button>
  </div>
  <div id="fileGrid" class="file-grid">
      <div class="file-grid-item">
          <div class="file-icon">📁</div>
          <div>Progetto A</div>
      </div>
      <div class="file-grid-item">
          <div class="file-icon">📄</div>
          <div>Documento.pdf</div>
      </div>
      <div class="file-grid-item">
          <div class="file-icon">📄</div>
          <div>Report.docx</div>
      </div>
      <div class="file-grid-item">
          <div class="file-icon">📁</div>
          <div>Immagini</div>
      </div>
      <div class="file-grid-item">
          <div class="file-icon">📄</div>
          <div>Appunti.txt</div>
      </div>
  </div>
  <div id="fileList" class="file-list">
      <div class="file-list-header">
          <div class="file-list-header-item">Nome</div>
          <div class="file-list-header-item">Ultima modifica</div>
          <div class="file-list-header-item">Dimensione</div>
      </div>
      <div class="file-list-item">
          <div class="file-item">Progetto A</div>
          <div class="file-item">10/10/2024</div>
          <div class="file-item">—</div>
      </div>
      <div class="file-list-item">
          <div class="file-item">Documento.pdf</div>
          <div class="file-item">12/10/2024</div>
          <div class="file-item">1.2 MB</div>
      </div>
      <div class="file-list-item">
          <div class="file-item">Report.docx</div>
          <div class="file-item">14/10/2024</div>
          <div class="file-item">300 KB</div>
      </div>
      <div class="file-list-item">
          <div class="file-item">Immagini</div>
          <div class="file-item">08/10/2024</div>
          <div class="file-item">—</div>
      </div>
      <div class="file-list-item">
          <div class="file-item">Appunti.txt</div>
          <div class="file-item">11/10/2024</div>
          <div class="file-item">12 KB</div>
      </div>
  </div>
</main>  
@endsection
