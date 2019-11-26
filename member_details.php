
<?php
session_start();
include('action/sql_config.php');


if (isset($_SESSION["name"])) {
    $name = $_SESSION["name"];
    $password = $_SESSION["password"];
    
}else {
    echo "not working";
       
    header('location: index.php');
}
// Start the session
if (isset($name)) {
 
   
$id = $_GET['id'];
/* total joma */


$sql = "SELECT sum(joma) AS `joma` FROM `member_premier_data` where current_id=$id";
        
      
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);
if($data){
 $joma = $data['joma'];
}
$sql = "SELECT * FROM all_member_form_data WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while ($row = $result->fetch_assoc()) {
   ?>
<!-- --------------------------------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>
 <!-- Custom fonts for this template-->
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
    <link rel="stylesheet" href="css/member_detail.css">
    <style>
          .ui-input{
          border: none !important;
          border-color: transparent !important;
      }
        tr,h3,h4  {
            line-height: 1;
            }
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
        <hr class="sidebar-divider"
        >
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
        <!-- Nav Item - Charts -->
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
        
          <!-- Topbar -->
          <nav class="navbar navbar-expand navbar-light header-top-bg topbar mb-1 static-top shadow">
          <h  class="text-white  text-center pt-1 pb-1">সদস্যের বিবরণ
          </h>
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars">
              </i>
            </button>
            
              <!-- button -->
              <ul class="navbar-nav ml-auto mt-1 mb-2 mt-lg-0">
                      

                      <a href="running_member.php" class="btn btn-sm  btn-primary ml-2 mb-1">বর্তমান সদস্য
                      </a>
                      <a href="add_member.php" class="btn btn-sm btn-success  ml-2 mb-1">সদস্য যোগ করুন
                      </a>
                    </ul>






            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
            
              <!-- Nav Item - Search Dropdown (Visible Only XS) -->
              <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw">
                  </i>
                </a>
                
                <!-- Dropdown - Messages -->
               


              <!-- Nav Item - Alerts -->

              <li class="nav-item dropdown no-arrow mx-1">
              
              
              
                
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
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna
                  </span>
                  <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                </a>
                
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



          
          

  <!-- Bootstrap core JavaScript-->



  <div class="container">
        <div class="row mt-3">
            <div class="col-md-3">
            <div class="d-flex mt-4">
			<div class="image_outer_container">
				<div class="green_icon"></div>
				<div class="image_inner_container shadow">
        <?php
if($row['image']){
echo "<div id='img_div'>";
echo "<img  alt='image of " . $row["m_name"] . " ' src='images/" . $row['image'] . "' >";
echo "</div>";
}
else{
echo '<img src="images/app_image/blank.jpg" alt="image not found"></br>';
echo "<button class='camera_btn btn btn-sm btn-info'><i class='fas fa-camera'></i></button>";
}
?>
				</div>
			</div>
		</div>
            </div>     
   
            
       <!-- ============================================= 111111111  ========================================================= -->

    <div class="col-md-5 mt-4">
         <div class="card shadow p-2">
              <div class="table-responsive">
              <table class="table table-borderless">
                <thead>
                    <tr >
                      <th scope="col" width="150"><h4>নাম: </h4></th>
                    <th class="" scope="col"><h4><?php $total = $row['total_amount']; echo $row['m_name'];?></h4></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row"> <h5>পিতার নাম : </h5></th>
                    <td class=""><h5><?php echo $row['f_name'];?></h5></td>
                  
                    </tr>
                    
                    <tr>
                    <th scope="row"><h5>মোবাইল: </h5></th>
                    <td class=""><h5><?php echo $row['phone_no'];?></h5></td>
                    </tr>
                </tbody>
                </table>
              </div>
          </div>
    </div> 
       <!-- table 1 end-->    


   

<!-- ============================================= 222222222 ========================================================= -->   
    
<?php
 $sql = "SELECT sum(savings) AS `savings` FROM `member_premier_data` where current_id=$id";
 
 $result = mysqli_query($conn, $sql);
 $data = mysqli_fetch_array($result);
 $savings = $data['savings'];
 $l_total= $row['total_amount'];
 $profit= $row['profit_amount'];
 
?>


    <div class="col-md-4  mt-4">
         <div class="card shadow p-2">
              <div class="table-responsive">
              <table class="table table-warning">
                <thead>
                    <tr>
                      <th scope="col"><h5 class="text-danger">মোট লোন :</h5></th>
                    <td class="text-right" scope="col"><h5><?php echo $l_total; ?> টাকা</h5></td>
                    </tr>
                    <tr>
                      <th scope="col"><h5 class="text-danger">আদায়:</h5></th>
                    <td class="text-right" scope="col"><h5><?php echo $joma;?> টাকা</h5></td>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row"><h5>বাকী: </h5></th>
                    <td class="text-right"><h5><?php echo ($l_total-$joma);?> টাকা</h5></td>
                 
                    </tr>
                <tr>
                    <th scope="row"><h5>সঞ্চয় আদায়: </h5></th>
                    <td class="text-right"><h5><?php echo $savings;?> টাকা</h5></td>
                    </tr>
                    
                
                    
                </tbody>
                </table>
              </div>
          </div>
    </div> 
       <!-- table 2 end-->    
       
       
        </div>
    </div>

<hr>


<!-- ============================================= 33333333 ========================================================= -->   

<div class="container">
<div class="text-right mb-3">
<button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-whatever="@getbootstrap">আরও তথ্য যোগ করুন</button>

</div>
    <div class="row">
    
        <div class="col-md-6 col-sm-12">
        <div class="text-center h5 mb-3">
        ঋণ সংক্রান্ত বিবরণী
        </div>
        <div class="table-responsive shadow">
      
              <table class="table table-bordered">
                <thead>
                    <tr>
                      <th scope="col" width="200"><h6 class="text-danger">ঋণ গ্রহনের তারিখ: </h6></th>
                    <td class="text-left" scope="col"><h6><?php echo $row['loan_date'];?></h6></td>
                    </tr>
                </thead>
                <tbody>
                <th scope="row"><h6>ঋণের পরিমাণ: </h6></th>
                    <td class="text-left"><h6><?php echo $row['total_amount'];?> টাকা</h6></td>
                  </tr>
              
                <tr>
                    <th scope="row"><h6>মূনাফার পরিমাণ: </h6></th>
                    <td class="text-left"><h6><?php echo $row['profit_amount'];?> টাকা</h6></td>
                    </tr>
                    <tr>
                    <th scope="row"><h6>সঞ্চয়ের পরিমাণ :  </h6></th>
                    <td class="text-left"><h6><?php echo $row['savings_amount'];?> টাকা</h6></td>
                 
                    </tr>

                    <tr>
                      <th scope="row"> <h6>মোট কিস্তির সংখ্যা: </h6></th>
                      <td class="text-left"><h6><?php echo $row['premier'];?> টি</h6></td>
                    </tr>
                    
                    <tr>
                      <th scope="row"> <h6>সাপ্তাহিক কিস্তির পরিমাণ: </h6></th>
                      <td class="text-left"><h6><?php echo $row['premier_amount'];?> টাকা</h6></td>
                    </tr>

                    
                    <tr>
                      <th scope="row"> <h6>ভর্তি ফি </h6></th>
                      <td class="text-left"><h6><?php echo $row['add_cost'];?> টাকা</h6></td>
                    </tr>
                    
                    
                    <tr>
                      <th scope="row"> <h6>অন্যান্য ফি </h6></th>
                      <td class="text-left"><h6><?php echo $row['others_cost'];?> টাকা</h6></td>
                    </tr>

                </tbody>
                </table>
              </div>
        </div>
        <!-- table 3 end -->


        <!-- table 4 -->
        <div class="col-md-6 col-sm-12">
        <div class="text-center h5 mb-2">
        সদস্যের পরিচিতি তথ্য
        </div>
        

<!-- =============================================  4444444444444  ========================================================= -->
        <form action="">
        <div class="table-responsive  shadow mt-3 p-0">
              <table class="table table-bordered">
                <thead>
                    <tr>
                      <th scope="col" width="200"><h6>বর্তমান ঠিকানা: </h6></th>
                    <td class="text-left" scope="col"><input value="<?php echo $row['present_addr'];?> " class="ui-input" type="text"></td>
                    </tr>
                </thead>
                <tbody>
                <tr>
                  <tr>
                    <th scope="row" width="200"><h6>স্থায়ী ঠিকানা: </h6></th>
                    <td class="text-left"><h6><?php echo $row['permanent_addr'];?></h6></td>
                    </tr>
                    <tr>
                    <tr>
                      <th scope="col" width="200"><h6>ভোটার আই.ডি নং: </h6></th>
                      <td class="text-left" scope="col"><h6><?php echo $row['nid'];?></h6></td>
                    </tr>
                    
                    <tr>
                    <th scope="row"> <h6>জামিনদার: </h6></th>
                    <td class="text-left"><h6><?php echo $row['refer_name'];?></h6></td>
                    </tr>
                    <tr>
                    <th scope="row"> <h6>জামিনদারের মোবাইল নং: </h6></th>
                    <td class="text-left"><h6><?php echo $row['refer_phone'];?></h6></td>
                    </tr>
                    <tr>
                      <th scope="row"><h6>জামিনদারের ঠিকানা: </h6></th>
                      <td class="text-left"><h6><?php echo $row['refer_addr'];?></h6></td>
                    </tr>
                    <tr>
                      <th scope="row"><h6>বিবাহিত: </h6></th>
                      <td class="text-left"><h6>fsdfsd</h6></td>
                    </tr>
                    <tr>
                      <th scope="row"><h6>ধর্ম: </h6></th>
                      <td class="text-left"><h6>fsdfsd</h6></td>
                    </tr>
                    <tr>
                      <th scope="row"><h6>লিঙ্গ: </h6></th>
                      <td class="text-left"><h6>fsdfsd</h6></td>
                    </tr>
                    <tr>
                      <th scope="row"><h6>বর্তমান পেশা: </h6></th>
                      <td class="text-left"><h6>fsdfsd</h6></td>
                    </tr>
                </tbody>
                </table>
              </div>
              <!-- table 4 end -->
              </form>




        </div>
        
    </div>
</div>







<table class="table table-striped table-dark table-bordered" id="datatable">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">আরও তথ্য যোগ করুন
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;
                      </span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form  action="action/more_info.php" method="post">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ভোটার আই.ডি নং
                        </label>
                        <input type="text" class="form-control" name="first_name" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:
                        </label>
                        <input type="text" class="form-control" name="last_name" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="test" value="<?php echo $identy; ?>" class="form-control" id="recipient-name">
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
                        <button type="submit" value="submit" name="submit" onclick="myFunction()"  class="btn btn-primary">ঠিক আছে
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>





<?php
    }
  }
?>



  <script src="js/vendor/jquery/jquery.min.js"></script>
  <script src="js/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="js/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="js/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>

<!-- --------------------------------------------------------------------------------------------- -->


<?php
}
?>



