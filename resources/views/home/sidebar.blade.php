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
          <form action="{{ route('create.folder',) }}" method="post" enctype="multipart/form-data" id="image-upload">
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

<script>
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('fileElem');
    const previewContainer = document.getElementById('image-previews');
    let isUploading = false;
  
    // Prevenire il comportamento predefinito
    const preventDefault = (event) => {
        event.preventDefault();
        event.stopPropagation();
    };
  
    // Eventi drag and drop
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefault, false);
        document.body.addEventListener(eventName, preventDefault, false);
    });
  
    dropArea.addEventListener('dragenter', () => {
        dropArea.classList.add('hover');
    });
  
    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('hover');
    });
  
    dropArea.addEventListener('drop', (event) => {
        dropArea.classList.remove('hover');
        const files = event.dataTransfer.files;
        handleFiles(files);
    });
  
    // Clic input file
    dropArea.addEventListener('click', () => {
        fileInput.click();
    });
  
    // Evento `change` per il fileInput
    fileInput.addEventListener('change', () => {
        const files = fileInput.files;
        handleFiles(files);
    });
  
    // Funzione gestione file e anteprima
    function handleFiles(files) {
        if (isUploading) return; // Evita duplicazioni
        const folderName = document.getElementById('folderName').value;
  
        if (!folderName) {
            alert('Inserisci un nome per la cartella.');
            return;
        }
  
        previewContainer.innerHTML = '';
        for (const file of files) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.width = 100;
            img.height = 100;
  
            const div = document.createElement('div');
            div.appendChild(img);
            previewContainer.appendChild(div);
        }
  
        // Chiama la funzione per caricare i file
        uploadFiles(files);
    }
  
    // Funzione invio file al server
    function uploadFiles(files) {
        const formData = new FormData();
        const folderName = document.getElementById('folderName').value;
  
        formData.append('folder_name', folderName);
        for (const file of files) {
            formData.append('files[]', file);
        }
  
        isUploading = true; // Imposta isUploading a true
  
        fetch("{{ route('create.folder') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Success:', data);
            previewContainer.innerHTML = ''; // Pulisci l'anteprima
  
            // Chiudi il modal
            $('#exampleModal').modal('hide');
  
            isUploading = false; // Imposta isUploading a false
        })
        .catch((error) => {
            console.error('Error:', error);
            isUploading = false; // Imposta isUploading a false
        });
    }
  
    // Aggiungi evento per gestire l'invio del modulo
    document.getElementById('image-upload').addEventListener('submit', function(event) {
        event.preventDefault(); // Previeni l'invio predefinito del modulo
        const formData = new FormData(this); // Crea FormData dal modulo
        uploadFiles(formData); // Passa FormData alla funzione uploadFiles
    });
  </script>
  