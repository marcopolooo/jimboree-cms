<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add Articles
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Articles</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/articles/store'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="title">Title</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="title" placeholder="Enter Articles" name="title" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="articles_type">Articles Type</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="articles_type" required>
                            <?php 
                              foreach ($articlesType as $a ) {
                                echo "<option value='". $a->id . "'>" . $a->articles_type . "</option>";
                              }
                            ?>
                          </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="desc">Desc</label>
                        <div class="col-lg-10">
                          <textarea class="textarea" name="desc" id="desc" name="desc" required></textarea><br><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="image">Image</label>
                        <div class="col-lg-10">
                          <input type="file" class="form-control" id="image" placeholder="Enter Image" name="image" required><br>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/articles'); ?>" class="btn btn-danger">Cancel</a>
                    </div>
                  </form>
              </div>
            </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('layouts/footer.php'); ?>