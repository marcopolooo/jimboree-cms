<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit Food Menu
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Food Menu</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/foodmenu/update'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Jenis Makanan</label>
                        <div class="col-lg-10">
                          <input type="hidden" value="<?php echo $data[0]['fid']; ?>" name="fid">
                          <input type="text" value="<?php echo $data[0]['jenis_makanan'] ?>" class="form-control" id="class" placeholder="Enter Makanan" name="jenis_makanan" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Jenis Minuman</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?php echo $data[0]['jenis_minuman'] ?>" class="form-control" id="class" placeholder="Enter Minuman" name="jenis_minuman" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Jenis Buah</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?php echo $data[0]['jenis_buah'] ?>" class="form-control" id="class" placeholder="Enter Buah" name="jenis_buah" required><br>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/foodmenu'); ?>" class="btn btn-danger">Cancel</a>
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