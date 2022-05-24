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

        <script type="application/javascript">
            "use strict";
        function checkUsername(){
            var usernameV = document.querySelector('#username').value;
            // $(".error-text-username").html("Hello <b>world</b>!");

            $.post("display scripts/display-username.php", 
            { 
                userName: usernameV
            }, function(data){
                $(".error-text-username").html(data);
            });
        }
        </script>

        <script type="application/javascript">
            "use strict";
                $(document).ready(function(){
                    $(".form-container").submit(function(){
                        event.preventDefault();
                        console.log("Button Clicked");

                        var firstnameV = document.querySelector('#firstname').value;
                        var lastnameV = document.querySelector('#lastname').value;
                        var addressV = document.querySelector('#address').value;
                        var contactV = document.querySelector('#contact').value;
                        var emailV = document.querySelector('#email').value;
                        var companynameV = document.querySelector('#companyname').value;
                        var regnoV = document.querySelector('#regno').value;
                        var regterritoryV = document.querySelector('#regterritory').value;
                        var usernameV = document.querySelector('#username').value;
                        var usernameError = document.querySelector('.error-text-username').innerHTML;
                        var passwordV = document.querySelector('#password').value;
                        var repeatpasswordV = document.querySelector('#repeat-password').value;
                        var errortext = document.querySelector(".error-text-regno");
                        var redirecttext = document.querySelector(".redirect-text");

                        if (regnoV.length != 9)
                        {
                            $(".error-text-regno").text("Registration Number needs to be 9 digits !");
                            errortext.scrollIntoView(false);
                        } else {
                            $(".error-text-regno").text("");
                        }
                        
                        if (repeatpasswordV != passwordV) {
                            $(".error-text-repeat-password").text("Passwords dont match!");
                        } else {
                            $(".error-text-repeat-password").text("");
                        }
                        
                        if (regnoV.length == 9 && repeatpasswordV == passwordV && usernameError == ""){
                            $.post("insert scripts/insert-apiarist.php", 
                            { 
                                firstName: firstnameV, 
                                lastName: lastnameV, 
                                residentialAddress: addressV, 
                                contactNo: contactV, 
                                emailAddress: emailV,
                                companyName: companynameV, 
                                registrationNo: regnoV, 
                                registrationTerritory: regterritoryV, 
                                userName: usernameV, 
                                password: passwordV, 
                            }, function(){
                                setTimeout(function(){ window.location = "login"; },5000);
                                $(".error-text-regno, .error-text-repeat-password").text("");
                                document.querySelector(".form-container").reset();
                                $(".submit-text").text("Account Created !");
                                $(".redirect-text").text("You will be redirected to the login page in 5 seconds.."); 
                                redirecttext.scrollIntoView(false);
                            });
                        }
                    });
                });
        </script>
    
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
                <h1 class="sub-nav-header">Registration Page</h1>
            </div>
            <div class="content apiarist-login">
                <h2 class="apiarist-login-welcome-message">Welcome! Please Register Below</h2>
                <form class = "form-container" > 
                    <input type="text" id="firstname" name="firstname" placeholder="First Name" required autofocus>            
                    <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>            
                    <input type="text" id="address" name="address" placeholder="Address" required>           
                    <input type="number" id="contact" name="contact" placeholder="Contact Number" required>  
                    <input type="email" id="email" name="email" placeholder="Email Address" required> 
                    <input type="text" id="companyname" name="companyname" placeholder="Company Name" required>     
                    <input type="number" id="regno" name="regno" placeholder="Registration No" maxlength="9" minlength="9"required>
                    <div class="error-text-regno"></div>                
                    <input type="text" id="regterritory" name="regterritory" placeholder="Registration Territory" required>
                    <input type="text" id="username" name="username" placeholder="Username" pattern=".{6,}" title="Six or more characters" oninput="checkUsername()" autocomplete="off" required >               
                    <div class="error-text-username"></div>
                    <input type="password" id="password" name="password" placeholder="Password" pattern=".{8,}" title="Eight or more characters" autocomplete="off" required> 
                    <input type="password" id="repeat-password" name="repeat-password" placeholder="Repeat Password" autocomplete="off" required>               
                    <div class="error-text-repeat-password"></div>
                    <input type="submit" class="create-button" value="Create"> 
                    <div class="submit-text"></div>
                    <div class="redirect-text"></div>
                </form>
            </div>

        </section>
    </body>
</html>