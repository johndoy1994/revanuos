<?php
$controller = $this->router->fetch_class();
$action = $this->router->fetch_method();
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <p><h3>Revanuous</h3></p></div>
      <ul class="nav navbar-nav navbar-right hidden-xs">
        <li><a href="<?php echo base_url()?>admin/logout"><i class="fa fa-power-off"></i> Logout</a></li>
      </ul>
      <div class="navbar-collapse navbar-ex1-collapse collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="<?php echo ($controller == 'admin' && $action == 'dashboard' ) ? " active " : ""; ?>"><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="<?php echo ($controller == 'career' && ($action == 'addcareer' || $action == 'listing')) ? " active " : ""; ?>"><a href="<?php echo base_url();?>career/listing"><i class="fa fa-building-o"></i> Career Management</a></li> 
            <li class="<?php echo ($controller == 'testimonial' && ($action == 'addtestimonial' || $action == 'listing')) ? " active " : ""; ?>"><a href="<?php echo base_url();?>testimonial/listing"><i class="fa fa-bars"></i> Testimonial Management</a></li> 
            <!--<li class="<?php echo ($controller == 'services' && ($action == 'addservices' || $action == 'listing')) ? " active " : ""; ?>"><a href="<?php echo base_url();?>services/listing"><i class="fa fa-file-text"></i> Services Management</a></li>--> 
            <!--<li class="<?php echo ($controller == 'client' && ($action == 'addclient' || $action == 'updateclient' || $action == 'listing')) ? " active " : ""; ?>"><a href="<?php echo base_url();?>client/listing"><i class="fa fa-group"></i> Client Management</a></li>--> 
            <li class="<?php echo ($controller == 'portfolio' && ($action == 'addportfolio' || $action == 'updateportfolio' || $action == 'listing')) ? " active " : ""; ?>"><a href="<?php echo base_url();?>portfolio/listing"><i class="fa fa-files-o"></i> Portfolio Management</a></li> 
            <!--<li class="<?php echo ($controller == 'image' && ($action == 'addimages' || $action == 'listing')) ? " active " : ""; ?>"><a href="<?php echo base_url();?>image/listing"><i class="fa fa-picture-o"></i> Images Management</a></li>--> 
            <li class="<?php echo ($controller == 'setting' && ($action == 'addimages' || $action == 'listing')) ? " active " : ""; ?>"><a href="<?php echo base_url();?>setting/listing"><i class="fa  fa-cog"></i> Setting Management</a></li> 
            <li class="visible-xs"> <a href="<?php echo base_url()?>admin/logout"><i class="fa fa-power-off"></i> Logout</a> </li>
        </ul>
      </div>
    </div>
  </nav>  