  <?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit class
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit class</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/class/update'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="class">Mata Pelajaran</label>
                        <div class="col-lg-10">
                          <input type="hidden" value="<?php echo $data[0]['id_class']; ?>" name="id">
                          <input type="text" class="form-control" id="class" placeholder="Enter class" name="nama_ruang_kelas" value="<?php echo $data[0]['nama_ruang_kelas']; ?>" required><br>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/class'); ?>" class="btn btn-danger">Cancel</a>
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