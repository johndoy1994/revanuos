<?php
$this->load->view('common/admin_header');
$this->load->view('common/admin_leftmenu');
?>
<div class="container-fluid">
    <div class="row">
      <div class="main">
      <?php if($this->session->flashdata('success')){?>
          <div class="alert alert-success">      
            <?php echo $this->session->flashdata('success')?>
          </div>
        <?php } ?>
        <?php if($this->session->flashdata('error')){?>
          <div class="alert alert-danger">      
            <?php echo $this->session->flashdata('error')?>
          </div>
        <?php } ?>
        <h1 class="page-header">Dashboard</h1>
        <div class="row">
          <div class="col-sm-12">
            <div class="row">
                <a href="<?php echo base_url(); ?>career/listing">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-box fb-bg text-center clearfix">
                      <div class="pull-left"> <i class="fa fa-building-o"></i> </div>
                      <div class="pull-right">
                        <h3><?php echo "1"; ?></h3>
                        <small>Career</small> </div>
                    </div>
                  </div>
                </a>
                <a href="<?php echo base_url(); ?>testimonial/listing">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-box fb-bg text-center clearfix">
                      <div class="pull-left"> <i class="fa fa-bars"></i> </div>
                      <div class="pull-right">
                        <h3><?php echo "1"; ?></h3>
                        <small>Testimonial</small> </div>
                    </div>
                  </div>
                </a>
<!--                <a href="<?php echo base_url(); ?>services">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-box fb-bg text-center clearfix">
                      <div class="pull-left"> <i class="fa fa-file-text"></i> </div>
                      <div class="pull-right">
                        <h3><?php echo "1"; ?></h3>
                        <small>Services</small> </div>
                    </div>
                  </div>
                </a>-->
<!--                <a href="<?php echo base_url(); ?>client">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-box fb-bg text-center clearfix">
                      <div class="pull-left"> <i class="fa fa-group"></i> </div>
                      <div class="pull-right">
                        <h3><?php echo "1"; ?></h3>
                        <small>Client</small> </div>
                    </div>
                  </div>
                </a>-->
                <a href="<?php echo base_url(); ?>portfolio/listing">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-box fb-bg text-center clearfix">
                      <div class="pull-left"> <i class="fa fa-files-o"></i> </div>
                      <div class="pull-right">
                        <h3><?php echo "1"; ?></h3>
                        <small>Portfolio</small> </div>
                    </div>
                  </div>
                </a>
<!--                <a href="<?php echo base_url(); ?>admin">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-box fb-bg text-center clearfix">
                      <div class="pull-left"> <i class="fa fa-picture-o"></i> </div>
                      <div class="pull-right">
                        <h3><?php echo "1"; ?></h3>
                        <small>Images</small> </div>
                    </div>
                  </div>
                </a>-->
                <a href="<?php echo base_url(); ?>setting/listing">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="dashboard-box fb-bg text-center clearfix">
                      <div class="pull-left"> <i class="fa  fa-cog"></i> </div>
                      <div class="pull-right">
                        <h3><?php echo "1"; ?></h3>
                        <small>Setting</small> </div>
                    </div>
                  </div>
                </a>
              </div>
            <div class="sep"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
$this->load->view('common/admin_footer');
?>    