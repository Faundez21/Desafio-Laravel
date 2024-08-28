
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 CRUD Facultad </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="carrera.index">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Facultades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Carreras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">asignaturas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    @yield('content')
</div>
   
</body>
<footer style="background-color: #f1f1f1; padding: 20px; text-align: center;">
    <p>&copy; 2024 TecnoSoft.</p>
    <nav>
        <a href="#home" style="margin-right: 15px; text-decoration: none; color: #333;">Home</a>
        <a href="#about" style="margin-right: 15px; text-decoration: none; color: #333;">About Us</a>
        <a href="#services" style="margin-right: 15px; text-decoration: none; color: #333;">Services</a>
        <a href="#contact" style="text-decoration: none; color: #333;">Contact</a>
    </nav>
    <div style="margin-top: 15px;">
        <a href="https://www.facebook.com" target="_blank" style="margin-right: 15px; text-decoration: none; color: #333;">Facebook</a>
        <a href="https://www.twitter.com" target="_blank" style="margin-right: 15px; text-decoration: none; color: #333;">Twitter</a>
        <a href="https://www.linkedin.com" target="_blank" style="text-decoration: none; color: #333;">LinkedIn</a>
    </div>
</footer>

</html>