<?php 
if($err_mode === true){
    echo "<div class='warning_login'>
            <h2 class='warning_title_err_mode'>
                Veuillez remplir tous les champs nessecaire
            </h2>
        </div>";
}
?>
<script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js" ></script>

    <main class="article_add_post_container">
    <h1 class="title_page"><?= $title ?></h1>
    

    <div class="form_container_Add">
        
        <form enctype="multipart/form-data"  id="addArticle" action="" method="post">
            <div class="input_container_article">
               
                <div>
                   <p>
                        <label id="article_label_content" for="article_content">Contenu de L'article</label>
                        <div id="toolbar-container"></div>
                   
                        <textarea id="editor1" name="article_content" cols="30" rows="20"></textarea>
                    </p>
                </div>
                <div class="infos_section_article_data"> 
                    <p>
                        <label id="article_label_title" for="title_article">Titre de L'article</label>
                        <input type="text" name="title_article">
                    </p>

                    <p class="image_inside_div">
                        <label id="article_label_image" for="url_image">L'image qui apparaitra sur l'accueil</label>
                        <input type="url" name="url_image" id="url_input" require="true"">
                    </p>
                    <p>
                        <label id="article_label_resume" for="resume_article">Résumé de l'article qui apparaitra sur  l'accueil</label> 
                        <textarea name="resume_article" id="resume_article" cols="30" rows="10"></textarea>                    
                        </p>
                </div>
               
            </div>
            <button id="button_send_article" type="submit">Ajouter</button>
        </form>
    </div>

</main>
<script>
        CKEDITOR.replace( 'editor1',{
            removePlugins: 'exportpdf'
        });
</script>

