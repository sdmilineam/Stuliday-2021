<?php require 'inc/header.php'?>
<?php


$id = $_GET['id'];
$sqlProduct = "SELECT p.*, u.username, c.categories_name FROM products AS p LEFT JOIN users AS u ON p.author = u.id LEFT JOIN categories AS c ON p.category = c.categories_id WHERE p.products_id = {$id} ";
$product = $connect->query($sqlProduct)->fetch(PDO::FETCH_ASSOC);
?>

    <section id="afiche">
        <div class="ss-afiche">
            <div class="blo">
                <img  class="mg" src="assets/image/chair.jpg" alt="">
            </div>
            <div class="blo1">
                    <div class="affiche">
                        <h1><?php echo $product['products_name']; ?></h4>
                        <br>
                        <p class="lattre">Vendu par : <?php echo $product['username']; ?>
                        <p class="lattre"><?php echo $product['categories_name']; ?></p>
                        <p class="lattre">Annonce publiée le : <?php echo $product['created_at']; ?>
                        <br>
                        <br>
                        <p>Le Prix : </p>
                        <button class="button is-link"><?php echo $product['products_price'];?>€</button>
                        
                      
                    </div>
            </div>
        
        </div>
        <div class="decr">

            <p>Description : <?php echo $product['products_description']; ?></p>
        </div>

    </section>