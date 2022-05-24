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
                    $(".form-container").submit(function(){
                        event.preventDefault();
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
                            document.querySelector(".form-container").reset();
                            $(".submit-text").text("Expense Recorded !");
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
                <h1 class="sub-nav-header">Bookkeeping</h1>
                <div class="button">
                    <button class="button-harvest-create open2">Create Expense</button>
                </div>
            </div>
            <div class="content bookkeeping">
                <div class="bookkeeping-revenue">
                    <h3 class="bookkeeping-revenue-header">Revenue</h3>
                    <div class="bookkeeping-revenue-heading">
                        <p class="bookkeeping-revenue-heading-product">Product</p>
                        <p class="bookkeeping-revenue-heading-amount">Amount(AUD)</p>
                        <p class="bookkeeping-revenue-heading-date">Entry Date</p>
                        <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                </div>
                <div class="bookkeeping-expense">
                    <h3 class="bookkeeping-expense-header">Expense</h3>
                    <div class="bookkeeping-expense-heading">
                        <p class="bookkeeping-expense-heading-purpose">Purpose</p>
                        <p class="bookkeeping-expense-heading-amount">Amount(AUD)</p>
                        <p class="bookkeeping-expense-heading-date">Entry Date</p>
                        <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                </div>
            </div>

                <div class="create-expense-record hidden open-window">
                    <form class = "form-container">
                        <button type="button" class="close-window">&times;</button>
                        <h3>Record Expenses</h2>
                        <input type="text" id="expense-record-purpose" name="expense-record-purpose" placeholder="Expense Purpose" required>
                        <input type="number" id="expense-record-amount" name="expense-record-amount" placeholder="Amount Incurred" step="0.01" required>
                        <input type="date" id="expense-record-date" name="expense-record-date" placeholder="Expense Date" max = '<?php echo date("Y-m-d"); ?>' required>
                        <input type="submit" class="create-button" value="Create">
                        <div class="submit-text"></div>      
                    </form>
                </div>

                <div class="create-expense-record hidden open-window-edit">
                    <form class = "form-container-edit">
                        <button type="button" class="close-window">&times;</button>
                        <h3>Edit Expenses</h2>
                        <input type="text" id="expense-record-purpose-edit" name="expense-record-purpose-edit" placeholder="Expense Purpose" required> 
                        <input type="number" step="any" id="expense-record-amount-edit" name="expense-record-amount-edit" placeholder="Amount Incurred" step="0.01" required>
                        <input type="date" id="expense-record-date-edit" name="expense-record-date-edit" placeholder="Expense Date" max = '<?php echo date("Y-m-d"); ?>' required>
                        <input type="submit" class="update-button" value="Update">
                        <div class="submit-text"></div>      
                    </form>
                </div>

                <div class="create-revenue-record hidden open-window-edit-2">
                    <form class = "form-container-edit-2">
                        <button type="button" class="close-window">&times;</button>
                        <h3>Edit Revenues</h2>
                        <input type="number" step="any" id="revenue-record-amount-edit" name="revenue-record-amount-edit" placeholder="Revenue Amount" step="0.01" required>
                        <input type="date" id="revenue-record-date-edit" name="revenue-record-date-edit" placeholder="Sell Date" max = '<?php echo date("Y-m-d"); ?>' required>
                        <input type="submit" class="update-button-revenue" value="Update">
                        <div class="submit-text"></div>      
                    </form>
                </div>
                <div class="overlay hidden"></div>

                <!-- this script displays a list of expense -->
                <script type="application/javascript">
                    "use strict";
                        $.ajax('display scripts/display-expense.php',
                        {
                            type: "POST",
                            success: function(data){
                                $(".bookkeeping-expense").append(data);
                                console.log("Extraction done");
                            }    
                        });
                </script>

                <!-- this script displays a list of revenue -->
                <script type="application/javascript">
                    "use strict";
                        $.ajax('display scripts/display-revenue.php',
                        {
                            type: "POST",
                            success: function(data){
                                $(".bookkeeping-revenue").append(data);
                                console.log("Extraction done");
                            }    
                        });
                </script>

                <script src="other scripts/script.js"></script>
            </div>
        </section>
    </body>
</html>