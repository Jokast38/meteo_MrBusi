<?php
session_start();
include('meteo.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css"/>
    <title>BLACKJOKESHOK</title>
</head>
<body>


    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">JKMETEO</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Favoris
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="favoris.php">Listes</a></li>
                  <li><a class="dropdown-item" href="#">Nouveau favoris</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Supprimer des favoris</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="deconnect.php">se déconnecter</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Ville" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
    <!-- NAVBAR FIN -->
    <div style="margin: auto;">
    <h2 class="titre"></h2> 
    <?php
            if(isset($_SESSION['username'])):
              $stmt = $id->prepare("SELECT * FROM favoris WHERE id_u = ? join connexion on connexion.id = favoris.id_u");
              $stmt->execute([$_SESSION['username']]);
              if($stmt->rowCount()==0):
                ?>
                <?php
                  if(isset($_POST['fav'])&& isset($_POST['search'])){
                    $id_u = $_SESSION["id"];
                    $city = $_POST["search"];
                    $int = $id->prepare("INSERT INTO `favoris`(`ville`, `id_u`) VALUES ('$city', '$id_u')");
                    $int->execute();
                  }
                  ?>
                 <form action="" method="post">
                 <a href="" style="margin: auto;">
                 <i class="fa-regular fa-heart" type="button" name="fav" value="" style="width: 50px; margin-left: 35%;"></i>
                 </a>
                </form>
                <?php
                else:
                ?>
                <?php
                  if(isset($_POST['fav']) && isset($_POST['search'])){
                    $id_u = $_SESSION["id"];
                    $city = $_POST["search"];
                    $int = $id->prepare("INSERT INTO `favoris`(`ville`, `id_u`) VALUES ('$city', '$id_u')");
                    $int->execute();
                  }
                  ?>
                <form action="" method="post">
                <a href="" style="margin: auto;">
                <i class="fa-solid fa-heart" style="width: 50px; margin-left: 35%;"><input type="button" name="fav" value=""></i>
                </a>
              </form>
              <?php
              endif
              ?>
            <?php
            endif
            ?>
    </div>
    

    <!-- CARD METEO -->

    <section style="margin: auto; width:100%; margin-top:70px">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-inner">
    
    <div class=" carousel-item active">
        <div class="etat-1 row ">
        <div class="like"></div>

        </div>
    </div>

    <div class=" carousel-item">
        <div class="etat-2 row"> 

        </div>
    </div>
    <div class=" carousel-item">
        <div class="etat-3 row"> 

        </div>
    </div>
    <div class=" carousel-item">
        <div class="etat-4 row"> 

        </div>
    </div>
    <div class=" carousel-item">
        <div class="etat-5 row"> 

        </div>
    </div>
    <div class=" carousel-item">
        <div class="etat-6 row"> 

        </div>
    </div>
    <div class=" carousel-item">
        <div class="etat-7 row"> 

        </div>
    </div>

</div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>  
    <!-- CARD METEO FIN -->

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="main.js"></script>
</html>