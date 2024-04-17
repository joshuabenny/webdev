<!doctype html>
<html>
<head>
    <title>Game Stats</title>
    <link rel="stylesheet" href="https://bootswatch.com/3/darkly/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url(); ?>">Game Stats</a>
        </div>
        <div id="navbar">
          <ul class="nav navbar-nav">
            <li><a href="<?=base_url()?>home">Home</a></li>
            <li><a href="<?=base_url()?>about">About</a></li>
            <li><a href="<?=base_url()?>news">News</a></li>
            <li><a href="<?=base_url()?>news/new">Create News</a></li>

          </ul>
          <br>
    </nav>
    <h1><?= esc($title) ?></h1>