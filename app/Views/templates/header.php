<!doctype html>
<html>
<head>
    <title>Game Stats</title>
    <link rel="stylesheet" href="https://bootswatch.com/5/quartz/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3600">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="<?=base_url()?>home">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url()?>news">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url()?>news/new">Create News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url()?>about">About</a>
        </li>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <h1><?= esc($title) ?></h1>