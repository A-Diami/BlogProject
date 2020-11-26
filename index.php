<?php
session_start();
      require_once('config/fonctions.php');
        $articles = getArticles();


    include 'header.php';
?>
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Mon Blog</h1>
                    <span class="subheading">APPRENEZ DE NOUVELLES CHOSES CHAQUE JOUR!!!</span>
                </div>
            </div>
        </div>
    </div>
</header>
<body>


  <!-- Main Content -->
  <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
              <div class="post-preview">
                <h1 class="post-title" style="text-decoration: underline; color: #721c24;text-align: center">Articles</h1><br>
                   <?php
                    foreach ($articles as $article): ?>
                      <h2><?= $article->title ?></h2>
                        <time><?= $article->date ?></time>
                        <a href="article.php?id=<?= $article->id ?>">
                            Lire la suite
                        </a>
                    <?php endforeach; ?>

              </div>

          </div>
  </div>
  </div>
  <hr>
</body>


<?php
    include 'footer.php';
?>

