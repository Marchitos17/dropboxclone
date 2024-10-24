
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>
  <center><a class="btn-primary"data-bs-toggle="modal" href="#exampleModalToggle" ><img src="immagini/img.jpg" alt="" style="width: 100px; height:100px;"></a></center>

<form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($errors->any())
      <ul class="alert alert-warning">
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    @endif
    <p>Ordine numero: <input type="text" name="numero_ordine"></p>
    <p>Inserisci delle immagini:</p>
    <p><input type="file" name="images[]" multiple class="form-control"></p>
    <div class="mb-3">
      <button type="submit">Inserisci</button>
    </div>
    
</form>

  <div class="table-responsive small text-center ">
    <table class="table table-striped table-sm table-hover">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Numero Ordine</th>
          <!--<th scope="col">FOTO 1</th>
          <th scope="col">FOTO 2</th>
          <th scope="col">FOTO 3</th>-->
          <th scope="col">Creata il</th>
          <th scope="col">Inserita da</th>
          <th scope="col">elimina</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($ordine as $ordinee)
          <tr>
            <td>
                <a href="{{route('mostra_cartella',$ordinee->numero_ordine)}}"><i class="bi bi-eye-fill"></i></a>
            </td>
            <td>{{$ordinee->numero_ordine}}</td>   
            <td>{{$ordinee->created_at}}</td>
            <td>text</td>
            <td><a href="{{route('svuota_cartella',$ordinee->id)}}"><i class="bi bi-trash" style="color: red;"></i></a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  
  </div>