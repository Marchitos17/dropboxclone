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

<script>
const dropArea = document.getElementById('drop-area');
const fileInput = document.getElementById('fileElem');
const previewContainer = document.getElementById('image-previews');
let formData = new FormData(); // Crea un oggetto FormData vuoto
let isUploading = false; // Flag per prevenire invii multipli

// Funzione per prevenire il comportamento predefinito
const preventDefault = (event) => {
    event.preventDefault();
    event.stopPropagation();
};

// Aggiungi i listener per gli eventi drag and drop
['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefault, false);
    document.body.addEventListener(eventName, preventDefault, false);
});

dropArea.addEventListener('dragenter', () => {
    dropArea.classList.add('hover'); // Aggiunge la classe hover
});

dropArea.addEventListener('dragleave', () => {
    dropArea.classList.remove('hover'); // Rimuove la classe hover
});

dropArea.addEventListener('drop', (event) => {
    dropArea.classList.remove('hover'); // Rimuove la classe hover
    const files = event.dataTransfer.files; // Ottieni i file dal drop
    handleFiles(files); // Gestisci i file
});

// Cliccando sulla zona di drop, attiva l'input file
dropArea.addEventListener('click', () => {
    fileInput.click(); // Apri il file input
});

// Gestisci i file selezionati
fileInput.addEventListener('change', () => {
    const files = fileInput.files; // Ottieni i file selezionati
    handleFiles(files); // Gestisci i file
});

// Funzione per gestire i file e mostrare l'anteprima
function handleFiles(files) {
    for (const file of files) {
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file); // Crea un URL per l'anteprima
        img.width = 100; // Imposta la larghezza desiderata
        img.height = 100; // Imposta l'altezza desiderata
        
        const div = document.createElement('div');
        div.appendChild(img); // Aggiunge l'immagine al div
        previewContainer.appendChild(div); // Aggiunge il div al contenitore di anteprima

        formData.append('files[]', file); // Aggiunge il file al FormData
    }
}

// Aggiungi un evento al pulsante "Salva" per inviare i file al server
document.getElementById('save-button').addEventListener('click', () => {
    const folderName = document.getElementById('folderName').value;

    // Assicurati che ci sia almeno un file da caricare
    if (formData.has('files[]') && folderName) {
        formData.append('folder_name', folderName); // Aggiungi il nome della cartella al FormData

        if (!isUploading) { // Se non stai già caricando
            isUploading = true; // Imposta il flag di upload
            uploadFiles(formData); // Invia i file al server
        }
    } else {
        alert('Aggiungi almeno un file e un nome per la cartella.');
    }
});

// Funzione per inviare i file al server
function uploadFiles(formData) {
    fetch("{{ route('create.folder') }}", {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Includi il token CSRF
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Success:', data); // Mostra i dati di successo
        $('#exampleModal').modal('hide'); // Chiudi la modale dopo il caricamento
        formData = new FormData(); // Resetta l'oggetto FormData dopo il caricamento
        previewContainer.innerHTML = ''; // Resetta l'anteprima
        isUploading = false; // Resetta il flag di upload
    })
    .catch((error) => {
        console.error('Error:', error); // Mostra eventuali errori
        isUploading = false; // Resetta il flag di upload in caso di errore
    });
}


</script>
