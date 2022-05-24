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
        
        <?php include 'other scripts\non-member-redirect.php';?>

        <!-- This button will send the data to update the record -->
        <script type="application/javascript">
            "use strict";
            $(document).ready(function(){
                $(".form-container-edit").submit(function(){
                    event.preventDefault();
                    console.log("Update Button Clicked");
                    
                    var firstnameV = document.querySelector('#profile-detail-list-item-firstname-edit').value
                    var lastnameV = document.querySelector('#profile-detail-list-item-lastname-edit').value
                    var addressV = document.querySelector('#profile-detail-list-item-address-edit').value
                    var emailaddressV = document.querySelector('#profile-detail-list-item-emailaddress-edit').value
                    var contactnoV = document.querySelector('#profile-detail-list-item-contactno-edit').value
                    var companynameV = document.querySelector('#profile-detail-list-item-companyname-edit').value
                    var regnoV = document.querySelector('#profile-detail-list-item-regno-edit').value
                    var regterritoryV = document.querySelector('#profile-detail-list-item-regterritory-edit').value

                    $.post("update scripts/update-profile.php", 
                    { 
                        firstName: firstnameV, 
                        lastName: lastnameV, 
                        residentialAddress: addressV, 
                        emailAddress: emailaddressV, 
                        contactNo: contactnoV, 
                        companyName: companynameV, 
                        registrationNo: regnoV, 
                        registrationTerritory: regterritoryV

                    }, function()
                    {
                        $(".submit-text").text("Profile Updated !");
                        location.reload();
                    });
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
                    <a href="profile" class="sidebar-nav__link">
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-nav__item">
                    <a href="apiary" class="sidebar-nav__link">
                        <span>Apiary</span>
                    </a>
                </li>
                <li class="sidebar-nav__item">
                    <a href="hives" class="sidebar-nav__link">
                        <span>Hives</span>
                    </a>
                </li>
                <li class="sidebar-nav__item">
                    <a href="colony" class="sidebar-nav__link">
                        <span>Colony</span>
                    </a>
                </li>
                <li class="sidebar-nav__item">
                    <a href="inspection" class="sidebar-nav__link">
                        <span>Inspections</span>
                    </a>
                </li>
                <li class="sidebar-nav__item">
                    <a href="harvest" class="sidebar-nav__link">
                        <span>Harvest</span>
                    </a>
                </li>
                <li class="sidebar-nav__item">
                    <a href="bookkeeping" class="sidebar-nav__link">
                        <span>Bookkeeping</span>
                    </a>
                </li>
                <li class="sidebar-nav__item">
                    <a href="finances" class="sidebar-nav__link">
                        <span>Finances</span>
                    </a>
                </li>
                <li class="sidebar-nav__item">
                    <a href="batches" class="sidebar-nav__link">
                        <span>Batches</span>
                    </a>
                </li>
                <li class="sidebar-nav__item logOutBtn">
                    <a href="logout" class="sidebar-nav__link">
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <section class="container-body">
            <div class="sub-nav">
                <h1 class="sub-nav-header">Profile</h1>
                <button class="button-harvest-create">Edit Profile</button>
            </div>
            <div class="content profile">
                <img src="img/profile-picture.jpg" class="profile-picture">
                <div class="profile-header-details">
                    <ul class="profile-header-list">
                        <li class="profile-header-list-item">First Name:</li>
                        <li class="profile-header-list-item">Last Name:</li>
                        <li class="profile-header-list-item">Residential Address:</li>
                        <li class="profile-header-list-item">Email Address:</li>
                        <li class="profile-header-list-item">Contact Number:</li>
                        <li class="profile-header-list-item">Company Name:</li>
                        <li class="profile-header-list-item">Registration No.:</li>
                        <li class="profile-header-list-item">Registration Territory:</li>
                    </ul>
                    <ul class="profile-detail-list">
                    </ul>
                </div>
            </div>

            <div class="edit-profile hidden open-window">
                <form class = "form-container-edit">
                    <button type="button" class="close-window">&times;</button>
                    <h3>Edit Profile</h2>
                    <input type="text" id="profile-detail-list-item-firstname-edit" name="profile-detail-list-item-firstname-edit" placeholder="First Name" required>
                    <input type="text" id="profile-detail-list-item-lastname-edit" name="profile-detail-list-item-lastname-edit" placeholder="Last Name" required>
                    <input type="text" id="profile-detail-list-item-address-edit" name="profile-detail-list-item-address-edit" placeholder="Address" required>
                    <input type="text" id="profile-detail-list-item-emailaddress-edit" name="profile-detail-list-item-emailaddress-edit" placeholder="Email Address" required>
                    <input type="text" id="profile-detail-list-item-contactno-edit" name="profile-detail-list-item-contactno-edit" placeholder="Contact Number" required>
                    <input type="text" id="profile-detail-list-item-companyname-edit" name="profile-detail-list-item-companyname-edit" placeholder="Company Name" required>
                    <input type="text" id="profile-detail-list-item-regno-edit" name="profile-detail-list-item-regno-edit" placeholder="Registration Number" required>
                    <input type="text" id="profile-detail-list-item-regterritory-edit" name="profile-detail-list-item-regterritory-edit" placeholder="Registration Territory" required>
                    <input type="submit" class="create-button" value="Update">
                    <div class="submit-text"></div>   
                </form>
            </div>
            <div class="overlay hidden"></div>

            <!-- this script displays a list of apiaries -->
            <script type="application/javascript">
                "use strict";
                    $.ajax('display scripts/display-profile.php',
                    {
                        type: "POST",
                        success: function(data){
                            $(".profile-detail-list").append(data);
                            console.log("Extraction done");
                        }    
                    });
            </script>
            <script src="other scripts\script.js"></script>  
        </section>
    </body>
</html>