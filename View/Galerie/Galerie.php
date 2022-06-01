
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/js/splide.min.js"></script>  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.1/dist/css/themes/splide-default.min.css"> 

    <div class="nav">
    <h1 class="mx-auto border-bottom"><?= $title ?></h1>
    </div>
    <?php   use Hp\SpaceExplorer\UImessage;
            UImessage::message_To_Send() 
        ?>
    <div class=" container-fluid carrousel_container">
        <div class="d-flex justify-content-center">
            <h2 class=""> Nouvelles Images D'astronomie </h2>
        </div>
        <div id="thumbnail-slider" class="splide">
            <div class="splide__track">
            		<ul class="splide__list">
                        <?php foreach($carousel_photo as $photo) : ?>
            			    <li class="splide__slide">
                                <img src="..\<?= $photo->image ?>" alt="Photo d'astronomie">    
                            </li>
                        <?php endforeach ?>
            			
            		</ul>
            </div>
        </div>
        
    </div>
<section class="container">

    <section class="row text-center text-lg-start mt-5">
        <div class="p-3 w-100 mx-auto">
            <h3>Album photo</h3>
        </div>
       <!--  <?php
        foreach ($Photo as  $value) : ?>
            <div class="col-lg-3 col-md-4 col-6">
             <img onclick="my_modal(this)" class="img-fluid img-thumbnail h-100" src="<?=$value->image ?>" alt="Photo d'astronomie et de planète"/>
            </div>

        <?php endforeach ?> -->
        <?php foreach ($photo_galerie as $value) : ?>
            
            <div class="col-sm-6 col-md-4 mb-3 ">   
                <figure>
                    <img onclick="my_modal(this)" class="img-fluid img-thumbnail w-100 h-100"   src="..\<?= $value->image?>" alt="<?= $value->titre_image ?>" />
                    <figcaption class="">
                        <strong><?= $value->description ?></strong>
                </figcaption>
                </figure>
            </div>
            
        <?php endforeach ?>
        <div id="myModal" class="modal">
            <span class="closes">&times;</span>

            <img class="modal-content" id="img01">

            <div id="caption"> <?= $value->titre_image ?></div>
        </div>
        </section>

    </section>
    
        

<script>
 document.addEventListener( 'DOMContentLoaded', function () {
  new Splide( '#thumbnail-slider', {
		fixedWidth: 100 + "%",
        fixedHeight: 450,		
        gap       : 10,
		rewind    : true,
		pagination: false,
        cover : true,
        isNavigation : true,
        focus      : 'center',
        breakpoints: {
        600: {
        fixedWidth : 100 + "%",
        fixedHeight: 200,
    },
  },
  } ).mount();
} );
</script>
