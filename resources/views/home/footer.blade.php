<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

<script>
    // Funzioni per cambiare la visualizzazione
    const gridViewBtn = document.getElementById('gridViewBtn');
    const listViewBtn = document.getElementById('listViewBtn');
    const fileGrid = document.getElementById('fileGrid');
    const fileList = document.getElementById('fileList');

    gridViewBtn.addEventListener('click', () => {
        fileGrid.style.display = 'grid';
        fileList.style.display = 'none';
    });

    listViewBtn.addEventListener('click', () => {
        fileGrid.style.display = 'none';
        fileList.style.display = 'block';
    });

    // Imposta la visualizzazione iniziale
    fileList.style.display = 'none'; // Inizialmente mostra la griglia
</script>
<script>
    let progress = 0;
    const progressBar = document.getElementById('progress-bar');
  
    function simulateProgress() {
      if (progress < 100) {
        progress += 1; // Incremento del progresso
        progressBar.style.width = progress + '%'; // Aggiorna la larghezza della barra
      } else {
        // Dopo che il caricamento è completo, nascondi il loader
        document.getElementById('loader').style.display = 'none'; 
      }
    }
  
    // Simula il caricamento per 3 secondi
    setInterval(simulateProgress, 10); // Velocità barra
    window.addEventListener("load", function () {
      console.log('Pagina caricata.');
    });
  </script>
<script>
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('fileElem');
    const previewContainer = document.getElementById('image-previews');
    let isUploading = false;
    let filesToUpload = []; // Array per mantenere i file da caricare
  
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
  
        // Aggiungi i file selezionati (trascinati o cliccati) all'array filesToUpload
        for (const file of files) {
            filesToUpload.push(file);
        }
  
        previewContainer.innerHTML = '';
        for (const file of filesToUpload) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.width = 100;
            img.height = 100;
  
            const div = document.createElement('div');
            div.appendChild(img);
            previewContainer.appendChild(div);
        }
    }
  
    // Funzione invio file al server
    function uploadFiles() {
        if (filesToUpload.length === 0) {
            alert("Nessun file selezionato.");
            return;
        }

        const formData = new FormData(document.getElementById('image-upload')); // Usa FormData del modulo
        const folderName = document.getElementById('folderName').value;
  
        formData.append('folder_name', folderName);
  
        // Aggiungi i file all'oggetto FormData
        filesToUpload.forEach(file => {
            formData.append('files[]', file);
        });
  
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
            window.location.href = '{{ route('condivisi') }}';
        })
        .catch((error) => {
            console.error('Error:', error);
            isUploading = false; // Imposta isUploading a false
        });
    }
  
    // Aggiungi evento per gestire l'invio del modulo
    document.getElementById('image-upload').addEventListener('submit', function(event) {
        event.preventDefault(); // Previeni l'invio predefinito del modulo
        uploadFiles(); // Passa il FormData per inviare il file
    });
</script>
