  <?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add Class
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Class</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/parents/store'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="class">Parents</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="class" placeholder="Enter Parents" name="nama" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="class">Alamat</label>
                        <div class="col-lg-10">
                          <!-- <input type="text" class="form-control" id="class" placeholder="Enter class" name="nama_ruang_kelas" required><br> -->
                          <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="class">Agama</label>
                        <div class="col-lg-10">
                          <!-- <input type="text" class="form-control" id="class" placeholder="Enter class" name="nama_ruang_kelas" required><br> -->
                          <select name="id_agama" id="" class="form-control">
                          <?php 
                            foreach ($agama as $a ) {
                              echo "<option value='". $a->id_agama . "'>" . $a->nama_agama . "</option>";
                            }
                          ?>
                          </select><br>
                          </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="class">Parents</label>
                        <div class="col-lg-10">
                          <!-- <input type="text" class="form-control" id="class" placeholder="Enter class" name="nama_ruang_kelas" required><br> -->
                          <select name="role_parents" id="" class="form-control">
                          <option value="ayah">Ayah</option>
                          <option value="ibu">Ibu</option>
                          </select><br>                     
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/parents'); ?>" class="btn btn-danger">Cancel</a>
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