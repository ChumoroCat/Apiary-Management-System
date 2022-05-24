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

        <?php include 'non-member-redirect.php';?>

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
                    <a href="accounting" class="sidebar-nav__link">
                        <span>Accounting</span>
                    </a>
                </li>
                <li class="sidebar-nav__item">
                    <a href="profile" class="sidebar-nav__link">
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-nav__item logOutBtn">
                    <a href="logout.php" class="sidebar-nav__link">
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <section class="container-body">
            <div class="sub-nav">
                <h1 class="sub-nav-header">Inspection</h1>
                <div class="button">
                    <button class="button-harvest-create">Create Inspection</button>
                </div>
                <div class="button">
                    <button class="button-harvest-create open2">Create Schedule</button>
                </div>
            </div>
            <div class="content inspection">
                <div class="inspection-record">
                    <h3 class="inspection-schedule-header">Completed Inspections</h3>
                    <div class="inspection-record-heading">
                        <p class="inspection-record-heading-hive">Hive</p>
                        <p class="inspection-record-heading-date">Date</p>
                        <p class="inspection-record-heading-observation">Observation</p>
                        <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                    <div class="inspection-record-detail">
                        <p class="inspection-record-detail-hive">Maple Flower Pot</p>
                        <p class="inspection-record-detail-date">05 Oct 2021</p>
                        <p class="inspection-record-detail-observation">Dead Bees Found, moldy soil. Caterpillars very large.</p>
                        <button class="record_delete">&times;</button>
                    </div>
                    <div class="inspection-record-detail">
                        <p class="inspection-record-detail-hive">Maple Flower Pot</p>
                        <p class="inspection-record-detail-date">01 Oct 2021</p>
                        <p class="inspection-record-detail-observation">Dead Bees Found, moldy soil. Caterpillars very large.</p>
                        <button class="record_delete">&times;</button>
                    </div>
                    <div class="inspection-record-detail">
                        <p class="inspection-record-detail-hive">Maple Flower Pot</p>
                        <p class="inspection-record-detail-date">26 Sep 2021</p>
                        <p class="inspection-record-detail-observation">Dead Bees Found, moldy soil. Caterpillars very large.</p>
                        <button class="record_delete">&times;</button>
                    </div>
                </div>
                <div class="inspection-schedule">
                    <h3 class="inspection-schedule-header">Schedule</h3>
                    <div class="inspection-schedule-heading">
                        <p class="inspection-schedule-heading-hive">Hive</p>
                        <p class="inspection-schedule-heading-date">Date</p>
                        <p class="inspection-schedule-heading-status">Status</p>
                        <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                    <div class="inspection-schedule-detail">
                        <p class="inspection-schedule-detail-hive">Maple Flower Pot</p>
                        <p class="inspection-schedule-detail-date">10 Oct 2021</p>
                        <p class="inspection-schedule-detail-status">Warning Sent</p>
                        <button class="record_delete">&times;</button>
                    </div>
                    <div class="inspection-schedule-detail">
                        <p class="inspection-schedule-detail-hive">Orchid Flower Patch</p>
                        <p class="inspection-schedule-detail-date">27 Oct 2021</p>
                        <p class="inspection-schedule-detail-status">Notification Sent</p>
                        <button class="record_delete">&times;</button>
                    </div>
                    <div class="inspection-schedule-detail">
                        <p class="inspection-schedule-detail-hive">Sugar Basket</p>
                        <p class="inspection-schedule-detail-date">29 Oct 2021</p>
                        <p class="inspection-schedule-detail-status">Notification Sent</p>
                        <button class="record_delete">&times;</button>
                    </div>
                    <div class="inspection-schedule-detail">
                        <p class="inspection-schedule-detail-hive">Banana Tree</p>
                        <p class="inspection-schedule-detail-date">06 Nov 2021</p>
                        <p class="inspection-schedule-detail-status">Pending Inspection</p>
                        <button class="record_delete">&times;</button>
                    </div>
                </div>

                <div class="create-inspection-record hidden open-window">
                    <form class = "form-container">
                        <button class="close-window">&times;</button>
                        <h3>Record the Inspection</h2>
                        <input type="date" id="inspection-record-date" name="inspection-record-date" placeholder="Inspection Date">
                        <input type="text" id="inspection-record-location" name="inspection-record-hive" placeholder="Hive">
                        <input type="text" id="inspection-record-observation" name="inspection-record-observation" placeholder="Observation">
                        <input type="submit" value="Create">
                        <div class="submit-text"></div>      
                    </form>
                </div>

                <div class="create-inspection-schedule hidden open-window-2">
                    <form class = "form-container">
                        <button class="close-window">&times;</button>
                        <h3>Create a Schedule</h2>
                        <input type="date" id="inspection-schedule-date" name="inspection-schedule-date" placeholder="Date to Inspect">
                        <input type="text" id="inspection-schedule-location" name="inspection-schedule-hive" placeholder="Hive">
                        <input type="submit" value="Create"> 
                        <div class="submit-text"></div>    
                    </form> 
                </div>
                <div class="overlay hidden"></div>
                <script src="script.js"></script>
            </div>
        </section>
    </body>
</html>