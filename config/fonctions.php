<?php

// afficher la liste des aricles
    function getArticles()
    {
            require 'db.php';
            $req = $bd->prepare('select id, title,date FROM article order by id desc ');

            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
            $req->closeCursor(); // libere la connexion
    }
    // recuperer un article par rapport a son id

    function getArticle($id){
        require 'db.php';

        $req = $bd->prepare('select * from article where id = ?');
        $req->execute(array($id));

        // si ya une correspondance entre l'id selectionee
        if ($req->rowCount() == 1){
            $data = $req->fetch(PDO::FETCH_OBJ);
            return $data;
        }
        else{
            header('Location:index.php');
        }
        $req->closeCursor();
    }
//  fonction qui ajoute un commentaire
    function addCommentaire($articleId, $auteur, $commentaire)
    {
        require('db.php');

        $req = $bd->prepare('insert into commentaires(articleId, auteur, commentaire,date) values(?,?,?,NOW())');
        $req->execute(array($articleId, $auteur, $commentaire));
        $req->closeCursor();
    }
    // foncyion qui repere le commentaire d'un article
    function getCommentaire($id)
    {
        require('db.php');

        $req = $bd->prepare('select * from commentaires where articleId =?');
        $req->execute(array($id));
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
        $req->closeCursor();
    }
    // fonction qui ajoute un contact dans la bd

    function addContact($nom, $email, $telephone,$message)
    {
        require('db.php');

        $req = $bd->prepare('insert into contact(nom,email,telephone,message) values(?,?,?,?)');
        $req->execute(array($nom, $email, $telephone,$message));
        $req->closeCursor();
    }

?>
