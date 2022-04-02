<?php session_start()?>

<main class="body_forum">
<div class="section_title">
                <span><?= $Post[0]->Titre ?></span>
</div>

<div class="Answer_forum" style=" margin-top:5% ;height:20%;padding:15px; ">

    <div class="info_post">
        <?php if(!empty($Post[0]->image)){
            echo'<img class ="image_profil_compte" src="data:image/jpg; charset=utf8;base64,' . base64_encode($Post[0]->image) . '"     width = "150px" height = "150px" alt="Profil Image"/>';
        } 
        else{
            echo '<img class ="image_profil_compte" src="../src/image/profil-astronaute-côté-banque-dillustrations_csp0954785.webp" alt="Profil_image" />';
        }
        ?>         
        <p id="info_forum_post"><?= $Post[0]->pseudo ?></p>           
    </div>        

            <div class="section_question">
                <p class="section_question_height"><?= Config::esc(substr($Post[0]->Discussion,0,401)) ?></p>
                <div class="section_pseudo">
                    <span class="info_question">
                    
                

                    <p style="float:right;"><?= $Post[0]->Date_post ?></p>
                    </span>
                    </div>
                </div>

</div>
            
            
            
    </div>
            <?php if(!empty($Post)){
            
            foreach ($Responses as $key => $Response) : ?>
                <div class="response_forum">
                
                        <div class="info_post">
                            <?= '<img class ="image_profil_compte" src="data:image/jpg; charset=utf8;base64,' . base64_encode($Response->image) . '"     width = "150px" height = "150px" alt="Profil Image"/>' ?>
                            <p id="auteur_name"><?= $Response->pseudo ?></p>
                        </div>        

                        <div class="posted_text">
                            <p id="reponse_text"><?= Config::esc($Response->post) ?></p>
                            
                            <p id="Date_reponse" ><?= $Response->Date_poste ?></p>
                        </div>
                </div>

            <?php endforeach;  } ?>

            <?php if(!empty($_SESSION['pseudo'])) : ?>
                <div class="post_answer">
                    <form action='' method="POST">
                        <label id="label_response" for="answear">Votre Reponse </label><textarea class="text-area-add-post" name="answear" id="answear-form" cols="10" rows="5"></textarea>
                        <button class="button_send">Envoyer</button>
                    </form>
                </div>
                <?php 
                else :?>
                <h2>Il faut crée un compte pour pouvoir repondre au forum</h2>
            <?php endif ?>
</main>