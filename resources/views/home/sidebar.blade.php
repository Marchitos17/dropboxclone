<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<style>
  .drop-area {
    border: 2px dashed #007bff;
    border-radius: 5px;
    padding: 20px;
    text-align: center;
    margin: 10px 0;
    cursor: pointer;
}

.drop-area.hover {
    border-color: #0056b3;
    background-color: #f0f0f0;
}

</style>
<aside class="sidebar">
  @if (Route::currentRouteName() === 'condivisi')
    <button class="btn new-button" data-bs-toggle="modal" href="#exampleModal"> <i class="bi bi-cloud-plus-fill"></i> Nuovo</button>
  @elseif(Route::currentRouteName() === 'mostra_cartella')
    <button class="new-button" data-bs-toggle="modal" href="#exampleModal1"> <i class="bi bi-patch-plus-fill"></i> Aggiungi File</button>
    @else
  @endif



  <!--MODAL 1-->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><h2>Support </h2></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('create.folder') }}" method="post" enctype="multipart/form-data" id="image-upload">
            @csrf
            <div class="mb-3">
              <label for="folderName" class="form-label">Nome della Cartella</label>
              <input type="text" name="folder_name" id="folderName" class="form-control" required>
            </div>
            <div id="drop-area" class="drop-area">
              Trascina i file qui o clicca per selezionarli.
              <input type="file" name="files[]" id="fileElem" multiple accept="image/*" style="display:none;">
            </div>
          <div id="image-previews" class="mt-2"></div>
        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
            <button type="submit" class="btn btn-primary" form="image-upload" id="submit-button">Salva</button>
        </div>
      </div>
    </div>
  </div>

  <!------>
  <!--- l'altro MODAL 2 si trova nella view mostra_cartella-->

  <ul>
      <li><a href="{{route('home')}}" >📁 Il mio Drive</a></li>
      <li><a href="{{route('condivisi')}}">👥 Condivisi</a></li>
      <li><a href="#">⏱️ Recenti</a></li>
      <li><a href="#">🌟 Speciali</a></li>
      <li><a href="#">🗑️ Cestino</a></li>
  </ul>
</aside>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

