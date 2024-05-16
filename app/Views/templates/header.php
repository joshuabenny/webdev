<!doctype html>
<html>
<head>
    <title>Valo Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3600">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/style.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= base_url('css/icon.png'); ?>">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Valo Hub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="<?=base_url()?>home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url()?>agents">Agents</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url()?>blogs">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url()?>about">About</a>
      </ul>
      <div class="mx-auto position-relative">
    <form class="d-flex" action="<?= base_url('searchSuggestions') ?>" method="get">
        <input id="search-input" class="form-control wide-search me-2" type="search" name="query" placeholder="Search Blogs..." aria-label="Search">
    </form>
    <ul id="suggestions" class="dropdown-menu suggestion-box mt-1" style="display: none;"></ul>
</div>
    </div>
  </div>
</nav>

  <!-- <h1><?= esc($title) ?></h1> -->


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function () {
    $('#search-input').on('keyup', function () {
      let query = $(this).val();

      if (query.length > 1) { // Start suggesting after 2+ characters
        $.ajax({
        url: '<?= base_url("search/searchSuggestions") ?>',
        method: 'GET',
        data: { query: query },
        success: function (data) {
          let suggestions = $('#suggestions');
          suggestions.empty(); // Clear previous suggestions

          if (data.length > 0) {
            suggestions.show(); // Show suggestions box

            data.forEach(function (item) {
              suggestions.append(
                `<div class="m-1 p-1 suggestion-item d-flex align-items-center" data-slug="${item.Slug}">
                ${item.Title}
                </div>`
              );
          });

          // Handle click events to navigate
          $('.suggestion-item').on('click', function () {
            let slug = $(this).data('slug');
            window.location.href = `<?= base_url("blogs/") ?>${slug}`;
          });
        } else {
            suggestions.hide(); // Hide if no suggestions
          }
          }
          });
      } else {
        $('#suggestions').empty().hide(); // Clear and hide if query is too short
      }
    });
  });
</script>