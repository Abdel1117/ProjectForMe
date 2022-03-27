<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="\Web\Profile\src\js\main.js" defer ></script>
    <link rel="stylesheet" href="\Web\Profile\src\css\main.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<nav class="nav_bar" id="nav_bar">
            <div class="link_container" id="link_container">
                    <li class="link" id="link1"><a class="link_nav" href="\Web\Profile\index.php">Acceuil</a></li>
                    <li class="link" id="link2"><a class="link_nav" href="">Link</a></li>
                    <li class="link" id="link3"><a class="link_nav" href="">Link</a></li>
                    <li class="link" id="link4"><a class="link_nav" href="">Link</a></li>
                    <li class="link" id="link5"><a class="link_nav" href="">Link</a></li>
            </div>  
            <div class="logo_container" id="logo_container">
                <i></i>
                <?php if(isset($_SESSION['compte_pseudo']) && !empty($_SESSION['compte_pseudo'])){
                        echo "<a href='View\mon_Compte.php'><i class='far fa-user'></i></a>";
                }
               
                else{
                    echo '
                    <a href="\Web\Profile\View\inscription.php">Inscription</a>
                    <a href="\Web\Profile\View\Login.php">Login </a>';
                    
                }?>
            </div>
            <div class="title_site">
                <div class="welcome"><h1>Welcome</h1></div>
                <div class="name_site"><h1>To Your Home</h1></div>
            </div>
        </nav>