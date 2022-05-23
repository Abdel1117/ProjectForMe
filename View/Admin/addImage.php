<main class="container-fluid ">
<?php 
use Hp\SpaceExplorer\UIMessage;
UImessage::message_To_Send(); ?>

<div class="form_container_Add">

        <form id="form_image_add" class="input_container" action="" method="post" enctype="multipart/form-data" >
            <div class="form-row align-items-center" id="container_id">
                <div class="col-lg-3">
                    <input class="form-control" type="file" name="image_upload" placeholder="Lien de la galerie">
                </div>
                <div class="col-lg-2">    
                     <input class="form-control" type="text" name="title_image" id="" placeholder="Titre de L'image">
                </div>
                <div class="col-lg-2">
                    <input class="form-control" type="text" name="desc_image" id="" placeholder="Description de l'image">
                </div>
            </div>
            <div id="btn-group-add-image" class="row mt-5">
                <button class="btn btn-primary mr-2" type="submit" name="envoyer" value="1">Ajouter</button>
                <button class="btn btn-success add_link">Ajouter des photos suplemmentaire</button>
            </div>

        </form>

    </div>
    
</main>