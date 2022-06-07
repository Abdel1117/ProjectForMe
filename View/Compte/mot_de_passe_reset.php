<?php use Hp\SpaceExplorer\UImessage ?>



<?= UImessage::message_To_Send();?>
<fieldset class="form-group">
    <form action="" method="POST">
        <div class="col">
            <label id="password_first" for="password_reset">Votre nouveau mot de passe</label>
            <input id="password_first" type="password" name="passwordChanged">
        </div>

        <div class="col">
            <label id="second_password" for="secondPassword">Retapez votre mot de passe</label>
            <input id="second_password" type="password" name="secondPassword">
        </div>

        <input type="submit" value="Envoyer">
    </form>
</fieldset>
