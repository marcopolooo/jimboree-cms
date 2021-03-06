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
                <form role="form" action="<?php echo base_url('master-data/parents/update'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <!-- image-preview-filename input [CUT FROM HERE]-->
                        <label for="image" class="col-lg-2">Image</label>
                        <div class="col-lg-10">
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-default btn-file">
                                      Browse… <input type="file" id="imgInp" name="image">
                                  </span>
                              </span>
                              <input type="text" name="input-news-image" value="<?php echo "http://localhost/jimboree-cms/" . explode("jimboree-cms/", $data[0]['image'])[1]; ?>" class="form-control" readonly>
                          </div>
                          <img id='img-upload' src="<?php echo base_url() . explode("jimboree-cms/", $data[0]['image'])[1]; ?>" />
                        </div>
                      </div>
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
                        <label class="col-lg-2" for="telephone">Telephone</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="telephone" placeholder="Enter telephone" name="telephone" value="<?php echo $data[0]['telephone']; ?>" maxlength="45" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="class">Agama</label>
                        <div class="col-lg-10">
                        <select class="form-control" name="id_agama">
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
                          <select class="form-control" name="role_parents">
                          <option value="1" <?php if ($data[0]['role_parents'] == 1){echo 'selected';} ?>>Ayah</option>
                            <option value="2" <?php if ($data[0]['role_parents'] == 2){ echo 'selected'; }?>>Ibu</option>
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
    });
    </script>
    <?php $this->load->view('layouts/footer.php'); ?>