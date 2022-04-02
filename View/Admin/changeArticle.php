<main class="change_article_wraper">
<script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js"></script>

    <h1><?= $article[0]->Titre ?></h1>
    <?php if($err_mode === true){
    echo "<div class='warning_login'>
            <h2 class='warning_title_err_mode'>
                Veuillez remplir tous les champs nessecaire
            </h2>
        </div>";
}
?>
    <form method="POST" action="">
        <textarea name="Updated_article" id="editor1" cols="50" rows="30"><?= $article[0]->news ?></textarea>
        <button type="submit">Envoyer</button>
    </form>

</main>
<script>
        CKEDITOR.replace( 'editor1' );
</script>