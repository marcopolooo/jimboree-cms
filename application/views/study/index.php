  <?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Study
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Study</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box-title" style="float: right">
                <h3>Grade</h3>
                <a href="<?php echo base_url('study/add'); ?>" class="btn btn-info" id="tambah-tipe-user">Add Study</a>
              </div>
              <div class="box">
                <div class="box-body">
                  <table id="table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Study</th>
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
                            <td><?php echo $d->nama_mapel?></td>
                            <td>
                              <a href="<?php echo base_url('study/edit/' . $d->mid); ?>" class="btn btn-info">Edit</a>
                              <a href="#" onclick="deleteItem(<?php echo $d->mid; ?>)" class="btn btn-danger">Delete</a>
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
    <?php $this->load->view('layouts/footer.php'); ?>