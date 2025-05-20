<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Golden Books')</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/fonts/bootstrap-icons.min.css" rel="stylesheet">
    <style>
    body {
        display: flex;
        min-height: 100vh;
        overflow-x: hidden;
    }
    .sidebar {
        width: 250px;
        background-color: #212529;
        color: #fff;
        flex-shrink: 0;
        padding: 1rem 0;
    }
    .sidebar .nav-link {
        color: #ccc;
        padding: 0.75rem 1.25rem;
        display: flex;
        align-items: center;
    }
    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
        background-color: #343a40;
        color: #fff;
    }
    .sidebar .bi {
        margin-right: 10px;
    }
    .content {
        flex-grow: 1;
        padding: 2rem;
        background-color: #f8f9fa;
    }
    </style>
</head>
<body>
  <div class="sidebar d-flex flex-column">
    <div class="px-4 mb-4">
      <h5 class="text-white">📚 Golden Books</h5>
    </div>
    <nav class="nav flex-column">
      <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
        <i class="bi bi-house"></i> Início
      </a>
      <a href="/livros/criar" class="nav-link {{ request()->is('livros/criar') ? 'active' : '' }}">
        <i class="bi bi-book"></i> Livros
      </a>
      <a href="/author" class="nav-link {{ request()->is('author') ? 'active' : '' }}">
        <i class="bi bi-person"></i> Autores
      </a>
    </nav>
  </div>

  <main class="content">
    @yield('content')
  </main>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
