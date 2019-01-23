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
                <form role="form" action="<?php echo base_url('master-data/parents/update'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="class">Parents</label>
                        <div class="col-lg-10">
                          <input type="hidden" value="<?php echo $data[0]['id_parents']; ?>" name="id_parents">
                          <input type="text" class="form-control" id="class" placeholder="Enter Parents Name" name="nama" value="<?php echo $data[0]['nama']; ?>" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="class">Alamat</label>
                        <div class="col-lg-10">
                          <textarea name="alamat" id="" cols="30" rows="10" class="form-control"><?= $data[0]['alamat'] ?></textarea><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="class">Agama</label>
                        <div class="col-lg-10">
                        <select class="form-control" name="agama">
                            <?php 
                              echo "<option value='". $data[0]['id_agama'] . "' selected>" . $data[0]['agama'] . "</option>";
                              foreach ($agama as $a ) {
                                if($data[0]['agama'] != $a->nama_agama){
                                  echo "<option value='". $a->id_agama . "'>" . $a->nama_agama . "</option>";
                                }
                              }
                            ?>
                          </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="class">Parents</label>
                        <div class="col-lg-10">
                        <select class="form-control" name="agama">
                        <option value="ayah" <?php if ($data[0]['role_parents'] == 'ayah'){echo 'selected';} ?>>Ayah</option>
                          <option value="ibu" <?php if ($data[0]['role_parents'] == 'ibu'){ echo 'selected'; }?>>Ibu</option>
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