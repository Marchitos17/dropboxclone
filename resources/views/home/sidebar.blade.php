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
/*DROPDOWN TASTO NUOVO*/
.dropbtn {
  background-color: #0672d6;
  color: white;
  padding: 16px;
  font-size: 160px;
  border: none;
  cursor: pointer;
}

.dropdown-content {
  display: none;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #0567c2;}
.dropdown:hover .dropdown-content {display: block;}
.dropdown:hover .dropbtn {background-color: #3e8e41;}
/*DROPDOWN TASTO NUOVO*/
</style>
<aside class="sidebar d-md-block d-none">
  @if (Route::currentRouteName() === 'condivisi')
    <div class="dropdown">
      <button class="new-button"> <i class="bi bi-cloud-plus-fill"></i> Nuovo</button>
      <div class="dropdown-content" style="left:0;">
        <a none><button type="button" class="btn" data-bs-toggle="modal" href="#exampleModal">👉 Crea Cartella</button></a>
        <a none><button type="button" class="btn" data-bs-toggle="modal" href="#exampleModal3">👉 Aggiungi File</button></a>
      </div>
    </div>
  @elseif(Route::currentRouteName() === 'mostra_cartella')
    <button class="new-button" data-bs-toggle="modal" href="#exampleModal1"> <i class="bi bi-patch-plus-fill"></i> Aggiungi File</button>
    @else
  @endif
  <!--- MODAL 2 SINGOLO FILE-->
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel"><h2>Support </h2></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('inserisci_singolo_file') }}" method="post" enctype="multipart/form-data" id="image-upload1">
              @csrf
                  <input type="file" name="files[]" multiple>
          </form>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
              <button type="submit" class="btn btn-primary" form="image-upload1">Salva</button>
          </div>
        </div>
      </div>
    </div>
  <!------>
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
      <li><a href="{{route('condivisi')}}" >📁 Il mio Drive</a></li>
      <li><a href="{{route('home')}}">👥 Condivisi</a></li>
      <li><a href="#">⏱️ Recenti</a></li>
      <li><a href="#">🌟 Speciali</a></li>
      <li><a href="#">🗑️ Cestino</a></li>
  </ul>
</aside>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

