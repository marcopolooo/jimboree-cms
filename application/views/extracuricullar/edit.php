<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit Extracuricullar
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Extracuricullar</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/extracuricullar/update'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Nama Extracuricullar</label>
                        <div class="col-lg-10">
                          <input type="hidden" value="<?php echo $data[0]['id']; ?>" name="id">
                          <input type="text" value="<?php echo $data[0]['jenis_extracuricullar'] ?>" class="form-control" id="class" placeholder="Enter Extracuricullar" name="jenis_extracuricullar" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="image" class="col-lg-2">Image</label>
                        <div class="col-lg-10">
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-default btn-file">
                                      Browse… <input type="file" id="imgInp" name="images">
                                  </span>
                              </span>
                              <input type="text" name="input-news-image" value="<?php echo base_url() . explode("jimboree-cms/", $data[0]['icon'])[1]; ?>" class="form-control" readonly>
                          </div>
                          <img id='img-upload' src="<?php echo base_url() . explode("jimboree-cms/", $data[0]['icon'])[1]; ?>" />
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/extracuricullar'); ?>" class="btn btn-danger">Cancel</a>
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

        // $(".bootstrapswitch").bootstrapSwitch();
        // $("#is_active").on('switchChange.bootstrapSwitch', function(event, state) {
        //   if(state) {
        //     $("#is_active").val("ACTIVE");
        //   } else {
        //     $("#is_active").val("INACTIVE");
        //   }
        // });
    });
    </script>
    <?php $this->load->view('layouts/footer.php'); ?>