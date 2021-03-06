<?php $this->load->view('layouts/header-login.php'); ?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="<?php echo base_url('login'); ?>" method="post">
                <span class="login100-form-title p-b-43">
                    Please login
                </span>
                <?php 
                    if ($this->session->flashdata('success')) {
                    echo "<div class='alert alert-info'>" . $this->session->flashdata('success') . "</div>";
                    }

                    if ($this->session->flashdata('error')) {
                    echo "<div class='alert alert-danger'>" . $this->session->flashdata('error') . "</div>";
                    }
                ?>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="username" placeholder="Enter username">
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Enter password">
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <!-- <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Remember me
                        </label>
                    </div> -->

                    <!-- <div>
                        <a href="#" class="txt1">
                            Forgot Password?
                        </a>
                    </div> -->
                </div>

                <div class="container-login100-form-btn">
                    <input class="login100-form-btn" type="submit" value="Login">
                </div>

                <!-- <div class="text-center p-t-46 p-b-20">
                    <span class="txt2">
                        or sign up using
                    </span>
                </div>
                
                <div class="login100-form-social flex-c-m">
                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                    </a>

                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </div> -->
            </form>

            <div class="login100-more" style="background-image: url('<?php echo base_url() ?>assets/login/images/bg-01.jpg');">
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layouts/footer-login.php'); ?>