<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=ZCOOL+XiaoWei&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" type="image/png" href="img/favicon.png">
        
        <title>Apiary Management System v2</title>

        <?php include 'other scripts\non-member-redirect.php';?>

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
                <h1 class="sub-nav-header">Finances</h1>
            </div>
            <div class="content finance">
                <div class="finance-details">
                    <div class="finance-details-top-5">
                        <div class="finance-details-top-5-revenue">
                            <h3 class="finance-details-top-5-revenue_header">Top 5 Revenue</h3>
                            <?php include 'display scripts\display-top5-revenue.php';?>
                        </div>
                        <div class="finance-details-top-5-expense">
                            <h3 class="finance-details-top-5-expense_header">Top 5 Expenses</h3>
                            <?php include 'display scripts\display-top5-expense.php';?>
                        </div>
                    </div> 
                    <div class="finance-details-charts">
                        <div class="finance-details-charts-1">
                            <canvas class="finance-details-charts-line" id="myLineChart"></canvas>
                        </div>
                        <div class="finance-details-charts-2">
                        <canvas class="finance-details-charts-bar" id="myBarChart" ></canvas>
                        </div>
                    </div>
                    <div class="table-data">
                        <?php include 'display scripts\Charts\display-monthly-figures.php';?>
                        <?php include 'display scripts\Charts\display-yearly-figures.php';?>
                    </div>
                    <script>
                        var xAxisLine = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
                        const ValuesRevenueLine = <?php include 'display scripts\charts\display-line-chart-revenue-line.php';?>;
                        const ValuesExpenseLine = <?php include 'display scripts\charts\display-line-chart-expense-line.php';?>;
                        const ValuesProfitLine = [,,,,,,,,,,,];

                        for (i = 0; i < 12; i++) {
                            ValuesProfitLine[i] = ValuesRevenueLine[i] - ValuesExpenseLine[i];
                        }

                        new Chart("myLineChart", {
                          type: "line",
                          data: {
                                labels: xAxisLine,
                                datasets: [{
                                label: "Revenue", 
                                data: ValuesRevenueLine,
                                borderColor: "green",
                                fill: false
                                },{ 
                                label: "Expenses",
                                data: ValuesExpenseLine,
                                borderColor: "red",
                                fill: false
                                },{ 
                                label: "Profit",
                                data: ValuesProfitLine,
                                borderColor: "#4299e1",
                                fill: false
                                }]
                            },
                          options: {
                            legend: {
                                position: 'bottom',
                            },
                            labels: {
                            font: {
                                size: 12
                                }
                            },
                            title: {
                                display: true,
                                text: "Monthly Comparison",
                                fontSize: 14
                            },scales: {
                                xAxes: [{
                                    gridLines: {
                                        color: "rgba(0, 0, 0, 0)",
                                    },
                                    ticks: {
                                        fontSize: 12
                                    }
                                }],
                                yAxes: [{
                                    gridLines: {
                                        color: "rgba(0, 0, 0, 0)",
                                    },                                    
                                    ticks: {
                                        fontSize: 12,
                                        autoSkip: true,
                                        maxTicksLimit: 5
                                    }   
                                }]
                            }
                          }
                        });
                    </script>

                    <script>
                        var xValuesBar = ["2019","2020","2021"];
                        var ValuesRevenueBar = <?php include 'display scripts\charts\display-line-chart-revenue-bar.php';?>;
                        var ValuesExpenseBar = <?php include 'display scripts\charts\display-line-chart-expense-bar.php';?>;
                        var ValuesProfitBar = [,,];

                        for (i = 0; i < 3; i++) {
                            ValuesProfitLine[i] = ValuesRevenueLine[i] - ValuesExpenseLine[i];
                        }

                        new Chart("myBarChart", {
                        type: "bar",
                        data: {
                            labels: xValuesBar,
                            datasets: [{
                            label: "Revenue",
                            backgroundColor: "green",
                            data: ValuesRevenueBar
                            },{
                            label: "Expense",
                            backgroundColor: "red",
                            data: ValuesExpenseBar
                            },{
                            label: "Profit",
                            backgroundColor: "#4299e1",
                            data: ValuesProfitBar
                            }]
                        },
                        options: {
                            legend: {
                                    position: 'bottom',
                            },
                            labels: {
                            font: {
                                size: 12
                                }
                            },
                            title: {
                            display: true,
                            text: "Yearly Comparison",
                            fontSize: 14
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            },
                            scales: {
                                xAxes: [{
                                    gridLines: {
                                        color: "rgba(0, 0, 0, 0)",
                                    },
                                    ticks: {
                                        fontSize: 12
                                    }
                                }],
                                yAxes: [{
                                    gridLines: {
                                        color: "rgba(0, 0, 0, 0)",
                                    },
                                    ticks: {
                                        fontSize: 12,
                                        autoSkip: true,
                                        maxTicksLimit: 5
                                    }   
                                }]
                            }
                        }
                        });
                    </script>
                </div>
        </section>
    </body>
</html>