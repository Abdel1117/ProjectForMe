<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/themes/splide-skyblue.min.css">  

<section class="splide" id="thumbnail-slider">
    <div class="splide__track">
        <ul class="splide__list">
            <?php foreach ($Slider_accueil as $Slide) : ?>
            <li class="splide__slide">
              
            <img class="img_cover_slide_article" src="<?= $Slide->image ?>" alt="image_planete_article">
            <div class="modal_cover_article">
                <h3><?= $Slide->Titre ?></h3>
                <a class="resume_article_slider" href="<?=URL . "acceuil/newsSolo/$Slide->id" ?>"<p> <?= $Slide->resumé ?></p><a/> 
            </div>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</section>

<section class="main_flux" id="main_flux">
        <?php 
            foreach ($Contenue as $value) : 
        ?>
                    
        <div class="card_shop" id="card_shop">
            
                <article class="feed_flux_infos">
                    <section class="image_container">
                    <?= 
                    '<img class="image_card" src='.$value->image . ' >';
    
                    ?>
                    </section>
                    <div class="news_container">
                        <div class="title_container">
                            <span> 
                                <h3 class="title_page"><?= Config::esc($value->Titre) ?></h3>
                            </span>
                        </div>

                        <p><?= htmlspecialchars_decode($value->resumé) ?></p>
                    </div>
                    <span class="button_container">
                        <a class="read_suite" href="<?=URL . "acceuil/newsSolo/$value->id" ?>">Lire la suite...</a>
                        <button><i class="fas fa-share-alt"></i></button>
                        <button><a class="add_favorite" href="<?= URL."compte/addFavoriteImage/$value->id"?>"><i class="fas fa-star"></i></a></button>
                </span>
                </article>

                
        </div>
    <?php endforeach ?>
</section>


<script>
 document.addEventListener( 'DOMContentLoaded', function () {
  new Splide( '#thumbnail-slider', {
		fixedWidth: 800,
        fixedHeight: 500,		
        gap       : 10,
		rewind    : true,
		pagination: true,
        cover : true,
        isNavigation : true,
        focus      : 'center',
        breakpoints: {
        600: {
        fixedWidth : 300,
        fixedHeight: 300,
    },
  },
  } ).mount();
} );
</script>

