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
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-black">Conexion</h3>
                            <div class="form-group">
                                <label for="username" class="text-black">Pseudo:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-black">Mot de passe:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                            <a href="<?= URL ?>Inscription/inscription" class="text-black">Si vous n'avez pas de compte Inscrivez vous Ici</a>

                                <input type="submit" name="submit" class="m-5 btn btn-info btn-md" value="Conexion">
                            </div>
                            <div id="register-link" class="text-right">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
