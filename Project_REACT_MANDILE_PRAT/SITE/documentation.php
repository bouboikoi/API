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
  <h1 class="mb-4"><u>Documentation de l'API</u></h1>
</div>

<div class="container mt-5 p-1" style="width:60%">
  <h4 class="text-left">Introduction</h4>
  <p>Cette API a été réalisée dans un cadre scolaire.
  <br>Vous trouverez des articles rédigés par des auteurs, vous avez aussi la possibilité de visualiser les articles des autres auteurs ou même dans rédiger !
  <br>Toutes les fonctionnalités ainsi que les filtrages sont disponibles ci-dessous et expliqués.
  </p>
</div>

<div class="container mt-4 p-1" style="width:60%">
  <h4 class="text-left">Authentification</h4>
  <p>L'API possède un système d'authentification basique, lors de la création de votre utilisateur vous recevrez un token. <B>Ce token est très important et ne doit pas être oublié !</B>
  </br>Ce token devra être utilisé et spécifié dans l'adresse, vous trouverez un tableau explicatif ci-dessous.</p>
</div>

<div class="container mt-5 p-1" style="width:60%">
  <h4 class="text-left">Simple auteur</h4>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Auteur</th>
      <th scope="col">Article</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" class="align-middle">GET</th>
      <td><B>Liste tous les auteurs</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{VotreToken}/user
      </br><B>Liste un seul auteur</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{VotreToken}/user/{VotreId}/
      </td>
      <td><B>Liste tous les articles</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{VotreToken}/article
      </br><B>Liste un seul article</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{VotreToken}/article/{VotreId}/
      </td>
    </tr>
    <tr>
      <th scope="row" class="align-middle">POST</th>
      <td class="align-middle"><B>/</B></td>
      <td><B>Créer un article (valeurs à renseigner : lastname,firstname,pseudo)</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{VotreToken}/article
      </td>
    </tr>
    <tr>
      <th scope="row" class="align-middle">PUT</th>
      <td><B>Modifier ses informations (lastname,firstname,pseudo)</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{VotreToken}/user/{VotreId}/
      </td>
      <td><B>Modifier ses articles (title,content)</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{VotreToken}/article/{IdArticle}/
      </td>
    </tr>
    <tr>
      <th scope="row" class="align-middle">DELETE</th>
      <td class="align-middle"><B>/</B></td>
      <td><B>Supprimer ses articles</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{VotreToken}/article/{IdArticle}/
      </td>
    </tr>
  </tbody>
</table>
</div>

<div class="container mt-5 p-1" style="width:60%">
  <h4 class="text-left">Administrateur</h4>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Auteur</th>
      <th scope="col">Article</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" class="align-middle">GET</th>
      <td><B>Liste tous les auteurs</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{AdminToken}/user
      </br><B>Liste un seul auteur</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{AdminToken}/user/{IdAuteur}/
      </td>
      <td><B>Liste tous les articles</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{AdminToken}/article
      </br><B>Liste un seul article</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{AdminToken}/article/{IdArticle}/
      </td>
    </tr>
    <tr>
      <th scope="row" class="align-middle">POST</th>
      <td><B>/</B></td>
      <td><B>/</B></td>
    </tr>
    <tr>
      <th scope="row" class="align-middle">PUT</th>
      <td><B>Modifier les informations d'un utilisateur (lastname,firstname,pseudo)</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{AdminToken}/user/{IdAuteur}/
      </td>
      <td><B>Modifier les articles d'un utilisateur (title,content)</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{AdminToken}/article/{IdArticle}/
      </td>
    </tr>
    <tr>
      <th scope="row" class="align-middle">DELETE</th>
      <td><B>Supprimer un auteur</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{AdminToken}/user/{IdAuteur}/
      </td>
      <td><B>Supprimer un article</B>
      </br>http://localhost/PROJECT_REACT_MANDILE_PRAT/API/{AdminToken}/article/{IdArticle}/
      </td>
    </tr>
  </tbody>
</table>
</div>

<div class="container mt-5 p-1" style="width:60%">
  <h4 class="text-left">Filtrage</h4>
  <p>Vous trouverez dans cette partie quelques exemples pour effectuer des filtres.
  </br>Voici la liste des filtres actuellement disponibles :
  </br>- Rechercher un auteur en fonction du prénom.
  </br>- Rechercher des articles en fonction d'un titre.
  </br>- Définir le nombre d'article afficher par page, et indiquer la page qu'on souhaite visualiser.
  </br>
  </br><B>Exemple :</B>
  </br><u>Rechercher des articles en fonction d'un titre :</u>
  </br>URL : <a href="http://localhost/PROJECT_REACT_MANDILE_PRAT/API/d81eaa3f8381/article?title=Marseille" style="color: black;">http://localhost/PROJECT_REACT_MANDILE_PRAT/API/d81eaa3f8381/article<B>?title=Marseille</B></a>
  </br><B>titile</B> -> Indiquer une partie du titre que vous souhaitez rechercher.
  </br>
  </br><u>Rechercher un auteur en fonction du prénom :</u>
  </br>URL : <a href="http://localhost/PROJECT_REACT_MANDILE_PRAT/API/d81eaa3f8381/user?name=Florian" style="color: black;">http://localhost/PROJECT_REACT_MANDILE_PRAT/API/d81eaa3f8381/user<B>?name=Florian</B></a>
  </br><B>name</B> -> Indiquer le prénom de la personne que l'on recherche.
  </br>
  </br><u>Définir le nombre d'article afficher par page, et indiquer la page qu'on souhaite visualiser :</u>
  </br>URL : <a href="http://localhost/PROJECT_REACT_MANDILE_PRAT/API/d81eaa3f8381/article?page=1&pageSize=3" style="color: black;">http://localhost/PROJECT_REACT_MANDILE_PRAT/API/d81eaa3f8381/article<B>?page=1&pageSize=3</B></a>
  </br><B>page</B> -> Permet de sélectionner directement la page que l'on souhaite.
  </br><B>pagesize</B> -> Choisir le nombre d'article visible par page.
  </br>Vous pouvez ne pas utiliser ce filtre, dans ce cas là, tous les articles seront visibles.
  </p>
</div>

<footer class="my-5 pt-5 text-muted text-center text-small">
  <p class="mb-1">&copy; 2020-2021 MANDILE Florian & PRAT Florian</p>
</footer>

</body>

</html>