<?php require 'inc/header.php'?>
<?php 
    if(!empty($_POST['email_signup']) && !empty($_POST['username_signup']) && !empty($_POST['password1_signup']) && !empty($_POST['password2_signup']) && isset($_POST['submit_signup'])){
        $email = htmlspecialchars($_POST['email_signup']);
        $username = htmlspecialchars($_POST['username_signup']);
        $password1 = htmlspecialchars($_POST['password1_signup']);
        $password2 = htmlspecialchars($_POST['password2_signup']);

        try{
            
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                $sqlMail="SELECT * FROM users WHERE email = '{$email}' ";
                $resultmail = $connect->query($sqlMail);
                $countMail = $resultmail->fetchColumn();
                if (!$countMail) {
                    $sqlUsername = "SELECT * FROM users WHERE username = '{$username}'";
                    $resultUsername = $connect->query($sqlUsername);
                    $countUsername = $resultUsername->fetchColumn();
                    if (!$countUsername) {
                        
                        if ($password1 === $password2) {
                            $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
                            $sth = $connect->prepare("INSERT INTO users (email,username,password) VALUES (:email,:username,:password)");
                            $sth->bindValue(':email', $email);
                            $sth->bindValue(':username', $username);
                            $sth->bindValue(':password', $hashedPassword);
                            $sth->execute();
                            echo "L'utilisateur a bien été enregistré !";
                    
                        } else {
                            echo "Les mots de passe ne sont pas concordants.";
                            unset($_POST);
                        }
                    } else {
                        echo " Ce nom d'utilisateur existe déja";
                        unset($_POST);
                    }
                } else {
                    echo "Un compte existe déja pour cette adresse mail";
                    unset($_POST);
                }
            } else {
                echo "L'adresse email saisie n'est pas valide";
                unset($_POST);
            }
        } catch (PDOException $error) {
            echo 'Error: ' . $error->getMessage();
        }
    }

?>

<section class="body">
            <div class="form-signe">
                    <div class="is-8 is-offset-2 register">
                        <div class="signbloc">
                            <div class="has-text-centered">
                                <img class="img"src="assets/image/home panda.png" width="150px"/>
                                <h1 class="title is-4">Inscrivez-vous</h1>
                                <p class="description">Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>
                                <form  method="POST" action="#">
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
                                        <button class="button is-link is-fullwidth is-rounded" name="submit_signup" type="submit">S'inscrire</button>
                                        <div class="tre"></div>
                                        <p>Déja inscrits ? <a href="login.php">Connectez-vous ici </a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                   
            </div>



</section>