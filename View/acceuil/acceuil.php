<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/themes/splide-skyblue.min.css">  


<section class="splide" id="thumbnail-slider">
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide">
            <img class="img_cover_slide_article" src="https://via.placeholder.com/1200" alt="image_planete_article">
            <div class="modal_cover_article">
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            </li>
            <li class="splide__slide">
            <img class="img_cover_slide_article" src="https://via.placeholder.com/1200" alt="image_planete_article">
            <div class="modal_cover_article">
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            </li>
            <li class="splide__slide">
            <img class="img_cover_slide_article" src="https://via.placeholder.com/1200" alt="image_planete_article">
            <div class="modal_cover_article">
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            </li>
            <li class="splide__slide">
            <img class="img_cover_slide_article" src="https://via.placeholder.com/1200" alt="image_planete_article">
            <div class="modal_cover_article">
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            </li>
            <li class="splide__slide">
            <img class="img_cover_slide_article" src="https://via.placeholder.com/1200" alt="image_planete_article">
            <div class="modal_cover_article">
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            </li>
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
                                <h3><?= Config::esc($value->Titre) ?></h3>
                            </span>
                        </div>

                        <p><?= htmlspecialchars_decode($value->news) ?></p>
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

