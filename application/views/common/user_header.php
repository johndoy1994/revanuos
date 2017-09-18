<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Welcome to Revanuos</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url(); ?>assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url(); ?>assets/user/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Theme CSS -->
        <link href="<?php echo base_url(); ?>assets/user/css/agency.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>

    <body id="page-top" class="index">

        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
            <div class="container"> 
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i> </button>
                    <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>">Revanuos</a> </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden"> <a href="#"></a> </li>
                        <?php $urlSlug = $this->uri->rsegments[2]; ?>
                        <li class="hover-effect <?php echo $urlSlug == 'index' ? 'active' : ''; ?>"> <a href="<?php echo base_url(); ?>">Home</a> </li>
                        <li class="hover-effect <?php echo $urlSlug == 'aboutus' ? 'active' : ''; ?>"> <a href="<?php echo base_url(); ?>aboutus">About Us</a> </li>
                        <li class="hover-effect <?php echo $urlSlug == 'portfolio' ? 'active' : ''; ?>"> <a href="<?php echo base_url(); ?>portfolio">Portfolio</a> </li>
                        <li class="hover-effect <?php echo $urlSlug == 'testimonial' ? 'active' : ''; ?>"> <a href="<?php echo base_url(); ?>testimonial">Testimonial</a> </li>
                        <li class="hover-effect <?php echo $urlSlug == 'career' ? 'active' : ''; ?>"> <a href="<?php echo base_url(); ?>career">Career</a> </li>
                        <li class="hover-effect <?php echo $urlSlug == 'contactus' ? 'active' : ''; ?>"> <a href="<?php echo base_url(); ?>contactus">Contact Us</a> </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse --> 
            </div>
            <!-- /.container-fluid --> 
        </nav>

        <!-- Header -->
