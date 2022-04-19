<?php 
if($err_mode != false) : ?>
    <div class="alert alert-dismissible alert-danger">
  <button type="button" class="btn-close" data-bs-dismiss="alert">&#10060;</button>
  <strong>Oh Zut!</strong> <a href="#" class="alert-link"><?= $err_mode ?></a> 
</div>


<?php endif ?>
<script src="//cdn.ckeditor.com/4.17.2/full/ckeditor.js" ></script>

    <main class="article_add_post_container">
    <h1 class=""><?= $title ?></h1>
    

    <div class="form_container_Add">
        
        <form enctype="multipart/form-data"  id="addArticle" action="" method="post">
            <div class="row m-3 "> 
                    <div class="col-sm-6" >
                        <input  class="form-control" placeholder="Le titre de l'article" type="text" name="title_article">
                    </div>
                    <div class="col-sm-4">
                        
                        <input placeholder="Le lien de l'image qui apparaitra dans l'accueil" class="form-control" type="url" name="url_image" id="url_input" require="true"">
                    </div>
            </div>
            <div class="row m-3 "> 

                  
            </div>
            <div class="row m-3">
                    <div class="">
                        
                        <textarea placeholder="Resumé de l'article qui apparaitra dans l'accueil"  name="resume_article" id="resume_article" cols="30" rows="10"></textarea>                    
                    </div>
                    </div>
                </div>  
        <div class="row">
               
                <div class="col">
                   <p>
                        <label id="article_label_content" for="article_content">Contenu de L'article</label>
                        <div id="toolbar-container"></div>
                   
                        <textarea id="editor1" name="article_content" cols="30" rows="20"></textarea>
                    </p>
                </div>
                
               
            </div>
            <button class="btn btn-primary mx-auto" type="submit">Ajouter</button>
        </form>
    </div>

</main>
<script>
        CKEDITOR.replace( 'editor1',{
        //     CKEDITOR.plugins.add( 'sample', { ... plugin definition ... } );

          //  removePlugins:'exportpdf'
        });
</script>

