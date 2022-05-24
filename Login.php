<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=ZCOOL+XiaoWei&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" type="image/png" href="img/favicon.png">
        
        <title>Apiary Management System v2</title>
    </head>
    <body class="container">
        <div class="sidebar">
            <div class="logo">
                <svg class="logo-icon">
                    <image xlink:href="img/bee.svg"></image>
                </svg>
                AMS v2
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-nav__item">
                    <a href="index" class="sidebar-nav__link">
                        <span>Search Honey Info</span>
                    </a>
                </li>
                <li class="sidebar-nav__item">
                    <a href="Register" class="sidebar-nav__link">
                        <span>Apiarist Registration</span>
                    </a>
                </li>
                <li class="sidebar-nav__item">
                    <a href="Login" class="sidebar-nav__link">
                        <span>Apiarist Login</span>
                    </a>
                </li>
            </ul>
        </div>

        <section class="container-body">
            <div class="sub-nav">
                <h1 class="sub-nav-header">Apiarist Login Page</h1>
            </div>
            <div class="content apiarist-login">
                <h2 class="apiarist-login-welcome-message">Welcome! Please Log In Below</h2>
                <form class = "form-container" action="other scripts/authenticate-login.php" method="post" > 
                    <input type="text" id="username" name="username" placeholder="Username" autocomplete="off" autofocus required>               
                    <input type="password" id="password" name="password" placeholder="Password" autocomplete="off" required>
                    <input type="submit" class="login-button" value="Submit">
                </form>
                <div id="login-error"></div>  

            </div>
        </section>
        <script type="application/javascript">
            "use strict";
            $(document).ready(function(){
                const urlParams = new URLSearchParams(window.location.search);
                const login = urlParams.get('login');
                
                if (login == "failed") {
                    document.querySelector('#login-error').innerHTML = "Failed to Login. Please check your username/password";
                }
            });
        </script>

    </body>
</html>