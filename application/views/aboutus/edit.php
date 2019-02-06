<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add About Us
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add About Us</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/aboutus/update'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                      <input type="hidden" name="id" value="<?php echo $data[0]['id']; ?>">
                      <div class="form-group">
                        <label class="col-lg-2" for="title">Title</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?php echo $data[0]['title']; ?>" class="form-control" placeholder="Enter Title" name="title" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="title2">Title 2</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?php echo $data[0]['title2']; ?>" class="form-control" placeholder="Enter Title 2" name="title2" ><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="title3">Title 3</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?php echo $data[0]['title3']; ?>" class="form-control" placeholder="Enter Title 3" name="title3" ><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="desc">Desc</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?php echo $data[0]['desc']; ?>" class="form-control" placeholder="Enter Desc" name="desc" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="desc2">Desc 2</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?php echo $data[0]['desc2']; ?>" class="form-control" placeholder="Enter Desc 2" name="desc2" ><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <!-- image-preview-filename input [CUT FROM HERE]-->
                        <label for="image" class="col-lg-2">Image</label>
                        <div class="col-lg-10">
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-default btn-file">
                                      Browse… <input type="file" id="imgInp" name="images">
                                  </span>
                              </span>
                              <input type="text" value="<?php echo base_url() . explode('jimboree-cms/', $data[0]['image'])[1]; ?>" class="form-control" readonly>
                          </div>
                          <img id='img-upload' src="<?php echo base_url() . explode('jimboree-cms/', $data[0]['image'])[1]; ?>"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="attachment" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <div class="checkbox">
                                <input type="checkbox" name="is_active" class="bootstrapswitch" id="is_active" data-size="normal" data-on-text="Active" data-off-text="Inactive">
                            </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/aboutus'); ?>" class="btn btn-danger">Cancel</a>
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
    $(function() {
        $(document).on('change', '.btn-file :file', function() {
          var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
          input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
          
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            readURL(this);
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
    <?php $this->load->view('layouts/footer.php'); ?>
    <?php 
      if($data[0]['is_active'] == "ACTIVE"){
        echo '<script> $("#is_active").bootstrapSwitch("state", true); $("#is_active").val("ACTIVE"); </script>';
      }
    ?>