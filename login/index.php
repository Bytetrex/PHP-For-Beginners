<?php
   require("../includes/config.php");
   
   $errors = array();
   if(isset($_POST['Submit'])) {
       $username = $mysqli->real_escape_string($_POST['username']);
       $password = $mysqli->real_escape_string($_POST['password']);
   
       $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
       $stmt->bind_param("s", $username);
       $stmt->execute();
       $result = $stmt->get_result();
   
       if($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {
               $psw = $row['password'];
               if(password_verify($password, $psw)) {
                    $id = $row['id'];
                    $_SESSION['id'] = $id;
                    header("Location: ../dashboard/");
               }
               else {
                   array_push($errors, "<p class='has-text-danger'>Incorrect password!</p>");
               }
           }
       }
       else {
           array_push($errors, "<p class='has-text-danger'>The username you have entered does not exist!</p>");
       }
   }
   ?>
<html>

<body>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-3">
                </div>
                <div class="column">
                    <?php
                     foreach($errors as $error) {
                         echo "<div class='is-size-7 box'>$error</div>";
                     }
                     ?>
                    <div class="box">
                        <form method="post" action="index.php">
                            <div class="field">
                                <label class="label">Username</label>
                                <div class="control">
                                    <input class="input" type="text" name="username" placeholder="Enter your username">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control">
                                    <input class="input" type="password" name="password"
                                        placeholder="Enter your password">
                                </div>
                            </div>
                            <div class="field">
                                <button type="submit" class="button is-info" name="Submit">Login</button>
                            </div>
                            <div class="field">
                                <p>Need an account? <a href="../register/">Create one!</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="column is-3">
                </div>
            </div>
        </div>
    </section>
</body>

</html>