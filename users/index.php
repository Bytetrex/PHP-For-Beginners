<?php
   require("../includes/config.php");
?>
<html>

<body>
    <section class="section">
        <div class="container">
            <div class="columns">
                <?php
                  $stmt = $mysqli->prepare("SELECT * FROM users");
                  $stmt->execute();
                  $result = $stmt->get_result();
                  
                  while($row=$result->fetch_array()) {
                      $description = htmlspecialchars($row['description']);
                      echo "<div class='column is-6'><div class='box'>
                      <p class='is-size-5 has-text-weight-bold'><a href='../user/index.php?username=$row[username]'>$row[username]</a></p>
                      <p class='has-text-grey'>$description</p>
                      </div></div>";
                  }
                  ?>
            </div>
        </div>
    </section>
</body>

</html>