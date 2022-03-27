
<article class="article_container">
    <div class="container_news">
        <div class="container_title_news">
            <h1 class="title-article" ><?= $contenue[0]->Titre ?></h1>
        </div>
        <div class="container_news_container">
        
            <p class="para-article reveal" ><?=  htmlspecialchars_decode($contenue[0]->news) ?></p>
        </div>
       
        <div class="container_date_news">
            <p class="date-article" ><?= $contenue[0]->date_news ?></p>
        </div>

    </div>

</article>