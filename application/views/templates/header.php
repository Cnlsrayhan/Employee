<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="<?= BASE_URL('assets/images/i-login.png'); ?>" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?= BASE_URL('assets/images/i-login.png'); ?>" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Login - tabler.github.io - a responsive, flat and full featured admin template</title>
    <!-- jQuery 3.2.1 -->
    <script src="<?= BASE_URL('assets/tabler/js/vendors/jquery-3.2.1.min.js'); ?>"></script>
    <!-- Dashboard Core -->
    <link href="<?= BASE_URL('assets/tabler/css/dashboard.css'); ?>" rel="stylesheet" />
    <script src="<?= BASE_URL('assets/tabler/js/dashboard.js'); ?>"></script>
    <script src="<?= BASE_URL('assets/tabler/js/core.js'); ?>"></script>
    <script src="<?= BASE_URL('assets/tabler/js/vendors/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= BASE_URL('assets/tabler/js/vendors/jquery.sparkline.min.js'); ?>"></script>
    <script src="<?= BASE_URL('assets/tabler/js/vendors/selectize.min.js'); ?>"></script>
    <script src="<?= BASE_URL('assets/tabler/js/vendors/jquery.tablesorter.min.js'); ?>"></script>
    <script src="<?= BASE_URL('assets/tabler/js/vendors/circle-progress.min.js'); ?>"></script>
    <!-- FlexSelect -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL('assets/tabler/plugins/flexselect-0.9.0/flexselect.css'); ?>">
    <script src="<?= BASE_URL('assets/tabler/plugins/flexselect-0.9.0/liquidmetal.js'); ?>"></script>
    <script src="<?= BASE_URL('assets/tabler/plugins/flexselect-0.9.0/jquery.flexselect.js'); ?>"></script>
    <!-- jQuery UI -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL('assets/tabler/plugins/jquery-ui/jquery-ui.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL('assets/tabler/plugins/jquery-ui/theme.jquery-ui.css'); ?>">
    <script src="<?= BASE_URL('assets/tabler/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>
    <!-- Sweetalert3 -->
    <script src="<?= BASE_URL('assets/tabler/plugins/sweetalert3/sweetalert.min.js'); ?>"></script>
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="<?= BASE_URL('assets/tabler/plugins/datatables/jquery.dataTables.css'); ?>">
    <script type="text/javascript" charset="utf8" src="<?= BASE_URL('assets/tabler/plugins/datatables/jquery.dataTables.js'); ?>"></script>
    <!-- Font-Awesome 4.7.0 -->
    <link rel="stylesheet" href="<?= BASE_URL('assets/tabler/plugins/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- ChartJS 2.7.3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

</head>
<body>
<?php 
    if ($this->session->userdata('user')){
?>
<div class="header py-4">
  <div class="container">
    <div class="d-flex">
      <a class="header-brand" href="">
        <!-- <img src="https://preview.tabler.io/demo/brand/tabler.svg" class="header-brand-img" alt="tabler logo"> -->
        Kepegawaian App <small class="font-weight-light">Web-based</small>
      </a>
      <div class="d-flex order-lg-2 ml-auto">
        <div class="dropdown d-none d-md-flex">
          <a class="nav-link icon" data-toggle="dropdown" aria-expanded="true">
            <i class="fe fe-clock"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" x-placement="bottom-end" style="position: absolute; transform: translate3d(-444px, 32px, 0px); top: 0px; left: 0px; will-change: transform;">
            <p class="text-muted pl-3 pb-0 mb-2">Your Log Acitivty</p>
            <hr class="m-0">
            <a href="#" class="dropdown-item d-flex">
              <div>
                <strong>Nathan</strong> pushed new commit: Fix page load performance issue.
                <div class="small text-muted">10 minutes ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item d-flex">
              <div>
                <strong>Alice</strong> started new task: Tabler UI design.
                <div class="small text-muted">1 hour ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item d-flex">
              <div>
                <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                <div class="small text-muted">2 hours ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item d-flex">
              <div>
                <strong>Alice</strong> started new task: Tabler UI design.
                <div class="small text-muted">1 hour ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item d-flex">
              <div>
                <strong>Rose</strong> deployed new version of NodeJS REST Api V3
                <div class="small text-muted">2 hours ago</div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item text-center text-muted-dark">See more</a>
          </div>
        </div>
        <div class="dropdown">
          <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
            <span class="avatar" style="background-image: url(<?= BASE_URL('assets/images/i-login.png'); ?>)"></span>
            <span class="ml-2 d-none d-lg-block">
              <span class="text-default"></span>
              <small class="text-muted d-block mt-1"></small>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a class="dropdown-item" href="">
              <i class="dropdown-icon fe fe-user"></i> Profil
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= BASE_URL('authentication/logout'); ?>">
              <i class="dropdown-icon fe fe-log-out"></i> Log out
            </a>
          </div>
        </div>
      </div>
      <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
        <span class="header-toggler-icon"></span>
      </a>
    </div>
  </div>
</div>

<?php  
    $myLocation = $_SERVER['PHP_SELF'];

    // Declare prepare variable
    $dashboardActive = $projectsActive = $employeeActive = $researchActive = $contentActive = $customerActive = $designActive = $recentActive = $evaluationActive = '';

     // Control button active
   if(strpos($myLocation, "account/projects")){
        $projectsActive = 'active';
    } elseif(strpos($myLocation, "account/employee")){
        $employeeActive = 'active'; 
    } elseif(strpos($myLocation, "account/research")){
      $researchActive = 'active'; 
    } elseif(strpos($myLocation, "account/content")){
      $contentActive = 'active'; 
    } elseif(strpos($myLocation, "account/customer")){
      $customerActive = 'active'; 
    } elseif(strpos($myLocation, "account/design")){
      $designActive = 'active'; 
    } elseif(strpos($myLocation, "dashboard") || strpos($myLocation, "index.php")){
        $dashboardActive = 'active';
    } elseif(strpos($myLocation, "peminjaman/index") || strpos($myLocation, "peminjaman/prepare_print")){
        $peminjamanActive = 'active';
    } elseif (strpos($myLocation, "manage")) {
        $manageActive = 'active';
    }
?>

<div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-3 ml-auto">
        <form class="input-icon my-3 my-lg-0">
          <input type="search" class="form-control header-search" placeholder="Search…" tabindex="1">
          <div class="input-icon-addon">
            <i class="fe fe-search"></i>
          </div>
        </form>
      </div>
      <div class="col-lg order-lg-first">
        <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
            <li class="nav-item">
              <a href="<?= BASE_URL('account/dashboard'); ?>" class="nav-link <?= $dashboardActive; ?>"><i class="fa fa-tachometer mr-2"></i> Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL('account/projects'); ?>" class="nav-link <?= $projectsActive; ?>"><i class="fa fa-line-chart mr-2"></i> Projects</a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL('account/employees'); ?>" class="nav-link <?= $employeeActive; ?>"><i class="fa fa-users mr-2"></i> Employees</a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL('account/research'); ?>" class="nav-link <?= $researchActive; ?>"><i class="fa fa-file-text-o mr-2"></i> Research</a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL('account/content'); ?>" class="nav-link <?= $contentActive; ?>"><i class="fa fa-newspaper-o mr-2"></i> Content</a>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL('account/customer'); ?>" class="nav-link <?= $customerActive ?>"><i class="fa fa-newspaper-o mr-2"></i> Customer</a>
            </li>

            <li class="nav-item">
              <a href="<?= BASE_URL('account/design'); ?>" class="nav-link <?= $designActive ?>"><i class="fa fa-paint-brush" aria-hidden="true"></i> Design Graphic</a>
            </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="container">
<?php } ?>