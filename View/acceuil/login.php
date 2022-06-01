<?php if($err_mode != false ) : ?>
    <div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert">&#10060 </button>
  <strong> Pas si vite !</strong><a href="#" class="alert-link"><?= $err_mode ?></a>
</div>



  <?php endif ?>

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
                            <div class="d-flex align-items-center form-group">
                            <a href="<?= URL ?>Inscription/inscription" class="text-black">Si vous n'avez pas de compte Inscrivez vous Ici</a>
                            <a href="<?= URL ?>Compte/mot_de_passe_oublie">Mot de passe oublié ? </a>
                            <input type="submit" name="submit" class="m-3 btn btn-info btn-md" value="Conexion">
                                
                            </div>
                          
                            <div id="register-link" class="text-right">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
