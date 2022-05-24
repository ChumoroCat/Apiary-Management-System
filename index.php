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

        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdkxMX5zlBSr8XlZPT9AAUOLAxcyWgJXY&callback=initMap&v=weekly"
            async
        ></script>
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
                <h1 class="sub-nav-header">Welcome to Apiary Management System v2</h1>
            </div>
            <div class="content search-honey-info">
                <h2 class="search-honey-info-thanks">
                    Thank You For Purchasing Our Honey. You Can Find More Information Below.
                </h2>
                <div class="search-honey-info-find">
                    <div id="map" class="search-honey-info-map">
                    </div>
                    <div class="search-honey-info-record">
                        <div class="search-honey-info_detail">
                            <ul class="search-honey-info_detail-header hidden">
                                <li class="map-info-header">Type of Honey: </li>
                                <li class="map-info-header">Apiary: </li>
                                <li class="map-info-header">Location: </li>
                                <li class="map-info-header">Hive: </li>
                                <li class="map-info-header">Flora Contributors: </li>
                                <li class="map-info-header">Harvest Date: </li>
                                <li class="map-info-header">Coordinates: </li>
                            </ul>
                            <ul class="search-honey-info_detail-record">
                            </ul>
                        </div> 
                        <form class ="form-container">
                            <input type="text" id="batch-no" name="batch-no" placeholder="Batch Number, e.g. 2021065432" required>
                            <input type="submit" class="search-button" value="Search">
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <script type="application/javascript">
            "use strict";
                $(document).ready(function(){
                    let map;
                    $(".form-container").submit(function(){
                        event.preventDefault();
                        console.log("Button Clicked");

                        var batchV = document.querySelector('#batch-no').value;

                        $.post("display scripts/display-map-info.php", 
                        { 
                            batchNo: batchV, 

                        },function initMap(data)
                        {
                            console.log("record added");
                            $(".search-honey-info_detail-record").html(data);
                            
                            document.querySelector('.search-honey-info_detail-header').classList.remove('hidden');
                            let location = document.querySelector('.map-info-coordinates').innerHTML; //for map script
                            const locationLat = parseFloat(location.split(",")[0]);
                            const locationLng = parseFloat(location.split(",")[1]);
                            
                                map = new google.maps.Map(document.getElementById("map"), {
                                center: { lat: locationLat, lng: locationLng },
                                zoom: 8,
                            });

                            new google.maps.Marker({
                            position: { lat: locationLat, lng: locationLng },
                            map,
                            title: "The Apiary",
                        });
                        });

                        document.querySelector(".form-container").reset();
                    });
                });
        </script>

        <!-- Displays the map, pass coordinates variables here-->
        <script>
                let map;

                function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: -32.0679613, lng: 115.8330479 },
                    zoom: 10,
                });

                new google.maps.Marker({
                    position: { lat: -32.0679613, lng: 115.8330479 },
                    map,
                    title: "The Apiary",
                  });
                }
        </script>
    </body>
</html>