<?php if($err_mode === true){
    echo "<div class='warning_login'>
            <h2 class='warning_title_err_mode'>
                Veuillez remplir tous les champs nessecaire
            </h2>
        </div>";
}
?>
<main class="video_add_post_container">
    <h1><?= $title ?></h1>
    
    <div>Hello</div>

    <div class="form_container_Add">

        <form enctype="multipart/form-data"  id="addArticle" action="" method="post">
            <div class="input_container_article">
                <div>
                    <label for="title_article">Titre de L'article</label>
                    <input type="text" name="title_article">
                </div>
                <div>
                    <label for="article_content">Contenu de L'article</label>
                    <textarea name="article_content" id="" cols="20" rows="10"></textarea>
                </div>
                <div class="input_container">
                    <label for="link_image1">L'image Liée a l'article</label>
                    <input type="text" name="link_image1">                
                    <input type="text" name="link_image2">                
                    <input type="text" name="link_image3">                
                    <input type="text" name="link_image4">                
                    <input type="text" name="link_image5">                

                </div>
                
            </div>
            <button type="submit">Envoyer</button>

        </form>

    </div>

</main>
