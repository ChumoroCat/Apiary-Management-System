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

        <!-- this script will send create-colony data to the database -->
        <script type="application/javascript">
            "use strict";
                $(document).ready(function(){
                    $(".form-container").submit(function(){
                        event.preventDefault();
                        console.log("Button Clicked");

                        var hiveIDV = document.querySelector('#hive-name').value;
                        var descriptionV = document.querySelector('#colony-description').value;
                        var compositionV = document.querySelector('#colony-composition').value;

                        $.post("insert scripts/insert-colony.php", 
                        { 
                            hiveID: hiveIDV,
                            description: descriptionV,
                            composition: compositionV

                        },function()
                        {
                            console.log("record added");
                            location.reload();
                            document.querySelector(".form-container").reset();
                        $(".submit-text").text("Colony Created !");
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
                <h1 class="sub-nav-header">Colony</h1>
                <div class="button">
                    <button class="button-harvest-create">Create</button>
                    <button class="button-harvest-download" onclick="location.href='download scripts/download-colony'" >
                        <svg class="fill-current" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                        <span>Download</span>
                    </button>
                </div>
            </div>
            <div class="content colony">
                <div class="colony-record">
                    <h3 class="colony-record-header">Colonies</h3>
                    <div class="colony-record-heading">
                        <p class="colony-record-heading-hive">Hive</p>
                        <p class="colony-record-heading-description">Description</p>
                        <p class="colony-record-heading-composition">Composition</p>                        
                        <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </p>                    
                    </div>
                </div>

                <div class="create-colony hidden open-window">
                    <form class = "form-container">
                        <button type="button" class="close-window">&times;</button>
                        <h3>Create a Colony</h2>

                        <select id="hive-name" name="hive-name">
                        <?php include 'display scripts\display-hive-name.php';?>
                        </select>

                        <input type="text" id="colony-description" name="colony-description" placeholder="Description" required>
                        <input type="text" id="colony-composition" name="colony-composition" placeholder="Composition" required>
                        <input type="submit" class="create-button" value="Create">
                        <div class="submit-text"></div>   
                    </form> 
                </div>
 
                <div class="create-colony hidden open-window-edit">
                    <form class = "form-container-edit">
                        <button type="button" class="close-window">&times;</button>
                        <h3>Edit this Colony</h2>
                        
                        <select id="hive-name-edit" name="hive-name-edit">
                        <?php include 'display scripts\display-hive-name.php';?>
                        </select>

                        <input type="text" id="colony-description-edit" name="colony-description" placeholder="Description" required>
                        <input type="text" id="colony-composition-edit" name="colony-composition" placeholder="Composition" required>
                        <input type="submit" class="update-button" value="Update">
                        <div class="submit-text"></div>   
                    </form> 
                </div>
                <div class="overlay hidden"></div>
                <script src="other scripts\script.js"></script>  

                <!-- this script displays a list of colonies -->
                <script type="application/javascript">
                    "use strict";
                        $(document).ready(function(){
                            $.ajax('display scripts/display-colony.php',
                            {
                                type: "POST",
                                success: function(data){
                                    $(".colony-record").append(data);
                                }    
                            });
                        });
                </script>
            </div>
        </section>
    </body>
</html>