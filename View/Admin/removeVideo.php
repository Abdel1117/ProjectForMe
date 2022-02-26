<div class="back_office_div5">
    <table class='Image_table'>
            <thead>
                <tr>
                    <td>Video Id</td>
                    <td>Video</td>
                    <td>Actions Admin</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($videos as $video) :?>
                    <tr>
                        <td id="table_data_id">
                            <?= $video->Id_video ?>
                        </td>
                        <td id="table_data_video">            
                            <iframe class="video_doc" width="1000" height="450" src="<?= $video->Video_link ?>" title="<?= $video->Titre_video ?>" frameborder="2" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
                        </td>
                        <form action="" method="post">
                        <td id="table_data_video">
                            <button class="btn btn-ban">
                                <a class="link_normal" href="<?= URL."admin/removeVideo/".$video->Id_video ?>">Suprimer la video</a>
                            </button>
                        </td>
                        </form>
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>