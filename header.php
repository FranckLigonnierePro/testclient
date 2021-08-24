
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="./images/favicon.png">
  <title><?= $title ?></title>
</head>

<header>
<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
  <div class="container">
    <a class="navbar-brand text-light" href="index.php">
      <img src="./images/fflogo.png" alt="" width="100px">
    </a>
    <button class="custom-toggler navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="custom-toggler navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active text-dark" aria-current="page" href="index.php">Accueil</a>
        <a class="nav-link active text-dark" href="panier.php">Mon Panier</a>
        <a class="nav-link active text-dark" href="login.php">login</a>
      </div>
    </div>
  </div>
</nav>
</header>
<body>
    