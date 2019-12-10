<nav class='navbar is-spaced has-shadow'>
    <div class='container'>
        <div class='navbar-brand'>
            <a class='navbar-item'>
                <p class='has-text-weight-bold is-size-5'>o.o</p>
            </a>
            <a role='button' class='navbar-burger burger' aria-label='menu' aria-expanded='false' data-target='navbar'>
                <span aria-hidden='true'></span>
                <span aria-hidden='true'></span>
                <span aria-hidden='true'></span>
            </a>
        </div>
        <div id='navbar' class='navbar-menu'>
            <div class='navbar-start'>
                <a class='navbar-item' href='../dashboard/'>
                    Home
                </a>
                <a class='navbar-item'>
                    Forums
                </a>
                <a class='navbar-item'>
                    Games
                </a>
                <a class='navbar-item'>
                    Catalog
                </a>
                <a class='navbar-item' href='../users/'>
                    Users
                </a>
                <div class='navbar-item has-dropdown is-hoverable'>
                    <a class='navbar-link'>
                        More
                    </a>
                    <div class='navbar-dropdown'>
                        <a class='navbar-item' href='https://github.com/guidofrancis/Sandbox'>
                            <i class='fab fa-github'></i>&nbsp;&nbsp;Github
                        </a>
                    </div>
                </div>
            </div>
            <div class='navbar-end'>
                <?php if( isset($loggedIn) && $loggedIn == true) {
               echo "<a class='navbar-item' href='../user/index.php?username=$user[username]'>
               $user[username]
               </a>";
               }
               else {
               echo "<a class='navbar-item' href='../login/'>
               Login
               </a>
               <div class='navbar-item'>
               <div class='buttons'>
                   <a class='button is-outlined' href='../register/'>
                       <strong><i class='fas fa-user-plus'></i>&nbsp;&nbsp;Join us!</strong>
                   </a>
               </div>
               </div>";
               }
               ?>
            </div>
        </div>
    </div>
</nav>