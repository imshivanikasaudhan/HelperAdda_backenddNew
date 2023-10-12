<?php 
// include 'login/database/_dbconnect.php';  

$api_url = 'http://3.6.48.68/social_app/public/api/list-service-provider';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
$user_data = $response_data->data;

// Cut long data into small & select only first 10 records
// $user_data = array_slice($response_data, 0, 100);

// Print data if need to debug
// print_r($response_data);

// Traverse array and display user data

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
<!-- Head -->
<?php $title ='Partner - Helper Adda'; $page = 'partner Form'; $active = 'form'; require 'Components/head.php';?>
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
                        <h4 class="fw-bold text-center py-3 mb-4">Partner</h4>


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
                                            <th>Photo</th>
                                        </tr>
                                    </thead>
                                    <?php foreach($user_data as $user){
                            ?>
                                    <tbody class="table-border-bottom-0">

                                        <tr>
                                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                <strong><?php echo $user->id;?></strong>
                                            </td>
                                            <td><?php echo $user->name;?></td>
                                            <td><?php echo $user->email;?></td>
                                            <td><?php echo $user->gender;?></td>
                                            <td><?php echo $user->mobile_no;?></td>
                                            <td><img src="<?php echo $user->photo; ?>" alt="image" class=""
                                                    style="max-width:80%;" /></td>
                                            <td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                    <?php }?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/ Striped Rows -->


                    <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="demo-inline-spacing">
                                            <!-- Basic Pagination -->
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination">
                                                    <li class="page-item first">
                                                        <a class="page-link" href="javascript:void(0);"><i
                                                                class="tf-icon bx bx-chevrons-left"></i></a>
                                                    </li>
                                                    <li class="page-item prev">
                                                        <a class="page-link" href="javascript:void(0);"><i
                                                                class="tf-icon bx bx-chevron-left"></i></a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a class="page-link" href="javascript:void(0);">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="javascript:void(0);">2</a>
                                                    </li>
                                                    <li class="page-item ">
                                                        <a class="page-link" href="javascript:void(0);">3</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="javascript:void(0);">4</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="javascript:void(0);">5</a>
                                                    </li>
                                                    <li class="page-item next">
                                                        <a class="page-link" href="javascript:void(0);"><i
                                                                class="tf-icon bx bx-chevron-right"></i></a>
                                                    </li>
                                                    <li class="page-item last">
                                                        <a class="page-link" href="javascript:void(0);"><i
                                                                class="tf-icon bx bx-chevrons-right"></i></a>
                                                    </li>
                                                </ul>
                                            </nav>
                                            <!--/ Basic Pagination -->

                                            <div class="mt-3">
                                                <!-- Button trigger modal -->
                                                <!-- Update Category Modal -->
                                                <div class="modal fade" id="basicModal" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel1">Update
                                                                    Category</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col mb-3">
                                                                        <label for="categoryName"
                                                                            class="form-label">Update Category
                                                                            Name</label>
                                                                        <input type="text" id="categoryName"
                                                                            class="form-control"
                                                                            placeholder="Category Name" />
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="addCategoryTextarea"
                                                                        class="form-label">Update Description</label>
                                                                    <textarea class="form-control"
                                                                        id="addCategoryTextarea" rows="3"></textarea>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="formFile" class="form-label">Choose
                                                                        Image</label>
                                                                    <input class="form-control" type="file"
                                                                        id="formFile">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    Close
                                                                </button>
                                                                <button type="button" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                </div>
                <!-- / Content -->

                <!-- Footer -->
                <?php require 'Components/footer.php';?>
                <!-- /Footer -->