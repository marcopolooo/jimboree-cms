<?php $this->load->view('layouts/header.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Contacts
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Contacts</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-lg-12">
          <a href="<?php echo base_url('master-data/contacts/add'); ?>" class="btn btn-info" id="tambah-tipe-user" style="margin-bottom: 8px; ">Add Contacts</a>
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
                    <th>Alamat</th>
                    <th>Telephone</th>
                    <th>No Fax</th>
                    <th>Email</th>
                    <th>Media Center</th>
                    <th>Staff Direcctory</th>
                    <th>Facebook</th>
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
                        <td><?php echo $d->alamat ?></td>
                        <td><?php echo $d->telephone ?></td>
                        <td><?php echo $d->no_fax ?></td>
                        <td><?php echo $d->no_email ?></td>
                        <td><?php echo $d->media_center ?></td>
                        <td><?php echo $d->staff_direcctory ?></td>
                        <td><a href="https://www.<?= $d->facebook?>"><?php echo $d->facebook ?></a></td>
                        <td>
                          <a href="<?php echo base_url('master-data/contacts/edit/' . $d->cid); ?>" class="btn btn-info">Edit</a>
                          <a href="#" onclick="deleteItem(<?php echo $d->cid; ?>)" class="btn btn-danger">Delete</a>
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
        url: window.location.origin + "/jimboree-cms/master-data/contacts/destroy",
        type: "post",
        data: {cid:id},
        success: function(data){
          window.location.href="http://localhost/jimboree-cms/master-data/contacts";
        },
        error: function(xhr, textStatus, errorThrown){
          alert(xhr.responseText);
        }
      });
    }
  }
</script>
<?php $this->load->view('layouts/footer.php'); ?>