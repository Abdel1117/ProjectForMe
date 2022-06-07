<main class="video_add_post_container">

    <h1 class="title_page"><?= $title ?></h1>

<?php use Hp\SpaceExplorer\UImessage;       UImessage::message_To_Send() ?>


<form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
           
            <label for="title_video">Titre de la video </label><input class="form-control" id="title_video" type="text" name="title_video">
        </div>
         
            <div class="form-group">

                <label for="link_video">Lien de la video</label><input class="form-control" id="link_video" type="text" name="link_video">
            </div>
            
            <div class="form-group">

                <label for="image_thumb">Image associé</label><input class="form-control" id="image_thumb" type="file" name="image_thumb">
            </div>


            <button class="btn btn-primary" type="submit">Envoyer</button>

        </form>


</main>


