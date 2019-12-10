<?php
   require("../includes/config.php");
   
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
                        <p class="is-size-6 has-text-grey"><?php echo htmlspecialchars($Page->description()); ?></p>
                    </div>
                    <p class="is-size-5 has-text-weight-bold">Statistics</p>
                    <div class="box">
                        <p>Joined:<span class="is-pulled-right has-text-grey"><?php $Page->joined(); ?></span>
                            <p>Lastseen:<span class="is-pulled-right has-text-grey"><?php $Page->lastseen(); ?></span>
                    </div>
                </div>
                <div class="column">
                    <p class="is-size-5 has-text-weight-bold">Friends</p>
                    <div class="box">
                            <p class="is-size-6 has-text-grey"><span
                                    class="has-text-weight-bold"><?php echo $page['username']; ?></span> doesn't have
                                any friends!
                            </p>
                    </div>
                    <p class="is-size-5 has-text-weight-bold">Badges</p>
                    <div class="box">
                        <p class="is-size-6 has-text-grey"><span
                                class="has-text-weight-bold"><?php echo $page['username']; ?></span> doesn't have
                            any badges!
                        </p>
                    </div>
                    <p class="is-size-5 has-text-weight-bold">Inventory</p>
                    <div class="box">
                        <p class="is-size-6 has-text-grey"><span
                                class="has-text-weight-bold"><?php echo $page['username']; ?></span> doesn't have
                            any items!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>