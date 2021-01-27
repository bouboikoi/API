<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.png" type="image/png">
    <title>TP PHP Blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./">Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./documentation.php">Documentation de l'API</a>
        </li>
    </div>
    </div>
  </div>
</nav>

<div class="container mt-5 text-center">
  <h1 class="mb-4"><u>API Blog</u></h1>
</div>

<div class="container mt-5 text-center bg-success p-3" style="width:45%">
  <h2 class="text-center text-light">Rentrer votre requête</h2>
    <input type="text" class= "form-control mt-3 mb-1" name="query" placeholder="URL requête">
    <textarea class="form-control" id="data" rows="8" placeholder="Exemple :&#10;{
        'firstname': 'Florian'
        'lastname': 'Prat'
        'pseudo': 'Jean-Michel'}"></textarea>
    <textarea class="form-control mt-1" id="result" rows="8" placeholder="Résultat"></textarea>
    <button type="submit" name="GET" class="btn btn-warning mt-1" value="GET">GET</button>
    <button type="submit" name="POST" class="btn btn-warning mt-1" value="POST">POST</button>
    <button type="submit" name="PUT" class="btn btn-warning mt-1" value="PUT">PUT</button>
    <button type="submit" name="DELETE" class="btn btn-warning mt-1" value="DELETE">DELETE</button>
</div>

<footer class="my-5 pt-5 text-muted text-center text-small">
  <p class="mb-1">&copy; 2020-2021 MANDILE Florian & PRAT Florian</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="script.js"></script>
</body>


</html>