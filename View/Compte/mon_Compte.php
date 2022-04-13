<main class="container mt-5">
    <div class="row">

        <div class="col-lg-4 ">
                <div class="side_info_profil">
                <div class="container_image_data">
                        <h1 class="title_profil"><?=$title ?></h1>
                        <?php if($image[0]->image != NULL){
                        echo
                        '<img class ="img-fluid" src="data:image/jpg; charset=utf8;base64,' .     base64_encode   ($image[0]->image) . '"     width = "150px" height = "150px"    alt="Profil Image"/>';
                        }else{
                            echo '<img class ="image_profil_compte" src="https://comps.gograph.com/ astronaute-profil-lat%C3%A9ral_gg4410408.jpg" />';
                        }
                        ?>
                        <form class="form_image" enctype="multipart/form-data"  action="" method="post">
                            <span><label for="image_profil">Changez d'image de proflil</label><input    type="file"    name="image_profil" id="image_profil"></span>
                            <br>
                            <input class="mt-1 btn btn-primary" value="Envoyer" name="Send_picture" type="submit">
                        </form>
                    </div>
                    </div>
                <div class="row">
                    <h3>Pseudo: <?= $infos[0]->pseudo ?></h3>
                    <h3>Email: <?= $infos[0]->email ?></h3>
                    <h3>Country: <?= $infos[0]->Country ?></h3>
                </div>
            </div>
            
       
        
            <div class="col-sm-4">
                <div class="bg-light">
                    <h2>Description</h2>
                    <p><?= $infos[0]->description ?></p>
                </div>
                <div class="Description_profil">
                    <form class="form_desc" method="POST" action="">
                        <textarea placeholder="Dit nous en plus a propos de vous" name="description" id="desc" cols="40" rows="20"></textarea>
                        <br>
                        <button type="submit" class="btn btn-primary">Envoyer</button>

                    </form>

                </div>
               
        </div>
    </div>
    <div class="row">
        <?php if($favorite): ?>
            <div class="favorite_side">
                <?php foreach ($favorite as $value) : ?>
                    <div class="info_favorite">
                        <h1><?= $favorite[0]->id_image ?></h1>
                    </div>
                    <?php endforeach ?>
                </div>
                <?php endif ?>
    </div>
</main>

