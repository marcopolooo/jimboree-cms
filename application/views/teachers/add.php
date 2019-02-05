<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add Teachers
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Teachers</li>
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
                <form role="form" action="<?php echo base_url('master-data/teachers/store'); ?>" method="post" enctype="multipart/form-data">
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
                              <input type="text" class="form-control" readonly>
                          </div>
                          <img id='img-upload'/>
                        </div>
                      </div><br><br>
                      <div class="form-group">
                        <label class="col-lg-2" for="students">NPWP</label>
                        <div class="col-lg-10">
                          <input type="hidden" name="peg_id">
                          <input type="text" class="form-control" id="npwp" placeholder="Enter NPWP" name="npwp" maxlength="45" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="students">Nama Panggilan</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="nama-panggilan" placeholder="Enter Nama Panggilan" name="nama_panggilan" maxlength="45" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama_depan">Nama Depan</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="nama_depan" placeholder="Enter Nama Depan" name="nama_depan" maxlength="45" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama_tengah">Nama Tengah</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="nama_tengah" placeholder="Enter Nama Tengah" name="nama_tengah"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="nama_tengah">Nama Belakang</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="nama_tengah" placeholder="Enter Nama Belakang" name="nama_belakang"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="jabatan">Jabatan</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="jabatan" placeholder="Enter jabatan" name="jabatan" maxlength="45"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="jabatan">Facebook</label>
                        <div class="col-lg-10">
                          <input type="url" class="form-control" id="facebook" placeholder="Enter Facebook" name="facebook" maxlength="45"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="jabatan">Instagram</label>
                        <div class="col-lg-10">
                          <input type="url" class="form-control" id="instagram" placeholder="Enter Instagram" name="instagram" maxlength="45"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="jabatan">Twitter</label>
                        <div class="col-lg-10">
                          <input type="url" class="form-control" id="twitter" placeholder="Enter Twitter" name="twitter" maxlength="45"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="tempat">Tempat Lahir</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="tempat" placeholder="Enter Tempat Lahir" name="tempat" maxlength="45" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2">Tanggal Lahir</label>
                        <div class="col-lg-10">
                          <div class="input-group" style="margin-bottom: 20px">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                              <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_lahir" data-date-format="yyyy-mm-dd" required><br>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="col-lg-10">
                          <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="1" required> Laki-laki<br>
                          <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="2" required> Perempuan<br><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="agama">Agama</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="agama" maxlength="45" required>
                            <?php 
                              foreach ($agama as $a ) {
                                echo "<option value='". $a->id_agama . "'>" . $a->nama_agama . "</option>";
                              }
                            ?>
                          </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="alamat">Alamat</label>
                        <div class="col-lg-10">
                          <textarea class="form-control" name="alamat" id="alamat" rows="3" required></textarea><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="email">Email</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" maxlength="45"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="telephone">Telephone</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="telephone" placeholder="Enter telephone" name="telephone" maxlength="15" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="attachment" class="col-sm-2 control-label">Status Ditampilkan</label>
                        <div class="col-sm-10">
                            <div class="checkbox">
                                <input type="checkbox" name="is_active" class="bootstrapswitch" id="is_active" data-size="normal" value="INACTIVE" data-on-text="Active" data-off-text="Inactive">
                            </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/teachers'); ?>" class="btn btn-danger">Cancel</a>
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