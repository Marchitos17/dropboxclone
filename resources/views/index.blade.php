<!DOCTYPE html>
<html lang="it">
  <style>
    /* Barra di progressione in basso */
    #loader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 5px;
      background-color: #f3f3f3;
      z-index: 9999;
    }
  
    /* Barra di progressione */
    #progress-bar {
      width: 0%;
      height: 100%;
      background-color: #000080;
    }
  </style>
@include('home.css')
<body>
    <!-- Intestazione -->
    @include('home.header')

    <div class="container1">
        <!-- Barra laterale -->
        @include('home.sidebar')
        <div id="loader">
          <div id="progress-bar"></div>
      </div>
        <!-- Area file -->
        @yield('content')
    </div>
</body>
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
  @include('home.footer')
</html>

