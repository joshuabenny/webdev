<!doctype html>
<html>
<head>
    <title>Valorant Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/5/quartz/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3600">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/style.css'); ?>">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Valo Hub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?=base_url()?>home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url()?>agents">Agents</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url()?>blogs">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url()?>about">About</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


  <!-- <h1><?= esc($title) ?></h1> -->