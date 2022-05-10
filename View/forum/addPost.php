<?php if(isset($err_mode) && $err_mode != false) :?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert">&#10060 </button>

  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
     <?= $err_mode ?>
  </div>
</div>

<?php endif ?>

<main class="forum_send_container">
    <form class="" action="" method="POST">
        <div class="form-group">
            <label for="titre">Le titre de votre sujet</label>
            <input type="text" class="form-control" name="Title_Forum" id="Title_Forum">
            <label for="">Votre sujet</label>
            <textarea name="Text_Forum" class="form-control"   id="text_area_forum" cols="30" rows="20"></textarea>
            <button class=" mt-3 btn btn-primary" type="submit">Envoyer</button>
        </div>
    </form>

</main>