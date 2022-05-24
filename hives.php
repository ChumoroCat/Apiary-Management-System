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

        <!-- this script will send create-hive data to the database -->
        <script type="application/javascript">
            "use strict";
                $(document).ready(function(){
                    $(".form-container").submit(function(){
                        event.preventDefault();
                        console.log("Button Clicked");

                        var apiaryIDV = document.querySelector('#apiary-name').value;
                        var typeV = document.querySelector('#hive-type').value;
                        var nooframesV = document.querySelector('#hive-noofframes').value;
                        var dateV = document.querySelector('#hive-date').value;

                        console.log(apiaryIDV);
                        $.post("insert scripts/insert-hive.php", 
                        { 
                            apiaryID: apiaryIDV, 
                            typeOfHive: typeV, 
                            noOfFrame: nooframesV,
                            dateCreated: dateV

                        },function()
                        {
                            console.log("record added");
                            location.reload();
                        });

                        document.querySelector(".form-container").reset();
                        $(".submit-text").text("Hive Created !");
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
                <h1 class="sub-nav-header">Hives</h1>
                <div class="button">
                    <button class="button-harvest-create">Create</button>
                    <button class="button-harvest-download" onclick="location.href='download scripts/download-hives'" >
                        <svg class="fill-current" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                        <span>Download</span>
                    </button>
                </div>
            </div>
            <div class="content hives">
                <div class="hives-record">
                    <h3 class="hives-record-header">Hives</h3>
                    <div class="hives-record-heading">
                        <p class="hives-record-heading-apiary">Apiary</p>
                        <p class="hives-record-heading-type">Type of Hive</p>
                        <p class="hives-record-heading-noofframes">No. of Frames</p>
                        <p class="hives-record-heading-date">Date Created</p>
                        <p class="buttons">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                </div>
                <div class="create-hives hidden open-window">
                    <form type="button" class = "form-container">
                        <button class="close-window">&times;</button>
                        <h3>Create a Hive</h2>

                        <select id="apiary-name" name="apiary-name" required>
                        <?php include 'display scripts\display-apiary-name.php';?>
                        </select>

                        <select id="hive-type" name="hive-type">
                            <option value="Langstroth">Langstroth</option>
                            <option value="Warren">Warre</option>
                            <option value="Top-Bar">Top-Bar</option>
                            <option value="Top-Bar">WBC</option>
                        </select>
                        <input type="number" id="hive-noofframes" name="hive-noofframes" placeholder="Number of Frames" required>
                        <input type="date" id="hive-date" name="hive-date" placeholder="Date Created" max = '<?php echo date("Y-m-d"); ?>' required>
                        <input type="submit" class="create-button" value="Create">
                        <div class="submit-text"></div>   
                    </form>   
                </div>

                <div class="create-hives hidden open-window-edit">
                    <form class = "form-container-edit">
                        <button type="button" class="close-window">&times;</button>
                        <h3>Edit this Hive</h2>
                        
                        <select id="apiary-name-edit" name="apiary-name-edit" required>
                        <?php include 'display scripts\display-apiary-name.php';?>
                        </select>
                        
                        <select id="hive-type-edit" name="hive-type">
                            <option value="Langstroth">Langstroth</option>
                            <option value="Warren">Warren</option>
                            <option value="Top-Bar">Top-Bar</option>
                        </select>
                        <input type="number" id="hive-noofframes-edit" name="hive-noofframes-edit" placeholder="Number of Frames" required>
                        <input type="date" id="hive-date-edit" name="hive-date-edit" placeholder="Date Created" max = '<?php echo date("Y-m-d"); ?>' required>
                        <input type="submit" class="update-button" value="Update">
                        <div class="submit-text"></div>   
                    </form>   
                </div>
                <div class="overlay hidden"></div>

                <!-- this script displays a list of apiaries -->
                <script type="application/javascript">
                    "use strict";
                        $.ajax('display scripts/display-hive.php',
                        {
                            type: "POST",
                            success: function(data){
                                $(".hives-record").append(data);
                                console.log("Extraction done");
                            }    
                        });
                </script>
 
            <script src="other scripts\script.js"></script>  
            </div>
        </section>
    </body>
</html>