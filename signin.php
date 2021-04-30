<?php require 'inc/header.php'; ?>
<?php 
    
    $email = $_POST['email_signup'];
    $username =  $_POST['username_signup'];
    $password1 = $_POST['password1_signup'];
    $password2 =  $_POST['password2_signup'];

    try{
                if (filer_var($email, FILTER_VALIDATE_EMAIL)){
                    echo "Etape 1 : Email ok <br>";
                    $sqlMail="SELECT * users WHERE email = '{$email}'";
                    $resultmail = $connect->query($sqlMail);
                    $countMail = $resultmail ->fetchColumn();
                    var_dump($coutMAil)
                }
            }catch (PDOException $error) { 
                echo 'Error' . $error->getMessage();
            }





    // if(!empty($_POST['$email_signup']) && !empty($_POST['username_signup']) && !empty($_POST['password1_signup']) && !empty($_POST['password2_signup']) && isset($_POST['submit_signup'])){
        
    //     $email = htmlspecialchars(['email_signup']);
    //     $username = htmlspecialchars(['username_signup']);
    //     $password1 = htmlspecialchars(['password1_signup']);
    //     $password2 = htmlspecialchars(['password2_signup']);

    //     try{
    //         if (filer_var($email, FILTER_VALIDATE_EMAIL)){
    //             echo "Etape 1 : Email ok <br>";
    //             $sqlMail="SELECT * users WHERE email = '{$email}' ";
    //             $resultmail = $connect->query($sqlMail);
    //             $countMail = $resultmail ->fetchColumn();
                

                

    //         }
    //     }catch (PDOException $error) {
    //         echo 'Error' . $error->getMessage();
    //     }

    // }
 

?>

<section class="body">
            <div class="form-signe">
                    <div class="is-8 is-offset-2 register">
                        <div class="signbloc">
                            <div class="has-text-centered">
                                <img class="img"src="assets/image/home panda.png" width="150px"/>
                                <h1 class="title is-4">Inscrivez-vous</h1>
                                <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
                                <form action="#">
                                    <div class="field">
                                    <div class="control">    
                                        <input class="input-sign" type="email" placeholder="Email" id="InputEmail1" aria-describedby="emailHelp" name="email_signup" required>
                                    </div>
                                    </div>
                                    <div class="field">
                                    <div class="control">
                                        <input class="input-sign" type="usersname" placeholder="Nom d'utilisateur" name="username_signup">
                                    </div>
                                    </div>
                                    <div class="field">
                                    <div class="control">
                                        <input class="input-sign" type="password" placeholder="Password" name="password1_signup" required>
                                    </div>
                                    </div>

                                    <div class="field">
                                    <div class="control">
                                        <input class="input-sign" type="password" placeholder="Entrez votre mot de passe de nouveau" name="password2_signup" required>
                                    </div>
                                    </div>
                                    <div class="tre"></div>
                                    <input type="checkbox" class="form-check-input" id="Check1" required>
                                    <label class="form-check-label" for="Check1">Accepter les <a href="#">termes et conditions</a></label>
                                    <div class="tre"></div>
                                    <button class="button is-link is-fullwidth is-rounded" name="submit_signup">S'inscrire</button>
                                    <div class="tre"></div>
                                    <p>Déja inscrits ? <a href="login.php">Connectez-vous ici </a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                   
            </div>



</section>