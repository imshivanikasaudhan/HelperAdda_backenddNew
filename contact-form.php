
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <!-- Head -->
  <?php $title ='Contact Form - Helper Adda'; $page = 'contact Form'; $active = 'form'; require 'Components/head.php';?>
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
              <h4 class="fw-bold text-center py-3 mb-4">Contact Form</h4>


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
                        <th>Mobile No.</th>
                        <th>Service Name</th>
                        <th>Message</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>1</strong></td>
                        <td>Albert Cook</td>
                        <td>dharmenderkumar223</td>
                        <td>9716625480</td>
                        <td>Cook</td>
                        <td>Need Cook</td>                      
                      </tr>                     
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Striped Rows -->


            </div>
            <!-- / Content -->

            <!-- Footer -->
            <?php require 'Components/footer.php';?>
            <!-- /Footer -->

