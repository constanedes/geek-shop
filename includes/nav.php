<nav class="navbar navbar-expand-lg  navbar-light pri">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#">
      <img src="../img/geek-shop.png" alt="" width="200" height="50">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-light active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Mi carrito</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="#">Favoritos</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Acerca de
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item text-dark" href="#">FAQs</a></li>
            <li><a class="dropdown-item text-dark" href="#">Sobre nosotros</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item   text-dark" href="#">Contacto</a></li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link me-3 text-light" href="#">Log In</a>
        </li>
      </ul>
      <form class="d-flex" action="../search.php" method="GET">
        <div class="input-group">
          <input type="text" class="form-control" name="buscar" placeholder="Buscar">
          <button class="btn btn-outline-dark" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
              viewBox="0 0 16 16">
              <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
          </button>
        </div>
      </form>
    </div>
  </div>
</nav>