<?php
   session_start();
   
   
   if (isset($_SESSION["name"])) {
       $name = $_SESSION["name"];
       $password = $_SESSION["password"];
       
   }else {
       echo "not working";
          
       header('location: index.php');
   }
   
   // Start the session
   
   if (isset($name)) {
   
      ?>
<!-- ==================================================== -->
<?php 
   include('action/sql_config.php');
   $id = $_GET['id'];
   $sql = "SELECT * FROM all_member_form_data WHERE id = $id";
   $result = $conn->query($sql);
   if ($result->num_rows > 0) {
   // output data of each row
   while ($row = $result->fetch_assoc()) {
   
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>SB Admin 2 - Dashboard</title>
      <link href="js/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/sweetalert2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/datatables.min.css"/>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" id="bootstrap-css">

  
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>    
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

      <style>
         form{
         height: 100%;
         }
         .sidebar_bg{
         background: #000d66;
         }
         .header-top-bg{
         background: #004d66;
         }
         body{
         font-family: 'SolaimanLipi', sans-serif !important;
         padding:0;
         margin:0;
         background: #555  ;
         height:100%;
         }
      </style>
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
      <!-- Sidebar -->
      <ul class="navbar-nav sidebar_bg sidebar sidebar-dark accordion" id="accordionSidebar">
         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon">
               <i class="fas fa-handshake"></i>
               </i>
            </div>
            <div class="sidebar-brand-text mx-3">সমিতি লি:
               <sup>1
               </sup>
            </div>
         </a>
         <!-- Divider -->
         <hr class="sidebar-divider my-0">
         <?php
            include 'date.php';
            $date= date('d-m-Y');
            echo "<span class='font-weight-bold ml-3 text-warning mt-2'> " . $date . $week_day ."</span>";
            
            ?>
         <!-- Nav Item - Dashboard -->
         <li class="nav-item active">
            <a class="nav-link" href="front-page.php">
            <i class="fas fa-home"></i>
            </i>
            <span>মূলপাতা
            </span>
            </a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
         <!-- Heading -->
         <div class="sidebar-heading">
            Interface
         </div>
         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-address-card"></i> 
            </i>
            <span>হিসাব সমূহ
            </span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">মূল হিসাব:
              </h6>
              <a class="collapse-item" href="weekly.php">সাপ্তাহিক হিসাব
              </a>
              <a class="collapse-item" href="monthly.php">মাসিক হিসাব
              </a>
              <a class="collapse-item" href="others.php">অন্যান্য হিসাব
              </a>
              <a class="collapse-item" href="cost.php">খরচ হিসাব
              </a>
            </div>
            </div>
         </li>
         <!-- Nav Item - Utilities Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-users"></i>
            </i>
            <span>সদস্য
            </span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">সদস্য সেটিংস:
                  </h6>
                  <a class="collapse-item" href="add_member.php">সদস্য যোগ করুন
                  </a>
                  <a class="collapse-item" href="running_member.php">বর্তমান সদস্য
                  </a>
                  <a class="collapse-item" href="paid_member.php">পরিশোধকৃত সদস্য
                  </a>
                  <a class="collapse-item text-danger" href="running_member.php"> সদস্য বাতিল করুন 
                  </a>
               </div>
            </div>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">
         <!-- Heading -->
         <div class="sidebar-heading">
            সাইট সেটিং
         </div>
         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="far fa-sun"></i>
            </i>
            <span>সেটিংস
            </span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                  <h6 class="collapse-header">সেটিংস:
                  </h6>
                  <a class="collapse-item" href="index.php">লগ ইন
                  </a>
                  <a class="collapse-item" href="register.php">রেজিস্টার
                  </a>
                  <a class="collapse-item" href="action/forgot-password.php">পাসওয়ার্ড ভুলে গেছেন
                  </a>
                  <div class="collapse-divider">
                  </div>
                  <h6 class="collapse-header">অন্যান্য:
                  </h6>
                  <a class="collapse-item text-danger" href="action/all_delete.php">সব সদস্য মুছুন
                  </a>
                  <a class="collapse-item text-danger" href="action/reset.php">রিসেট
                  </a>
               </div>
            </div>
         </li>
          <!-- Nav Item - Comity -->
          <li class="nav-item">
          <a class="nav-link" href="comity.php">
            <i class="fas fa-fw fa-chart-area">
            </i>
            <span>কমিটি
            </span>
          </a>
        </li>
         <!-- Nav Item - Tables -->
         <li class="nav-item">
            <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table">
            </i>
            <span>Tables
            </span>
            </a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">
         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle">
            </button>
         </div>
      </ul>
      <!-- End of Sidebar -->
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
         <h4  class="text-white header-top-bg text-center pt-1 pb-1"><?php echo $row["m_name"]; ?>
         </h4>
         <!-- Topbar -->
         <nav class="navbar navbar-expand navbar-light bg-white topbar mb-1 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars">
            </i>
            </button>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
               <!-- Nav Item - Search Dropdown (Visible Only XS) -->
               <li class="nav-item dropdown no-arrow d-sm-none">
                  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw">
                  </i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                     <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                           <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                           <div class="input-group-append">
                              <button class="btn btn-primary" type="button">
                              <i class="fas fa-search fa-sm">
                              </i>
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
               </li>
               <!-- Nav Item - Alerts -->
               <li class="nav-item dropdown no-arrow mx-1">
                  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-bell fa-fw">
                     </i>
                     <!-- Counter - Alerts -->
                     <span class="badge badge-danger badge-counter">3+
                     </span>
                  </a>
                  <!-- Dropdown - Alerts -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                     <h6 class="dropdown-header">
                        Alerts Center
                     </h6>
                     <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                           <div class="icon-circle bg-primary">
                              <i class="fas fa-file-alt text-white">
                              </i>
                           </div>
                        </div>
                        <div>
                           <div class="small text-gray-500">December 12, 2019
                           </div>
                           <span class="font-weight-bold">A new monthly report is ready to download!
                           </span>
                        </div>
                     </a>
                     <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                           <div class="icon-circle bg-success">
                              <i class="fas fa-donate text-white">
                              </i>
                           </div>
                        </div>
                        <div>
                           <div class="small text-gray-500">December 7, 2019
                           </div>
                           $290.29 has been deposited into your account!
                        </div>
                     </a>
                     <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                           <div class="icon-circle bg-warning">
                              <i class="fas fa-exclamation-triangle text-white">
                              </i>
                           </div>
                        </div>
                        <div>
                           <div class="small text-gray-500">December 2, 2019
                           </div>
                           Spending Alert: We've noticed unusually high spending for your account.
                        </div>
                     </a>
                     <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts
                     </a>
                  </div>
               </li>
               <!-- Nav Item - Messages -->
               <li class="nav-item dropdown no-arrow mx-1">
                  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-envelope fa-fw">
                     </i>
                     <!-- Counter - Messages -->
                     <span class="badge badge-danger badge-counter">7
                     </span>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                     <h6 class="dropdown-header">
                        Message Center
                     </h6>
                     <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                           <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                           <div class="status-indicator bg-success">
                           </div>
                        </div>
                        <div class="font-weight-bold">
                           <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.
                           </div>
                           <div class="small text-gray-500">Emily Fowler · 58m
                           </div>
                        </div>
                     </a>
                     <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                           <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                           <div class="status-indicator">
                           </div>
                        </div>
                        <div>
                           <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?
                           </div>
                           <div class="small text-gray-500">Jae Chun · 1d
                           </div>
                        </div>
                     </a>
                     <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                           <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                           <div class="status-indicator bg-warning">
                           </div>
                        </div>
                        <div>
                           <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!
                           </div>
                           <div class="small text-gray-500">Morgan Alvarez · 2d
                           </div>
                        </div>
                     </a>
                     <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                           <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                           <div class="status-indicator bg-success">
                           </div>
                        </div>
                        <div>
                           <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...
                           </div>
                           <div class="small text-gray-500">Chicken the Dog · 2w
                           </div>
                        </div>
                     </a>
                     <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages
                     </a>
                  </div>
               </li>
               <div class="topbar-divider d-none d-sm-block">
               </div>
              
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                     <a class="dropdown-item" href="#">
                     <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400">
                     </i>
                     প্রোফাইল
                     </a>
                     <a class="dropdown-item" href="#">
                     <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400">
                     </i>
                     সেটিংস
                     </a>
                     <div class="dropdown-divider">
                     </div>
                     <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger">
                     </i>
                     লগ আউট
                     </a>
                  </div>
               </li>
            </ul>
         </nav>
         <!-- End of Topbar -->
         <style>
            button.camera_btn{
            border-radius:50%; width:50px; height:50px; position: absolute; margin-top:-50px; right:50px; font-size:25px;
            }
            .header-top-bg{
            background: #004d66;
            }
            body{
            font-family: 'SolaimanLipi', sans-serif !important;
            padding:0;
            margin:0;
            }
         </style>
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
               <a href="running_member.php" class="btn btn-sm btn-secondary ml-2">
               <span>
               <i class="fa fa-tachometer-alt">
               </i>
               </span> বর্তমান সদস্য
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon">
               </span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                     <a href="running_member.php" class="btn btn-sm btn-secondary ml-2">বর্তমান সদস্য
                     </a>
                     <a href="running_member.php" class="btn btn-sm btn-secondary ml-2">বর্তমান সদস্য
                     </a>
                     <a href="add_member.php" class="btn btn-sm btn-info ml-2">সদস্য যোগ করুন
                     </a>
                     <a href="add_member.php" class="btn btn-sm btn-info ml-2">সদস্য যোগ করুন
                     </a>
                     <a href="member_details.php?id=<?php echo $id;?>" class="btn btn-sm btn-danger ml-2">বিস্তারিত  দেখুন
                     </a>
                  </ul>
               </div>
            </nav>
         </div>
         <div class="container mt-3">
            <div class="row">
               <div class="col-sm-3">
                  <div class="text-center mt-2 mb-3">
                     <?php
                        if($row['image']){
                        echo "<div id='img_div'>";
                        echo "<img width='200' alt='image of " . $row["m_name"] . " '  class='img-thumbnail rounded' src='images/members/" . $row['image'] . "' >";
                        echo "</div>";
                        }
                        else{
                        echo '<img width="200" src="images/app_image/blank.jpg" alt="image not found"></br>';
                        echo "<button class='camera_btn btn btn-sm btn-info'><i class='fas fa-camera'></i></button>";
                        }
                        ?>
                  </div>
               </div>
               <img src="" alt="">
               <div class="col-sm-9">
                  <div class="row mt-2">
                     <div class="col-sm-6">
                        <table class="table">
                           <h3 class="mb-3 ml-2">নাম: 
                              <span class="text-danger">
                              <?php echo $row["m_name"]; ?>
                              </span>
                           </h3>
                           <tbody>
                              <tr>
                                 <th scope="row">
                                    পিতার নাম:
                                 </th>
                                 <td > 
                                    <?php echo $row["f_name"]; ?>
                                 </td>
                              </tr>
                              <tr>
                                 <th width="200px" scope="row">সদস্য আই.ডি :
                                 </th>
                                 <td>
                                    <?php echo $row["id"]; ?>
                                 </td>
                              </tr>
                              <tr>
                                 <th scope="row">মোবাইল নং:
                                 </th>
                                 <td>
                                    <?php echo $row["phone_no"]; ?>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="col-sm-6">
                        <table class="table">
                           <h4 class="mb-3 ml-2">ঋণের পরিমাণ: 
                              <span class="text-success">
                              <?php echo $row["loan_amount"]; ?>
                              </span>
                              টাকা
                           </h4>
                           <tbody>
                              <tr>
                                 <th scope="row">মূনাফার পরিমাণ: 
                                 </th>
                                 <td>
                                    <?php echo $row["profit_amount"]; ?> /- 
                                 </td>
                              </tr>
                              <tr>
                                 <th scope="row">মোট :
                                    <?php
                                       $identy = $row["id"];
                                       $loan_amount = $row["loan_amount"];
                                       $profit_amount = $row["profit_amount"];
                                       
                                       $sql = "SELECT sum(joma) AS `joma` FROM `member_premier_data` where current_id=$identy";
                                       
                                       
                                         $result = mysqli_query($conn, $sql);
                                         $data = mysqli_fetch_array($result);
                                         $joma = $data['joma'];
                                       
                                         
                                        
                                         ?>
                                 </th>
                                 <td class="text-info">
                                    <?php 
                                       echo $loan_amount + $profit_amount;
                                        
                                       ?>  টাকা
                                 </td>
                              </tr>
                              <tr>
                                 <th width="200px" scope="row">due :
                                 </th>
                                 <td>
                                    <?php 
                                       if($joma == 0){
                                         echo $loan_amount + $profit_amount;
                                         }else{
                                           echo ($loan_amount + $profit_amount) - $joma;
                                         }
                                         
                                       
                                       ?>
                                    টাকা
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <hr>
         </div>
         <?php
            $identy = $row["id"];
            $name = $row["m_name"];
            }
            } 
            ?>
         <!-- topbar -->
         <div class="container bg-Secondary">
            <div class="row">
               <div class="col-md-12">
                  <div class="row mb-3 bg-dark">
                     <div class="col-md-3 col-sm-12 text-white mt-3 mb-2">
                        <h5 >কিস্তি আদায় :
                           <?php
                              $sql = "SELECT * FROM member_premier_data where test=$identy";
                              if ($result = mysqli_query($conn, $sql)) {
                              // Return the number of rows in result set
                              $rowcount = mysqli_num_rows($result);
                              echo "<span class='text-warning'>" .$rowcount ."</span>";
                              
                              // Free result set
                              mysqli_free_result($result);
                              }
                              ?> টি
                        </h5>
                     </div>
                     <div class="col-md-3 custom-class col-sm-12 text-white mt-3 mb-2">
                        <h5>মোট আদায় : 
                           <?php
                              $sql = "SELECT sum(joma) AS `total` FROM `member_premier_data` where current_id=$identy and name='$name'";
                              
                              $result = mysqli_query($conn, $sql);
                              $data = mysqli_fetch_array($result);
                              $loan_amount = $data['total'];
                              
                              if($loan_amount > 0){
                                echo "<span class='text-warning'>" .$loan_amount ."</span>";
                              }
                              else{
                                echo " 0 ";
                              }
                              ?> টাকা
                        </h5>
                     </div>
                     <div class="col-md-3 col-sm-12 text-white mt-3 mb-2">
                        <h5>সঞ্চয় আদায় : 
                           <?php
                              $sql = "SELECT sum(savings) AS `savings` FROM `member_premier_data` where current_id=$identy and name='$name'";
                              
                              $result = mysqli_query($conn, $sql);
                              $data = mysqli_fetch_array($result);
                              $loan_amount = $data['savings'];
                              
                              if($loan_amount > 0){
                                echo "<span class='text-warning'>" .$loan_amount ."</span>";
                              }
                              else{
                                echo " 0 ";
                              }
                              ?> টাকা
                        </h5>
                     </div>
                     <div class="col-md-3 col-sm-12 text-white">
                        <div class="text-right mt-2">
                           <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal" data-whatever="@getbootstrap">কিস্তি নিবন্ধন করুন
                           </button>
                        </div>
                     </div>
                  </div>
                  <table class="table  table-dark table-bordered" id="datatable">
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">কিস্তি যোগ করুন
                              </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;
                              </span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <form  action="premier_data_insert.php" method="post" autocomplete="off">
                                 <div class="form-group">
                                    <label for="datepicker" class="col-form-label">তারিখ:
                                    </label>
                                    <input class="form-control" name="premier_date" type="text" id="datepicker" placeholder="তারিখ*" min="2010-01-01" value="">
                                 </div>
                                 <div class="form-group">
                                    <input type="hidden" class="form-control" name="name" value="<?php echo $name; ?>" id="recipient-name">
                                 </div>
                                 <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">জমা
                                    </label>
                                    <input type="number" class="form-control" name="joma" id="recipient-name">
                                 </div>
                                 <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">সঞ্চয়
                                    </label>
                                    <input type="number" class="form-control" name="savings" id="recipient-name">
                                 </div>
                                 <div class="form-group">
                                    <input type="hidden" name="current_id" value="<?php echo $identy; ?>" class="form-control" id="recipient-name">
                                 </div>
                                 <div class="form-group">
                                    <label for="message-text" class="col-form-label">Message:
                                    </label>
                                    <textarea class="form-control" id="message-text">
                                    </textarea>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                    </button>
                                    <button type="submit" value="submit" name="submit"  class="btn btn-primary">Send message
                                    </button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
                     $sql = "SELECT * FROM member_premier_data  where current_id='$identy' and name='$name'";
                     $res = $conn->query($sql);
                     if ($res->num_rows > 0) {
                     ?>  
                  <table class="table table-dark table-striped">
                     <thead class="">
                        <tr>
                           <th>তারিখ
                           </th>
                           <th>নাম
                           </th>
                           <th>আদায়
                           </th>
                           <th>সঞ্চয়
                           </th>
                           <th>মোট টাকা
                           </th>
                           <th>বিস্তারিত
                           </th>
                        </tr>
                     </thead>
                     <?php
                        // output data of each row
                        while ($row = $res->fetch_assoc()) {
                        echo "<tr><td> " . $row["premier_date"] . " </td>
                        <td> " . $name . "</td>
                        <td> " . $row["joma"] . "</td>
                        <td> " . $row["savings"] . "</td>
                        <td> " . $row["savings"] . "</td>
                        <td class='text-right'><a class='btn btn-danger btn-sm' id='alert' href='single_view.php?id=" . $identy . "'><i class='fas fa-trash-alt'></i></i></a>
                        <a class='btn btn-warning btn-sm btn-delete' value='1' name='actiondelete' Onclick='return ConfirmDelete();' id='alert'  href='premier_data_delete.php?id=" . $row["id"] . "&mId=". $row["current_id"] ."'><i class='fas fa-times'></i></a></td></tr>";
                        }
                        } else {
                        echo "<h5 class='text-info text-center'>কিস্তি নিবন্ধনকৃত নেই</h5>";
                        }
                        $conn->close();
                        ?>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <script src="js/vendor/jquery/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> 
      <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <script src="js/angular.js"></script>
      <script src="js/sweetalert2.all.min.js" ></script>
      <script src="js/vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> 
      <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
      <script src="js/jquery-ui.min.js"></script>
      <script src="js/sweetalert2.all.min.js" ></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js"></script>
      <!-- Page level plugins -->
      <script src="js/vendor/chart.js/Chart.min.js"></script>
      <!-- Page level custom scripts -->
      <script src="js/demo/chart-area-demo.js"></script>
      <script src="js/demo/chart-pie-demo.js"></script>
   </body>
</html>
<!-- ==================================================== -->
<?php
   }
   
   ?>