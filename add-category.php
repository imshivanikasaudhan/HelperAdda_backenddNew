<?php 
include 'login/database/_dbconnect.php';  

$api_url = 'https://helperadda.com/helperadda_backend/social/public/api/categories';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
// $user_data = $response_data->data;

// Cut long data into small & select only first 10 records
$user_data = array_slice($response_data, 0, 100);

// Print data if need to debug
//print_r($user_data);

// Traverse array and display user data

?>

<?php 
    include 'login/database/_dbconnect.php';  
    // $result = mysqli_query($conn, "SELECT * FROM `categories` WHERE parent_id = 0");
  $result = mysqli_query($conn, "SELECT * FROM `categories`");
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/">
<!-- Head -->
<?php $page = 'add category'; $active = 'category'; $title ='Add Category - Helper Adda'; require 'Components/head.php';?>
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
                        <!--<h4 class="fw-bold py-3 mb-4">Add Category</h4>-->

                        <form action="" method="GET">
                            <div class="row mb-3">
                                <div class="col-md-10">
                                    <select class="form-select" id="" name="category_id" onchange="getData()">
                                        <option selected="">Select Category</option>
                                        <?php foreach ($user_data as $user)
                                                          {
                                                          ?>
                                        <option value="<?php $cid = $user->id; echo $cid;?>">
                                            <?php echo $user->category;?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>

                        <div class="card">
                            <h5 class="card-header text-center">All Category</h5>
                            <div class="table-responsive text-nowrap">
                                <?php
                                    // Turn off all error reporting
                                        error_reporting(0);
                                    $cid = $_GET['category_id'];
                                    $api_id_url = 'https://helperadda.com/helperadda_backend/social/public/api/category/' . $cid; 
                                    // Read JSON file
                                    $json_data_id = file_get_contents($api_id_url);
                                    
                                    // Decode JSON data into PHP array
                                    $response_data_id = json_decode($json_data_id);
                                    
                                    // Cut long data into small & select only first 10 records
                                    $user_data_id = array_slice($response_data_id, 0, 100);
                                    
                                    // Print data if need to debug
                                    // print_r($user_data_id);
                                    
                                ?>
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Category Id</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <?php $serial_no = 1; foreach ($user_data_id as $user_details)                                     
                                      	{ ?>
                                    <tbody class="table-border-bottom-0">
                                        
                                        <tr>
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                <strong><?php echo $serial_no++;?></strong>
                                            </td>
                                            <td><?php echo $user_details->id;?></td>
                                            <td><?php echo $user_details->category;?></td>
                                            <td><?php $desc = $user_details->category_desc;  echo wordwrap($desc, 80,"<br>\n");?>
                                            </td>
                                            <td><img src="<?php echo $user_details->image; ?>" alt="category_image" class=""
                                                    style="max-width:100%;" /></td>
                                            <td>

                                                <!-- Default switch -->
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">
                                                 </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <a class="dropdown-item" href="edit?sno=<?php echo $user_details->id;?>"
                                                        data-bs-toggle="modal" data-bs-target="#basicModal"><i
                                                            class="bx bx-edit-alt me-1"></i></a>
                                                    <a class="dropdown-item"
                                                        href="delete?sno=<?php echo $user_details->id;?>"
                                                        data-bs-toggle="modal" data-bs-target="#modalToggle"><i
                                                            class="bx bx-trash me-1"></i> </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php }?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    

                    <div class="mt-3">
                        <!-- Button trigger modal -->
                        <!-- Update Category Modal -->
                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Update Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="categoryName" class="form-label">Update Category
                                                    Name</label>
                                                <input type="text" id="categoryName" class="form-control"
                                                    placeholder="Category Name" />
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="addCategoryTextarea" class="form-label">Update
                                                Description</label>
                                            <textarea class="form-control" id="addCategoryTextarea" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Choose Image</label>
                                            <input class="form-control" type="file" id="formFile">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Model -->
                    <div class="col-lg-4 col-md-6">
                        <div class="mt-3">
                            <!-- Modal 1-->
                            <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1"
                                style="display: none" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="delete.php" method="GET">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalToggleLabel">Delete Record</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <input type="type" name="category_id" id="">
                                            <div class="modal-body">Are Your Sure Want Delete</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" type="submit" name="delete_record">
                                                    Delete
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- js for category dropdown -->
                    <!--<script>-->
                    <!--    function getData() {-->
                    <!--      $id = document.getElementById('my-select-box').value;-->
                    <!--      $ch = curl_init('https://helperadda.com/helperadda_backend/social/public/api/category/' . $id);-->
                    <!--      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);-->
                    <!--      $response = curl_exec($ch);-->
                    <!--      curl_close($ch);-->
                        
                          <!-- // Decode the JSON response from the API. -->
                    <!--      $data = json_decode($response);-->
                        
                          <!-- // Display the data on the page. -->
                    <!--      document.getElementById('user-data').innerHTML = '<h2>' + data.name + '</h2><p>' + data.email + '</p>';-->
                    <!--    }-->
                    <!--</script>-->
                    
                    <!-- /js for category dropdown -->
                    <!-- Footer -->
                    <?php require 'Components/footer.php';?>
                    <!-- /Footer -->