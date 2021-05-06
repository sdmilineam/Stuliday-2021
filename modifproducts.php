<?php require 'inc/header.php' ?>

<?php

$id = $_GET['id'];

$sqlProduct = "SELECT p.*, u.username, c.categories_name FROM products AS p LEFT JOIN users AS u ON p.author = u.id LEFT JOIN categories AS c ON p.category = c.categories_id WHERE p.products_id = {$id} ";
$product = $connect->query($sqlProduct)->fetch(PDO::FETCH_ASSOC);
?>

<?php

$sqlCategory = 'SELECT * FROM categories';
$categories = $connect->query($sqlCategory)->fetchAll();

if (isset($_POST['product_submit']) && !empty($_POST['product_name']) && !empty($_POST['product_price']) && !empty($_POST['product_description']) && !empty($_POST['product_category'])) {

    $name = strip_tags($_POST['product_name']);
    $description = strip_tags($_POST['product_description']);
    $price = intval(strip_tags($_POST['product_price']));
    $category = strip_tags($_POST['product_category']);
    $user_id = $_SESSION['id'];

    if (is_int($price) && $price > 0) {
        try {
        
            $sth = $connect->prepare("UPDATE products
            SET
            products_name=:products_name,products_description=:products_description,products_price=:products_price, category=:category WHERE products_id = :id");
            $sth->bindValue(':products_name', $name);
            $sth->bindValue(':products_description', $description);
            $sth->bindValue(':products_price', $price);
            $sth->bindValue(':category', $category);
            $sth->bindValue(':id', $id);
            $sth->execute();

            echo "Votre article a bien été modifié";

            header('Location: product.php?id=' . $id);
        } catch (PDOException $error) {
            echo 'Erreur: ' . $error->getMessage();
        }
    }
}
?>
<section id="addproduits">
            <article class="blocadd">    
                      <form class="form"  action="#" method="POST">
                                <div class="field">
                                    <label class="label">Votre Annonce</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Votre Annonce" name="product_name" value=<?php echo $product['products_name']; ?> required>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Prix de Annonce</label>
                                    <div class="control">
                                        <input class="input" type="number" min="1" max="999999" placeholder="Prix de votre article en €" name="product_price" value=<?php echo $product['products_price']; ?> required>
                                    </div>
                                </div>

                                <div class="field">
                                        <label class="label">Catégorie de l'article</label>
                                        <div class="control" >
                                            <select class="subjet"name="product_category" required>
                                            <?php echo $product['category']; ?><?php echo $product['categories_name']; ?>
                                            <?php
                                                     foreach ($categories as $category) {
                                                    ?>
                                                 <option <?php echo $category['categories_id'] === $product['category'] ? 'selected' : ''; ?> value="<?php echo $category['categories_id']; ?>">
                                                     <?php echo $category['categories_name']; ?>
                                                </option>
                                                
                                            <?php
                                                }
                                                ?>
                                            </select>
                                            </div>
                                        </div>
                                </div>
                                <div class="field">
                                    <label class="label">Description de l'article</label>
                                    <div class="control">
                                        <textarea class="textarea" placeholder="Description Vous" name="product_description" required><?php echo $product['products_description']; ?></textarea>
                                    </div>
                                </div>
                                    <button  class=" button is-link" class="engri" type="submit" name="product_submit">Enregistrer l'article</button>
                    </form>
        </article>             

</section>