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

        <!-- this script will send create-apiary data to the database -->
        <script type="application/javascript">
            "use strict";
                $(document).ready(function(){
                    $(".form-container").submit(function(){
                        event.preventDefault();
                        console.log("Button Clicked");

                        var hiveIDV = document.querySelector('#hive-name').value;
                        var quantityV = document.querySelector('#quantity').value;
                        var productV = document.querySelector('#product').value;
                        var productclassV = document.querySelector('#product-class').value;
                        var harvestdateV = document.querySelector('#harvest-date').value;

                        $.post("insert scripts/insert-harvest.php", 
                        { 
                            hiveID: hiveIDV,
                            quantity: quantityV,
                            productType: productV,
                            productClass: productclassV,
                            dateOfHarvest: harvestdateV
                        },function()
                        {
                            console.log("record added");
                            document.querySelector(".form-container").reset();
                            $(".submit-text").text("Harvest Recorded !");
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
                <h1 class="sub-nav-header">Harvest</h1>
                <button class="button-harvest-create">Create</button>
            </div>
            <div class="content harvest">
                <div class="harvest-record">
                    <h3 class="harvest-record-header">Completed Harvests</h3>
                    <div class="harvest-record-heading">
                        <p class="harvest-record-heading-hive">Hive</p>
                        <p class="harvest-record-heading-product">Product Type</p>
                        <p class="harvest-record-heading-product-class">Type</p>
                        <p class="harvest-record-heading-quantity">Quantity</p> 
                        <p class="harvest-record-heading-date">Harvest Date</p>                       
                        <p class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </p>
                    </div>
                </div>

                <div class="harvest-create hidden open-window">                 
                    <form class = "form-container">
                        <button type="button" class="close-window">&times;</button>
                        <h3>Record your Harvest</h2>

                        <select id="hive-name" name="hive-name">
                        <?php include 'display scripts\display-hive-name.php';?>
                        </select>

                        <select id="product" name="product">
                            <option value="Honey">Honey</option>
                            <option value="Nucs">Nucs</option>
                            <option value="Queens">Queens</option>
                        </select>

                        <select id="product-class" name="product-class">
                        <option value='Maple Honey'>Maple Honey</option>
                        <option value='Manuka Honey'>Manuka Honey</option>
                        <option value='Buckwheat Honey'>Buckwheat Honey</option>
                        <option value='Sourwood Honey'>Sourwood Honey</option>
                        </select>

                        <input type="number" id="quantity" name="quantity" placeholder="Quantity" required>
                        <input type="date" id="harvest-date" name="harvest-date" max = '<?php echo date("Y-m-d"); ?>' required>   
                        <input type="submit" class="create-button" value="Create">
                        <div class="submit-text"></div>   
                    </form>
                </div>

                <div class="harvest-create hidden open-window-edit">                 
                    <form class = "form-container-edit">
                        <button type="button" class="close-window">&times;</button>
                        <h3>Edit your Harvest</h2>

                        <select id="hive-name-edit" name="hive-name-edit">
                        <?php include 'display scripts\display-hive-name.php';?>
                        </select>
                       
                        <input type="number" id="quantity-edit" name="quantity-edit" placeholder="Quantity" required>
                        <input type="date" id="harvest-date-edit" name="harvest-date-edit" max = '<?php echo date("Y-m-d"); ?>' required>   
                        <input type="submit" class="update-button" value="Update">
                        <div class="submit-text"></div>   
                    </form>
                </div>
                
                <div class="harvest-create hidden open-window-sell">                 
                    <form class = "form-container-sell">
                        <button type="button" class="close-window">&times;</button>
                        <h3>Sell your Harvest</h2>

                        <input type="number" id="amount-sell" name="amount-sell" placeholder="Revenue Amount(AUD)" step="0.01" required>
                        <input type="date" id="revenue-date-sell" name="revenue-date-sell" max = '<?php echo date("Y-m-d"); ?>' required>   
                        <input type="submit" class="sell-button" value="Sell">
                        <div class="submit-text"></div>   
                    </form>
                </div>
                <div class="overlay hidden"></div>
                <script src="other scripts\script.js"></script>   

                <!-- this script displays a list of harvests -->
                <script type="application/javascript">
                    "use strict";
                        $.ajax('display scripts/display-harvest.php',
                        {
                            type: "POST",
                            success: function(data){
                                $(".harvest-record").append(data);
                                console.log("Extraction done");
                            }    
                        });
                </script>

                <!-- this script displays a list of product types -->
                <script type="application/javascript">
                "use strict";
                $(document).ready(function(){
                    $("#product").click(function(){
                
                    console.log(document.querySelector('#product').value);

                    if (document.querySelector('#product').value == "Honey") {
                        document.querySelector('#product-class').innerHTML = "<option value='Maple Honey'>Maple Honey</option><option value='Manuka Honey'>Manuka Honey</option><option value='Buckwheat Honey'>Buckwheat Honey</option><option value='Sourwood Honey'>Sourwood Honey</option>";
                    } else if (document.querySelector('#product').value == "Nucs") {
                        document.querySelector('#product-class').innerHTML = "<option value='Small Nuc'>Small Nuc</option><option value='Medium Nuc'>Medium Nuc</option><option value='Large Nuc'>Large Nuc</option>";
                    } else if (document.querySelector('#product').value == "Queens") {
                        document.querySelector('#product-class').innerHTML = "<option value='Italian Queen'>Italian Queen</option><option value='Striped Carniolan Queen'>Striped Carniolan Queen</option><option value='Virgin Queen'>Virgin Queen</option>";
                    } 

                    });
                });
                </script>

            </div>
        </section>
    </body>
</html>