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
        <?php include 'update scripts\update-inspection-status.php';?>

        <script type="application/javascript">
            "use strict";
                $(document).ready(function(){
                    $(".form-container").submit(function(){
                        event.preventDefault();
                        console.log("Button Clicked");

                        var hiveIDV = document.querySelector('#hive-name').value;
                        var dateV = document.querySelector('#inspection-record-date').value;
                        var statusV = document.querySelector('#inspection-record-status').value;

                        $.post("insert scripts/insert-inspection-schedule.php", 
                        { 
                            hiveID: hiveIDV,
                            actualInspectionDate: dateV, 
                            completionStatus: statusV
                        },function()
                        {
                            console.log("record added");
                            document.querySelector(".form-container").reset();
                            $(".submit-text").text("Inserted Schedule !");
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
                <h1 class="sub-nav-header">Inspection</h1>
                <div class="button">
                    <button class="button-harvest-create open2">Create Schedule</button>
                </div>
            </div>
            <div class="content inspection">
                <div class="inspection-record">
                    <h3 class="inspection-schedule-header">Completed Inspections</h3>
                    <div class="inspection-record-heading">
                        <p class="inspection-record-heading-hive">Hive</p>
                        <p class="inspection-record-heading-date">Inspect Date</p>
                        <p class="inspection-record-heading-observation">Observation</p>
                        <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                </div>
                <div class="inspection-schedule">
                    <h3 class="inspection-schedule-header">Schedule</h3>
                    <div class="inspection-schedule-heading">
                        <p class="inspection-schedule-heading-hive">Hive</p>
                        <p class="inspection-schedule-heading-date">Inspect Date</p>
                        <p class="inspection-schedule-heading-status">Status</p>
                        <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                </div>
            </div>

            <div class="create-inspection-record hidden open-window">
                <form class = "form-container">
                    <button type="button" class="close-window">&times;</button>
                    <h3>Create Schedule</h2>

                    <select id="hive-name" name="hive-name">
                    <?php include 'display scripts\display-hive-name.php';?>
                    </select>

                    <input type="date" id="inspection-record-date" name="inspection-record-date" placeholder="Inspection Date" required>
                    <input type="text" id="inspection-record-status" name="inspection-record-status" placeholder="Status" value="Pending" disabled>
                    <input type="submit" class="create-button" value="Create">
                    <div class="submit-text"></div>      
                </form>
            </div>

            <div class="create-inspection-record hidden open-window-inspect">
                <form class = "form-container-inspect">
                    <button type="button" class="close-window">&times;</button>
                    <h3>Complete Inspection</h2>

                    <input type="text" id="inspection-record-observation-inspect" name="inspection-record-observation-inspect" placeholder="Observation" required>
                    <input type="text" id="inspection-record-status-inspect" name="inspection-record-status-inspect" placeholder="Status" value="Completed" disabled>
                    <input type="submit" class="inspect-button" value="Create">
                    <div class="submit-text"></div>      
                </form>
            </div>

            <div class="create-expense-record hidden open-window-edit">
                <form class = "form-container-edit">
                    <button type="button" class="close-window">&times;</button>
                    <h3>Edit Inspection</h2>

                    <input type="text" id="inspection-record-observation-edit" name="inspection-record-observation-edit" placeholder="Observation" required>
                    <input type="submit" class="update-button" value="Update">
                    <div class="submit-text"></div>      
                </form>
            </div>

            <div class="create-revenue-record hidden open-window-edit-2">
                <form class = "form-container-edit-2">
                    <button type="button" class="close-window">&times;</button>
                    <h3>Edit Schedule</h2>

                    <select id="hive-name-edit" name="hive-name-edit">
                    <?php include 'display scripts\display-hive-name.php';?>
                    </select>

                    <input type="date" id="inspection-schedule-date-edit" name="inspection-schedule-detail-date-edit" placeholder="Inspection Schedule Date" required>
                    <input type="text" id="inspection-schedule-status-edit" name="inspection-schedule-detail-status-edit" placeholder="Status" disabled>
                    <input type="submit" class="update-button-revenue" value="Update">
                    <div class="submit-text"></div>      
                </form>
            </div>
            <div class="overlay hidden"></div>

            <!-- this script displays a list of expense -->
            <script type="application/javascript">
                "use strict";
                    $.ajax('display scripts/display-inspection-record.php',
                    {
                        type: "POST",
                        success: function(data){
                            $(".inspection-record").append(data);
                            console.log("Extraction done");
                        }    
                    });
            </script>

            <!-- this script displays a list of revenue -->
            <script type="application/javascript">
                "use strict";
                    $.ajax('display scripts/display-inspection-schedule.php',
                    {
                        type: "POST",
                        success: function(data){
                            $(".inspection-schedule").append(data);
                            console.log("Extraction done");
                        }    
                    });
            </script>
            <script src="other scripts/script.js"></script>
        </section>
    </body>
</html>