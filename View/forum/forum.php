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
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 7, 'semaines');
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
<main class="forum_container">
<h1 class="title_page"><?= $title ?></h1>

    <section class="option-nav">
        <div class="order-by">
            <label for="order_choice">Triée Par Ordre</label>

            <form action="" method="post">
                <select name="order_by" id="order_choice">
                    <option value="DESC">Décroissant</option>
                    <option value="ASC">Croissant</option>
                </select>
                <button type="submit">Envoyer</button>  
            </form>

        </div>

        <div class="addPost">
        
            <form action="<?= URL ?>Forum/addPost" method="POST">
                <?php if(empty($_SESSION['pseudo'])):?>
                    <span>Il faut cree un compte pour pouvoir poster</span> 
                <?php else: ?>
                    <button class="subject_button">ADD subject</button>
                <?php endif ?>
            </form>
        </div>

        <div class="search">
            <form method="POST" action="<?= URL ?>Forum/search">
                <placeholder>Rechercher </placeholder>
                <input name="recherche" type="text">
                <button id="search_button" class="search_button" type="submit">Recherche</button>
            </form>
        </div>
    </section>

    <section class="forum_section">
        <div class="discussion_section">
            
            <span><h3 class="forum_title"><strong><?= $title ?></strong></h3></span>
            <section class="forum_index">
                    <div class="title_post">
                        <span><p>Titre</p></span>
                    </div>
                    <div class="posted_by">
                        <span><p>Auteur</p></span>
                    </div>
                    <div class="lastmessage">
                        <span><p>Derniere message</p></span>
                    </div>
                    <div class="datepost">
                        <span><p>Date du poste</p></span>
                    </div>
                </section>

                
                <?php foreach ($post as $value) : ?>
                    <section class="display_data">
                        <div class="Title_data">
                            <span><a class="title_data_info" href="<?= URL. "Forum/ForumSolo/" . $value->Id_forum ?>"><?= $value->Titre ?></a></span>
                        </div>
                    
                    <div class="Auteur_data">
                        <span><p><?= $value->pseudo ?></p></span>
                    </div>
                    <div class="last_message_data">
                        <span><p><?=
                                get_time_ago(strtotime($value->Date_post))
                        ?></p></span>
                    </div>
                    
                    <div class="date_data">
                        <p><?= $value->Date_post ?></p>              
                    </div>
                </section>

            <?php endforeach ?>

        </div>
        
        <aside class="hot_today">
            <?php 
            foreach ($hot_today as $value) : ?>
                <div class="hot-today-block">
                    <span><a href="<?= URL.'Forum/ForumSolo/'.$value->Id_forum ?>"><?= $value->Titre ?></a></span>
                    <p><?= substr($value->Discussion,0,25) ?></p>
                </div>
            <?php endforeach ?>
        </aside>
    </section>

</main>
<?php echo '<pre>' , var_dump($interval) , '</pre>'; ?>
