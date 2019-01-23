<?php $this->load->view('layouts/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Type Nilai
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Type Nilai</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <a href="<?php echo base_url('master-data/type_nilai/add'); ?>" class="btn btn-info" id="tambah-tipe-user" style="margin-bottom: 8px; ">Add Desc</a>
          <?php 
            if ($this->session->flashdata('success')) {
              echo "<div class='alert alert-info'>".$this->session->flashdata('success')."</div>";
            }

            if ($this->session->flashdata('error')) {
              echo "<div class='alert alert-danger'>".$this->session->flashdata('error')."</div>";
            }
          ?>
          <div class="box">
            <div class="box-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Desc</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if (isset($data)) {
                      foreach ($data as $index => $d) {
                  ?>
                      <tr>
                        <td><?php echo $index+1 ?></td>
                        <td><?php echo $d->desc?></td>
                        <td>
                          <a href="<?php echo base_url('master-data/type_nilai/edit/' . $d->id); ?>" class="btn btn-info">Edit</a>
                          <a href="#" onclick="deleteItem(<?php echo $d->id; ?>)" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                  <?php
                      }
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  function deleteItem(id){
    if(confirm('Are you sure for deleting this data?')){
      var id = id;
      $.ajax({
        url: window.location.origin + "/jimboree-cms/master-data/type_nilai/destroy",
        type: "post",
        data: {id:id},
        success: function(data){
          window.location.href="http://localhost/jimboree-cms/master-data/type_nilai";
        },
        error: function(xhr, textStatus, errorThrown){
          alert('Data gagal di hapus')
        }
      });
    }
  }
</script>
<?php $this->load->view('layouts/footer.php'); ?>