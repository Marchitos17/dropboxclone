
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
  </div>
  <center><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="immagini/img.jpg" alt="" style="width: 100px; height:100px;"></a></center>

  <!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel " aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Crea cartella</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('insert')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <p>Inserisci il numero dell'ordine : <input type="text" name="ordine"></p>
            <p>Foto 1:  <input type="file" name="foto1"></p>
              <p>Foto 2:  <input type="file" name="foto2"></p>
                <p>Foto 3:  <input type="file" name="foto3"></p>
                  <p>Foto 4:  <input type="file" name="foto4"></p>
                    <p>Foto 5:  <input type="file" name="foto5"></p>
                      <p>Foto 6:  <input type="file" name="foto6"></p>
                        <p>Foto 7:  <input type="file" name="foto7"></p>
                          <p>Foto 8:  <input type="file" name="foto8"></p>
                            <p>Foto 9:  <input type="file" name="foto9"></p>
                              <p>Foto 10:  <input type="file" name="foto10"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Aggiungi</button>
          </div>
        </form>
      </div>
    </div>
  </div>-->

<form action="{{route('insert')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Numero Ordine</p>
          <p><input type="text" name="ordine"></p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Salva</button>
          <button type="button" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Successivo</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Foto1</p>
          <p><input type="file" name="foto1" multiple></p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Salva</button>
          <button type="button" class="btn btn-primary" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal" data-bs-dismiss="modal">Successivo</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Foto2</p>
          <p><input type="file" name="foto2"></p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Salva</button>
          <button type="button" class="btn btn-primary" data-bs-target="#exampleModalToggle4" data-bs-toggle="modal" data-bs-dismiss="modal">Successivo</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Foto3</p>
          <p><input type="file" name="foto3"></p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Salva</button>
          <button type="button" class="btn btn-primary" data-bs-target="#exampleModalToggle5" data-bs-toggle="modal" data-bs-dismiss="modal">Successivo</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle5" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Vuoi inserire altre foto?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-target="#exampleModalToggle6" data-bs-toggle="modal" data-bs-dismiss="modal">Si</button>
          <button type="submit" class="btn btn-success">No</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle6" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Foto4</p>
          <p><input type="file" name="foto4"></p>
          <p><h4>Vuoi inserire altre foto?</h4></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-target="#exampleModalToggle7" data-bs-toggle="modal" data-bs-dismiss="modal">Si</button>
          <button type="submit" class="btn btn-success">No</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModalToggle7" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Foto5</p>
          <p><input type="file" name="foto5"></p>
          <p><h4>Vuoi inserire altre foto?</h4></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-target="#exampleModalToggle8" data-bs-toggle="modal" data-bs-dismiss="modal">Si</button>
          <button type="submit" class="btn btn-success">No</button>
        </div>
      </div>
    </div>
  </div>

</form>



  <!--bottone-->
  <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>






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
        @foreach ($data as $dataa)
          <tr>
            <td>
                <a href="{{route('mostra_cartella',$dataa->id)}}"><i class="bi bi-eye-fill"></i></a>
            </td>
            <td>{{$dataa->numero_ordine}}</td>
            <!--<td>
              <a target="_blank" href="immagini/{{$dataa->foto1}}">
                <img src="immagini/{{$dataa->foto1}}"style="width:150px">
              </a>
              <p class=""><a href="immagini/{{$dataa->foto1}}" download><i class="bi bi-cloud-arrow-down-fill"></i></a></p>
            </td>
            <td>
              <a target="_blank" href="immagini/{{$dataa->foto2}}">
                <img src="immagini/{{$dataa->foto2}}"style="width:150px">
              </a>
              <p class=""><a href="immagini/{{$dataa->foto2}}" download><i class="bi bi-cloud-arrow-down-fill"></i></a></p>
            </td>
            <td>
              <a target="_blank" href="immagini/{{$dataa->foto3}}">
                <img src="immagini/{{$dataa->foto3}}"style="width:150px">
              </a>
              <p class=""><a href="immagini/{{$dataa->foto3}}" download><i class="bi bi-cloud-arrow-down-fill"></i></a></p>-->
            </td>                
            <td>{{$dataa->created_at}}</td>
            <td>text</td>
            <td><i class="bi bi-trash" style="color: red;"></i></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  
  </div>