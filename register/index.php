<?php
   require("../includes/config.php");
   
   $errors = array();
   if(isset($_POST['Submit'])) {
       $username = $mysqli->real_escape_string($_POST['username']);
       $email = $mysqli->real_escape_string(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
       $password = $mysqli->real_escape_string($_POST['password']);
       $confirm_password = $mysqli->real_escape_string($_POST['confirmpassword']);
   
       if($email) {
           $stmt = $mysqli->prepare("SELECT * FROM users WHERE email = ?");
           $stmt->bind_param("s", $email);
           $stmt->execute();
           $result = $stmt->get_result();
   
           if($result->num_rows > 0) {
               array_push($errors, "<p class='has-text-danger'>This email is already in use!</p>");
           }
       }
       
       else {
           array_push($errors, "<p class='has-text-danger'>Invalid email!</p>");
       }
   
       if($username) {
           $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
           $stmt->bind_param("s", $username);
           $stmt->execute();
           $result = $stmt->get_result();
   
           if($result->num_rows > 0) {
               array_push($errors, "<p class='has-text-danger'>This username is already in use!</p>");
           }
       }
   
       if(strlen($username) < 3 || strlen($username) > 30) {
           array_push($errors, "<p class='has-text-danger'>Your username should be between 3 and 30 characters!</p>");
       } 
   
       if(strlen($password) < 8 || strlen($password) > 125) {
           array_push($errors, "<p class='has-text-danger'>Your password(s) should be between 8 and 125 characters!</p>");
       } 
   
       if($password != $confirm_password) {
           array_push($errors, "<p class='has-text-danger'>Your password don't match!</p>");
       }
   
       if(preg_match("/[^a-zA-Z0-9]/", $username)) {
           array_push($errors, "<p class='has-text-danger'>Your username must contain English characters!</p>");
       }
   
       if(empty($errors)) {
           $password = password_hash($password, PASSWORD_BCRYPT);
           $id = NULL; 
           $joined = time();
           $lastseen = time();
           
           $stmt = $mysqli->prepare("INSERT INTO users VALUES(?,?,?,?,?,?,?)");
           $description = "Your description can be changed in the settings!";
           $stmt->bind_param("isssiis", $id, $username, $email, $password, $joined, $lastseen, $description);
           $stmt->execute();
           header("Location: ../login/");
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
                                    <input class="input" type="text" name="username" placeholder="Enter a username">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Email Address</label>
                                <div class="control">
                                    <input class="input" type="email" name="email" placeholder="Enter your username">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control">
                                    <input class="input" type="password" name="password" placeholder="Enter a password">
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Confirm Password</label>
                                <div class="control">
                                    <input class="input" type="password" name="confirmpassword"
                                        placeholder="Confirm your password">
                                </div>
                            </div>
                            <div class="field">
                                <p class="has-text-danger">By clicking 'Register' you agree to the <a
                                        href="#terms-of-service">Terms of
                                        Service</a> and <a href="#privacy-policy">Privacy Policy</a> .
                                </p>
                            </div>
                            <div class="field">
                                <button type="submit" class="button is-info" name="Submit">Register</button>
                            </div>
                            <div class="field">
                                <p>Already have an account? <a href="../login/">Login</a></p>
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