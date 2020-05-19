<?php
   require($_SERVER['DOCUMENT_ROOT'] . "/includes/header.php");
   
   if (isset($_GET['username'])) {
       $username = $_GET['username'];
       $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
       $stmt->bind_param("s", $username);
       $stmt->execute();
       $result = $stmt->get_result();
       $page = $result->fetch_array();
   }
   
   $Page = new Page($mysqli, $username);
   ?>
<html>

<body>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-5">
                    <p class="is-size-5 has-text-weight-bold"><?php echo $Page->username(); ?></p>
                    <div class="box">
                        <p class="is-size-6 has-text-grey"><?php echo htmlspecialchars($Page->bio()); ?></p>
                    </div>
                    <p class="is-size-5 has-text-weight-bold">About</p>
                    <div class="box">
                        <p>Joined:<span class="is-pulled-right has-text-grey"><?php $Page->joinDate(); ?></span>
                            <p>Lastseen:<span class="is-pulled-right has-text-grey"><?php $Page->lastSeen(); ?></span>
                    </div>
                </div>
                <div class="column">

                </div>
            </div>
        </div>
    </section>
</body>

</html>
