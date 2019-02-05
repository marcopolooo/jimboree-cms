  <?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add Testimoni
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Testimoni</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('transaction/testimoni/store'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="desc">Testimoni</label>
                        <div class="col-lg-10">
                          <textarea class="textarea" name="testimoni" id="testimoni" required></textarea><br><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="class">Parents Name</label>
                        <div class="col-lg-10">
                          <!-- <input type="text" class="form-control" id="class" placeholder="Enter class" name="nama_ruang_kelas" required><br> -->
                          <select name="parents_id" id="" class="form-control">
                            <?php 
                              foreach ($parents as $p ) {
                                echo "<option value='". $p->id_parents . "'>" . $p->nama . "</option>";
                              }
                            ?>
                          </select><br>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('transaction/testimoni'); ?>" class="btn btn-danger">Cancel</a>
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