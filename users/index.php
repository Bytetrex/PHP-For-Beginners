<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"); ?>

    <section class="section">
        <div class="container">
            <div class="columns is-multiline">
                <?php
                  $stmt = $mysqli->prepare("SELECT * FROM users");
                  $stmt->execute();
                  $result = $stmt->get_result();
                  
                  while($row=$result->fetch_array()) {
                      $bio = htmlspecialchars($row['bio']);
                      echo "<div class='column is-6'><div class='box'>
                      <p class='is-size-5 has-text-weight-bold'><a href='/user/?username=$row[username]'>$row[username]</a></p>
                      <p class='has-text-grey'>$bio</p>
                      </div></div>";
                  }
                  ?>
            </div>
        </div>
    </section>
<?php require_once ($_SERVER['DOCUMENT_ROOT'] . "/includes/footer.php"); ?>
