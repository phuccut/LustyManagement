<?php
if (isset($this->session->userdata['DangNhap'])) 
{
    $Ten = ($this->session->userdata['DangNhap']['Ten']);
    $TenDangNhap = ($this->session->userdata['DangNhap']['TenDangNhap']);
} else 
{
    redirect(base_url('login'));
}   
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url();?>static/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="<?=base_url();?>static/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Lusty</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>static/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS -->
    <link href="<?=base_url();?>static/assets/css/material-dashboard.css?v=1.2.1" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="blue" data-background-color="white" data-image="<?=base_url();?>static/assets/img/sidebar-4.jpg">
            <div class="logo">
                <a href="http://localhost:2627/lusty/" class="simple-text logo-mini">
                    THE
                </a>
                <a href="http://localhost:2627/lusty/" class="simple-text logo-normal">
                    LUSTY
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="https://scontent-nrt1-1.xx.fbcdn.net/v/t1.0-9/22814146_1323905374399096_5277275962586674948_n.jpg?oh=d1cf67a4ee94f0c3e1b6b6df9c9cc6a9&oe=5ABB6B22" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                <?php echo $TenDangNhap ?>    
                                <b class="caret"></b>
                            </span>
                        </a>
                        <div class="clearfix"></div>
                        <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a href="#">
                                        <span class="sidebar-mini"> TT </span>
                                        <span class="sidebar-normal"> Thông tin cá nhân </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="sidebar-mini"> MK </span>
                                        <span class="sidebar-normal"> Đổi mật khẩu </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('login/Logout');?>">
                                        <span class="sidebar-mini"> ĐX </span>
                                        <span class="sidebar-normal"> Đăng xuất </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">
                    <li>
                        <a href="<?php echo base_url('Home') ?>">
                            <i class="material-icons">dashboard</i>
                            <p> Trang chủ </p>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="collapse" href="#pagesExamples">
                            <i class="material-icons">image</i>
                            <p> Quản lý giao dịch
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse <?php if ($subView=='GiaoDich/index') echo 'in' ?>" id="pagesExamples">
                            <ul class="nav">
                                <li class="<?php if ($subView=='GiaoDich/index') echo 'active' ?>">
                                    <a href="<?php echo base_url('GiaoDich') ?>">
                                        <span class="sidebar-mini"> GD </span>
                                        <span class="sidebar-normal"> Giao dịch </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="./pages/rtl.html">
                                        <span class="sidebar-mini"> LGD </span>
                                        <span class="sidebar-normal"> Loại giao dịch </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="<?php if ($subView=='SanPham/index') echo 'active' ?>">
                        <a href="<?php echo base_url('SanPham') ?>">
                            <i class="material-icons">room_service</i>
                            <p> Quản lý sản phẩm</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> The Lusty Management </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">
                                        Thông báo
                                        <b class="caret"></b>
                                    </p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Bị lừa rồi, Phúc chưa làm phần này</a>
                                    </li>
                                    <li>
                                        <a href="#">Bị lừa rồi, Phúc chưa làm phần này</a>
                                    </li>
                                    <li>
                                        <a href="#">Bị lừa rồi, Phúc chưa làm phần này</a>
                                    </li>
                                    <li>
                                        <a href="#">Bị lừa rồi, Phúc chưa làm phần này</a>
                                    </li>
                                    <li>
                                        <a href="#">Bị lừa rồi, Phúc chưa làm phần này</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                        <form class="navbar-form navbar-right" role="search">
                            <div class="form-group form-search is-empty">
                                <input type="text" class="form-control" placeholder=" Search ">
                                <span class="material-input"></span>
                            </div>
                            <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                <i class="material-icons">search</i>
                                <div class="ripple-container"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
            <div class="content">
                <?php if (isset($subView)) $this->load->view($subView); ?>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portofolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.phuccc.com"> Phuccut </a>, The Lusty Corp
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="<?=base_url();?>static/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>static/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>static/assets/js/material.min.js" type="text/javascript"></script>
<script src="<?=base_url();?>static/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="<?=base_url();?>static/assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?=base_url();?>static/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?=base_url();?>static/assets/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="<?=base_url();?>static/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="<?=base_url();?>static/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="<?=base_url();?>static/assets/js/bootstrap-notify.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="<?=base_url();?>static/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="<?=base_url();?>static/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="<?=base_url();?>static/assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="<?=base_url();?>static/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="<?=base_url();?>static/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="<?=base_url();?>static/assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?=base_url();?>static/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="<?=base_url();?>static/assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="<?=base_url();?>static/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?=base_url();?>static/assets/js/material-dashboard.js?v=1.2.1"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?=base_url();?>static/assets/js/demo.js"></script>
 <?php if (isset($subScript)) $this->load->view($subScript); ?>
</html>