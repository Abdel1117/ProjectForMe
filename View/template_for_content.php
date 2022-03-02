<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src=" .././src/js/main.js" defer></script>
    <script src="/node_modules\jquery\dist\jquery.js"></script>
    <link rel="stylesheet" href=".././src/css/main.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>    
    <script src="..\.\src\font-awesome\all.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href="..\.\favicon.png" />
    <title><?= $title ?></title>
</head>

<body>
    <nav class="nav_bar" id="nav_bar">
        <div class="link_container" id="link_container">
            <li class="link" id="link1"><a class="link_nav" href="<?= URL ?>Acceuil/index">Accueil</a></li>
            <li class="link" id="link3"><a class="link_nav" href="<?= URL ?>Galerie/showGallerie">Galerie</a></li>
            <li class="link" id="link4"><a class="link_nav" href="<?= URL ?>Forum/indexForum">Forum</a></li>
            <li class="link" id="link5"><a class="link_nav" href="<?= URL ?>Video/indexVideo">Videos</a></li>
        </div>
        <div class="logo_container" id="logo_container">
            <i></i>
            <?php if (isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) {
                echo "<a href=" . URL . "Compte/indexAccount>Mon Compte<i class='far fa-user'></i></a>";
                echo "<a href=" . URL . "Compte/deconection>Logout<i class='fas fa-sign-out-alt'></i></a>";

                if ($_SESSION['role'] === 'admin') {
                    echo "<a href=" . URL . "Admin/index>Admin Back Office</a>";
                }
            } else {
                $link = URL  .  "Inscription/inscription";
                $link2 = URL . "Acceuil/login";
                echo '
                    <a href=' . $link . '>Inscription</a>
                    <a href=' . URL . 'Acceuil/login>Login </a>';
            } ?>
        </div>
        <div class="title_site">
            <div class="welcome"><img class="logo_img_mars" src="..\..\src\image\Artboard_1_copy_5mdpi.png" alt="logo_site">
            <h1> Space Explorer</h1>
            </div>
        </div>
    </nav>
    <main class="main_section" id="main_section">
        <?= $_content_For_Template ?>

    </main>

    <footer class="footer_nav">
    <?php 
        $cookie_bandeau = Config::cookie();
            if($cookie_bandeau === true ):?>
            <div class="cookie_bandeau_accept">
                <form action="" method="POST">
                    <section class="section_cookie">
                        <h4>Politique des cookies</h4>
                        <p>Notre site utilise des cookies afin de proposer une experience optimal aux utilisateurs, Space-explorer garantie qu'aucun cookies ne sera vendu ou utilisé a des fins commerciaux </p>
                    </section>
                    <span class="bouton_container_cookie">    
                        <button class="bouton_cookie" id="bouton_cookie_oui" value="1"> <a href="..\Core\cookie.php">Oui</a></button>
                        <button class="bouton_cookie" id="bouton_cookie_non" value="0"><a href="..\Core\cookie_Not_accepted.php">Non</a></button>
                    </span>   
                </form>
            </div>
                <?php endif ?> 
        <div class="container_1">
            <div class="link_container_footer">
                <li class="link" id="link1"><a class="link_nav" href="<?= URL ?>Acceuil/index">Accueil</a></li>
                <li class="link" id="link3"><a class="link_nav" href="<?= URL ?>Galerie/showGallerie">Galerie</a></li>
                <li class="link" id="link4"><a class="link_nav" href="<?= URL ?>Forum/indexForum">Forum</a></li>
                <li class="link" id="link5"><a class="link_nav" href="<?= URL ?>Video/indexVideo">Videos</a></li>
            </div>
            <div class="container_3">
                <a class="link" href="<?= URL ?>Acceuil/mentionsLegales"> Mentions legales</a>
                <a class="link" href="<?= URL ?>Acceuil/contact">Contact</a>
            </div>
        </div>
        <div class="container_2">

            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>

        </div>
           
    </footer>
</body>

</html>