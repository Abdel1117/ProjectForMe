<main class="video_add_post_container">

    <h1><?= $title ?></h1>
<?php if($err_mode === true){
    echo "<div class='warning_login'>
            <h2 class='warning_title_err_mode'>
                Veuillez remplir tous les champs nessecaire
            </h2>
        </div>";
}
?>
        <form action="" method="post">
        <div class="input_container">

            <label for="title_video">Titre de la video </label><input type="text" name="title_video_1">
            <label for="link_video">Lien de la video</label><input type="text" name="link_video_1">

        </div>
            <button type="submit">Envoyer</button>

        </form>

        <button class="add_video">Ajouter une vidéo suplemmentaire</button>

</main>


