<?php if(isset($err_mode) && $err_mode === "pseudo_inccorect") {
    
    echo "<div>
        <h2 class='title_page'>Votre Pseudo est inccorect</h2>
    </div>";
}
elseif(isset($err_mode) && $err_mode === "mot_de_passe_inccorect"){
    echo "<div>
        <h2 class='title_page'>Votre Mot de passe est inccorect</h2>
    </div>";
}elseif(isset($err_mode) && $err_mode === "aucun_champs_remplie"){
    echo "<div>
    <h2>Veuillez remplir tous les champs indiquer</h2>
</div>";
}
?>

<form class="form-login" action="" method="post">
    <h1> Log in</h1>
    <div class="inset"> 
        <p>
            <label for="text">Pseudo</label>
            <input type="text" name="username" id="text">
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
        </p>

    </div>
    <p class="p-container">
        <span>Forgot password ?</span>
    <div>
        <input value="Conexion" type="submit">
    </div>
    </p>
</form>