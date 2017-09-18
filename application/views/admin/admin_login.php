<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?php echo base_url(); ?>assets/admin/images/favicon.ico">
        <title>Revanuous</title>
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet" type="text/css" charset="utf-8" />
    </head>
    <style type="text/css">
        body {
            background: url("<?php echo base_url(); ?>uploads/logo1.jpg") no-repeat 0% 0% fixed;
            background-size:cover;
        }
    </style>
    <?php
//echo "<pre>";print_r($message);exit;
    if (isset($message['error'])) {

        echo $message['error'];
    }
    ?>
    <body class="login-bg">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3" style="background: rgba(129, 255, 177,0.8); color:black; margin-top: 7%; ">
                        <div class="text-center"><h1>Revanuous</h1></div>
                        <div class="sep"></div>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success">      
                                <?php echo $this->session->flashdata('success') ?>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">      
                                <?php echo $this->session->flashdata('error') ?>
                            </div>
                        <?php } ?>
                        <form name="admin_login" id="admin_login" action="" method="post" enctype="multipart/form-data">
                            
                                <h3 class="form-signin-heading">Please sign in</h3>

                                <label for="inputEmail" class="sr-only">Email address</label>
                                <input type="email" id="email" name="email"class="form-control input-lg" placeholder="Email address">
                                <div>&nbsp;</div>

                                <label for="inputPassword" class="sr-only">Password</label>
                                <input type="password" id="password" name="password"class="form-control input-lg" placeholder="Password">

                                <div>&nbsp;</div>
                                <button class="btn btn-lg btn-block" style="background-color: brown;" type="Submit" value="Submit">Sign in</button>
                                <div>&nbsp;</div>
                                <div>&nbsp;</div>
                           
                        </form>
                        <div class="text-center"><small class="text-muted">&copy; <?php echo date("Y"); ?> <?php echo $this->config->item('title'); ?></small></div>
                        <div>&nbsp;</div>
                    </div>
                </div>
            </div>
            <!-- /container --> 
        </div>
        <script src="<?php echo base_url(); ?>assets/admin/js/jquery.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/admin/js/bootstrap.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script>
            $(function () {
                jQuery.validator.addMethod("lettersonly", function (value, element)
                {
                    return this.optional(element) || /^[a-z]+$/i.test(value);
                }, "Letters only please");

                $("#admin_login").validate({
                    rules: {
                        password: "required",
                        email: {
                            required: true,
                            //email: true
                        }
                    },
                    messages: {
                        password: {
                            required: "Enter your Password",
                        },
                        email: {
                            required: "please Enter User Name.",
                            //email: "Please enter a valid email address",
                        },
                    }
                });

            });
        </script>
    </body>
</html>
