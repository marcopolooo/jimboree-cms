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
                <form role="form" action="<?php echo base_url('master-data/contacts/store'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Alamat</label>
                        <div class="col-lg-10">
                         <textarea name="alamat" id="" cols="30" rows="10" class="form-control"></textarea><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Telephone</label>
                        <div class="col-lg-10">
                          <input type="number" class="form-control" id="class" placeholder="Enter Telephone" name="telephone" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">No Fax</label>
                        <div class="col-lg-10">
                          <input type="number" class="form-control" id="class" placeholder="Enter No Fax" name="no_fax" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Email</label>
                        <div class="col-lg-10">
                          <input type="email" class="form-control" id="class" placeholder="Enter Email" name="no_email" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Media Center</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="class" placeholder="Enter Media Center" name="media_center" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Staff Direcctory</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="class" placeholder="Enter Staff Direcctory" name="staff_direcctory" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Facebook</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="class" placeholder="Enter Facebook" name="facebook" required><br>
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