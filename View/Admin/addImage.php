<main class="h-100">
<?php 
if($err_mode != false) : ?>
    <div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert">&#10060;</button>
  <strong>Oh Zut!</strong> <a href="#" class="alert-link"><?= $err_mode ?></a> 
</div>


<?php endif ?>
    <div class="form_container_Add">

        <form id="form_image_add" action="" method="post">
            <div class="input_container">
                <label for="link_image_1">Lien de la galerie</label><input class="m-3" type="text" name="link_image_1">
            </div>
            <button class="btn btn-primary" type="submit">Ajouter</button>
            <button class="btn btn-success add_link">Ajouter des photos suplemmentaire</button>

        </form>

    </div>

</main>