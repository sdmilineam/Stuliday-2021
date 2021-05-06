<?php require 'inc/header.php' ?>
<?php  

    $alert = false;

    if (!empty($_POST['email_login']) && !empty($_POST['password_login']) && isset($_POST['submit_login'])) {
      $email = htmlspecialchars($_POST['email_login']);
      $password = htmlspecialchars($_POST['password_login']);
          try{
            $sqlMail = "SELECT * FROM users WHERE email = '{$email}'";
            $resultMail = $connect->query($sqlMail);
            $user = $resultMail->fetch(PDO::FETCH_ASSOC);
            // var_dump($user);
            if ($user) {
                $dbpassword = $user['password'];
                if (password_verify($password, $dbpassword)) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['username'] = $user['username'];
    
                    $alert = true;
                    $type = 'success';
                    $message = "Vous êtes désormais connectés";
                    unset($_POST);
                    header('Location: profile.php');
                } else {
                    $alert = true;
                    $type = 'danger';
                    $message = "Le mot de passe est erroné";
                    unset($_POST);
                }
            } else {
                $alert = true;
                $type = 'warning';
                $message = "Ce compte n'existe pas";
                unset($_POST);
            }
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
        }
    }





?> 
<section class="wite">
    <p></p>
</section>
<section class="login">
<div class="hero-body has-text-centered">
        <div class="login">
          <img class="imge" src="assets/image/home panda.png" width="205px" />
          <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
          <form action="#" method="POST">
            <div class="field">
              <div class="control">
                <input class="input is-medium is-rounded" class="bgn" type="email" placeholder="bonjour@example.com"  name="email_login" required />
              </div>
            </div>
            <div class="field">
              <div class="control">
                <input class="input is-medium is-rounded" class="bgn" type="password" placeholder="**********"  name="password_login" required />
              </div>
            </div>
            <br />
            <button class="button is-block is-fullwidth is-link is-medium is-rounded" type="submit" name="submit_login">
              Se connecter
            </button>
          </form>
          <br>
          <nav class="level">
            <div class="level-item has-text-centered">
              <div>
                <p>Vous ne possédez pas de compte ?</p>  
                <a href="signin.php">Inscrivez-vous ici</a>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </section>
  </body>

