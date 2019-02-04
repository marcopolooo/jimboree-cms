<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add School Year
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add School Year</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
            <?php 
              if ($this->session->flashdata('success')) {
                echo "<div class='alert alert-info'>".$this->session->flashdata('success')."</div>";
              }

              if ($this->session->flashdata('error')) {
                echo "<div class='alert alert-danger'>".$this->session->flashdata('error')."</div>";
              }
            ?>
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('schoolyear/store'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="sekolah">School</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="sekolah" required>
                            <?php 
                              foreach ($school as $s ) {
                                echo "<option value='". $s->id_sekolah . "'>" . $s->name_school . "</option>";
                              }
                            ?>
                          </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="desc">Description</label>
                        <div class="col-lg-10">
                          <textarea class="form-control" name="desc" id="desc" rows="3"></textarea required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="from">From</label>
                        <div class="col-lg-10">
                          <input class="form-control" id="from" placeholder="From" name="from" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="to">To</label>
                        <div class="col-lg-10">
                          <input class="form-control" id="to" placeholder="To" name="to" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="attachment" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <div class="checkbox">
                                <input type="checkbox" name="is_active" class="bootstrapswitch" id="is_active" data-size="normal" value="INACTIVE" data-on-text="Active" data-off-text="Inactive">
                            </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('schoolyear'); ?>" class="btn btn-danger">Cancel</a>
                    </div>
                  </form>
              </div>
            </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
      $(function(){
        $("#from").datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });
        $("#to").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });

        $(".bootstrapswitch").bootstrapSwitch();
        $("#is_active").on('switchChange.bootstrapSwitch', function(event, state) {
          if(state) {
            $("#is_active").val("ACTIVE");
          } else {
            $("#is_active").val("INACTIVE");
          }
        });
      });
    </script>
    <?php 
      if($data[0]['is_active'] == "ACTIVE"){
        // echo "<script>alert('kontol')</script>";
        echo '<script> $("#is_active").bootstrapSwitch("state", true); </script>';
      }
    ?>
    <?php $this->load->view('layouts/footer.php'); ?>