<link rel="stylesheet" href="<?= URL ?>src/css/home.css">
<script src="<?= URL ?>src/js/home.js" defer></script>
<section class="container-fluid mt-5">
        <section class="row g-4">
            <h1 class="text-center mb-5">Nos derniers articles sur Space Explorer</h1>
            <div class="col-lg-6">
                <div class="h-100 card card-grid-lg card-bg-scale text-white">
                    <img src="<?= $article[1]->image ?>" class="card-img h-100" alt="...">
                        <div class="card-img-overlay h-25 w-100 mt-auto">
                        
                        <a class="text-white" href="<?= URL ?>acceuil/newsSolo/<?= $article[1]->id ?>">
                            <h5 class="card-title"><?= $article[1]->Titre ?></h5>
                            <!--<p class="card-text"><?= $article[1]->resumé ?></p> -->
                        </a>
                        </div>
                    </div>
                </div>

			
                <div class="sibling-columns-home col-lg-5">
                    <div class="card mb-3" style="max-width: 600px;">
                        <div class="row g-0">
                          <div class="col-lg-6">
                            <img src="<?= $article[1]->image ?>" class="img-fluid rounded-start h-100" alt="...">
                          </div>
                          <div class="col-lg-6">
                            <div class="card-body">
                            <a class="" href="<?= URL ?>acceuil/newsSolo/<?= $article[1]->id ?>">

                              <h5 class="card-title"><?= $article[1]->Titre ?></h5>
                            </a>
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="card" style="max-width: 600px;">
                            <div class="row g-0">
                              <div class="col-lg-6">
                                <img src="<?= $article[2]->image ?>" class="img-fluid rounded-start h-100" alt="...">
                              </div>
                              <div class="col-lg-6">
                                <div class="card-body">
                                <a class="" href="<?= URL ?>acceuil/newsSolo/<?= $article[2]->id ?>">

                                  <h5 class="card-title"><?= $article[2]->Titre ?></h5>
                                </a>
                                </div>
                              </div>
                            </div>
                        </div>
                </div>
        </section>                            
    </section>

    <section class="container mt-5">
        <div class="row mt-5">
            <div class="col-lg-6 mt-5">
                <img src="<?= URL.  $photo[0]->image ?>" alt="" class="img-fluid">
            </div>
            <div class="text-center m-auto col-lg-6">
                <h2>Nos dernieres images </h2>
                <p>Space explorer vous permet de visioner des photos magnifiques de l'espace</p>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-lg-6 text-center m-auto">
                <h2>Nos dernieres images </h2>
                <p>Space explorer vous permet de visioner des photos magnifiques de l'espace</p>
            </div>
            <div class="col-lg-6 mt-5">
                <img src="<?= URL . $photo[0]->image ?>" alt="" class="img-fluid">
            </div>    
        </div>

        <div class="row mt-4">
            <div class="col-lg-6 mt-5">
                <img src="<?= URL . $photo[0]->image ?>" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 text-center m-auto">
                <h2>Nos dernieres images </h2>
                <p>Space explorer vous permet de visioner des photos magnifiques de l'espace</p>
            </div>
        </div>

    </section>
    <section class="container mt-5 h-100">
        <div class="row mt-3">
            <div class="mb-3 mx-auto">
                <h2>Nos dernières Videos sur Space Explorer</h2>
                <p>Space Explorer permet egalement de voir des documentaire et videos sur l'espace</p>
            </div>

            <div class="col-lg-8">
                <img src="https://dummyimage.com/800x600/000/fff" alt="" class="img-fluid">
            </div>
            <div class="col-lg-4 amign-items-center">
                <span class="mb-2"><strong class="mb-5">Nouvelle Vidéos</strong></span>

                <div class="h-25">

                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <img src="https://dummyimage.com/250x140/000/fff" alt="" class="img-fluid">
                        </div>
                        <div class="col-sm-6">
                            <h3>Titre video</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="h-25">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <img src="https://dummyimage.com/250x140/000/fff" alt="" class="img-fluid">
                        </div>
                        <div class="col-sm-6">
                            <h3>Titre video</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="h-25">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <img src="https://dummyimage.com/250x140/000/fff" alt="" class="img-fluid">
                        </div>
                        <div class="col-sm-6">
                            <h3>Titre video</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="h-25">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <img src="https://dummyimage.com/250x140/000/fff" alt="" class="img-fluid">
                        </div>
                        <div class="col-sm-6">
                            <h3>Titre video</h3>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container mt-5">
        <div class="row align-items-center">

            <div class=" col-lg-6 mt-5">
                <h2 class="">Notre forum dédié sur l'espace</h2>
                <p class="text-justify">Space Explorer vous permet également de discuté sur le forum, pour cela il suffit de vous <a href="<?= URL ?>Inscription/inscription">inscrire</a>, et ensuite vous pourrais poster un nouveaux sujet ou repondre au sujet déja poster !!!</p>
            </div>    
            <div class="col-lg-6 mt-5">
                <img class="img-fluid" src="<?= URL  ?>/src/image/Planetes/istockphoto-1248119058-170667a.jpg" alt="Image Testimonial">
            </div>
        </div>    
        <div class="row mt-5 justify-content-between align-items-center">

            <div class="col-lg-6">
                <img class="img-fluid" src="<?= URL  ?>/src/image/Planetes/forum_illustration.jpg" alt="Image Testimonial" alt="" class="img-thumbail">
            </div>
            <div class="col-lg-5 mt-5">
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <h3>Nos sujet les plus récent</h3>

                    </li>
                    <li class="nav-item my-2">
                        <a class="" href="<?= URL .'Forum/ForumSolo/' . $Subject[0]->Id_forum ?>">
                            <?= $Subject[0]->Titre ?></a>
                        </li>
                        <li class="nav-item my-2">
                            <a class="" href="<?=URL .'Forum/ForumSolo/' . $Subject[1]->Id_forum ?>"><?= $Subject[1]->Titre ?></a>
                        </li>
                        <li class="nav-item my-2">
                            <a class="" href="<?=URL .'Forum/ForumSolo/' . $Subject[2]->Id_forum ?>"><?= $Subject[2]->Titre ?></a>
                        </li>
                        <li class="nav-item my-2">
                            <a class="" href="<?=URL .'Forum/ForumSolo/' . $Subject[3]->Id_forum ?>"><?= $Subject[3]->Titre ?></a>
                        </li>
                    </ul>
                    
                </div>
            </div>
    </section>
