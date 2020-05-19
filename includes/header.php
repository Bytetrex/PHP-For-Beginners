<?php
// Includes
require_once ($_SERVER['DOCUMENT_ROOT'] . '/includes/config.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/includes/bulma.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>

<nav class='navbar is-spaced has-shadow'>
    <div class='container'>
        <div class='navbar-brand'>
            <a class='navbar-item'>
                <p class='has-text-weight-bold is-size-5'>Website Name</p>
            </a>
            <a role='button' class='navbar-burger burger' aria-label='menu' aria-expanded='false' data-target='navbar'>
                <span aria-hidden='true'></span>
                <span aria-hidden='true'></span>
                <span aria-hidden='true'></span>
            </a>
        </div>
        <div id='navbar' class='navbar-menu'>
            <div class='navbar-start'>
                <a class='navbar-item' href='/'>
                    Home
                </a>
                <a class='navbar-item' href='/users/'>
                    Users
                </a>
                <div class='navbar-item has-dropdown is-hoverable'>
                    <a class='navbar-link'>
                        More
                    </a>
                    <div class='navbar-dropdown'>
                        <a class='navbar-item' href='https://github.com/Bytetrex/PHP-For-Beginners'>
                            <i class='fab fa-github'></i>&nbsp;&nbsp;Github
                        </a>
                    </div>
                </div>
            </div>
            <div class='navbar-end'>
                <?php if( isset($loggedIn) && $loggedIn == true) {
               echo "<a class='navbar-item' href='/user/index.php?username=$user[username]'>
               $user[username]
               </a>";
               }
               else {
               echo "<a class='navbar-item' href='/login/'>
               Login
               </a>
               <div class='navbar-item'>
               <div class='buttons'>
                   <a class='button is-outlined' href='/register/'>
                       <strong><i class='fas fa-user-plus'></i>&nbsp;&nbsp;Register</strong>
                   </a>
               </div>
               </div>";
               }
               ?>
            </div>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
<script/>

<main>
