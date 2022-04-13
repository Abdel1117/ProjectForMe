<main class="h-100">
    <h1 class="title_page"><?= $title ?></h1>
    <?php if($err_mod === true){
    echo "<div class='warning_login'>
            <h2 class='warning_title_err_mode'>
                Veuillez remplir tous les champs nessecaire
            </h2>
        </div>";
}
?>
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