<?php $this->load->view('layouts/header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Add Articles Type
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Add Articles Type</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="<?php echo base_url('master-data/articles-type/update'); ?>" method="post">
                    <div class="box-body">
                      <div class="form-group">
                        <label class="col-lg-2" for="article_type">Articles Type</label>
                        <div class="col-lg-10">
                          <input type="hidden" class="form-control" id="article_type" placeholder="Enter Articles Type" name="id" required value="<?php echo $data[0]['id']?>">
                          <input type="text" class="form-control" id="article_type" placeholder="Enter Articles Type" name="articles_type" required value="<?php echo $data[0]['articles_type']?>"><br>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-lg-2" for="desc">Desc</label>
                        <div class="col-lg-10">
                          <input type="hidden" class="form-control" id="desc" placeholder="Enter Articles Type" name="id" required value="<?php echo $data[0]['id']?>">
                          <input type="text" class="form-control" id="desc" placeholder="Enter Articles Type" name="desc" required value="<?php echo $data[0]['desc']?>"><br>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary" >Submit</button>
                      <a href="<?php echo base_url('master-data/articles-type'); ?>" class="btn btn-danger">Cancel</a>
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