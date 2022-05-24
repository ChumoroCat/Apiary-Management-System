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

        <script type="application/javascript">
            "use strict";
            function trimCoor() {
                document.querySelector('#apiary-coordinates').value = document.querySelector('#apiary-coordinates').value.replace(/ +/g, "");
            }
        </script>

        <!-- this script will send create-apiary data to the database -->
        <script type="application/javascript">
            "use strict";
                $(document).ready(function(){
                    $(".form-container").submit(function(){
                        event.preventDefault();
                        console.log("Button Clicked");

                        var nameV = document.querySelector('#apiary-name').value;
                        var locationV = document.querySelector('#apiary-location').value;
                        var coordinatesV = document.querySelector('#apiary-coordinates').value;
                        var floraV = document.querySelector('#apiary-flora').value;
                        var noofhiveV = document.querySelector('#apiary-noofhives').value;
                        var dateV = document.querySelector('#apiary-date').value;

                        $.post("insert scripts/insert-apiary.php", 
                        { 
                            apiaryName: nameV, 
                            apiaryLocation: locationV,
                            mapCoordinates: coordinatesV,
                            typeOfFlora: floraV,
                            noOfHive: noofhiveV,
                            dateCreated: dateV
                        },function()
                        {
                            console.log("record added");
                            document.querySelector(".form-container").reset();
                            $(".submit-text").text("Apiary Created !");
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
                <h1 class="sub-nav-header">Apiary</h1>
                <div class="button">
                    <button class="button-harvest-create">Create</button>
                    <button class="button-harvest-download" onclick="location.href='download scripts/download-apiary'" >
                        <svg class="fill-current" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                        <span>Download</span>
                    </button>
                </div>
            </div>
            <div class="content apiary">
                <div class="apiary-record">
                    <h3 class="apiary-record-header">Apiaries</h3>
                    <div class="apiary-record-heading">
                        <p class="apiary-record-heading-apiary">Apiary</p>
                        <p class="apiary-record-heading-location">Location</p>
                        <p class="apiary-record-heading-coordinates">Coordinates</p>
                        <p class="apiary-record-heading-flora">Flora</p>
                        <p class="apiary-record-heading-noofhives">No. of Hives</p>
                        <p class="apiary-record-heading-date">Date Created</p>
                        <p class="buttons">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                    <!-- <div class="apiary-record-detail">
                        <p class="apiary-record-detail-apiary">Simpsons Street</p>
                        <p class="apiary-record-detail-location">Orange Grove</p>
                        <p class="apiary-record-detail-flora">Orchid</p>
                        <p class="apiary-record-detail-noofhives">3</p>
                        <div class="buttons">
                            <button class="record_edit">Edit</button>
                            <button class="record_delete">Delete</button>
                        </div> -->
                    </div>
                </div>

                <div class="create-apiary hidden open-window">
                    <form class = "form-container">
                        <button type="button" class="close-window">&times;</button>
                        <h3>Create an Apiary</h2>
                        <input type="text" id="apiary-name" name="apiary-name" placeholder="Name of Apiary" required>
                        <input type="text" id="apiary-location" name="apiary-location" placeholder="Location" required>
                        <input type="text" id="apiary-coordinates" name="apiary-coordinates" placeholder="Coordinates: Separate with comma" onchange="trimCoor()" pattern="^([-+,0-9.]+)+(,)+([-+,0-9.]+)*$" title="e.g. 123.45,123.45" required>
                        <input type="text" id="apiary-flora" name="apiary-flora" placeholder="Flora Contributors" required>
                        <input type="number" id="apiary-noofhives" name="apiary-noofhives" placeholder="Number of Hives" required>
                        <input type="date" id="apiary-date" name="apiary-date" placeholder="Date Created" max = '<?php echo date("Y-m-d"); ?>' required>
                        <!-- <button class="create-button" type="button">Create</button> -->
                        <input type="submit" class="create-button" value="Create">
                        <div class="submit-text"></div>   
                    </form>
                </div>

                <div class="create-apiary hidden open-window-edit">
                    <form class = "form-container-edit update-form">
                        <button type="button" class="close-window">&times;</button>
                        <h3>Edit this Apiary</h2>
                        <input type="text" id="apiary-name-edit" name="apiary-name" placeholder="Name of Apiary" required>
                        <input type="text" id="apiary-location-edit" name="apiary-location" placeholder="Location" required>
                        <input type="text" id="apiary-coordinates-edit" name="apiary-coordinates" placeholder="Coordinates: Separate with comma" required>
                        <input type="text" id="apiary-flora-edit" name="apiary-flora" placeholder="Flora Contributors" required>
                        <input type="number" id="apiary-noofhives-edit" name="apiary-noofhives" placeholder="Number of Hives" required>
                        <input type="date" id="apiary-date-edit" name="apiary-date" placeholder="Date Created" max = '<?php echo date("Y-m-d"); ?>' required>
                        <!-- <button class="create-button" type="button">Create</button> -->
                        <input type="submit" class="update-button" value="Update">
                        <div class="submit-text"></div>   
                    </form>
                </div>
                <div class="overlay hidden"></div>

                <!-- this script displays a list of apiaries -->
                <script type="application/javascript">
                    "use strict";
                        $.ajax('display scripts/display-apiary.php',
                        {
                            type: "POST",
                            success: function(data){
                                $(".apiary-record").append(data);
                                console.log("Extraction done");
                            }    
                        });
                </script>
    
            <script src="other scripts\script.js"></script>  
            </div>
        </section>
    </body>
</html>