
<main>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/js/splide.min.js"></script>  
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.6.12/dist/css/themes/splide-skyblue.min.css">  
<h1 class="title_page"><?= $title ?></h1>
    <div class="search_bar">
        <div class="search_div">
            <form class="form_search_bar" method="post" action="">
                <div>
                    <label for="search">Recherche</label>
                    <input name="search" type="text">
                </div>
            </form>
        </div>
        
       
        </form>
        
    </div>
    <div class="carrousel_container">
        <div>
            <h3 class="title_carrousel">New Images</h3>
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

    <section class="section_galerie">
        <?php
        foreach ($Photo as  $value) : ?>
            <div class="photo_container">
             <img class="photo_galerie" src="<?=$value->image ?>"/>
            </div>

        <?php endforeach ?>
        <?php foreach ($carousel_photo as $value) : ?>
            <div class="photo_container">
            <img onclick="my_modal(this)" class="photo_galerie" src="<?= $value->image?>" />
            
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