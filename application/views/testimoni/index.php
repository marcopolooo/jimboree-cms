<?php $this->load->view('layouts/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Testimoni
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Testimoni</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <a href="<?php echo base_url('transaction/testimoni/add'); ?>" class="btn btn-info" id="tambah-tipe-user" style="margin-bottom: 8px; ">Add Testimoni</a>
          <?php 
            if ($this->session->flashdata('success')) {
              echo "<div class='alert alert-info'>" . $this->session->flashdata('success') . "</div>";
            }

            if ($this->session->flashdata('error')) {
              echo "<div class='alert alert-danger'>" . $this->session->flashdata('error') . "</div>";
            }
          ?>
          <div class="box">
            <div class="box-body">
              <table id="table" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Testimoni</th>
                    <th>Parents</th>
                    <th>Action</th>
                  </tr>
                </thead>
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
        url: window.location.origin + "/jimboree-cms/transaction/testimoni/destroy",
        type: "post",
        data: {id:id},
        success: function(data){
          window.location.href="http://localhost/jimboree-cms/transaction/testimoni";
        },
        error: function(xhr, textStatus, errorThrown){
          alert(xhr.responseText);
        }
      });
    }
  }
</script>
<?php $this->load->view('layouts/footer.php'); ?>
<script>
$('#table').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax":{
      "url":"<?php echo base_url('/transaction/testimoni/index-data'); ?>",
      "type":"POST"
    },
    "columnDefs":[
      {
        "targets":[0],
        "orderable":false
      }
    ]
  });
</script>