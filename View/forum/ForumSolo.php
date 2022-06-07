<?php use Hp\SpaceExplorer\UImessage ?>
<?php session_start()?>
<main class="container">
<div class="d-flex justify-content-center mb-5">
                <h3 class="text-align-center"><span><?= $Post[0]->Titre ?></span></h3>
</div>

<?php UImessage::message_To_Send(); ?>

<div class="container-fluid mt-100">
     <div class="row">
         <div class="col-md-12 mb-3">
             <div class="card mb-4">
                 <div class="card-header">
                     <div class="media flex-wrap w-100 align-items-center"> 

                         <?php if(!empty($Post[0]->image)){
                            echo'<img class="d-block ui-w-40 rounded-circle profil_image_forum"  src="data:image/jpg; charset=utf8;base64,' . base64_encode($Post[0]->image) . '" alt="Profil Image"/>';
                        } 
                        else{
                            echo '<img class ="d-block ui-w-40 rounded-circle profil_image_forum"  src="/Web/Space_explorer/src/image/profil-astronaute-côté-banque-dillustrations_csp0954785.webp" alt="Profil_image" />';
                            }
                            ?>        

                         <div class="media-body ml-3"><?= $Post[0]->pseudo ?>
                             <div class="text-muted small">13 days ago</div>
                         </div>
                         
                     </div>
                 </div>
                    <div class="card-body">
                        <p> <?= $Post[0]->Discussion ?></p>
                    </div>
                </div>
            </div>
    </div>
</div>

            
<?php if(!empty($Post)){
    foreach ($Responses as $key => $Response) : ?>

               
        <div class="container-fluid mt-100">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card mb-4">
                         <div class="card-header">
                             <div class="media flex-wrap w-100 align-items-center"> 

                                 <?php if(empty($Response->image) || $Response->image === null ){
                                       echo '<img class ="d-block ui-w-40 rounded-circle profil_image_forum"  src="/Web/Space_explorer/src/image/profil-astronaute-côté-banque-dillustrations_csp0954785.webp" alt="Profil_image" />';
                                } 
                                else{
                                    echo'<img class="d-block ui-w-40 rounded-circle profil_image_forum"  src="data:image/jpg; charset=utf8;base64,'.base64_encode($Response->image) . '" alt="Profil Image"/>';
                                    }
                                    ?>        

                                 <div class="media-body ml-3"><?= $Response->pseudo ?>
                                     <div class="text-muted small">13 days ago</div>
                                 </div>
                                
                             </div>
                         </div>
                            <div class="card-body">
                                <p> <?= html_entity_decode($Response->post) ?></p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    <?php endforeach;  } ?>

            <?php if(!empty($_SESSION['pseudo'])) : ?>
                <div class="row">
                    <div class="col">
                        <form action='' method="POST">
                                <textarea class="form-control" name="answear" id="answear-form" cols="8" rows="5" placeholder="Votre Reponse Ici" ></textarea>
                            <button class="btn btn-primary mt-2">Envoyer</button>
                        </form>
                    </div>
                </div>
                <?php 
                else :?>
                <h2>Il faut crée un compte pour pouvoir repondre au forum</h2>
            <?php endif ?>
</main>


