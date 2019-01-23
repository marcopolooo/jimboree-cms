<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add Events
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Events</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/events/store'); ?>" method="post">
                  <div class="box-body">
                  <div class="form-group">
                      <label class="col-lg-2">Holiday</label>
                      <div class="col-lg-10">
                        <div class="input-group" style="margin-bottom: 20px">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                            <input type="text" class="form-control pull-right" id="datepicker" name="holiday" data-date-format="yyyy-mm-dd" required><br>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2">Testing</label>
                      <div class="col-lg-10">
                        <div class="input-group" style="margin-bottom: 20px">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                            <input type="text" class="form-control pull-right" id="datepicker" name="testing" data-date-format="yyyy-mm-dd" required><br>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2">Fieldtrip</label>
                      <div class="col-lg-10">
                        <div class="input-group" style="margin-bottom: 20px">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                            <input type="text" class="form-control pull-right" id="datepicker" name="fieldtrip" data-date-format="yyyy-mm-dd" required><br>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-2">Meeting</label>
                      <div class="col-lg-10">
                        <div class="input-group" style="margin-bottom: 20px">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                            <input type="text" class="form-control pull-right" id="datepicker" name="meeting" data-date-format="yyyy-mm-dd" required><br>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary" >Submit</button>
                    <a href="<?php echo base_url('master-data/events'); ?>" class="btn btn-danger">Cancel</a>
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