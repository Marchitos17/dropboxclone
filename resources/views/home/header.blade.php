<style>
    .dropdown:hover>.dropdown-menu {
  display: block;
  right: 0;
}

.dropdown>.dropdown-toggle:active {
  /*Without this, clicking will make it sticky*/
    pointer-events: none;
}
</style>
<header>
  <div class="header-left">
      <h1>Il mio Drive</h1>
  </div>
  <div class="header-center">
      <input type="text" placeholder="Cerca nel Drive" class="search-bar">
  </div>
  <div class="header-right dropdown">
      <!--<button class="icon-button"></button>
      <button class="icon-button"></button>
      <button class="icon-button">🔄</button>-->
      <button class="icon-button" data-mdb-button-init data-mdb-ripple-init data-mdb-dropdown-init class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
        👤 {{Auth()->user()->name}}
     </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="#">🔔 Notifiche</a></li>
          <li><a class="dropdown-item" href="#">⚙️ Impostazioni</a></li>
          <li>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                  <button type="submit" class="dropdown-item" ><a class="text-decoration-none"><i class="icofont-credit-card"></i>🚪 Logout</a></button>
              </form>
          </li>
        </ul>
  </div>
</header>