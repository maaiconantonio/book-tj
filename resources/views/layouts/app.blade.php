<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Golden Books')</title>
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/fonts/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ url('assets/css/select2.min.css') }}" rel="stylesheet">
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
      <a href="/book" class="nav-link {{ request()->is('book') ? 'active' : '' }}">
        <i class="bi bi-book"></i> Livros
      </a>
      <a href="/author" class="nav-link {{ request()->is('author') ? 'active' : '' }}">
        <i class="bi bi-person"></i> Autores
      </a>
      <a href="/subject" class="nav-link {{ request()->is('subject') ? 'active' : '' }}">
        <i class="bi bi-alphabet"></i> Assuntos
      </a>
    </nav>
  </div>

  <main class="content">
    @yield('content')
  </main>

  <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('assets/js/vanilla-masker.min.js') }}"></script>
  <script src="{{ url('assets/js/jquery.min.js') }}"></script>
  <script src="{{ url('assets/js/select2.min.js') }}"></script>
  <script>
  $(document).ready(function () {
      $('.select2').select2({
          width: '100%'
      });
  });
  
  document.addEventListener('DOMContentLoaded', function () {
      const price = document.getElementById('price');
      if (price) {
          VMasker(price).maskMoney({
              precision: 2,
              separator: ',',
              delimiter: '.',
              unit: '',
              zeroCents: false
          });
      }

      const year = document.getElementById('publicationYear');
      if (year) {
          VMasker(year).maskPattern("9999");
      }

      const edition = document.getElementById('edition');
      if (edition) {
          VMasker(edition).maskPattern("999");
      }
  });
  </script>

</body>
</html>
