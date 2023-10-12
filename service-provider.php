<?php 
// include 'login/database/_dbconnect.php';  

$api_url = 'http://localhost/HelperAdda_backendd/rest_api/service_provider_api.php';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data);

// All user data exists in 'data' object
// $user_data = $response_data->data;

// Cut long data into small & select only first 10 records
$user_data = array_slice($response_data, 0, 100);

// Print data if need to debug
// print_r($user_data);
// $num = mysqli_num_rows($response_data);

// Traverse array and display user data
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">
<!-- Head Section-->
<?php $title ='Service Provider Query - Helper Adda'; $page = 'service provider'; $active = 'form'; require 'Components/head.php';?>
<!-- /Head Section-->

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu Sidebar Component-->
            <?php require 'Components/sidebar.php';?>
            <!-- / Menu Sidebar Component-->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar Component-->
                <?php require 'Components/navbar.php';?>
                <!-- / Navbar Component-->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold text-center py-3 mb-4">Service Provider</h4>

                        <!-- Basic Table -->
                        <div class="card">
                            <h5 class="card-header">Service Provider Query</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Address</th>
                                            <th>Query</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Message</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody class="table-border-bottom-0" id="load-table">
                                        <!-- <tr>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal"><i
                                                                class="bx bx-edit-alt me-2"></i> Edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-trash me-2"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Basic Table -->
                    </div>
                    <!-- / Content -->

                    <!-- Button trigger modal -->

                    <!-- Modal -->
                    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="form_name" class="form-label">ENTER YOUR NAME</label>
                                            <input type="text" class="form-control" id="form_name"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_name" class="form-label">COMPANY NAME</label>
                                            <input type="text" class="form-control" id="company_name"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_email" class="form-label">COMPANY EMAIL</label>
                                            <input type="text" class="form-control" id="company_email"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="select_developer" class="form-label">SELECT DEVELOPER</label>
                                            <input type="text" class="form-control" id="select_developer"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="developer_details" class="form-label">DEVELOPER DETAILS</label>
                                            <input type="text" class="form-control" id="developer_details"
                                                aria-describedby="emailHelp">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    <!--Query Fetching Data from Database-->
                    <script type="text/javascript">
                    $(document).ready(function() {
                        //Fetch All Records
                        function loadTable() {
                            $("#load-table").html("");
                            $.ajax({
                                url: 'http://localhost/HelperAdda_backendd/rest_api/service_provider_api.php',
                                type: "GET",
                                success: function(data) {
                                    if (data.status == false) {
                                        $("#load-table").append("<tr><td colspan='6'><h2>" + data
                                            .message + "</h2></td></tr>");
                                    } else {
                                        $.each(data, function(key, value) {
                                            $("#load-table").append("<tr>" +
                                                "<td><i class='fab fa-react fa-lg text-info me-3'></i><strong>" +
                                                value.id + "</strong></td>" +
                                                "<td>" + value.name + "</td>" +
                                                "<td>" + value.lname + "</td>" +
                                                "<td>" + value.address + "</td>" +
                                                "<td>" + value.query + "</td>" +
                                                "<td>" + value.email + "</td>" +
                                                "<td>" + value.mobile + "</td>" +
                                                "<td>" + value.message + "</td>" +
                                                // "<td><img src='assets/img/WhatsApp.webp' class='edit-btn' style='width:50%;' data-eid='" +
                                                // value.id + "'/></td>" +
                                                "<td><img src='assets/img/WhatsApp.webp' class='whats-btn' style='width:20%; margin-right:20px' data-id='" +
                                                value.id +
                                                "'/> <img src='assets/img/logo-gmail.png' class='email-btn' style='width:20%;' data-bs-toggle='modal' data-bs-target='#exampleModal' data-eid='" +
                                                value.id + "'></td>" +
                                                "</tr>");
                                        });
                                    }
                                }
                            });
                        }

                        loadTable();

                        // Function for form Data to JSON Object
                        function jsonData(targetForm) {
                            var arr = $(targetForm).serializeArray();

                            var obj = {};
                            for (var a = 0; a < arr.length; a++) {
                                if (arr[a].value == "") {
                                    return false;
                                }
                                obj[arr[a].name] = arr[a].value;
                            }

                            var json_string = JSON.stringify(obj);

                            return json_string;
                        }


                        //Fetch Single Record : Show in Modal Box
                        $(document).on("click", ".email-btn", function() {
                            // $("#exampleModal").show();
                            var sevice_provider_id = $(this).data("eid");
                            //Convert into object
                            var obj = {
                                sid: sevice_provider_id
                            };
                            //convert into obj into json format
                            var myJSON = JSON.stringify(obj);
                            // console.log(myJSON);

                            $.ajax({
                                url: 'https://avtarspace.com/ast_backendd/rest_api/hire_developer.php',
                                type: "POST",
                                data: myJSON,
                                success: function(data) {
                                    console.log(data);
                                    $("#edit-id").val(data[0].id);
                                    // $("#first_name").val(data[0].name);
                                    // $("#last_name").val(data[0].lname);
                                    // $("#form_address").val(data[0].address);
                                    // $("#form_query").val(data[0].query);
                                    $("#form_email_address").val(data[0].email);
                                    // $("#form_mobile").val(data[0].mobile);
                                    // $("#form_message").val(data[0].message);
                                }
                            });
                        });
                    });
                    </script>


                    <!--Model-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Send Mail Query</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="include/hire-developer-mail.php">
                                        <div class="mb-3">
                                            <label for="form_name" class="form-label">To</label>
                                            <input type="text" class="form-control" id="edit-id" name=""
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="form_name" class="form-label">To</label>
                                            <input type="text" class="form-control" id="form_email_address"
                                                name="sender_name" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="company_name" class="form-label">Subject</label>
                                            <input type="text" class="form-control" id="" aria-describedby="emailHelp"
                                                name="sender_subject">
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" placeholder="Leave a message here" id=""
                                                style="height: 100px" name="sender_message"></textarea>
                                            <!-- <label for="floatingTextarea2">Comments</label> -->
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Send Mail</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php require 'Components/footer.php';?>