<?php
    setcookie("cookie_accepter","accepter", time() + 3600 * 24 * 365,"/",null,false , true );
    if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    else{
        header("location:"."http://localhost/Web/Space-Explorer/Acceuil/index");
    }
    ?>
