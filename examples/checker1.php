

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Answer Checker System
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
</head>

<body class=" ">
    <div class="wrapper ">
        <div class="sidebar">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            ACS
          </a>
                    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Answer Checker
          </a>
                </div>
                <ul class="nav">
                    <li>
                        <a href="./index.php">
                            <i class="tim-icons icon-chart-pie-36"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a href="./upload.php">
                            <i class="tim-icons icon-camera-18"></i>
                            <p>Upload</p>
                        </a>
                    </li>
                    <li class="active">
                        <a href="./checker1.php">
                            <i class="tim-icons icon-check-2"></i>
                            <p>Checker</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent   ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle d-inline">
                            <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Checker</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto ">
                            <li class="separator d-lg-none"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Upload Scheme</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="checker1.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-3 pr-md-1">
                                            <div class="form-group">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" placeholder="Subject" name="subject"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="btn btn-fill btn-primary" name="search">search</button>
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card  card-plain">
                                <div class="card-header">
                                    <h4 class="card-title">Result</h4>
                                    <p class="category"></p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table tablesorter " id="">
                                            <thead class=" text-primary">
                                                <th>
                                                    Subject
                                                </th>
                                                <th>
                                                    Standard
                                                </th>
                                                <th>
                                                    Type of Paper
                                                </th>
                                                <th>
                                                    image
                                                </th>
                                            </thead>
                                            <?php
$conn=mysqli_connect("localhost","root","1234","acs");
$set=$_POST['subject'];
if($set){
    $show ="SELECT * FROM upload where subject='$set'";
    $result = mysqli_query($conn,$show);
    while ($rows=mysqli_fetch_array($result)){
        echo "<tbody>";
        echo "<tr>";
        echo "<td>";
        echo $rows ['subject'];
        echo "</td>";
        echo "<td>";
        echo $rows ['standard'];
        echo "</td>";
        echo "<td>";
        echo $rows ['paper'];
        echo "</td>";
        echo "<td>";
        echo "<div id =img>";
        echo "<img src='image/".$rows ['image']."'>";
        echo "</td>";
        echo "<td>";
        echo "<a href ='checker2.php?row=".$set."'>Check</a>";
        echo "</tr>";
        echo "</tbody>";

    }
}
?>
                                </table>
                                        </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <footer class="footer">
                            <div class="container-fluid">
                            </div>
                        </footer>
                    </div>
                    <!--   Core JS Files   -->
                    <script src="../assets/js/core/jquery.min.js"></script>
                    <script src="../assets/js/core/popper.min.js"></script>
                    <script src="../assets/js/core/bootstrap.min.js"></script>
                    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
                    <!--  Google Maps Plugin    -->
                    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
                    <!-- Chart JS -->
                    <script src="../assets/js/plugins/chartjs.min.js"></script>
                    <!--  Notifications Plugin    -->
                    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
                    <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
                    <script src="../assets/js/black-dashboard.min.js?v=1.0.0" type="text/javascript"></script>
                    <script>
                        $(document).ready(function() {
                            $().ready(function() {
                                $sidebar = $('.sidebar');
                                $navbar = $('.navbar');

                                $full_page = $('.full-page');

                                $sidebar_responsive = $('body > .navbar-collapse');
                                sidebar_mini_active = true;
                                white_color = false;

                                window_width = $(window).width();

                                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



                                $('.fixed-plugin a').click(function(event) {
                                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                                    if ($(this).hasClass('switch-trigger')) {
                                        if (event.stopPropagation) {
                                            event.stopPropagation();
                                        } else if (window.event) {
                                            window.event.cancelBubble = true;
                                        }
                                    }
                                });

                                $('.fixed-plugin .background-color span').click(function() {
                                    $(this).siblings().removeClass('active');
                                    $(this).addClass('active');

                                    var new_color = $(this).data('color');

                                    if ($sidebar.length != 0) {
                                        $sidebar.attr('data-color', new_color);
                                    }

                                    if ($navbar.length != 0) {
                                        $navbar.attr('data-color', new_color);
                                    }

                                    if ($full_page.length != 0) {
                                        $full_page.attr('filter-color', new_color);
                                    }

                                    if ($sidebar_responsive.length != 0) {
                                        $sidebar_responsive.attr('data-color', new_color);
                                    }
                                });

                                $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                                    var $btn = $(this);

                                    if (sidebar_mini_active == true) {
                                        $('body').removeClass('sidebar-mini');
                                        sidebar_mini_active = false;
                                        blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
                                    } else {
                                        $('body').addClass('sidebar-mini');
                                        sidebar_mini_active = true;
                                        blackDashboard.showSidebarMessage('Sidebar mini activated...');
                                    }

                                    // we simulate the window Resize so the charts will get updated in realtime.
                                    var simulateWindowResize = setInterval(function() {
                                        window.dispatchEvent(new Event('resize'));
                                    }, 180);

                                    // we stop the simulation of Window Resize after the animations are completed
                                    setTimeout(function() {
                                        clearInterval(simulateWindowResize);
                                    }, 1000);
                                });

                                $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                                    var $btn = $(this);

                                    if (white_color == true) {

                                        $('body').addClass('change-background');
                                        setTimeout(function() {
                                            $('body').removeClass('change-background');
                                            $('body').removeClass('white-content');
                                        }, 900);
                                        white_color = false;
                                    } else {

                                        $('body').addClass('change-background');
                                        setTimeout(function() {
                                            $('body').removeClass('change-background');
                                            $('body').addClass('white-content');
                                        }, 900);

                                        white_color = true;
                                    }


                                });

                                $('.light-badge').click(function() {
                                    $('body').addClass('white-content');
                                });

                                $('.dark-badge').click(function() {
                                    $('body').removeClass('white-content');
                                });
                            });
                        });
                    </script>
</body>

</html>