<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>
  <center><a class="btn-primary"data-bs-toggle="modal" href="#exampleModalToggle" ><img src="immagini/img.jpg" alt="" style="width: 100px; height:100px;"></a></center>
<h1>Crea una Cartella e Carica i File</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('create.folder') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="folder_name">Nome Cartella:</label>
    <input type="text" name="folder_name" id="folder_name" required>
    
    <label for="files">Seleziona File:</label>
    <input type="file" name="files[]" multiple required>
    
    <button type="submit">Crea Cartella e Carica File</button>
</form>

<a href="{{ route('view.folders') }}">Visualizza tutte le cartelle</a>
  
</div>