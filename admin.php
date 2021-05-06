<?php require 'inc/header.php' ?>
<?php
 if (!empty($_SESSION)) {
  $admin_id = $_SESSION['id'];
  $sqlAdmin = "SELECT * FROM users WHERE id = '{$admin_id}' AND role = 'ROLE_ADMIN'";
  $resultAdmin = $connect->query($sqlAdmin);
  if ($admin = $resultAdmin->fetch(PDO::FETCH_ASSOC)) {
      $sqlUsers = "SELECT * FROM users WHERE id != '{$admin_id}'";
      $users = $connect->query($sqlUsers)->fetchAll(PDO::FETCH_ASSOC);
?>
        <section class="pgadmin">

        </section>

        <section class="pageadmin" >
                  <table class="table">
                    <thead>
                        <tr>
                            <th><abbr >#id</abbr></th>
                            <th>Username</th>
                            <th><abbr >Email</abbr></th>
                            <th><abbr >Role</abbr></th>
                            <th>Edite</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                foreach ($users as $user) {
                            ?>
                                <tr>
                                    <th><?php echo $user['id'] ?></th>
                                    <td><?php echo $user['username'] ?></td>
                                    <td><?php echo $user['email'] ?></td>
                                    <td><?php echo $user['role'] ?></td>
                                    <td>
                                        <form action="delete.php" method="post">
                                            <input type="hidden" name="csrf_token" value="<?php echo $token;?>">
                                            <input type="hidden" name="id" value="<?php echo $user['id'] ?>"> 
                                            <input type="submit" value="delete" name="delete">
                                        </form>
                                    </td>

                                  </tr>
                            <?php     
                              }
                            ?>       
                        </tbody>
                </table>
          
        </section>


<?php
        }else{
            
            echo "Le Page N'existe pas";
            echo "<a class='button is-link' href='index.php'>Retourner à la page d'accueil</a>";
        }
      }else {
            echo "Le Page N'existe pas";
            echo "<a class='button is-link' href='index.php'>Retourner à la page d'accueil</a>";
        }   
    ?>        