<?php use Hp\SpaceExplorer\UImessage; ?>

<main class="d-grid gap-5">
    <h1 class="title_page">Bienvenue <?= $_SESSION['pseudo'] ?></h1>
    <?php if(isset($err_mode) && $err_mode != false) : ?>
        <div class="alert alert-danger" role="alert">
            <p><?= $err_mode ?></p>
        </div>
        
    <?php elseif (isset($succes) && $succes != false) : ?>
        <div class="alert alert-succes" role="alert">
            <p><?= $succes ?> </p>
        </div>
    <?php endif ?>

<?php UImessage::message_To_Send() ?>
    <div class="back_office_div1 mb-3">
        <a class="btn btn-primary" href="<?=URL. "Admin/addArticle"?>">AddArticle</a>
        <a class="btn btn-success" href="<?= URL.'Admin/addImage'?>">AddImage</a>
        <a class="btn btn-info" href="<?= URL.'Admin/addVideo'?>">AddVideo</a>
        <a class="btn btn-warning" href="<?= URL ?>admin/removeVideo">Gestion videos</a>
    </div>
    <div class=" table-hover table-responsive mb-3">
    <table class="table table-hover">
<?php if($_SESSION['role'] === "superAdmin") : ?>
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
            <td><?= $user->pseudo ?></td>
            <td><?= $user->email?></td>
            <td><?= $user->Age?></td>
            <td><?= $user->Country?></td>
            <td><?= ucfirst($user->role)?></td>
            <td>
            <a class="btn btn-danger h6" onClick="confirmAlert('Voulez vous vraiment bannir <?= $user->pseudo ?>','<?= URL  . 'admin/ban/' ?>','<?= $user->Id ?>')">Bannir </a></td>

            <td>
            <a class="btn btn-success" onClick="confirmAlert('Voulez vous vraiment rajouter les droits d\'admin à <?= $user->pseudo ?>','<?= URL . 'admin/addAdmin/' ?>','<?= $user->Id ?>')">Ajoutez Admin</a></td>

            <td>
            <a class="btn btn-warning " onClick="confirmAlert('Voulez vous vraiment retiré les droit d\'admin à <?= $user->pseudo ?>','<?= URL . 'admin/removeAdmin/' ?>','<?= $user->Id ?>')" >Supprimer Admin</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php endif ?>

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
                    <?php if($_SESSION["role"] === "superAdmin") : ?>

                        <td><a class="btn btn-danger" onClick="confirmAlert('Voulez vous vraiment supprimé l\'article sur <?= $article->Titre ?>','<?= URL . 'admin/removeArticle/'?>' , '<?= $article->id ?>')" >Supprimez l'article</a></td>

                    <?php endif ?>
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
                        <td id="table_data_image"><img style="width:100px; height:auto"" src="<?= $image->image?>" alt="image Space explorer"></td>
                        <?php if($_SESSION["role"] === "superAdmin") : ?>
                            <td id="table_data_image"><a class="btn btn-danger" onClick="confirmAlert('Voulez vous vraiment supprimer l\'image ?','<?= URL. 'Admin/removeImage/'?>' , '<?= $image->id ?>')">Suprimer l'image</a></td>
                        <?php endif ?>
                    </tr>
                    <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div></div>
</main>