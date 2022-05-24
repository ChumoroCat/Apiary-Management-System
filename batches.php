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
                $(document).ready(function(){
                    $(".create-button").click(function(){
                        // event.preventDefault();
                        console.log("Button Clicked");

                        var purposeV = document.querySelector('#expense-record-purpose').value;
                        var expenseV = document.querySelector('#expense-record-amount').value;
                        var dateV = document.querySelector('#expense-record-date').value;

                        $.post("insert scripts/insert-expense.php", 
                        { 
                            purposeOfExpense: purposeV,
                            expense: expenseV, 
                            dateOfEntry: dateV
                        },function()
                        {
                            console.log("record added");
                        });

                        document.querySelector(".form-container").reset();
                        $(".submit-text").text("Expense Recorded !");
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
                <h1 class="sub-nav-header">Batches</h1>
            </div>
            <div class="content batch">
                <div class="batch-record">
                    <h3 class="batch-header">Honey Batches</h3>
                    <div class="batch-record-heading">
                        <p class="batch-record-heading-product">Product</p>
                        <p class="batch-record-heading-flora">Flora</p>
                        <p class="batch-record-heading-batch">Batch Number</p>
                        <p class="batch-record-heading-date">Harvest Date</p>
                    </div>
                </div>
            </div>

                <!-- this script displays a list of expense -->
                <script type="application/javascript">
                    "use strict";
                        $.ajax('display scripts/display-batches.php',
                        {
                            type: "POST",
                            success: function(data){
                                $(".batch-record").append(data);
                                console.log("Extraction done");
                            }    
                        });
                </script>

                <script src="other scripts/script.js"></script>
            </div>
        </section>
    </body>
</html>