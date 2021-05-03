<?php require 'inc/header.php'; ?>

<section id="addproduits">
            <article class="blocadd">    
                      <form class="form">
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
                                        <label class="label">Subject</label>
                                        <div class="control" >
                                            <select class="subjet">
                                                <option>Select dropdown</option>
                                                <option>With options</option>
                                            </select>
                                            </div>
                                        </div>
                                </div>

                                <div class="field">
                                    <label class="label">Description de l'article</label>
                                    <div class="control">
                                        <textarea class="textarea" placeholder="Description Vous"></textarea>
                                    </div>
                                </div>
                                    <button  class=" button is-link" class="engri" type="submit" name="product_submit">Enregistrer l'article</button>
                    </form>
        </article>             

</section>