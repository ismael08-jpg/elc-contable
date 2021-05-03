<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="">{{ $title }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <li class="nav-item">
          
        </li>
        <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
          
        </li>
        <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          
        </li>
        <li class="nav-item ">
          
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->