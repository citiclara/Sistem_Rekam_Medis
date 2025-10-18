<!DOCTYPE html>
<html>
<head>
    <title>Amanah Polyclinic System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="/">Amanah Polyclinic</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="/doctors">Doctors</a></li>
        <li class="nav-item"><a class="nav-link" href="/patients">Patients</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container py-4">
    @yield('content')
</div>

</body>
</html>
