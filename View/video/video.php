<main class="section_video">
<section class="option-nav-video">
        <div class="order-by">
            <label for="order_choice">Triée Par Ordre</label>

            <form action="<?= URL ?>Video/OrderBy" method="post">
                <select name="order_by" id="order_choice">
                    <option value="DESC">Décroissant</option>
                    <option value="ASC">Croissant</option>
                </select>
                <button type="submit">Envoyer</button>  
            </form>
            
        </div>
    </section>
    <?php foreach ($video as $videos) :?>
        <div class="video_container">
            <iframe class="video_doc" width="1000" height="450" src="<?= $videos->Video_link ?>" title="<?= $video->Titre_video ?>" frameborder="2" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
        </div>
    <?php endforeach ?>
</main>
