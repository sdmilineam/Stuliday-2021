<?php require 'inc/header.php'?>
<?php
  $sqlProducts = "SELECT p.*, u.username, c.categories_name FROM products AS p LEFT JOIN users AS u ON p.author = u.id LEFT JOIN categories AS c ON p.category = c.categories_id";
  $products = $connect->query($sqlProducts)->fetchAll(PDO::FETCH_ASSOC);
?>
    <section id="search-section" class="slider">
          <div class="container box-shadow">
                <div class="column is-10 is-offset-1">
                      <h1 class="title has-text-centered">Search Your Tours</h1>
                      <div class="field is-horizontal">
                          <div class="control"><input class="input" type="text" placeholder="Destinations"></div>
                          <div class="control"><input class="input" type="text" placeholder="mm/dd/yyyy"></div>
                          <div class="control"><input class="input" type="text" placeholder="mm/dd/yyyy"></div>
                          <div class="control"><input class="input" type="text" placeholder="$1000 - $3000"></div>
                          <div class="control"><button class="button is-primary">Search</button></div>
                      </div>
                </div>
          </div>
    </section>  
    
    
  <section class="is-flex is-flex-wrap-wrap">
          <?php
              foreach ($products as $product) {
          ?>    
          <div class="column is-4"> 
                  <div class="card is-shady">
                    <div class="card-image">
                      <figure class="image is-4by3">
                        <img src="https://source.unsplash.com/RWnpyGtY1aU" alt="Placeholder image">
                      </figure>
                    </div>
                    <div class="card-content">
                      <div class="content">
                        <h4><?php echo $product['products_name']; ?></h4>
                        <p><?php echo $product['products_description']; ?></p>
                        <p><?php echo $product['products_price'];?>€</p>
                        <p><?php echo $product['categories_name']; ?></p>
                        <p><?php echo $product['created_at']; ?></p>
                      </div>
                      <a  class="button is-link column is-11" href="product.php?id=<?php echo $product['products_id']; ?>">Afficher article<a>
                      <div>
                        <a class="button is-link is-6">supprimer</a>
                        <a href="modifproducts.php?id=<?php echo $product['products_id']; ?>" class="button is-link is-6">modifier</a>
                      </div>
                    </div>
                  </div> 
          </div>
           <?php     
          }
        ?>      
  </section>