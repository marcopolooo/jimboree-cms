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
                <form role="form" action="<?php echo base_url('master-data/articles/update'); ?>" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="title">Title</label>
                        <div class="col-lg-10">
                          <input type="hidden" class="form-control" id="title" name="id" value="<?php echo $data[0]['id']; ?>" required><br>
                          <input type="text" class="form-control" id="title" placeholder="Enter Articles" name="title" value="<?php echo $data[0]['title']; ?>" required><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="articles_type">Articles Type</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="articles_type" required>
                            <option value="<?php echo $data[0]['articles_type_id']; ?>"><?php echo $data[0]['articles_type']; ?></option>
                            <?php 
                              foreach ($articlesType as $a ) {
                                if ($a->id != $data[0]['articles_type_id']) {
                                  echo "<option value='". $a->id . "'>" . $a->articles_type . "</option>";
                                }
                              }
                            ?>
                          </select><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="desc">Desc</label>
                        <div class="col-lg-10">
                          <textarea class="textarea" name="desc" id="desc" name="desc" required><?php echo $data[0]['desc']?></textarea><br><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="image">Image</label>
                        <div class="col-lg-10">
                          <input type="file" class="form-control" id="image" placeholder="Enter Image" name="image" value="<?php echo $data[0]['image']; ?>" required><br>
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