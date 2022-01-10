<?php
include 'session.php';
include 'callbacks/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once('header.php'); ?>

<body>

  <?php include_once('preloader.php'); ?>


  <!--**********************************
  Main wrapper start
  ***********************************-->
  <div id="main-wrapper">


    <?php

    include_once('nav_header.php');
    include_once('page_header.php');
    include_once('left_navigation.php');

    ?>


    <!--**********************************
    Content body start
    ***********************************-->
    <div class="content-body">
      <!-- row -->
      <div class="container-fluid">
        <div class="row">


          <div class="col-lg-12">

            <div class="card">
              <div class="card-title">
                <h4 class="pt-3 ml-3">Pages</h4>

              </div>
              <div class="card-body">



                <!-- Display status message -->
                <?php if(!empty($statusMsg)){ ?>
                  <div class="col-xs-12">
                    <div class="alert <?php echo $statusType; ?>"><?php echo $statusMsg; ?></div>
                  </div>
                <?php } ?>

                <div class="row">
                  <!-- Import link -->
                  <div class="col-md-12 head">
                    <div class="float-right">
                      <button class="btn btn-primary mb-3 new-page-button">Create</button>
                    </div>
                  </div>
                </div>


                <!-- Data list table -->
                <table class="table table-striped table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th>#ID</th>
                      <th>Title</th>
                      <th>Time</th>
                      <?php if($_SESSION['userid'] == 1) {?>
                        <th>Action</th>
                      <?php }?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Get member rows
                    $result = $con->query("SELECT * FROM pages ORDER BY id ASC");
                    $index = 0;
                    if($result->num_rows > 0){
                      while($row = $result->fetch_assoc()){
                        $index++;
                        ?>
                        <tr>
                          <td><?php echo $index; ?></td>
                          <td><?php echo $row['page_title']; ?></td>
                          <td><?php echo $row['create_at']; ?></td>
                          <?php if($_SESSION['userid'] == 1) {?>
                            <td>
                              <div style="display:flex">
                                <button class="btn btn-primary edit_page mr-1" id=<?php echo $row['id']; ?>>
                                  <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-danger del_page" id=<?php echo $row['id']; ?>>
                                  <i class="fa fa-trash"></i>
                                </button>
                              </div>
                            </td>
                          <?php }?>
                          
                        </tr>
                      <?php } }else{ ?>
                        <tr><td colspan="5">No pages(s) found...</td></tr>
                      <?php } ?>
                    </tbody>
                  </table>


                </div>

              </div>
            </div>

          </div>



        </div>
      </div>
      <!--**********************************
      Content body end
      ***********************************-->


      <?php include_once('footer.php'); ?>

      <!--**********************************
      Support ticket button start
      ***********************************-->

      <!--**********************************
      Support ticket button end
      ***********************************-->


    </div>
    <!--**********************************
    Main wrapper end
    ***********************************-->

    <?php  include_once('scripts.php'); ?>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script type="text/javascript" src="js/pages.js"></script>
  </body>

  </html>
