
<main>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/themes/splide-skyblue.min.css">  

    <div class="nav">
    <h1 class="mx-auto border-bottom"><?= $title ?></h1>
    </div>
    <div class="carrousel_container">
        <div class="d-flex justify-content-center">
            <h3> Nouvelles Images D'astronomie </h3>
        </div>
        <div id="thumbnail-slider" class="splide">
            <div class="splide__track">
            		<ul class="splide__list">
                        <?php foreach($carousel_photo as $photo) : ?>
            			    <li class="splide__slide">
                                <img src="<?= $photo->image ?>" alt="Photo-galerie">    
                            </li>
                        <?php endforeach ?>
            			
            		</ul>
            </div>
        </div>
        
    </div>

    <section class="row text-center text-lg-start mt-5">
        <div class="d-flex justify-content-center">
            <h3>Album photo</h3>
        </div>
        <?php
        foreach ($Photo as  $value) : ?>
            <div class="col-lg-3 col-md-4 col-6">
             <img onclick="my_modal(this)" class="img-fluid img-thumbnail" src="<?=$value->image ?>"/>
            </div>

        <?php endforeach ?>
        <?php foreach ($carousel_photo as $value) : ?>
            <div class="col-lg-3 col-md-4 col-6">
                <img onclick="my_modal(this)" class="img-fluid img-thumbnail"   src="<?= $value->image?>" />
            </div>
            
        <?php endforeach ?>
        <div id="myModal" class="modal">
            <span class="close">&times;</span>

            <img class="modal-content" id="img01">

            <div id="caption"></div>
        </div>
    </section>
    


<script>
 document.addEventListener( 'DOMContentLoaded', function () {
  new Splide( '#thumbnail-slider', {
		fixedWidth: 450,
        fixedHeight: 350,		
        gap       : 10,
		rewind    : true,
		pagination: false,
        cover : true,
        isNavigation : true,
        focus      : 'center',
        breakpoints: {
        600: {
        fixedWidth : 200,
        fixedHeight: 200,
    },
  },
  } ).mount();
} );
</script>
</main>