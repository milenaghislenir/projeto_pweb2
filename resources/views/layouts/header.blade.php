<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('') }}">MiVi Cinema</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" <a class="nav-link" href="{{ url('') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('movies.index') }}">Filmes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('employees.index') }}">Funcionários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">Categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('bombonieres.index') }}">Bomboniere</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
