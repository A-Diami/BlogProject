<?php
session_start();
include 'header.php';
     if (!isset($_GET['id'])  OR !is_numeric($_GET['id'])){
        header('Location:index.php');

     }
     else{
         require_once ('config/fonctions.php');

         extract($_GET);
         $id = strip_tags($id); // suppression de html

         if (!empty($_POST))
         {

             extract($_POST);
             $erreur = array();

             $auteur = strip_tags($auteur);
             $commentaire = strip_tags($commentaire);

             if (empty($auteur))
             {
                 array_push($erreur,'Entrer un pseudo');

             }
             if (empty($commentaire))
             {
                 array_push($erreur,'Entrer un commentaire');
             }
             // si ya pas d'erreur
             if (count($erreur) == 0){
                 // AJOUT DU COMMENTAIRE DANS LA BSE
                 $commentaire = addCommentaire($id,$auteur,$commentaire);
                 $sucess = 'VOTRE COMMENTAIRE A ETE AJOUTEE';

                 //vider les champs du formulaire
                 unset($auteur);
                 unset($commentaire);
             }
         }

         $article = getArticle($id);
         $commentaire = getCommentaire($id);


     }


?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1 class="post-title"><?= $article->title ?></h1>
                    <time><?= $article->date ?></time>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <h1 class="post-title"><?= $article->title ?></h1>
                <p><?= $article->contenu ?></p>
                <time><?= $article->date ?></time>
                <hr/>
                <?php
                    if (isset($sucess))
                        echo $sucess;

                    if (!empty($erreur)):?>
                    <?php foreach ($erreur as $error) ?>
                            <p><?= $error ?></p>
                <?php endif; ?>

                <form action="article.php?id=<?= $article->id ?>" method="post">
                    <label for="auteur">Pseudo</label><br>
                    <input type="text" name="auteur" id="auteur" value="<?php if (isset($auteur)) echo $auteur?>"><br>
                    <label for="commentaire">Commentaire</label><br>
                    <textarea name="commentaire" id="commentaire" cols="30" rows="5" value="<?php if (isset($commentaire)) echo $commentaire?>"></textarea>
                    <br>
                    <button type="submit">Envoyer</button>
                </form><br>
                <h2 style="color: #721c24; text-decoration: underline">Commentaires</h2>
                <?php foreach ($commentaire as $comments):?>
                    <h3><?= $comments->auteur ?></h3>
                    <p><?= $comments->commentaire ?></p>
                     <time><?= $comments->date ?></time>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</article>

<hr>

<!-- Footer -->
<?php


include 'footer.php';
?>

