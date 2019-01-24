<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
        </h1>
        <?php 
          if ($this->session->flashdata('success')) {
            echo "<div class='alert alert-info'>" . $this->session->flashdata('success') . "</div>";
          }

          if ($this->session->flashdata('error')) {
            echo "<div class='alert alert-danger'>" . $this->session->flashdata('error') . "</div>";
          }
        ?>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('layouts/footer.php'); ?>