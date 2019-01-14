  <?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit Study
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Study</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/subjects/update'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="study">Mata Pelajaran</label>
                        <div class="col-lg-10">
                          <input type="hidden" value="<?php echo $data[0]['mid']; ?>" name="id">
                          <input type="text" class="form-control" id="study" placeholder="Enter study" name="nama_mapel" value="<?php echo $data[0]['nama_mapel']; ?>" required><br>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/subjects'); ?>" class="btn btn-danger">Cancel</a>
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