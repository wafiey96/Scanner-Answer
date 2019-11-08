<?php
if (isset($_POST['submit1'])){


    $db=mysqli_connect("localhost","root","1234","acs");

    $check = $_POST['id_check'];
    $subject=$_POST['subject'];
    $paper=$_POST['paper'];
    $standard=$_POST['standard'];
    $target ="image/".basename($_FILES['image']['name']);
    $image=$_FILES['image']['name'];
    $score = $_POST['score'];


    $sql= "INSERT INTO dbo_answer (id_check,subject,paper,standard,image,score) VALUES
          ($id_check,'$subject','$standard','$paper','$image','$score')";
    mysqli_query($db,$sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg ="Image Uploaded";
    }else{
        $msg ="there was problem uploading";
    }



}

?>
<style type="text/css">
.thumb-image{
 width:200px;height:200px;
 position:relative;
 padding:5px;
}
</style>
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
                    <li>
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
                            <div class="search-bar input-group">
                                <!-- <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="tim-icons icon-simple-remove"></i>
          </button>
        </div>

        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div> -->
                                <li class="separator d-lg-none"></li>
                        </ul>
                        </div>
                    </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="col-md-12">
                    <div class="card  card-plain">
                        <div class="card-header">
                            <h4 class="card-title">Result</h4>
                            <p class="category">Check between Answer Scheme and Student Answer</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table tablesorter " id="">
                                    <thead class=" text-primary">
                                        <th>
                                            Answer Scheme
                                        </th>
                                        <th>
                                            Student Answer
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="../examples/image/test_data1.jpeg" width="200px" height="200px">
                                                <br><label>Subject</label><br>
                                                <br><label>Type of Paper</label><br>
                                                <br><label>Standard</label><br>
                                            </td>
                                            <td>
                                            <div id="image-holder"></div>
                                            <div>
                                                <br><label for ="subject">Math</label><br>
                                                <br><label for ="paper">Homework</label><br>
                                                <br><label for ="standard">One</label><br>
                                            </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                        <div class="col-md-4 pr-md-1">
                                        <input id="fileUpload"  type="file" onchange="OCRFile(this.files[0], function(text){alert(text)})" name="image"/>
                                    <br><label>Score</label><br>
                                <input type="text" class="form-control" placeholder="Score" name="score"><br>
                                <br><label>ID Check</label><br>
                                <input type="text" class="form-control" placeholder="Score" name="id_check"><br>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary" name="submit1" value="submit">Submit</button>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                    </div>
                </footer>
            </div>
            <!--   Core JS Files   -->
            <script src="http://antimatter15.com/ocrad.js/ocrad.js"></script>
            <script src="../assets/js/core/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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

                $(document).ready(function() {

        $("#fileUpload").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++)
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
        });
      });
      function OCRImage(image){
                var canvas = document.createElement('canvas')
                canvas.width  = image.naturalWidth;
                canvas.height = image.naturalHeight;
                canvas.getContext('2d').drawImage(image, 0, 0)
                return OCRAD(canvas)
            }

            function OCRPath(url, callback){
                var image = new Image()
                image.src = url;
                image.onload = function(){ callback(OCRImage(image)) }
            }

            function OCRFile(file, callback){
                var reader = new FileReader();
                reader.onload = function(){ OCRPath(reader.result, callback); }
                reader.readAsDataURL(file)
            }
</script>
</body>

</html>