<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add Contact
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Contact</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/contacts/update'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Alamat</label>
                        <div class="col-lg-10">
                         <textarea name="alamat" id="" cols="30" rows="10" class="form-control"><?= $data[0]['alamat']?></textarea><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Telephone</label>
                        <div class="col-lg-10">
                        <input type="hidden" value="<?php echo $data[0]['cid']; ?>" name="cid">
                        <input type="text" value="<?= $data[0]['telephone']?>" class="form-control" id="class" placeholder="Enter Telephone" name="telephone" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">No Fax</label>
                        <div class="col-lg-10">
                        <input type="text" value="<?= $data[0]['no_fax']?>" class="form-control" id="class" placeholder="Enter No Fax" name="no_fax"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Email</label>
                        <div class="col-lg-10">
                        <input type="email" value="<?= $data[0]['email']?>" class="form-control" id="class" placeholder="Enter Email" name="email"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Media Center</label>
                        <div class="col-lg-10">
                        <input type="text" value="<?= $data[0]['media_center']?>" class="form-control" id="class" placeholder="Enter Media Center" name="media_center"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Staff Direcctory</label>
                        <div class="col-lg-10">                          
                          <input type="text" value="<?= $data[0]['staff_directory']?>" class="form-control" id="class" placeholder="Enter Staff Direcctory" name="staff_directory"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Facebook</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?= $data[0]['facebook']?>" class="form-control" id="class" placeholder="Enter Facebook" name="facebook"><br>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/contacts'); ?>" class="btn btn-danger">Cancel</a>
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