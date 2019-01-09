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
            <div class="col-sm-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('study/update'); ?>" method="put">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="study">Mata Pelajaran</label>
                        <div class="col-lg-10">
                          <input type="email" class="form-control" id="study" placeholder="Enter study" name="study" value="<?php echo $data[0]['nama_mapel']; ?>"><br>
                          <button type="submit" class="btn btn-primary" >Submit</button>
                          <a href="<?php echo base_url('study'); ?>" class="btn btn-danger">Cancel</a>
                        </div>            
                      </div>
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