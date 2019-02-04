<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add Extracuricullar to Student
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Extracuricullar to Student</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('extracuricullar-student/store'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="student">Student</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="class" placeholder="Enter Student" name="student" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Choose Extracuricullar</label>
                        <div class="col-lg-10">
                          <div class="form-group">
                            <?php 
                              foreach ($extracuricullar as $e) {
                                echo "
                                  <label style='padding-right: 20px'>
                                    <input type='checkbox' value='" . $e->id ."' class='flat-red'> " . $e->jenis_extracuricullar ."
                                  </label>
                                ";
                              }
                            ?>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('extracuricullar-student'); ?>" class="btn btn-danger">Cancel</a>
                    </div>
                  </form>
              </div>
            </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('layouts/footer.php'); ?>
    <script>
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
    </script>