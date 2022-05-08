<?php session_start();

/**
 * Function to manage The message displayed in the forum to know when the message has been sended 
 * 
 */
function get_time_ago($time_stamp)
{
    $time_difference = strtotime('now') - $time_stamp;

    if ($time_difference >= 60 * 60 * 24 * 365.242199)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour * 24 hours/day * 365.242199 days/year
         * This means that the time difference is 1 year or more
         */
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 365.242199, 'an');
    }
    elseif ($time_difference >= 60 * 60 * 24 * 30.4368499)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour * 24 hours/day * 30.4368499 days/month
         * This means that the time difference is 1 month or more
         */
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 30.4368499, 'moi');
    }
    elseif ($time_difference >= 60 * 60 * 24 * 7)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour * 24 hours/day * 7 days/week
         * This means that the time difference is 1 week or more
         */
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 7, 'semaine');
    }
    elseif ($time_difference >= 60 * 60 * 24)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour * 24 hours/day
         * This means that the time difference is 1 day or more
         */
        return get_time_ago_string($time_stamp, 60 * 60 * 24, 'jours');
    }
    elseif ($time_difference >= 60 * 60)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour
         * This means that the time difference is 1 hour or more
         */
        return get_time_ago_string($time_stamp, 60 * 60, 'heure');
    }
    else
    {
        /*
         * 60 seconds/minute
         * This means that the time difference is a matter of minutes
         */
        return get_time_ago_string($time_stamp, 60, 'minute');
    }
}

function get_time_ago_string($time_stamp, $divisor, $time_unit)
{
    $time_difference = strtotime("now") - $time_stamp;
    $time_units      = floor($time_difference / $divisor);

    settype($time_units, 'string');

    if ($time_units === '0')
    {
        return 'Moins de 1 ' . $time_unit ;
    }
    elseif ($time_units === '1')
    {
        return 'il y a au moins 1 ' . $time_unit  ;
    }
    else
    {
        /*
         * More than "1" $time_unit. This is the "plural" message.
         */
        // TODO: This pluralizes the time unit, which is done by adding "s" at the end; this will not work for i18n!
        return "Il y a au moins " . $time_units . ' ' . $time_unit . 's ';
    }
}

?>
<main class="container fluid">
<h1 class="mt-2 mb-2"><?= $title ?></h1>
    
    <section class="container">
        <div class="mt-4 row row-cols-1 align-items-center row-cols-sm-2 row-cols-md-4">
            <div class="col-lg">

            <form action="" method="post">
                <select class="custom-select w-50" name="order_by" id="">
                    <option value="DESC">Décroissant</option>
                    <option value="ASC">Croissant</option>
                </select>
                <button class="btn btn-primary" type="submit">Envoyer</button>  
            </form>

        </div>

        <div class="col-lg">
        
            <form action="<?= URL ?>Forum/addPost" method="POST">
                <?php if(empty($_SESSION['pseudo'])):?>
                    <span>Il faut cree un compte pour pouvoir poster</span> 
                <?php else: ?>
                    <button class="btn btn-primary">Ajoutez un sujet de discussion </button>
                <?php endif ?>
            </form>
        </div>

        
        </div>
        
    </section>

    <section class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm mt-2">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Titre</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Message</th>
                            <th scope="col">Dernier Message</th>
                            <th scope="col">Date du Poste</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($post as $value) : ?>
                        
                            <tr>
                                <td style="max-width:250px;"><p class="text-truncate w-50"><?= $value->Titre ?></p></td>
                                <td><p><?= $value->pseudo ?></p></td>
                                <td style="max-width:150px"><p class=" text-truncate"><?= $value->Discussion ?></p></td>
                                <td><p><?= get_time_ago(strtotime($value->Date_post))?></p></td>
                                <td><p><?= $value->Date_post ?></p></td>
                                <td><a class=" d-inline-block text-truncate nav-link" href="<?= URL . 'Forum/ForumSolo/' .$value->Id_forum ?>">Lire la Suite...</a></td>
                            </tr>
                            <?php endforeach ?>
                    </tbody>
                </table>
            </div>

        </div>
    
    </section>
    
</main>
