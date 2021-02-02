<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-fixed container-fluid">
      <div class="container">
        <img width="200" src="{{ asset('img/booleazon-logo.svg') }}" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('products.index') }}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.create') }}">Create</a>
              </li>
          </ul>
        </div>
      </div>
      </nav>
</header>