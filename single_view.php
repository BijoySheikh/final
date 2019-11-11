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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Sidebar template
    </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js">
    
    </script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
     <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">   
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
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
  </head>
  <body>
    <h2  class="text-white header-top-bg text-center pt-1 pb-1">সদস্য
    </h2>
   
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

                   $sql = "SELECT sum(joma) AS `joma` FROM `member_premier_data` where test=$identy";
                    
              
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
} else {
echo "0 results";
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
              $sql = "SELECT sum(joma) AS `total` FROM `member_premier_data` where test=$identy ";
              
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
              $sql = "SELECT sum(savings) AS `savings` FROM `member_premier_data` where test=$identy ";
              
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
                        <button type="submit" value="submit" name="submit"  class="btn btn-primary">Send message
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php
$sql = "SELECT * FROM member_premier_data  where test=$identy";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
?>  <table class="table table-dark table-striped">
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
<td> " . $row["value"] . "</td>
<td> " . $row["value"] . "</td>
<td class='text-right'><a class='btn btn-danger btn-sm' id='alert' href='single_view.php?id=" . $identy . "'><i class='fas fa-trash-alt'></i></i></a>
<a class='btn btn-warning btn-sm btn-delete' value='1' name='actiondelete' Onclick='return ConfirmDelete();' id='alert'  href='premier_data_delete.php?id=" . $row["id"] . "&mId=". $row["test"] ."'><i class='fas fa-times'></i></a></td></tr>";
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
 
  <script src="js/vendor/jquery/jquery.min.js">
 </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
 <script src="js/vendor/bootstrap/js/bootstrap.bundle.min.js">
   </script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js">
  
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8">
  </script> 
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill">
  </script>
  <script type="text/javascript" src="js/main.js">
   </script>
  <script src="js/angular.js">
  </script>
  <script src="js/sweetalert2.all.min.js" >
  </script>
   <script src="js/vendor/jquery-easing/jquery.easing.min.js">
  </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8">
    </script> 
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill">
    </script>
   <script src="js/jquery-ui.min.js">
    </script>

                
              
              
              
           
      <script src="js/sweetalert2.all.min.js" >
      </script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin-2.min.js">
      </script>
      <!-- Page level plugins -->
      <script src="js/vendor/chart.js/Chart.min.js">
      </script>
      <!-- Page level custom scripts -->
      <script src="js/demo/chart-area-demo.js">
      </script>
      <script src="js/demo/chart-pie-demo.js">
      </script>
  </body>
</html> 


<!-- ==================================================== -->


<?php
}

?>
