<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<aside class="sidebar">
  <button class="new-button" data-bs-toggle="modal" href="#exampleModal">+ Nuovo</button>

  <!--MODAL-->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><h2>Support </h2></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('create.folder') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
            @csrf
            <div class="mb-3">
              <label for="folderName" class="form-label">Nome della Cartella</label>
              <input type="text" name="folder_name" id="folderName" class="form-control" required>
            </div>
            <div class="dz-message">Trascina i file qui o clicca per selezionarli.</div>
            <!-- Aggiunge la cattura della fotocamera e la selezione dei file -->
            <input type="file" name="files[]" multiple>
          </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
            <button type="submit" class="btn btn-primary" form="image-upload">Salva</button>
        </div>
      </div>
    </div>
  </div>


  <!------>


  <ul>
      <li><a href="{{route('home')}}" >📁 Il mio Drive</a></li>
      <li><a href="{{route('condivisi')}}">👥 Condivisi</a></li>
      <li><a href="#">⏱️ Recenti</a></li>
      <li><a href="#">🌟 Speciali</a></li>
      <li><a href="#">🗑️ Cestino</a></li>
  </ul>
</aside>