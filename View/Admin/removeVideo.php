<div class="table-hover table-responsive mb-3">
    <table class='table table-hover'>
            <thead>
                <tr>
                    <th scope="col">Video Id</th>
                    <th scope="col">Video</th>
                    <th scope="col">Actions Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($videos as $video) :?>
                    <tr>
                        <td id="">
                            <?= $video->Id_video ?>
                        </td>
                        <td id="">            
                            <iframe class="" width="250" height="250" src="<?= $video->Video_link ?>" title="<?= $video->Titre_video ?>" frameborder="2" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen ></iframe>
                        </td>
                        <form action="" method="post">
                        <td id="">
                            <button class="align-items-center btn btn-danger">
                                <a class="nav-link" href="<?= URL."admin/removeVideo/".$video->Id_video ?>">Suprimer la video</a>
                            </button>
                        </td>
                        </form>
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>