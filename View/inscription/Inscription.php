<?php require("Models/SPL_autoload.php"); ?>

    
<main id="main_form" class="main_form">

    <h1>Inscription</h1>
        <form action="" method="post">
            <fieldset class="fieldset_form">
                <h1 class="title_form">Register</h1>
                <label for="">Pseudo</label><input name="user_Name" type="text" required="true" maxlength="32">

                <label for="">Email</label><input name="email" type="email" required="true" maxlength="32"
                    autocomplete="false">

                <label for="">Age</label><input name="age" type="number" required="true" maxlength="3">

                <label for="">Mot de passe</label><input name="password" type="password" required="true" maxlength="32">

                <label for="">Pays</label><input name="country" type="text" required="true" maxlength="32">

                <div>
                    <input value="Envoyer" type="submit">
                </div>
            </fieldset>

        </form>
</main>