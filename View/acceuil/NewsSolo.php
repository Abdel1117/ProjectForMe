
<article class="article_container">
    <div class="container_news">
        <div class="container_title_news">
            <h1 class="title-article" ><?= $contenue[0]->Titre ?></h1>
        </div>
        <div class="container_news_container">
        <?= 
            '<img class="image_news" src='. $contenue[0]->image . ' >';
        
        ?>
            <p class="para-article reveal" ><?=  htmlspecialchars_decode($contenue[0]->news) ?></p>
        </div>
        <div class="infos_in_table">
        
      
          <?= 
            '<img class="image_news" src='. $contenue[0]->image2 . ' >';
        
        ?>
          <?= 
            '<img class="image_news" src='. $contenue[0]->image3 . ' >';
        
        ?>
          <?= 
            '<img class="image_news" src='. $contenue[0]->image4 . ' >';
        
        ?>
          <?= 
            '<img class="image_news" src='. $contenue[0]->image5 . ' >';
        
        ?>
           
            </div>
        <div class="container_date_news">
            <p class="date-article" ><?= $contenue[0]->date_news ?></p>
        </div>

    </div>

    </div>
</article>