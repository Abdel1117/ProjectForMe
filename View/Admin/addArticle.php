<?php 
if($err_mode === true){
    echo "<div class='warning_login'>
            <h2 class='warning_title_err_mode'>
                Veuillez remplir tous les champs nessecaire
            </h2>
        </div>";
}
?>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <main class="video_add_post_container">
    <h1><?= $title ?></h1>
    

    <div class="form_container_Add">
        
        <form enctype="multipart/form-data"  id="addArticle" action="" method="post">
            <div class="input_container_article">
                <div>
                    <label for="title_article">Titre de L'article</label>
                    <input type="text" name="title_article">
                </div>
                <div>
                    <label for="article_content">Contenu de L'article</label>
                    <textarea name="article_content" id="editor" cols="20" rows="30"></textarea>
                </div>
            </div>
            <button type="submit">Envoyer</button>

        </form>

    </div>

</main>
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>