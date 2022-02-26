<?php session_start() ?>
<main class="forum_container">
    <section class="option-nav">
        <div class="order-by">
            <label for="order_choice">Triée Par Ordre</label>

            <form action="" method="post">
                <select name="order_by" id="order_choice">
                    <option value="DESC">Décroissant</option>
                    <option value="ASC">Croissant</option>
                </select>
                <button type="submit">Envoyer</button>  
            </form>

        </div>

        <div class="addPost">
        
            <form action="<?= URL ?>Forum/addPost" method="POST">
                <?php if(empty($_SESSION['pseudo'])):?>
                    <span>Il faut cree un compte pour pouvoir poster</span> 
                <?php else: ?>
                    <button class="subject_button">ADD subject</button>
                <?php endif ?>
            </form>
        </div>

        <div class="search">
            <form method="POST" action="<?= URL ?>Forum/search">
                <placeholder>Rechercher </placeholder>
                <input name="recherche" type="text">
                <button id="search_button" class="search_button" type="submit">Recherche</button>
            </form>
        </div>
    </section>

    <section class="forum_section">
        <div class="discussion_section">
            
            <span><h3 class="forum_title"><strong><?= $title ?></strong></h3></span>
            <section class="forum_index">
                    <div class="title_post">
                        <span><p>Titre</p></span>
                    </div>
                    <div class="posted_by">
                        <span><p>Auteur</p></span>
                    </div>
                    <div class="lastmessage">
                        <span><p>Derniere message</p></span>
                    </div>
                    <div class="datepost">
                        <span><p>Date du poste</p></span>
                    </div>
                </section>

                
                <?php foreach ($post as $value) : ?>
                    <section class="display_data">
                        <div class="Title_data">
                            <span><a class="title_data_info" href="<?= URL. "Forum/ForumSolo/" . $value->Id_forum ?>"><?= $value->Titre ?></a></span>
                        </div>
                    
                    <div class="Auteur_data">
                        <span><p><?= $value->pseudo ?></p></span>
                    </div>
                    <div class="last_message_data">
                        <span><p><?php
                            
                            $origin = new DateTime($value->Date_post);
                            $target = new DateTime("now");  
                        

                            $interval = $origin->diff($target);
                            if($interval->h >= 24){
                                echo $interval->format("Il y a moins de %h heure");
                            }
                            elseif($interval->d >= 1 ){
                                echo $interval->format('Il y a %d jours');
                                
                            }
                            elseif($interval->i <= 60){
                                echo $interval->format("Il y au moins %i minutes ");
                            }
                            else{
                                echo $interval->format("Il y a au moins %M mois");
                            }
                        ?></p></span>
                    </div>
                    
                    <div class="date_data">
                        <p><?= $value->Date_post ?></p>              
                    </div>
                </section>

            <?php endforeach ?>

        </div>
        
        <aside class="hot_today">
            <?php 
            foreach ($hot_today as $value) : ?>
                <div class="hot-today-block">
                    <span><a href="<?= URL.'Forum/ForumSolo/'.$value->Id_forum ?>"><?= $value->Titre ?></a></span>
                    <p><?= substr($value->Discussion,0,25) ?></p>
                </div>
            <?php endforeach ?>
        </aside>
    </section>

</main>
