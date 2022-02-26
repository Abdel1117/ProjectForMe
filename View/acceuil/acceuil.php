<section class="main_flux" id="main_flux">
        <?php 
            foreach ($Contenue as $value) : 
        ?>
                    
        <div class="card_shop" id="card_shop">
            <div class="title_container">
                   <span> <h3><?= Config::esc($value->Titre) ?></h3></span>
            </div>

                <article class="feed_flux_infos">
                    <section class="image_container">
                    <?= 
                    '<img class="image_card" src='.$value->image . ' >';
    
                    ?>
                    </section>
                    <div class="news_container">
                        <p><?= $value->news ?></p>
                    </div>
                </article>

                <span class="button_container">
                        <a class="read_suite" href="<?=URL . "acceuil/newsSolo/$value->id" ?>">Lire la suite...</a>
                        <button><i class="fas fa-share-alt"></i></button>
                        <button><a class="add_favorite" href="<?= URL."compte/addFavoriteImage/$value->id"?>"><i class="fas fa-star"></i></a></button>
                </span>
        </div>
    <?php endforeach ?>
</section>

