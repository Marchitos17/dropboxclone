<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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