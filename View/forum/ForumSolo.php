<?php use Hp\SpaceExplorer\UImessage ?>
<?php session_start()?>
<main class="container">
<div class="d-flex justify-content-center">
                <h3 class="text-align-center"><span><?= $Post[0]->Titre ?></span></h3>
</div>

<?php UImessage::message_To_Send(); ?>
<div class="card mb-3" style="max-width: 100%;">
  <div class="row g-0">
    <div class="col-md-2 align-items-center ">
    <?php if(!empty($Post[0]->image)){
            echo'<img class="img-fluid img-responsive img-thumbnail "  src="data:image/jpg; charset=utf8;base64,' . base64_encode($Post[0]->image) . '" alt="Profil Image"/>';
        } 
        else{
            echo '<img class ="img-fluid img-responsive img-thumbnail "  src="../src/image/profil-astronaute-côté-banque-dillustrations_csp0954785.webp" alt="Profil_image" />';
        }
        ?>        
            <p class="text-center mt-4 "><?= $Post[0]->pseudo ?></p> 
    </div>
    <div class="col-md-8">
      <div class="card-body" style="height:100%">
        <p class="card-text " style="height:50%"><?= Config::esc($Post[0]->Discussion) ?></p>
        <p class="card-text float-right"><small class="text-muted">Poster le <?= $Post[0]->Date_post ?></small></p>
      </div>
    </div>
  </div>
</div>
            
            
    </div>
            <?php if(!empty($Post)){
            
            foreach ($Responses as $key => $Response) : ?>
                <div class="card mb-3 mb-3">
                    <div class="row g-0">
                        <div class="col-md-2 ">

                            <?php if(empty($Response->image) || $Response->image === null ){
                                echo '<img class="img-fluid img-responsive img-thumbnail " src="https://comps.gograph.com/astronaute-profil-lat%C3%A9ral_gg4410408.jpg"  alt="image de l\'utilisateur" />';
                            }
                            else {

                                echo  '<img class="img-fluid img-responsive img-thumbnail " src="data:image/jpg; charset=utf8;base64,' . base64_encode($Response->image) . '"     alt="alt="image de l\'utilisateur""/>';
                            } ?>
                            <p class="text-center mt-4"><?= $Response->pseudo ?></p>
                        </div>        
                             

                        <div class="col-md-8">
                            <div class="card-body" style="height:100%">
                                <p id="card-text" style="height:50%"><?= html_entity_decode($Response->post) ?></p>   
                                <p class="card-text float-right"><small class="text-muted"><?= $Response->Date_poste ?></small></p>
                            </div>
                        </div>
                </div>
                </div>

            <?php endforeach;  } ?>

            <?php if(!empty($_SESSION['pseudo'])) : ?>
                <div class="row">
                    <div class="col">
                        <form action='' method="POST">
                                <textarea class="form-control" name="answear" id="answear-form" cols="10" rows="5" placeholder="Votre Reponse Ici" ></textarea>
                            <button class="btn btn-primary mt-2">Envoyer</button>
                        </form>
                    </div>
                </div>
                <?php 
                else :?>
                <h2>Il faut crée un compte pour pouvoir repondre au forum</h2>
            <?php endif ?>
</main>