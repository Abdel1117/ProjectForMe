<?php use Hp\SpaceExplorer\UImessage;  ?>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-default.min.css"> 


<?php if(isset($_SESSION['first_connect']) === true ) :?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert">&#10060 </button>

  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
        Vous vous êtes Connecté avec succès !!!! 
  </div>
</div>

<?php 
unset($_SESSION['first_connect']);
elseif(isset($_SESSION["succes_inscription"])) : ?>

    <div class="alert alert-success d-flex align-items-center" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert">&#10060 </button>

  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
        Vous êtes inscrit !!!! 
  </div>
</div>

<?php unset($_SESSION['succes_inscription']); endif ?>

<?php if(isset($_SESSION['deco']) === true ) :?>
    
    <div class="alert alert-warning d-flex align-items-center" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert">&#10060 </button>

  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
        Vous vous êtes deconnecté avec succès !!!! 
  </div>
</div>

<?php unset($_SESSION["deco"]); endif ?>
<?php UImessage::message_To_Send() ?>
<section class="splide" id="thumbnail-slider">
    <div class="splide__track">
        <ul class="splide__list">
            <?php foreach ($Slider_accueil as $Slide) : ?>
            <li class="splider-image-article splide__slide">
              
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

<section class="album py-5" id="">
    <form action="" method= POST">
        <select class="form-select form-select-lg mb-3" name="tags_display_article" id="tags">
            <option selected value="">--Trier par thème aborder--</option>
            <option value="Système Solaire">Système Solaire</option>
            <option value="Objet Stellaire">Objet Stellaire</option>
            <option value="Astéroïde">Astéroïde</option>
            <option value="Les Galaxies">Les Galaxies</option>
            <option value="Nébuleuse">Nébuleuse</option>
            <option value="Trou noir">Trou noir</option>
        </select>
        <button class="btn btn-primary">Chercher</button>
    </form>
    <h2 class="title">Articles</h2>
        <div class="container">
            <div class="row row-cols-1 g-5">
                <?php foreach ($Contenue as $value) : ?>

                    <div class="col-lg-4 mb-5" id="">
                        <article class="card shadow-sm h-100">
                            <h2 class="text-center"><?= $value->Titre ?></h2>
                            <img src="<?= $value->image?>" class="img-article-accueil img-fluid img-thumbnail" style="max-height:200px" alt="image astronomie espace" />
                                    <div class="card-body">
                                        <p class="card-text h-50"><?= html_entity_decode($value->resumé) ?></p>
                                            
                                                <div class="row btn-group mt-2">
                                                    <a href="<?= URL ?>acceuil/newsSolo/<?= $value->id ?>" class="h-50 btn btn-primary">Lire la suite de l'article</a>

                                                    <a href="<?= URL.'Compte/addFavoriteImage/'.$value->id ?>" class="btn btn-warning">Ajouter Favoris</a>
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
        gap       : 1,
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

