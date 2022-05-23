<main class="container">
    <h1 class="title_page"><?= $title ?></h1>
    <?php use Hp\SpaceExplorer\UImessage; UImessage::message_To_Send() ?>
<div class="row">
        <section class="option-nav-video">
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
        </section>
</div>          
<section class="container mt-3">
    <div class="col">
        <?php foreach ($video as $videos) :?>
            <div class="embed-responsive embed-responsive-16by9 mb-4">
                                <iframe  class="video_doc"  src="<?= $videos->Video_link ?>" title="<?= $video->Titre_video ?>" frameborder="2" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
            </div>
            <?php endforeach ?>
        </main>
    </div>
</section>   
</main>