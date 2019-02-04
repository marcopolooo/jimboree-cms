  <?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add Experience
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Experience</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                  <form role="form" action="<?php echo base_url('master-data/experience/store'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="passing_universities">Passing Universities</label>
                        <div class="col-lg-10">
                          <input type="text" pattern="\d*" class="form-control" placeholder="Enter Passing Universities" name="passing_universities" maxlength="3" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="people_working">People Working</label>
                        <div class="col-lg-10">
                          <input type="text" pattern="\d*" class="form-control" placeholder="Enter People Working" name="people_working" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="student_enrolled">Student Enrolled</label>
                        <div class="col-lg-10">
                          <input type="text" pattern="\d*" class="form-control" placeholder="Enter Student Enrolled" name="student_enrolled" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="happy_smiles">Happy Smiles</label>
                        <div class="col-lg-10">
                          <input type="text" pattern="\d*" class="form-control" placeholder="Enter Happy Smiles" name="happy_smiles" required><br>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/experience'); ?>" class="btn btn-danger">Cancel</a>
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