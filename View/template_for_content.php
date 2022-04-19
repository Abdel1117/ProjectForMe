<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="<?= URL ?>src/css/test.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="<?= $meta ?>">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/spacelab/bootstrap.min.css" integrity="sha384-F1AY0h4TrtJ8OCUQYOzhcFzUTxSOxuaaJ4BeagvyQL8N9mE4hrXjdDsNx249NpEc" crossorigin="anonymous">    <!--<link rel="stylesheet" href="<?= URL ?>src/css/main.css">-->
    <script src="<?= URL ?>src/js/main.js" defer></script>
    <link rel="shortcut icon" type="image/png" href="<?= URL ?>favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $title ?> | Space-explorer</title>
</head>

<body>
   

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= URL . 'Acceuil/index' ?>">
      <img style="height:75px" src="<?= URL . "src\image\Artboard_1_copy_5mdpi.png" ?>" alt="Logo-image-space-explorer">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav me-auto ">
        <li class="nav-item">
          <a class="nav-link" href="<?= URL . 'Acceuil/index' ?>">Accueil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL . 'Galerie/showGallerie' ?>">Galerie</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL . 'Forum/indexForum' ?>">Forum</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL . 'Video/indexVideo' ?>">Videos</a>
          </li>

          <?php if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
                echo "<a class='nav-link'  href=" . URL . "Compte/indexAccount>Mon Compte<i class='far fa-user'></i></a>";
                echo "<a class='nav-link'  href=" . URL . "Compte/deconection>Logout<i class='fas fa-sign-out-alt'></i></a>";

                if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === "superAdmin") {
                    echo "<a class='nav-link'  href=" . URL . "Admin/index>Admin Back Office</a>";
                }
            } else {
                $link = URL  .  "Inscription/inscription";
                $link2 = URL . "Acceuil/login";
                echo '
                    <a class="nav-link" href=' . $link . '>Inscription</a>
                    <a class="nav-link" href=' . URL . 'Acceuil/login>Login </a>';
            } ?>
        
      </ul>
      
    </div>
  </div>
</nav>


    
     <main class="container main_flux" id="">
        <?= $_content_For_Template ?>
    </main>

    <footer class="footer py-3 mt-4" >
    <?php 
            $cookie_bandeau = Config::cookie();
                if($cookie_bandeau === true ):?>
                <div class="cookie_bandeau_accept">
                    <form action="" method="POST">
                        <section class="section_cookie">
                            <h4>Politique des cookies</h4>
                            <p>Notre site utilise des cookies afin de proposer une experience optimal aux utilisateurs, Space-explorer garantie qu'aucun cookies ne sera vendu ou utilisé à des fin commercial </p>
                        </section>
                        <span class="bouton_container_cookie">    
                            <button class="bouton_cookie" id="bouton_cookie_oui" value="1"> 
                                <a href="<?= URL ?>\Core\cookie.php">Oui</a>
                            </button>
                            <button class="bouton_cookie" id="bouton_cookie_non" value="0">
                                <a href="<?= URL ?>\Core\cookie_Not_accepted.php">Non</a>
                            </button>
                        </span>   
                    </form>
                </div>
                    <?php endif ?> 
        
                    <div class="container">
                        <p class="text-center mt-1">© 2022 Space-Explorer</p>
                        <ul class="row justify-content-center">
                            <li class="nav-item"><a href="<?= URL. 'Acceuil/mentionsLegales'?>" class="nav-link">Mentions Légales</a></li>
                            <li class="nav-item"><a href="<?= URL. 'Acceuil/politiqueDeConfidentialie'?>" class="nav-link">Politique de Confidentialité</a></li>
                            <li class="nav-item"><a href="<?= URL. 'Acceuil/contact'?>" class="nav-link  ">Contact</a></li>
                        </ul>
                    </div>  
  </footer>
</body>

</html>