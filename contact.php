<?php

    include 'header.php';
    if (!empty($_POST))
    {
        require_once('config/fonctions.php');
        extract($_POST);
        $erreur = array();

        $nom = strip_tags($nom);
        $email = strip_tags($email);
        $telephone = strip_tags($telephone);
        $message = strip_tags($message);

        if (empty($nom))
        {
            array_push($erreur,'Entrer un nom');

        }
        if (empty($email))
        {
            array_push($erreur,'Entrer un email');
        }
        if (empty($telephone))
        {
            array_push($erreur,'Entrer un numero de telephone');

        }
        if (empty($message))
        {
            array_push($erreur,'Entrer un message');
        }

        if (count($erreur) == 0)
        {
            // AJOUT DU contact DANS LA BSE
            $contacts = addContact($nom, $email, $telephone,$message);
            $sucess = "MERCI DE M'AVOIR CONTACTE";

            //vider les champs du formulaire
            unset($nom);
            unset($email);
            unset($telephone);
            unset($message);
        }
    }

?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <h1>Contacter Moi</h1>
                    <span class="subheading" >Vous avez des questions,j'ai des reponses.</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p style="color: #721c24"><b>Vous voulez entrer en contact? Remplissez le formulaire ci-dessous pour m’envoyer un message et je vous rappellera dès que possible!!!</b></p><br>
                <?php
                if (isset($sucess))
                    echo $sucess;

                if (!empty($erreur)):?>
                <?php foreach ($erreur as $error) ?>
            <p><?= $error ?></p>
            <?php endif; ?>
            <form name="sentMessage" id="contactForm" novalidate method="post">
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Nom</label>
                        <input type="text" class="form-control" placeholder="Nom" id="name" name="nom" value="<?php if (isset($nom)) echo $nom?>">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?php if (isset($email)) echo $email?>">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Telephone</label>
                        <input type="tel" class="form-control" placeholder="Telephone" id="phone" name="telephone" value="<?php if (isset($telephone)) echo $telephone?>">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Message</label>
                        <textarea rows="5" class="form-control" placeholder="Message" id="message" name="message" value="<?php if (isset($message)) echo $message?>"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <button type="submit" class="btn btn-primary" id="sendMessageButton">Soumettre</button>
            </form>
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<?php


include 'footer.php';
?>
