<main class="video_add_post_container">

    <h1 class="title_page"><?= $title ?></h1>
    <?php 
if($err_mode != false) : ?>
    <div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert">&#10060;</button>
  <strong>Oh Zut!</strong> <a href="#" class="alert-link"><?= $err_mode ?></a> 
</div>


<?php endif ?>    
<form action="" method="post">
        <div class="input_container">

            <label for="title_video">Titre de la video </label><input type="text" name="title_video_1">
            <label for="link_video">Lien de la video</label><input type="text" name="link_video_1">

        </div>
            <button class="btn btn-primary" type="submit">Envoyer</button>

        </form>

        <button class="btn btn-warning">Ajouter une vidéo suplemmentaire</button>

</main>


