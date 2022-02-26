<main class="main_section_dash_board">
    <h1>Bienvenue <?= $admin[0]->pseudo ?></h1>

    <div class="back_office_div1">
        <button class="btn btn-AddArticle"><a class="link_normal" href="<?=URL. "Admin/addArticle"?>">AddArticle</a></button>
        <button class="btn btn-AddImage"><a class="link_normal" href="<?= URL.'Admin/addImage'?>">AddImage</a></button>
        <button class="btn btn-AddVideo"><a class="link_normal" href="<?= URL.'Admin/addVideo'?>">AddVideo</a></button>
        <button class="btn btn-RemoveVideo"><a class="link_normal" href="<?= URL ?>admin/removeVideo">Gestion videos</a></button>
    </div>
    <div class="back_office_div2">
    <table class="User_table">
<thead>
    <tr>
        <th>Pseudo</th>
        <th>Email</th>
        <th>Age</th>
        <th>Pays</th>
        <th>Role</th>
        <th colspan="3">Action</th>
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
            <td><button class="btn btn-ban"><a class="link_normal" href="<?= URL."Admin/ban/".$user->Id ?>">Ban</a></button></td>
            <td><button class="btn btn-AddAdmin"> <a class="link_normal" href="<?= URL."Admin/addAdmin/".$user->Id ?>">AddAdmin</a></button></td>
            <td><button class="btn btn-removeAdmin"> <a class="link_normal" href="<?= URL."Admin/removeAddmin/".$user->Id ?>">RemoveAdmin</a></button></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>


    </div>
    <div class="back_office_div3">
        <table class='User_table'>
            <thead>
                <tr>
                    <th>Article Id</th>
                    <th>Article Title</th>
                    <th>Article contenue</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article) : ?>
                <tr>
                    <td><?= $article->id ?></td>
                    <td><?= $article->Titre ?></td>
                    <td><?= substr($article->news,0, 50) ?></td>
                    <td><button class="btn btn-AddArticle"><a class="link_normal" href="<?= URL.'/admin/removeArticle/' . $article->id ?>">Remove</a></button></td>
                    <td><button class="btn btn-RemoveVideo"><a class="link_normal" href="<?= URL .'admin/ChangeArticle/'.$article->id ?>">Modifer</a></button></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="back_office_div4">
        <table class='Image_table'>
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
                        <td id="table_data_image"><img src="<?= $image->image?>" alt=""></td>
                        <td id="table_data_image"><a class="link_admin_dash_board" href="<?= URL. 'Admin/removeImage/'.$image->id ?>">Suprimer l'image</a></td>
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div></div>
</main>