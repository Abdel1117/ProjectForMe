<main class="main">
    <div class="profil_display_image">
        <div class="side_info_profil">
            <div class="container_image_data">
                <h1 class="title_profil"><?=$title ?></h1>
                <?php if($image[0]->image != NULL){
                echo
                '<img class ="image_profil_compte" src="data:image/jpg; charset=utf8;base64,' . base64_encode($image[0]->image) . '"     width = "150px" height = "150px" alt="Profil Image"/>';
                }else{
                    echo '<img class ="image_profil_compte" src="../src/image/profil-astronaute-côté-banque-dillustrations_csp0954785.webp" alt="Profil_image" />';
                }
                ?>
                <form class="form_image" enctype="multipart/form-data"  action="" method="post">
                <span><label for="image_profil">Changez d'image de proflil</label><input type="file" name="image_profil" id="image_profil"  ></span>
                <input class="button_send_image" value="Envoyer" name="Send_picture" type="submit">
                </form>
            </div>
            <div class="info_container">
            <h3>Pseudo: <?= $infos[0]->pseudo ?></h3>
            <h3>Email: <?= $infos[0]->email ?></h3>
            <h3>Country: <?= $infos[0]->Country ?></h3>
        </div>
        </div>
        <div class="desc-side">
            <div class="description_display">
                <h2>Description</h2>
                <p><?= $infos[0]->description ?></p>
            </div>
            <div class="Description_profil">
            <fieldset  class="field_desc" >
                <form class="form_desc" method="POST" action="">
                    <label for="desc">Dit nous en plus a propos de vous</label>
                    <textarea name="description" id="desc" cols="40" rows="20"></textarea>
                    <button>Envoyer</button>
                </form>
            </fieldset>
    </div>
    </div>
    </div>
</main>
<?php

