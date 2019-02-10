<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Edit Schedule
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Edit Schedule</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('transaction/schedule/update'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <input type="hidden" name="sid" value="<?php echo $data[0]['sid']; ?>">
                        <label class="col-lg-2" for="id_tahun_ajaran">School Year</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="id_tahun_ajaran">
                            <option value="<?php $data[0]['id_tahun_ajaran']; ?>"><?php echo $data[0]['schoolyear']; ?></option>
                            <?php 
                              foreach ($schoolyear as $sy) {
                                if($sy->id_tahun_ajaran != $data[0]['id_tahun_ajaran']){
                                  echo "<option value='". $sy->id_tahun_ajaran . "'>" . $sy->from . "/" . $sy->to . "</option>";
                                }
                              }
                            ?>
                          </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="mid">Subjects</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="mid">
                            <option value="<?php $data[0]['mid']; ?>"><?php echo $data[0]['nama_mapel']; ?></option>
                            <?php 
                              foreach ($subjects as $s) {
                                if ($s->mid != $data[0]['mid']) {
                                  echo "<option value='". $s->mid . "'>" . $s->nama_mapel . "</option>";
                                }
                              }
                            ?>
                          </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="peg_id">Teachers</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="peg_id">
                            <option value="<?php $data[0]['peg_id']; ?>"><?php echo $data[0]['teacher']; ?></option>
                            <?php 
                              $sortName = array();
                              foreach ($teachers as $t) {
                                $sortName[] = ['id' => $t->peg_id, 'name' => $t->nama_depan . " " . $t->nama_tengah . " " . $t->nama_belakang];
                              }
                              usort($sortName, function($a, $b) {
                                  return $a['name'] <=> $b['name'];
                              });
                              
                              foreach ($sortName as $s) {
                                if ($s['id'] != $data[0]['peg_id']) {
                                  echo "<option value='". $s['id'] . "'>" . $s['name'] . "</option>";
                                }
                              }
                            ?>
                          </select>
                          <br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="id_class">Class</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="id_class">
                            <option value="<?php echo $data[0]['id_class'] ?>"><?php echo $data[0]['nama_ruang_kelas'] ?></option>
                            <?php 
                              foreach ($class as $c) {
                                if ($c->id_class != $data[0]['id_class']) {
                                  echo "<option value='". $c->id_class . "'>" . $c->nama_ruang_kelas . "</option>";
                                }
                              }
                            ?>
                          </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="tgl">Date</label>
                        <div class="col-lg-10">
                          <input value="<?php echo date('d-m-Y', strtotime($data[0]['tgl'])); ?>" class="form-control" id="tgl" placeholder="Date" name="tgl" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="jam_mulai">Start</label>
                        <div class="col-lg-10">
                          <input value="<?php echo $data[0]['jam_mulai'] ?>" class="form-control" id="jam_mulai" placeholder="Start Time" name="jam_mulai" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="jam_selesai">End</label>
                        <div class="col-lg-10">
                          <input value="<?php echo $data[0]['jam_selesai'] ?>" class="form-control" id="jam_selesai" placeholder="End Time" name="jam_selesai" required><br>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('transaction/schedule'); ?>" class="btn btn-danger">Cancel</a>
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
        $("#tgl").datepicker({ autoclose: true, format: "dd-mm-yyyy", orientation: "bottom" });
        $("#jam_mulai").datetimepicker({
          format: 'HH:ii',
          autoclose: true,
          showMeridian: true,
          startView: 1,
          maxView: 1 
        });
        $("#jam_selesai").datetimepicker({
          format: 'HH:ii',
          autoclose: true,
          showMeridian: true,
          startView: 1,
          maxView: 1 
        });

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