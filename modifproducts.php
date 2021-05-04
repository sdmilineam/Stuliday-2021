<?php require 'inc/header.php' ?>
<section id="addproduits">
            <article class="blocadd">    
                      <form class="form"  action="#" method="POST">
                                <div class="field">
                                    <label class="label">Votre Annonce</label>
                                    <div class="control">
                                        <input class="input" type="text" placeholder="Votre Annonce" name="product_name" required>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Prix de Annonce</label>
                                    <div class="control">
                                        <input class="input" type="number" min="1" max="999999" placeholder="Prix de votre article en €" name="product_price" required>
                                    </div>
                                </div>

                                <div class="field">
                                        <label class="label">Catégorie de l'article</label>
                                        <div class="control" >
                                            <select class="subjet"name="product_category" required>
                                            <?php
                                                     foreach ($categories as $category) {
                                                    ?>
                                                <option value="<?php echo $category['categories_id']; ?>">
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
                                        <textarea class="textarea" placeholder="Description Vous" name="product_description" required></textarea>
                                    </div>
                                </div>
                                    <button  class=" button is-link" class="engri" type="submit" name="product_submit">Enregistrer l'article</button>
                    </form>
        </article>             

</section>