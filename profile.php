<?php require 'inc/header.php'; ?>
<?php   

    
if (!empty($_SESSION)) {
    $user_id = $_SESSION['id'];
    $sqlUser = "SELECT * FROM users WHERE id = '{$user_id}'";
    $resultUser = $connect->query($sqlUser);
    if ($user = $resultUser->fetch(PDO::FETCH_ASSOC)) {
?>
<section class="profile">
            <div class="child-profil">
                    <div class="shop-profil">
                        <div class="img-profil">
                            <img src="assets/image/coffee-shop.jpg" alt="">
                        </div>
                        <div class="text">
                            <h2 class="titre">Bienvenue <?php echo $user['username']; ?></h2>
                            <p class="p">Vous possédez le <?php echo $user['role']; ?> </p>
                        </div>
                    </div>   
                    <div class="buton">
                        <button class="button is-medium is-link is-outline" data-toggle="modal" data-target="#exampleModal"><a class="bt" href="produits.php">Voir mes annonce</a></button>
                        <button class="button is-medium is-link is-outline"><a class="bt" href="addproduits.php">Ajout votre annonce</a></button>
                        <?php
                            if ($user['role'] === 'ROLE_ADMIN') {
                                echo '<a href="admin.php" class="btn btn-success my-2"> Accéder à l\'espace administrateur </a>';
                            }
                        ?>    
                    </div>
            </div>    
</section>
                    <?php
                            } else {
                                    echo " Erreur de connexion, veuillez vous reconnecter";
                                    session_destroy();
                                }
                            } else{
                    ?>
                    <section id="Anno" class="px-3">
                          <div class="blocprofil">     
                                <p class="lead">Vous ne pouvez pas accéder à votre profil sans vous connecter</p>
                                    <a href="login.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Se connecter</a>
                                </p>
                            </div>       
                    </section>
                    <?php }?>