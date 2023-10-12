<?php 
// include 'login/database/_dbconnect.php';  

$api_url = 'http://3.6.48.68/social_app/public/api/list-customer';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
$user_data = $response_data->data;

// Cut long data into small & select only first 10 records
$data_user = array_slice($user_data, 0, 300);

// Print data if need to debug
//print_r($user_data);

// Traverse array and display user data

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <!-- Head -->
  <?php $title ='Customer - Helper Adda'; $page = ''; $active = 'Customer page'; require 'Components/head.php';?>
  <!-- /Head -->

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php require 'Components/sidebar.php';?>   
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php require 'Components/navbar.php';?>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold text-center py-3 mb-4">Customer List</h4>


              <!-- Striped Rows -->
              <div class="card">
                <!-- <h5 class="card-header">Striped rows</h5> -->
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Full Name</th>
                        <th>Email Address</th>
                        <th>Gender</th>
                        <th>Mobile No.</th>
                        <th>Address</th>
                        <th>Message</th>
                      </tr>
                    </thead>
                    <?php foreach($data_user as $user){
                            ?>
                    <tbody class="table-border-bottom-0">
                        
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong><?php echo $user->id;?></strong></td>
                        <td><?php echo $user->name;?></td>
                        <td><?php echo $user->email;?></td>
                        <td><?php echo $user->gender;?></td>
                        <td><?php echo $user->mobile_no;?></td>
                        <td><?php echo $user->address2;?></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>                      
                      </tr> 
                                        
                    </tbody>
                    <?php }?>  
                  </table>
                </div>
              </div>
              <!--/ Striped Rows -->


            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php require 'Components/footer.php';?>
            <!-- /Footer -->

