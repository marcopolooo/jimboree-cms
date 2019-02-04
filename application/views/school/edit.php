<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit School
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit School</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/school/update'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Nama Sekolah <span class="read-star">*</span></label>
                        <div class="col-lg-10">
                          <input type="hidden" value="<?php echo $data[0]['id_sekolah']; ?>" name="id_sekolah">
                          <input type="text" value="<?php echo $data[0]['name_school'] ?>" class="form-control" id="class" placeholder="Enter School Name" name="name_school" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2">Tanggal Pendirian <span class="read-star">*</span></label>
                        <div class="col-lg-10">
                          <div class="input-group" style="margin-bottom: 20px">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                              <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_pendirian" value="<?php echo $data[0]['tanggal_pendirian']; ?>" data-date-format="yyyy-mm-dd" required><br>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Status Sekolah</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['status_sekolah'] ?>" class="form-control" id="class" placeholder="Enter Status School" name="status_sekolah"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Akreditasi</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['akreditasi'] ?>" class="form-control" id="class" placeholder="Enter Akreditasi" name="akreditasi"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Sertifikasi</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['sertifikasi'] ?>" class="form-control" id="class" placeholder="Enter Sertifikasi" name="sertifikasi"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Kepala Sekolah <span class="read-star">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['kepala_sekolah'] ?>" class="form-control" id="class" placeholder="Enter Kepala Sekolah" name="kepala_sekolah" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Alamat <span class="read-star">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['alamat'] ?>" class="form-control" id="class" placeholder="Enter Alamat" name="alamat" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Visi <span class="read-star">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['visi'] ?>" class="form-control" id="class" placeholder="Enter Visi" name="visi" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="school">Visi 2</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?php echo $data[0]['visi_2']; ?>" class="form-control" placeholder="Enter Visi 2" name="visi_2"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="school">Visi Subtitle</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?php echo $data[0]['visi_subtitle']; ?>" class="form-control" placeholder="Enter Visi Subtitle" name="visi_subtitle"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="visi-image">Visi Image <span class="read-star">*</span></label>
                        <div class="col-lg-10">
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-default btn-file">
                                      Browse… <input type="file" id="img-visi-image-button" name="visi-image">
                                  </span>
                              </span>
                              <input type="text" name="input-visi-image" value="<?php echo base_url() . explode("jimboree-cms/", $data[0]['visi_image'])[1]; ?>" class="form-control" readonly>
                          </div>
                          <img id='img-visi-image' src="<?php echo base_url() . explode("jimboree-cms/", $data[0]['visi_image'])[1]; ?>"  /><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">Misi <span class="read-star">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['misi']; ?>" class="form-control" id="class" placeholder="Enter Misi" name="misi" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="school">Misi 2</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?php echo $data[0]['misi_2']; ?>" class="form-control" placeholder="Enter Misi 2 " name="misi_2"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="school">Misi Subtitle</label>
                        <div class="col-lg-10">
                          <input type="text" value="<?php echo $data[0]['misi_subtitle']; ?>" class="form-control" placeholder="Enter Misi Subtitle" name="misi_subtitle"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="misi-image">Misi Image <span class="read-star">*</span></label>
                        <div class="col-lg-10">
                          <div class="input-group">
                              <span class="input-group-btn">
                                  <span class="btn btn-default btn-file">
                                      Browse… <input type="file" id="img-misi-image-button" name="misi-image">
                                  </span>
                              </span>
                              <input type="text" name="input-misi-image" value="<?php echo base_url() . explode("jimboree-cms/", $data[0]['misi_image'])[1]; ?>" class="form-control" readonly>
                          </div>
                          <img id='img-misi-image' src="<?php echo base_url() . explode("jimboree-cms/", $data[0]['misi_image'])[1]; ?>"/><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="motto">Motto <span class="read-star">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['motto']; ?>" class="form-control" id="class" placeholder="Enter Motto" name="motto" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama">File URL</label>
                        <div class="col-lg-10">
                            <input type="text" value="<?php echo $data[0]['file_url']; ?>" class="form-control" id="class" placeholder="Enter File URL" name="file_url"><br>
                        </div>
                      </div>
                      
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/school'); ?>" class="btn btn-danger">Cancel</a>
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
        // $(document).on('change', '.btn-file :file', function() {
        //   var input = $(this),
        //     label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        //   input.trigger('fileselect', [label]);
        // });

        // $('.btn-file :file').on('fileselect', function(event, label) {
        //     var input = $(this).parents('.input-group').find(':text'),
        //         log = label;
            
        //     if( input.length ) {
        //         input.val(log);
        //     } else {
        //         if( log ) alert(log);
        //     }
        // });
        function readURLVisi(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-visi-image').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img-visi-image-button").change(function(){
            readURLVisi(this);
        });

        function readURLMisi(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-misi-image').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img-misi-image-button").change(function(){
            readURLMisi(this);
        });
    });
    </script>
    <?php $this->load->view('layouts/footer.php'); ?>