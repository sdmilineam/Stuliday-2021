<?php require 'inc/config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    
    <title>Panda E-Bussine</title>
</head>
<body>
    <header class="container is-max-widescreen">
        
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item is-mobile">
                    <img src="assets/image/home panda.png" style="max-height: 60px;">
                </a>
          
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                 </a>
            </div>
          
            <div id="navbarBasicExample" class="navbar-menu">
              <div class="navbar-start">
                <a class="navbar-item" href="index.php">
                    Accueil
                </a>
                <a class="navbar-item" href="Products.php">
                    Annonces
                </a>
                <a class="navbar-item" href="profile.php">
                    Profil
                </a>
                <a class="navbar-item">
                    Conctact
                </a>
            </div>
          
            <div class="navbar-end">
                <div class="navbar-item">
                        <div class="buttons">
                            <a  class="button is-link" href="signin.php">
                            <strong>S'inscrire</strong>
                            </a>
                            <?php
                                if (empty($_SESSION)) {
                                ?>
                                    <a class="button is-link" href="login.php">Se connecter</a>
                                <?php
                                } else {
                                ?>
                                    <a class="nav-link" href="profile.php"></a>
                                    <a class="button is-link" href="?logout">Se déconnecter</a>
                                <?php
                                }
                                ?>
                        </div>
                </div>
            </div>
        </nav>
    </header>
