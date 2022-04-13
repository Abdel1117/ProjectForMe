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
                <a class="resume_article_slider" href="<?=URL . "acceuil/newsSolo/$Slide->id" ?>"<p> <?=  htmlspecialchars_decode($Slide->resumé) ?></p></a> 
            </div>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</section>

<section class="album py-5 bg-light" id="">
    <h2>Articles de notre Site Web</h2>
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($Contenue as $value) : ?>
                    <div class="col" id="">
                        <article class="card shadow-sm">
                            <img src="<?= $value->image?>" class="img-fluid img-thumbnail" style="max-height:250px" />
                                    <div class="card-body">
                                        <p class="card-text"><?= $value->resumé ?></p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="<?= URL ?>acceuil/newsSolo/<?= $value->id ?>" class="btn btn-primary">Lire la suite de l'article</a>

                                                    <a href="<?= URL.'Compte/addFavoriteImage/'.$value->id ?>" class="btn btn-warning">Ajouter Favoris</a>
                                                </div>
                                            </div>
                                    </div>
                </article>    
                    </div>
                <?php endforeach ?>
            </div>
    </div>
</section>


<script>
 document.addEventListener( 'DOMContentLoaded', function () {
  new Splide( '#thumbnail-slider', {
		fixedWidth: 695,
        fixedHeight: 500,		
        gap       : 0,
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

