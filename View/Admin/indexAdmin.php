<main class="d-grid gap-5">
    <h1 class="title_page">Bienvenue <?= $admin[0]->pseudo ?></h1>

    <div class="back_office_div1 mb-3">
        <a class="btn btn-primary" href="<?=URL. "Admin/addArticle"?>">AddArticle</a>
        <a class="btn btn-success" href="<?= URL.'Admin/addImage'?>">AddImage</a>
        <a class="btn btn-info" href="<?= URL.'Admin/addVideo'?>">AddVideo</a>
        <a class="btn btn-warning" href="<?= URL ?>admin/removeVideo">Gestion videos</a>
    </div>
    <div class=" table-hover table-responsive mb-3">
    <table class="table table-hover">
<thead>
    <tr>
        <th scope="col">Pseudo</th>
        <th scope="col">Email</th>
        <th scope="col">Age</th>
        <th scope="col">Pays</th>
        <th scope="col">Role</th>
        <th scope="col" colspan="3">Action</th>
    </tr>
</thead>
    <tbody>
        <?php foreach ($users as  $user): ?>
        <tr>
            <td><?= $user->pseudo?></td>
            <td><?= $user->email?></td>
            <td><?= $user->Age?></td>
            <td><?= $user->Country?></td>
            <td><?= ucfirst($user->role)?></td>
            <td><a class="btn btn-danger" href="<?= URL."Admin/ban/".$user->Id ?>">Ban</a></td>
            <td><a class="btn btn-success" href="<?= URL."Admin/addAdmin/".$user->Id ?>">AddAdmin</a></td>
            <td><a class="btn btn-warning" href="<?= URL."Admin/removeAddmin/".$user->Id ?>">RemoveAdmin</a></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>


    </div>
    <div class="table-responsive w-75 mb-3">
        <table class='table table-hover'>
            <thead>
                <tr>
                    <th scope="col">Article Id</th>
                    <th scope="col">Article Title</th>
                    <th scope="col">Article contenue</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                <tr>
                    <td><?= $article->id ?></td>
                    <td><?= $article->Titre ?></td>
                    <td><?= substr($article->news,0, 50) ?></td>
                    <td><a class="btn btn-danger" href="<?= URL.'/admin/removeArticle/' . $article->id ?>">Remove</a></td>
                    <td><a class="btn btn-warning" href="<?= URL .'admin/ChangeArticle/'.$article->id ?>">Modifer</a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="table table-hover w-50 mb-3">
        <table class='table table-hover'>
            <thead>
                <tr>
                    <td>Image_Id</td>
                    <td>Image</td>
                    <td>Actions Admin</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $image) :?>
                    <tr>
                        <td id="table_data_id">
                            <?= $image->id ?>
                        </td>
                        <td id="table_data_image"><img style="width:100px; height:auto"" src="<?= $image->image?>" alt=""></td>
                        <td id="table_data_image"><a class="btn btn-danger" href="<?= URL. 'Admin/removeImage/'.$image->id ?>">Suprimer l'image</a></td>
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div></div>
</main>